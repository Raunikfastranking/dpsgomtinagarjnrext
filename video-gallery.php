<?php
include "includes/apis.php";

$all_videos = [];
$processed_ids = [];

if (!empty($video_gallery_data['data']['sections'])) {
    foreach ($video_gallery_data['data']['sections'] as $section) {
        if (!isset($section['section_type']) || $section['section_type'] !== 'video') {
            continue;
        }
        if (!isset($section['resolved_content'])) {
            continue;
        }

        $rc = $section['resolved_content'];
        $item_id = $rc['id'] ?? null;

        if ($item_id && in_array($item_id, $processed_ids)) {
            continue;
        }
        if ($item_id) {
            $processed_ids[] = $item_id;
        }

        $rawDate = null;
        foreach (['date', 'created_at'] as $key) {
            $value = $rc[$key] ?? null;
            if (!empty($value) && $value !== '0000-00-00' && $value !== '0000-00-00 00:00:00') {
                $ts = strtotime($value);
                if ($ts !== false) {
                    $rawDate = $value;
                    break;
                }
            }
        }

        $timestamp = $rawDate ? strtotime($rawDate) : 0;
        $title = $rc['title'] ?? 'Untitled Video';
        $media_items = $rc['media'] ?? [];

        if (!is_array($media_items)) {
            continue;
        }

        foreach ($media_items as $media) {
            $url = $media['media_url'] ?? $media['page_link'] ?? '';
            if (empty($url)) {
                continue;
            }

            if (preg_match(
                '/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/|youtube\.com\/shorts\/)([^&\?\/]+)/i',
                $url,
                $matches
            )) {
                $videoId = $matches[1];
                $embedUrl = 'https://www.youtube.com/embed/' . $videoId;

                $all_videos[] = [
                    'timestamp' => $timestamp,
                    'embedUrl'  => $embedUrl,
                    'title'     => $title,
                    'rawDate'   => $rawDate,
                    'item_id'   => $item_id
                ];
            }
        }
    }

    usort($all_videos, function ($a, $b) {
        return $b['timestamp'] <=> $a['timestamp'];
    });
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($video_gallery_data['data']['title'] ?? "Video Gallery") ?></title>
    <meta name="description" content="<?= htmlspecialchars($video_gallery_data['data']['meta_description'] ?? "") ?>">
    <meta name="keywords" content="<?= htmlspecialchars($video_gallery_data['data']['meta_keywords'] ?? "") ?>">
    <?php include "includes/head.php" ?>

    <style>
        .video-section,
        section[data-section-type="video"],
        .section-video,
        .cms-video-block,
        .page-builder-video,
        iframe[src*="youtube.com"]:not(.rounded-t-lg) {
            display: none !important;
        }
    </style>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative mb-[120px]">
        <div class="bg-center flex items-center text-center h-[300px] brud-image">
            <div>
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    Video Gallery
                </h1>
            </div>
            <div class="md:w-[100%]">
                <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Video Gallery
                </h2>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <p class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Gallery</p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <a href="video-gallery.php" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">Video Gallery</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <div class="mt-10 relative">
                <div class="tabs sm:mt-10">
                    <div class="flex items-center gap-2 sm:justify-between">
                        <?php include __DIR__ . '/includes/gallery-year-toolbar.php'; ?>
                    </div>

                    <section id="section1" class="tab-panel mt-5" role="tabpanel">
                        <div id="galleryGrids"
                             class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-3 gap-4">

                            <?php
                            if (!empty($all_videos)) {
                                foreach ($all_videos as $video) {
                                    $day   = $video['rawDate'] ? date("d", strtotime($video['rawDate'])) : '';
                                    $month = $video['rawDate'] ? date("M", strtotime($video['rawDate'])) : '';
                                    $year  = $video['rawDate'] ? date("Y", strtotime($video['rawDate'])) : '—';
                                    ?>
                                    <div class="video-card w-[100%] mx-auto bg-white border border-gray-200 rounded-lg shadow hover:shadow-[rgba(0,0,0,0.15)_0px_15px_25px,rgba(0,0,0,0.05)_0px_5px_10px] transition-shadow duration-300"
                                         data-year="<?= htmlspecialchars($year) ?>"
                                         data-title="<?= htmlspecialchars($video['title']) ?>">

                                        <iframe class="w-full rounded-t-lg aspect-video" height="240"
                                                src="<?= htmlspecialchars($video['embedUrl']) ?>"
                                                title="<?= htmlspecialchars($video['title']) ?>"
                                                frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen loading="lazy">
                                        </iframe>

                                        <div class="relative flex flex-col justify-between p-1 sm:p-4">
                                            <div class="flex gap-4">
                                                <div class="w-[30%]">
                                                    <div class="bg-blue-main text-white text-center rounded-t-lg p-1 font-[700] text-[18px]">
                                                        <?= htmlspecialchars($year) ?>
                                                    </div>
                                                    <div class="text-center font-[700] text-[24px] text-[#D9A414] rounded-b-lg border border-gray-300">
                                                        <?= htmlspecialchars($day) ?><br>
                                                        <span class="text-[#223B71] text-[14px]"><?= htmlspecialchars($month) ?></span>
                                                    </div>
                                                </div>
                                                <div class="w-[70%]">
                                                    <div class="text-blue-main text-[1rem] font-[700] m-2 line-clamp-2">
                                                        <?= htmlspecialchars($video['title']) ?>
                                                    </div>
                                                    <hr>
                                                    <div class="flex gap-2 text-[9px] text-[#3B3B3B] m-2">
                                                        <div>Category: <strong>Video</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo '<p class="col-span-full text-center text-gray-500 py-10 text-lg">No videos available at this time.</p>';
                            }
                            ?>
                        </div>

                        <div id="videoPagination" class="flex justify-center items-center gap-2 mt-8">
                            <button id="videoPrevBtn" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                                Previous
                            </button>
                            <div id="videoPageNumbers" class="flex gap-1">
                            </div>
                            <button id="videoNextBtn" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">
                                Next
                            </button>
                        </div>

                        <p id="noResults" class="hidden text-center text-gray-500 mt-4 text-sm sm:text-base">
                            No matching videos found.
                        </p>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const itemsPerPage = 6;
            let currentPage = 1;
            const videoCards = Array.from(document.querySelectorAll('.video-card'));
            const yearSelect = document.getElementById('galleryYearSelect');
            const searchInput = document.getElementById('searchInput');
            const noResults = document.getElementById('noResults');
            const paginationEl = document.getElementById('videoPagination');
            const prevBtn = document.getElementById('videoPrevBtn');
            const nextBtn = document.getElementById('videoNextBtn');
            const pageNumbersEl = document.getElementById('videoPageNumbers');

            function getActiveList() {
                const y = yearSelect && yearSelect.value ? yearSelect.value : 'all';
                const q = (searchInput && searchInput.value) ? searchInput.value.toLowerCase().trim() : '';
                return videoCards.filter(function (card) {
                    const cy = card.getAttribute('data-year') || '';
                    if (y && y !== 'all' && y !== '' && cy && cy !== '—' && cy !== y) return false;
                    const t = (card.getAttribute('data-title') || '').toLowerCase();
                    if (q && !t.includes(q)) return false;
                    return true;
                });
            }

            function updatePaginationUI(totalPages) {
                if (!prevBtn || !nextBtn || !pageNumbersEl) return;
                prevBtn.disabled = currentPage <= 1;
                nextBtn.disabled = currentPage >= totalPages || totalPages <= 1;
                pageNumbersEl.innerHTML = '';
                for (var i = 1; i <= totalPages; i++) {
                    (function (p) {
                        var pageBtn = document.createElement('button');
                        pageBtn.className = 'px-3 py-2 ' + (p === currentPage ? 'bg-blue-main text-white' : 'bg-gray-200 text-gray-700') + ' rounded hover:bg-gray-300';
                        pageBtn.textContent = String(p);
                        pageBtn.addEventListener('click', function () {
                            currentPage = p;
                            render();
                        });
                        pageNumbersEl.appendChild(pageBtn);
                    })(i);
                }
            }

            function render() {
                var active = getActiveList();
                var n = active.length;
                videoCards.forEach(function (c) { c.style.display = 'none'; });

                if (n === 0) {
                    if (paginationEl) paginationEl.style.display = 'none';
                    if (noResults) noResults.classList.remove('hidden');
                    return;
                }

                if (noResults) noResults.classList.add('hidden');
                if (paginationEl) paginationEl.style.display = 'flex';

                var totalPages = Math.ceil(n / itemsPerPage) || 1;
                if (currentPage > totalPages) currentPage = totalPages;
                var start = (currentPage - 1) * itemsPerPage;
                var slice = active.slice(start, start + itemsPerPage);
                slice.forEach(function (c) { c.style.display = ''; });

                updatePaginationUI(totalPages);
            }

            function onFilterChange() {
                currentPage = 1;
                render();
            }

            if (yearSelect) yearSelect.addEventListener('change', onFilterChange);
            if (searchInput) searchInput.addEventListener('input', onFilterChange);

            if (prevBtn) {
                prevBtn.addEventListener('click', function () {
                    if (currentPage > 1) {
                        currentPage--;
                        render();
                    }
                });
            }
            if (nextBtn) {
                nextBtn.addEventListener('click', function () {
                    var active = getActiveList();
                    var totalPages = Math.ceil(active.length / itemsPerPage) || 1;
                    if (currentPage < totalPages) {
                        currentPage++;
                        render();
                    }
                });
            }

            if (videoCards.length === 0) {
                if (paginationEl) paginationEl.style.display = 'none';
            } else {
                render();
            }
        });
    </script>
</body>
</html>
