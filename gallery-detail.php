<?php
include "includes/apis.php";

$gallery = null;
$id = $_GET['id'] ?? null;

if ($id !== null) {
    // Try photo_gallery_data first
    if (!empty($photo_gallery_data['data']) && is_array($photo_gallery_data['data'])) {
        foreach ($photo_gallery_data['data'] as $item) {
            if ((string)$item['id'] === (string)$id) {
                $gallery = $item;
                break;
            }
        }
    }

    // Then achievement_data as fallback
    if ($gallery === null && !empty($achievement_data['data']) && is_array($achievement_data['data'])) {
        foreach ($achievement_data['data'] as $item) {
            if ((string)$item['id'] === (string)$id) {
                $gallery = $item;
                break;
            }
        }
    }
}

// Fallback values
$page_title    = $gallery['heading'] ?? $gallery['title'] ?? $gallery['data']['title'] ?? 'Gallery';
$description   = $gallery['content'] ?? $gallery['description'] ?? $gallery['data']['content'] ?? 'No description available.';
$meta_desc     = $gallery['meta_description'] ?? $gallery['data']['meta_description'] ?? '';
$meta_keywords = $gallery['meta_keywords'] ?? $gallery['data']['meta_keywords'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($page_title) ?></title>
    <meta name="description" content="<?= htmlspecialchars($meta_desc) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($meta_keywords) ?>">
    <?php include "includes/head.php"; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <style>
        .pdf-preview {
            height: 250px;
            background: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 0.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: all 0.25s ease;
        }
        .pdf-preview:hover {
            background: #e9ecef;
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
            transform: translateY(-3px);
        }
        .pdf-icon {
            width: 80px;
            height: 100px;
            background: #dc3545;
            color: white;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.4rem;
            margin-bottom: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.25);
        }
        .pdf-label {
            font-size: 0.95rem;
            color: #4b5563;
            text-align: center;
            padding: 0 12px;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <?php include "includes/header.php"; ?>

    <div class="main relative mb-[120px]">

        <!-- Banner -->
        <div class="bg-center flex items-center h-[300px] brud-image">
            <div class="w-full px-4 sm:px-8">
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left hr-line relative leading-9">
                    <?= htmlspecialchars($page_title) ?>
                </h1>
                <h2 class="hidden sm:block sm:text-[32px] font-[700] text-white text-left hr-line relative leading-9 ml-[7rem]">
                    <?= htmlspecialchars($page_title) ?>
                </h2>
            </div>
        </div>

        <!-- Breadcrumb -->
        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="index.php" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-xs sm:text-sm font-medium text-blue-main">Media & Events</span>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="photo-gallery.php" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">
                            Photo Gallery
                        </a>
                    </div>
                </li>
            </ol>
        </div>

        <!-- Content -->
        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3 mx-3 mt-8">
            <?php if ($gallery === null): ?>
                <div class="text-center py-20">
                    <h2 class="text-3xl font-bold text-gray-700 mb-4">Gallery Not Found</h2>
                    <p class="text-gray-500 mb-8 max-w-xl mx-auto">
                        The requested gallery could not be found or may have been removed.
                    </p>
                    <a href="photo-gallery.php" class="inline-block px-8 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">
                        Back to Photo Galleries
                    </a>
                </div>
            <?php else: ?>

                <!-- Description -->
                <div class="text-center mb-12">
                    <h2 class="text-[24px] font-[600] mb-4">Description</h2>
                    <p class="text-gray-600 max-w-4xl mx-auto leading-relaxed">
                        <?= nl2br(htmlspecialchars($description)) ?>
                    </p>
                </div>

                <!-- Media Grid -->
                <?php if (!empty($gallery['media']) && is_array($gallery['media'])): ?>
                    <div id="photoGallerys" class="grid gap-4 grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                        <?php foreach ($gallery['media'] as $media): 
                            $url = $media['media_url'] ?? '';
                            if (empty($url)) continue;

                            $ext = strtolower(pathinfo($url, PATHINFO_EXTENSION));
                            $is_pdf = $ext === 'pdf';
                        ?>
                            <div class="media-item group">
                                <?php if ($is_pdf): ?>
                                    <a href="<?= htmlspecialchars($url) ?>" target="_blank" rel="noopener" class="block no-fancybox">
                                        <div class="pdf-preview">
                                            <div class="pdf-icon">PDF</div>
                                            <div class="pdf-label">View PDF Document</div>
                                        </div>
                                    </a>
                                <?php else: ?>
                                    <a href="<?= htmlspecialchars($url) ?>" 
                                       data-fancybox="gallery" 
                                       data-caption="<?= htmlspecialchars($page_title) ?>">
                                        <img src="<?= htmlspecialchars($url) ?>" 
                                             alt="<?= cms_image_alt($media, $page_title ?? 'Gallery media') ?>" 
                                             loading="lazy"
                                             class="rounded-lg shadow-md w-full h-[250px] object-cover transition-transform duration-300 group-hover:scale-[1.03]">
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <div class="text-center py-16 text-gray-600 text-lg bg-gray-50 rounded-xl border border-gray-200">
                        No media files available in this gallery.
                    </div>
                <?php endif; ?>

            <?php endif; ?>
        </div>

    </div>

    <?php include "includes/footer.php"; ?>
    <?php include "includes/foot.php"; ?>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script>
        // Bind fancybox only to images
        Fancybox.bind('[data-fancybox="gallery"]', {
            Thumbs: { showOnStart: false },
            Images: { initialSize: "fit" }
        });

        // Optional: global config for other fancybox usages
        Fancybox.bind("[data-fancybox]", {
            loop: false,
            protect: true
        });
    </script>

</body>
</html>