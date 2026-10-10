<?php

$chairmans_data = null;
$activities_data = null;
$pedagogy_data = null;
$facility_data = null;
$oc__data = null;
$m_data = null;
$art__data = null;
$mentalhealth_data = null;
$studentled_data = null;
$careerguidance_data = null;
$seniorjunior_data = null;
$group_transfer_data = null;
$view_tc_data = null;
$school_award_data = null;
$principal_award_data = null;
$dance_music_data = null;
$state_level_data = null;
$national_level_data = null;
$international_level_data = null;
$city_topper_data = null;
$aryabhat_ganit_data = null;
$inter_school_data = null;
$district_level_data = null;
$cbse_east_data = null;
$inter_roll_back = null;
$seven_sub_jr_data = null;

$page = "dyanmic-page";

// Include apis.php to get global gallery data (if not already included)
if (!defined('APIS_INCLUDED')) {
    include "includes/apis.php";
    define('APIS_INCLUDED', true);
}

require_once "layouts/layout-function.php"; 

$pageSlug = $_GET['page'] ?? 'home';
$pageSlug = preg_replace('/\.php$/i', '', $pageSlug);
$pageSlug = trim($pageSlug, '/');
$pageApiUrl = "https://dps.allenhouseschools.com/api/pages/$pageSlug";

// Fetch page data
require_once __DIR__ . '/proxy/config.php';

// Stale-while-revalidate: serve cached copy instantly, refresh expired
// entries in the background so visitors never wait on the CMS API.
$slugEndpoint = "/pages/$pageSlug";
api_cache_track($slugEndpoint, $slugEndpoint);
$slugCache = api_cache_get($slugEndpoint);
$slugFresh = $slugCache !== null && (time() - $slugCache['fetched_at'] < API_CACHE_TTL);

if ($slugFresh) {
    $pageData2 = $slugCache['data'];
} else {
    if ($slugCache !== null) {
        // Stale copy exists -> serve it now, refresh in background.
        $pageData2 = $slugCache['data'];
        api_trigger_background_refresh();
    } else {
        $pageCh = curl_init($pageApiUrl);
        curl_setopt_array($pageCh, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 15,
            CURLOPT_CONNECTTIMEOUT => 5,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_HTTPHEADER     => api_auth_headers(),
        ]);
        $pageResponse = curl_exec($pageCh);
        $pageHttpCode = curl_getinfo($pageCh, CURLINFO_HTTP_CODE);
        curl_close($pageCh);

        if ($pageResponse === false || empty($pageResponse) || $pageHttpCode !== 200) {
            header("HTTP/1.0 404 Not Found");
            include "404.php";
            exit;
        }

        $pageData2 = json_decode($pageResponse, true);
        api_cache_set($slugEndpoint, $pageData2);
    }
}

if (!isset($pageData2['data']) || empty($pageData2['data'])) {
    header("HTTP/1.0 404 Not Found");
    include "404.php";
    exit;
}

