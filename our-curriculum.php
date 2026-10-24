<?php
include "includes/apis.php";

// Our Curriculum page — rendered with the Cambridge landing design.
// CMS slug: 32-our-curriculum-page-gomtinagar-jnr (fetched as $our_curriculum_data).
$ourCurriculumPage = is_array($our_curriculum_data ?? null) ? $our_curriculum_data : null;

require_once __DIR__ . '/includes/cambridge-cms-helpers.php';
require_once __DIR__ . '/cambridge/cambridge-page.php';

$ourCurriculumTitle = cmsPageBannerDisplayTitle($ourCurriculumPage);
if ($ourCurriculumTitle === '') {
    $ourCurriculumTitle = 'Our Curriculum';
}

$breadcrumbTrail = [
    ['label' => 'Home', 'href' => '/'],
    ['label' => 'Academics', 'href' => ''],
    ['label' => $ourCurriculumTitle, 'href' => 'our-curriculum'],
];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title><?= htmlspecialchars((string) ($ourCurriculumPage['data']['meta_title'] ?? $ourCurriculumPage['data']['title'] ?? $ourCurriculumTitle), ENT_QUOTES, 'UTF-8') ?></title>
    <meta name="description" content="<?= htmlspecialchars((string) ($ourCurriculumPage['data']['meta_description'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
    <meta name="keywords" content="<?= htmlspecialchars((string) ($ourCurriculumPage['data']['meta_keywords'] ?? ''), ENT_QUOTES, 'UTF-8') ?>">
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative mb-[40px] sm:mb-[120px]">
        <?php
        if ($ourCurriculumPage !== null) {
            cmsRenderCambridgePage($ourCurriculumPage, [
                'fallback_title' => 'Our Curriculum',
                'trail'          => $breadcrumbTrail,
            ]);
        } else {
            cmsRenderPageBanner(null, ['fallback_title' => 'Our Curriculum']);
            cmsRenderPageBreadcrumbs(null, ['fallback_title' => 'Our Curriculum', 'trail' => $breadcrumbTrail]);
            echo '<div class="mx-auto max-w-[1280px] px-3 sm:px-5 mt-10 mb-10 text-gray-600">';
            echo '<p>Curriculum content is being updated. Please check back shortly.</p>';
            echo '</div>';
        }
        ?>
    </div>

    <?php $pageData = null; include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

</body>

</html>
