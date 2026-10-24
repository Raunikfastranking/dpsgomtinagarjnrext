<?php
require_once __DIR__ . '/config.php';

require_once __DIR__ . '/../includes/image-alt.php';
require_once __DIR__ . '/../includes/layout-parts-resolve.php';
require_once __DIR__ . '/../includes/api-cache.php';

$api_url = "https://dps.allenhouseschools.com";

if (!function_exists('fetchMultipleApiData')) {
    function fetchMultipleApiData($endpoints)
    {
        return api_fetch_cached($endpoints);
    }
}
$endpoints = [
    'landing_data'   => '/pages/landing-page-gomtinagar-jnr',
    'header_footer_data' => '/public/branches/5/layout-parts/',
    'thankyou_data' => '/pdf/branch/5',
  ];

$data = fetchMultipleApiData($endpoints);
$landing_data   = $data['landing_data'];
$header_footer_data = $data['header_footer_data'];
$footer_layout_meta = dps_resolve_footer_layout_meta($header_footer_data);
$thankyou_data = $data['thankyou_data'];
?>
