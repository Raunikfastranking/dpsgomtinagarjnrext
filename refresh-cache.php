<?php
/**
 * Background cache refresher.
 *
 * Spawned automatically as a detached process when a page request finds
 * stale cache entries (see includes/api-cache.php). Can also be run
 * manually:  php refresh-cache.php   or   /refresh-cache.php?key=SECRET
 */
require_once __DIR__ . '/includes/api-cache.php';

if (PHP_SAPI !== 'cli') {
    if (($_GET['key'] ?? '') !== DPS_CACHE_SECRET) {
        http_response_code(403);
        exit('Forbidden');
    }
}

// Including apis.php runs api_fetch_cached(); in CLI mode stale keys are
// refreshed inline by api_refresh_stale() (which holds the lock file).
require __DIR__ . '/includes/apis.php';

if (PHP_SAPI === 'cli') {
    echo "cache refreshed\n";
}
