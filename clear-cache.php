<?php
/**
 * Manual cache purge: /clear-cache.php?key=SECRET
 * Clears all cached API responses, then kicks off a background refresh
 * so the cache is warm again within seconds.
 */
require_once __DIR__ . '/includes/api-cache.php';

if (($_GET['key'] ?? '') !== DPS_CACHE_SECRET) {
    http_response_code(403);
    exit('Forbidden');
}

$deleted = api_cache_flush();
api_trigger_background_refresh();

header('Content-Type: text/plain');
echo "Cleared {$deleted} cached entries. Background refresh started.\n";
