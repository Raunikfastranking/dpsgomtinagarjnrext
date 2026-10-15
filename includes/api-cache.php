<?php
/**
 * File-based API response cache with a short refresh interval.
 *
 * - Fresh cache (< API_CACHE_TTL seconds): served instantly.
 * - Stale cache: refreshed synchronously so CMS changes are visible on the
 *   next request after the short TTL.
 * - Missing cache: fetched synchronously once, then cached.
 */

if (!defined('API_CACHE_TTL')) {
    define('API_CACHE_TTL', 5); // seconds; CMS updates reflect within ~5-10s
}

if (!defined('API_CACHE_DIR')) {
    define('API_CACHE_DIR', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'api');
}

if (!defined('API_REFRESH_LOCK')) {
    define('API_REFRESH_LOCK', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'refresh.lock');
}

if (!defined('API_REFRESH_LOCK_MAX_AGE')) {
    define('API_REFRESH_LOCK_MAX_AGE', 180); // stale lock cleanup (seconds)
}

if (!defined('DPS_CACHE_SECRET')) {
    define('DPS_CACHE_SECRET', 'dps-cache-7f3a9c2e1b8d4f6a'); // key for clear-cache.php / refresh-cache.php over HTTP
}

if (!defined('API_USED_KEYS_FILE')) {
    define('API_USED_KEYS_FILE', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'cache' . DIRECTORY_SEPARATOR . 'api' . DIRECTORY_SEPARATOR . 'used-keys.json');
}

if (!defined('API_USED_KEYS_MAX_AGE')) {
    define('API_USED_KEYS_MAX_AGE', 3600); // stop refreshing keys unused for 1 hour
}

function api_cache_ensure_dir(): void
{
    if (!is_dir(API_CACHE_DIR)) {
        @mkdir(API_CACHE_DIR, 0775, true);
    }
}

function api_cache_file(string $key): string
{
    return API_CACHE_DIR . DIRECTORY_SEPARATOR . md5($key) . '.json';
}

/** @return array{data:mixed,fetched_at:int}|null */
function api_cache_get(string $key): ?array
{
    $file = api_cache_file($key);
    if (!is_file($file)) {
        return null;
    }
    $raw = @file_get_contents($file);
    if ($raw === false || $raw === '') {
        return null;
    }
    $entry = json_decode($raw, true);
    if (!is_array($entry) || !array_key_exists('data', $entry) || !isset($entry['fetched_at'])) {
        return null;
    }
    return $entry;
}

function api_cache_set(string $key, $data): void
{
    api_cache_ensure_dir();
    $file = api_cache_file($key);
    $tmp = $file . '.' . getmypid() . '.tmp';
    $payload = json_encode(['data' => $data, 'fetched_at' => time()]);
    if ($payload === false) {
        return;
    }
    if (@file_put_contents($tmp, $payload, LOCK_EX) !== false) {
        @rename($tmp, $file); // atomic replace -> readers never see a partial file
    } else {
        @unlink($tmp);
    }
}

function api_cache_delete(string $key): void
{
    $file = api_cache_file($key);
    if (is_file($file)) {
        @unlink($file);
    }
}

function api_cache_flush(): int
{
    $count = 0;
    foreach (glob(API_CACHE_DIR . DIRECTORY_SEPARATOR . '*.json') ?: [] as $f) {
        if (@unlink($f)) {
            $count++;
        }
    }
    return $count;
}

/**
 * Remember that a cache key (key => endpoint path) is actively being
 * requested, so the background refresher keeps it fresh too.
 */
function api_cache_track(string $key, string $endpoint): void
{
    api_cache_ensure_dir();
    $fp = @fopen(API_USED_KEYS_FILE, 'c+');
    if (!$fp) {
        return;
    }
    if (flock($fp, LOCK_EX)) {
        $raw = stream_get_contents($fp);
        $map = json_decode($raw ?: '', true);
        if (!is_array($map)) {
            $map = [];
        }
        $map[$key] = ['endpoint' => $endpoint, 'last_used' => time()];
        // prune keys not used recently
        $cutoff = time() - API_USED_KEYS_MAX_AGE;
        $map = array_filter($map, function ($e) use ($cutoff) {
            return isset($e['last_used']) && $e['last_used'] >= $cutoff;
        });
        ftruncate($fp, 0);
        rewind($fp);
        fwrite($fp, json_encode($map));
        fflush($fp);
        flock($fp, LOCK_UN);
    }
    fclose($fp);
}

/** Keys (key => endpoint) recently requested outside the global endpoint list. */
function api_used_extra_endpoints(): array
{
    if (!is_file(API_USED_KEYS_FILE)) {
        return [];
    }
    $map = json_decode((string) @file_get_contents(API_USED_KEYS_FILE), true);
    if (!is_array($map)) {
        return [];
    }
    $extra = [];
    foreach ($map as $key => $e) {
        if (isset($e['endpoint'])) {
            $extra[$key] = $e['endpoint'];
        }
    }
    return $extra;
}