$heading = $pageData2['data']['sections'][0]['content_heading'] ?? '';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageData2['data']['title'] ?? 'Page') ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageData2['data']['meta_description'] ?? '') ?>">
    <meta name="keywords" content="<?= htmlspecialchars($pageData2['data']['meta_keywords'] ?? '') ?>">
    <?php include "includes/head.php" ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />

    <style>
        .pdf-preview-card {
            height: 200px;
            background: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            border-radius: 8px 8px 0 0;
        }
        .pdf-preview-card:hover {
            background: #e9ecef;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <?php include "includes/header.php"; ?>

    <main class="flex flex-col min-h-screen">
        <!-- Breadcrumb -->
        <div class="brud-image bg-top flex items-center text-center h-[300px]">
            <div>
                <h2 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                  <?= htmlspecialchars($pageData2['data']['title'] ?? '') ?>
                </h2>
            </div>
            <div class="md:w-[100%]">
                <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                   <?= htmlspecialchars($pageData2['data']['title'] ?? '') ?>
                </h2>
            </div>
        </div>

        <?php
        // Render dynamic sections
        if (function_exists('renderDynamicSections')) {
            renderDynamicSections($pageData2, $api_url);
        }

        // ============================================================
        // GALLERY SUBTYPE HANDLING – SHOW ALBUM CARDS
        // ============================================================
        
        // Expanded fallback mapping with more flexible matching
        $fallbackGalleryMap = [
            'newsletter' => 'newsletter',
            'annual-magazine' => 'annual_magazine',
            'photo-gallery' => 'photo_gallery',
            'print-media' => 'print_media',
            'media-events' => 'media_gallery',
        ];

        $gallerySubtype = null;
        $showGallery = false;

        // FIRST: Check if this page is associated with a gallery via page_id in gallery data
        // This is the most reliable method since your galleries have page_id field
        if (!empty($photo_gallery_data['data'])) {
            foreach ($photo_gallery_data['data'] as $gallery) {
                // Check if gallery's page_id matches current page's ID
                if (!empty($gallery['page_id']) && isset($pageData2['data']['id']) && 
                    $gallery['page_id'] == $pageData2['data']['id']) {
                    $showGallery = true;
                    if (!empty($gallery['gallery_sub_type']['sub_type_name'])) {
                        $gallerySubtype = $gallery['gallery_sub_type']['sub_type_name'];
                    }
                    break;
                }
            }
        }

        // SECOND: Check if page has sections with gallery type
        if (!$showGallery && !empty($pageData2['data']['sections'])) {
            foreach ($pageData2['data']['sections'] as $section) {
                if (isset($section['section_type']) && $section['section_type'] === 'gallery') {
                    $showGallery = true;
                    if (!empty($section['gallery_subtype'])) {
                        $gallerySubtype = $section['gallery_subtype'];
                    }
                    break;
                }
            }
        }

        // THIRD: Check page data directly for gallery_subtype
        if (!$showGallery && !empty($pageData2['data']['gallery_subtype'])) {
            $gallerySubtype = $pageData2['data']['gallery_subtype'];
            $showGallery = true;
        }
        
        // FOURTH: Use fallback mapping based on page slug (with flexible matching)
        if (!$showGallery) {
            // Try exact match first
            if (array_key_exists($pageSlug, $fallbackGalleryMap)) {
                $gallerySubtype = $fallbackGalleryMap[$pageSlug];
                $showGallery = true;
            } else {
                // Try partial match (e.g., "annual-magazine-1-" contains "annual-magazine")
                foreach ($fallbackGalleryMap as $key => $subtype) {
                    if (strpos($pageSlug, $key) !== false) {
                        $gallerySubtype = $subtype;
                        $showGallery = true;
                        break;
                    }
                }
            }
        }

        // If we should show gallery content
        if ($showGallery) {
            // Ensure $photo_gallery_data is available
            if (empty($photo_gallery_data) || empty($photo_gallery_data['data'])) {
                echo '<div class="container mx-auto px-4 py-8 text-red-500">Gallery data not available.</div>';
            } else {
                // Filter galleries - show ALL galleries that match ANY of these criteria:
                $filteredGalleries = array_filter($photo_gallery_data['data'], function($gallery) use ($gallerySubtype, $pageData2) {
                    $galleryType = strtolower($gallery['gallery_type'] ?? '');
                    
                    // Only include gallery type items
                    if ($galleryType !== 'gallery') {
                        return false;
                    }
                    
                    // CRITERIA 1: Match by page_id (most reliable)
                    if (!empty($gallery['page_id']) && isset($pageData2['data']['id']) && 
                        $gallery['page_id'] == $pageData2['data']['id']) {
                        return true;
                    }
                    
                    // CRITERIA 2: Match by subtype name
                    if ($gallerySubtype) {
                        $subType = $gallery['gallery_sub_type']['sub_type_name'] ?? '';
                        if (strcasecmp(trim($subType), trim($gallerySubtype)) === 0) {
                            return true;
                        }
                    }
                    
                    // CRITERIA 3: If no subtype specified, include all
                    if (!$gallerySubtype) {
                        return true;
                    }
                    
                    return false;
                });

                if (empty($filteredGalleries)) {
                    echo '<div class="container mx-auto px-4 py-8 text-gray-500">';
                    echo 'No galleries found';
                    if ($gallerySubtype) {
                        echo ' for "' . htmlspecialchars($gallerySubtype) . '"';
                    }
                    echo '.<br>';
                    echo '<small>Debug: Page ID = ' . ($pageData2['data']['id'] ?? 'N/A') . ', Slug = ' . htmlspecialchars($pageSlug) . '</small>';
                    echo '</div>';
                } else {
                    echo '<div class="container mx-auto px-4 py-8">';
                    
                    if (!empty($pageData2['data']['sections'][0]['content_heading'])) {
                        echo '<h2 class="text-2xl font-bold mb-6">' . htmlspecialchars($pageData2['data']['sections'][0]['content_heading']) . '</h2>';
                    }

                    echo '<div id="galleryGrids" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-3 gap-4">';

                    foreach ($filteredGalleries as $gallery) {
                        $mediaItems = $gallery['media'] ?? [];
                        $coverImage = null;
                        $isPdfGallery = false;

                        // Find cover image or check for PDFs
                        foreach ($mediaItems as $media) {
                            $url = $media['media_url'] ?? '';
                            if (empty($url)) continue;

                            $path = parse_url($url, PHP_URL_PATH);
                            $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));

                            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp', 'svg'])) {
                                $coverImage = $url;
                                break;
                            }
                            if ($ext === 'pdf') {
                                $isPdfGallery = true;
                            }
                        }

                        $rawDate = !empty($gallery['date']) ? $gallery['date'] : ($gallery['created_at'] ?? '');
                        $day   = $rawDate ? date("d", strtotime($rawDate)) : '';
                        $month = $rawDate ? date("M", strtotime($rawDate)) : '';
                        $year  = $rawDate ? date("Y", strtotime($rawDate)) : '';

                        $title = $gallery['heading'] ?? $gallery['gallery_title'] ?? 'Untitled';
                        $galleryId = $gallery['id'] ?? '';
                        $mediaCount = count($mediaItems);
                        $gallerySubtypeName = $gallery['gallery_sub_type']['sub_type_name'] ?? $gallerySubtype;
                        ?>
                        <div class="w-[100%] mx-auto bg-white border border-gray-200 rounded-lg shadow hover:shadow-[rgba(0,0,0,0.15)_0px_15px_25px,rgba(0,0,0,0.05)_0px_5px_10px] transition-shadow duration-300">
                            <a href="gallery-detail.php?id=<?= htmlspecialchars($galleryId) ?>" class="block">
                                <?php if ($isPdfGallery): ?>
                                    <div class="pdf-preview-card">
                                        <svg class="w-16 h-20 text-red-600 mb-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 14h-3v3h-2v-3H8v-2h3v-3h2v3h3v2z"/>
                                        </svg>
                                        <div class="text-sm font-medium text-gray-700">PDF Document</div>
                                        <div class="absolute top-2 right-2 bg-red-600 text-white text-xs font-bold px-2 py-1 rounded">PDF</div>
                                    </div>
                                <?php elseif ($coverImage): ?>
                                    <img class="rounded-t-lg w-full h-[200px] object-cover"
                                         src="<?= htmlspecialchars($coverImage) ?>"
                                         alt="<?= cms_image_alt($gallery, $title) ?>">
                                <?php else: ?>
                                    <div class="pdf-preview-card bg-gray-200">
                                        <svg class="w-16 h-20 text-gray-500 mb-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M4 6h16v2H4V6zm2-4h12v2H6V2zm16 8H2v12h20V10zm-2 10H4v-8h16v8z"/>
                                        </svg>
                                        <div class="text-sm font-medium text-gray-500">No Media</div>
                                    </div>
                                <?php endif; ?>
                            </a>

                            <div class="sm:p-4 p-1 flex flex-col justify-between relative">
                                <div class="flex gap-4">
                                    <div class="w-[30%]">
                                        <div class="bg-blue-main text-white text-center rounded-t-lg p-1 font-[700] text-[18px]">
                                            <?= htmlspecialchars($year) ?>
                                        </div>
                                        <div class="text-center font-[700] text-[24px] text-[#D9A414] rounded-b-lg border border-gray-300">
                                            <?= htmlspecialchars($day) ?><br>
                                            <span class="text-blue-main text-[14px]"><?= htmlspecialchars($month) ?></span>
                                        </div>
                                    </div>
                                    <div class="w-[70%]">
                                        <div class="text-blue-main text-[1rem] font-[700] m-2 line-clamp-2">
                                            <?= htmlspecialchars($title) ?>
                                        </div>
                                        <hr>
                                        <div class="flex gap-2 text-[9px] text-[#3B3B3B] m-2">
                                            <div>Category: <strong><?= htmlspecialchars($gallerySubtypeName) ?></strong></div>
                                            <div>Total Media: <strong><?= $mediaCount ?></strong></div>
                                        </div>
                                    </div>
                                </div>
                                <a href="gallery-detail.php?id=<?= htmlspecialchars($galleryId) ?>">
                                    <button class="group py-1 px-4 sm:px-6 rounded-[10px] w-full border border-gray text-blue-main hover:text-white hover:bg-[#003618] flex gap-2 items-center justify-center mt-5">
                                        View More
                                        <svg class="w-[14px] h-[10px] fill-[#223B71] group-hover:fill-white" width="8" height="9" viewBox="0 0 8 9" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.65008 0.911564C6.9831 0.911564 7.25307 1.18153 7.25307 1.51456L7.25307 6.63112C7.25307 6.96414 6.9831 7.23411 6.65008 7.23411C6.31705 7.23411 6.04708 6.96414 6.04708 6.63112L6.04708 2.97031L1.10714 7.91026C0.871652 8.14574 0.489858 8.14574 0.254375 7.91026C0.0188919 7.67477 0.018892 7.29298 0.254376 7.0575L5.19432 2.11755L1.53352 2.11755C1.20049 2.11755 0.930523 1.84758 0.930523 1.51456C0.930523 1.18153 1.20049 0.911564 1.53352 0.911564L6.65008 0.911564Z" />
                                        </svg>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                    echo '</div>';
                    echo '</div>';
                }
            }
        } else {
            // Optional: Show message when no gallery should be displayed
            echo '<div class="container mx-auto px-4 py-8 text-gray-400 text-center">';
            echo 'No gallery content configured for this page.';
            echo '</div>';
        }
        ?>

        <!-- Footer -->
        <?php include "includes/footer.php"; ?>
    </main>

    <!-- Scripts -->
    <?php include "includes/foot.php"; ?>
    
    <script>
    (function() {
        function initWhenReady() {
            if (typeof Fancybox !== 'undefined') {
                const galleryLinks = document.querySelectorAll('[data-fancybox], .gallery-item');
                if (galleryLinks.length > 0) {
                    Fancybox.bind(galleryLinks, {});
                }
            }
            
            if (typeof Glide !== 'undefined') {
                document.querySelectorAll('.glide').forEach(function(element) {
                    if (element && element.querySelector('.glide__track')) {
                        try {
                            new Glide(element, {
                                type: 'slider',
                                perView: 3,
                                breakpoints: { 768: { perView: 1 } }
                            }).mount();
                        } catch(e) {
                            console.warn('Glide slider skipped:', e.message);
                        }
                    }
                });
            }
        }
        
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initWhenReady);
        } else {
            initWhenReady();
        }
    })();
    </script>
</body>
</html>