<?php
require_once dirname(__DIR__) . '/proxy/config.php';

// Fetches grades for specific branch
$branchId = DPS_GOMTINAGAR_JNREXT_BRANCH_ID;
$apiUrl = "https://dps.allenhouseschools.com/api/grades/{$branchId}";

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

$json = json_decode($response, true);

if (!is_array($json) || !isset($json['status']) || $json['status'] !== 'success') {
    return [];
}

// Extract the actual grades list (paginated under data.data)
return $json['data']['data'] ?? [];
?>