/**
 * Parallel fetch of multiple endpoints. Returns decoded responses keyed
 * like $endpoints. Shared by the page path (missing keys) and the
 * background refresher.
 */
function api_fetch_raw(array $endpoints, string $baseUrl = 'https://dps.allenhouseschools.com/api'): array
{
    $mh = curl_multi_init();
    $curlHandles = [];
    $responses = [];

    foreach ($endpoints as $key => $endpoint) {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL            => $baseUrl . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_TIMEOUT        => 30,
            CURLOPT_ENCODING       => '', // accept gzip/deflate -> smaller transfers
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_HTTPHEADER     => api_auth_headers(),
        ]);
        curl_multi_add_handle($mh, $ch);
        $curlHandles[$key] = $ch;
    }

    $running = null;
    do {
        $status = curl_multi_exec($mh, $running);
        if ($status > CURLM_OK) {
            break;
        }
        curl_multi_select($mh);
        usleep(10000);
    } while ($running > 0);

    foreach ($curlHandles as $key => $ch) {
        $content = curl_multi_getcontent($ch);
        $responses[$key] = json_decode($content, true);
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    curl_multi_close($mh);
    return $responses;
}

/**
 * Spawn refresh-cache.php as a detached process. Guarded by a lock file
 * so only one refresh runs at a time.
 */
function api_trigger_background_refresh(): void
{
    if (PHP_SAPI === 'cli') {
        return; // CLI callers refresh inline
    }

    if (is_file(API_REFRESH_LOCK)) {
        $age = time() - (int) @filemtime(API_REFRESH_LOCK);
        if ($age < API_REFRESH_LOCK_MAX_AGE) {
            return; // a refresh is already running / recently ran
        }
        @unlink(API_REFRESH_LOCK); // stale lock from a dead process
    }

    if (@file_put_contents(API_REFRESH_LOCK, (string) getmypid(), LOCK_EX) === false) {
        return; // cache dir not writable
    }

    $script = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'refresh-cache.php';
    if (!is_file($script)) {
        return;
    }

    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
        $cmd = 'start /B "" ' . escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg($script);
        @pclose(@popen($cmd, 'r'));
    } else {
        @exec(escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg($script) . ' > /dev/null 2>&1 &');
    }
}

/**
 * Fetch a list of endpoints with stale-while-revalidate semantics.
 * Always returns immediately-serveable data when anything is cached.
 */
function api_fetch_cached(array $endpoints, int $ttl = API_CACHE_TTL): array
{
    $result = [];
    $missing = [];
    $stale = [];
    $now = time();

    foreach ($endpoints as $key => $endpoint) {
        $entry = api_cache_get($key);
        if ($entry === null) {
            $missing[$key] = $endpoint; // nothing on disk -> must fetch now
            continue;
        }
        $result[$key] = $entry['data'];
        if ($now - $entry['fetched_at'] >= $ttl) {
            $stale[$key] = $endpoint;
        }
    }

    $toFetch = $missing + $stale;
    if ($toFetch) {
        $fresh = api_fetch_raw($toFetch);
        foreach ($fresh as $key => $data) {
            // Keep the previous value if the API is temporarily unavailable.
            if ($data !== null) {
                $result[$key] = $data;
                api_cache_set($key, $data);
            }
        }
    }

    return $result;
}

/**
 * Refetch every expired (or missing) key and update the cache.
 * Called by refresh-cache.php; creates/releases the lock file.
 */
function api_refresh_stale(array $endpoints, int $ttl = API_CACHE_TTL): int
{
    api_cache_ensure_dir();
    @file_put_contents(API_REFRESH_LOCK, (string) getmypid(), LOCK_EX);

    // Merge in extra keys tracked from ad-hoc pages (e.g. CMS page slugs).
    foreach (api_used_extra_endpoints() as $key => $endpoint) {
        if (!isset($endpoints[$key])) {
            $endpoints[$key] = $endpoint;
        }
    }

    $expired = [];
    $now = time();
    foreach ($endpoints as $key => $endpoint) {
        $entry = api_cache_get($key);
        if ($entry === null || ($now - $entry['fetched_at'] >= $ttl)) {
            $expired[$key] = $endpoint;
        }
    }

    $updated = 0;
    if ($expired) {
        foreach (api_fetch_raw($expired) as $key => $data) {
            if ($data !== null) {
                api_cache_set($key, $data);
                $updated++;
            }
        }
    }

    @unlink(API_REFRESH_LOCK);
    return $updated;
}
