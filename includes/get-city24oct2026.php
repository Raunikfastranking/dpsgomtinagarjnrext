<?php
require_once dirname(__DIR__) . '/proxy/config.php';
require_once __DIR__ . '/api-cache.php';

// Fetches cities associated with branch (213 items, not paginated)
$branchId = DPS_GOMTINAGAR_JNREXT_BRANCH_ID;
$apiUrl = "https://dps.allenhouseschools.com/api/cities/{$branchId}";
$cacheKey = 'cities_branch_5';

$cached = api_cache_get($cacheKey);
if ($cached !== null) {
    if (time() - $cached['fetched_at'] >= API_CACHE_TTL) {
        api_trigger_background_refresh();
    }
    $json = $cached['data'];
} else {
    $ch = curl_init($apiUrl);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 15,          // Slightly longer – large list
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

    $json = json_decode($response, true);
    api_cache_set($cacheKey, $json);
}

// Handle both possible structures: wrapped {status, count, data: [...]} or direct array
if (is_array($json) && isset($json['status']) && $json['status'] === 'success') {
    return $json['data'] ?? [];           // wrapped version
}

if (is_array($json)) {
    return $json;                         // direct array version
}

return [];
?>