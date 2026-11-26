<?php
include "includes/apis.php";

// CMS page data: /pages/best-cambridge-school-in-lucknow
$bcslFetch = api_fetch_cached(['best_cambridge_page' => '/pages/best-cambridge-school-in-lucknow']);
$bcsl_page = is_array($bcslFetch['best_cambridge_page'] ?? null) ? $bcslFetch['best_cambridge_page'] : null;

require_once __DIR__ . '/includes/cambridge-cms-helpers.php';
require_once __DIR__ . '/cambridge/cambridge-page.php';

$bcslTitle = cmsPageBannerDisplayTitle($bcsl_page);
if ($bcslTitle === '') {
    $bcslTitle = 'Cambridge Curriculum';
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Best Cambridge Board School in Lucknow | DPS Gomti Nagar Jr </title>
    <link rel="canonical" href="https://dpsgnext.com/best-cambridge-school-in-lucknow" />
    <meta name="description" content="Finding the best Cambridge Board School in Lucknow? DPS Jr is a trusted Cambridge International School offering IGCSE curriculum with global standards." />
    <meta name="keywords" content="Best Cambridge Board School in Lucknow,
Trusted Cambridge International School Lucknow,
Leading IGCSE board school in Lucknow,
Top International School in Lucknow,
Cambridge-affiliated School in Lucknow

">
    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative  mb-[40px] sm:mb-[120px] ">
        <?php
        if ($bcsl_page !== null) {
            cmsRenderCambridgePage($bcsl_page);
        } else {
            cmsRenderPageBanner(null, []);
            cmsRenderPageBreadcrumbs(null, []);
            echo '<div class="mx-auto max-w-[1280px] px-3 sm:px-5 mt-10 mb-10 text-gray-600">';
            echo '<p>Content is being updated. Please check back shortly.</p>';
            echo '</div>';
        }
        ?>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

</body>

</html>
