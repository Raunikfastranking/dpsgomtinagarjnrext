<?php
include "includes/apis.php";


$cambridgeSlug = 'cambridge-curriculum-page-gomtinagar-jnr';

$cambridgeFetch = api_fetch_cached(['cambridge_page' => '/pages/' . $cambridgeSlug]);
$cambridge_page = is_array($cambridgeFetch['cambridge_page'] ?? null)
    ? $cambridgeFetch['cambridge_page']
    : null;

require_once __DIR__ . '/includes/cambridge-cms-helpers.php';
require_once __DIR__ . '/cambridge/cambridge-page.php';

$cambridgeTitle = cmsPageBannerDisplayTitle($cambridge_page);
if ($cambridgeTitle === '') {
    $cambridgeTitle = 'Cambridge Curriculum';
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title><?= htmlspecialchars((string) ($cambridge_page['data']['meta_title'] ?? $cambridgeTitle), ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars((string) ($cambridge_page['data']['meta_description'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    <meta name="keywords" content="<?= htmlspecialchars((string) ($cambridge_page['data']['meta_keywords'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative mb-[40px] sm:mb-[120px]">
        <?php
        if ($cambridge_page !== null) {
            cmsRenderCambridgePage($cambridge_page);
        } else {
            cmsRenderPageBanner(null, []);
            cmsRenderPageBreadcrumbs(null, []);
            echo '<div class="mx-auto max-w-[1280px] px-3 sm:px-5 mt-10 mb-10 text-gray-600">';
            echo '<p>Cambridge Curriculum content is being updated. Please check back shortly.</p>';
            echo '</div>';
        }
        ?>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

</body>

</html>
