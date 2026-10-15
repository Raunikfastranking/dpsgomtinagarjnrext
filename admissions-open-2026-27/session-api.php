<?php
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/../includes/api-cache.php';

$apiUrl = "https://dps.allenhouseschools.com/api/school-sessions";
$cacheKey = 'school_sessions';

$cached = api_cache_get($cacheKey);
if ($cached !== null) {
    if (time() - $cached['fetched_at'] >= API_CACHE_TTL) {
        api_trigger_background_refresh();
    }
    $data = $cached['data'];
} else {
    $ch = curl_init($apiUrl);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT        => 10,
        CURLOPT_CONNECTTIMEOUT => 5,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTPHEADER     => api_auth_headers(),
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($response === false || $httpCode !== 200) {
        return [];
    }

    $data = json_decode($response, true);
    api_cache_set($cacheKey, $data);
}

if (!is_array($data) || !isset($data['status']) || $data['status'] !== 'success') {
    return [];
}

$sessions = $data['data']['data'] ?? $data['data'] ?? [];

return $sessions;
