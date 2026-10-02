<?php
require_once dirname(__DIR__) . '/proxy/config.php';

header('Content-Type: application/json; charset=utf-8');

$schoolId = isset($_GET['school']) ? (int) $_GET['school'] : 1;
$branchId = isset($_GET['branch']) ? (int) $_GET['branch'] : (int) DPS_GOMTINAGAR_JNREXT_BRANCH_ID;
$boardId = isset($_GET['board']) ? (int) $_GET['board'] : 0;

if ($branchId !== (int) DPS_GOMTINAGAR_JNREXT_BRANCH_ID) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Invalid branch']);
    exit;
}

if ($boardId <= 0) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid board']);
    exit;
}

$url = 'https://dps.allenhouseschools.com/api/selected-grades/' . $schoolId . '/' . $branchId . '/' . $boardId;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 30);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, api_auth_headers());

$response = curl_exec($ch);
$status = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

http_response_code($status > 0 ? $status : 502);
echo $response !== false ? $response : json_encode(['success' => false, 'message' => 'API request failed']);
