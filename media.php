<?php include "includes/apis.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($photo_gallery_data['title'] ?? "Media Gallery") ?></title>
    <meta name="description" content="<?= htmlspecialchars($photo_gallery_data['meta_description'] ?? "") ?>">
    <meta name="keywords" content="<?= htmlspecialchars($photo_gallery_data['meta_keywords'] ?? "") ?>">
    <?php include "includes/head.php" ?>
</head>

<body>
<?php include "includes/header.php" ?>

<div class="main relative mb-[120px]">
    <div class="bg-center flex items-center text-center h-[300px] brud-image">
        <div class="w-full">
            <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 hr-line relative leading-9">
                Media Gallery
            </h1>
            <h2 class="sm:text-[32px] hidden sm:block font-[700] text-white text-left ml-[7rem] hr-line relative leading-9">
                Media Gallery
            </h2>
        </div>
    </div>

    <!-- Breadcrumb -->
    <div class="flex m-5" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="/" class="sm:text-sm text-xs font-medium text-blue-main">Home</a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <p class="ms-1 text-xs sm:text-sm font-medium text-blue-main">Gallery</p>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                    </svg>
                    <a href="media-gallery.php" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Media Gallery</a>
                </div>
            </li>
        </ol>
    </div>

    <?php
    $galleryGridConfig = [
        'galleryType' => 'gallery',
        'subType' => 'media',
        'prevBtnId' => 'mediaGalleryPrevBtn',
        'nextBtnId' => 'mediaGalleryNextBtn',
        'pageNumbersId' => 'mediaGalleryPageNumbers',
        'paginationId' => 'mediaGalleryPagination',
        'emptyMessage' => 'No media galleries for this year.',
        'searchEmptyMessage' => 'No matching media items found.',
        'pdfLabel' => 'Media Gallery Document',
        'mediaCountLabel' => 'Total Items',
    ];
    include __DIR__ . '/includes/gallery-dynamic-grid.php';
    ?>

</div>

<?php include "includes/footer.php" ?>
<?php include "includes/foot.php" ?>

<?php include __DIR__ . '/includes/gallery-grid-init.php'; ?>

</body>
</html>