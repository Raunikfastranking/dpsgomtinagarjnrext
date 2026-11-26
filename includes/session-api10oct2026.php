<?php
require_once dirname(__DIR__) . '/proxy/config.php';

// Fetches active school sessions (no branch_id needed)
$apiUrl = "https://dps.allenhouseschools.com/api/school-sessions";

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

if (isset($data['data']['data']) && is_array($data['data']['data'])) {
    return $data['data']['data'];
}
if (isset($data['data']) && is_array($data['data'])) {
    return $data['data'];
}
if (is_array($data)) {
    return $data;
}
return [];
