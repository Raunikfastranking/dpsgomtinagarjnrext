<?php

// Background worker for stale CMS API responses. It keeps normal page
// requests fast while refreshing data without blocking the visitor.
require_once __DIR__ . '/proxy/config.php';
require_once __DIR__ . '/includes/api-cache.php';

$endpoints = [];
if (is_file(API_REFRESH_QUEUE)) {
    $queued = json_decode((string) @file_get_contents(API_REFRESH_QUEUE), true);
    if (is_array($queued)) {
        $endpoints = $queued;
    }
    @unlink(API_REFRESH_QUEUE);
}

try {
    if ($endpoints) {
        api_refresh_stale($endpoints, API_CACHE_TTL);
    }
} finally {
    @unlink(API_REFRESH_LOCK);
}
