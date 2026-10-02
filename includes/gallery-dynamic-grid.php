<?php
/**
 * Year toolbar + empty grid + pagination shell.
 * Set $galleryGridConfig before including. Call gallery-grid-init.php after footer.
 */
if (empty($galleryGridConfig) || !is_array($galleryGridConfig)) {
    return;
}
$cfg = $galleryGridConfig;
$prevBtnId = $cfg['prevBtnId'] ?? 'galleryPrevBtn';
$nextBtnId = $cfg['nextBtnId'] ?? 'galleryNextBtn';
$pageNumbersId = $cfg['pageNumbersId'] ?? 'galleryPageNumbers';
$paginationId = $cfg['paginationId'] ?? 'galleryPagination';
$noResultsText = $cfg['searchEmptyMessage'] ?? 'No matching items found.';
$galleryToolbarPlaceholder = $cfg['searchPlaceholder'] ?? 'Search by title...';
$wrapperClass = $cfg['wrapperClass'] ?? 'mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3';
?>
<div class="<?= htmlspecialchars($wrapperClass, ENT_QUOTES, 'UTF-8') ?>">
    <div class="tabs sm:mt-10">
        <div class="flex items-center gap-2 sm:justify-between">
            <?php include __DIR__ . '/gallery-year-toolbar.php'; ?>
        </div>
        <section id="section1" class="tab-panel mt-5" role="tabpanel">
            <div id="galleryGrids" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-3 2xl:grid-cols-3 gap-4"></div>
            <div id="<?= htmlspecialchars($paginationId, ENT_QUOTES, 'UTF-8') ?>" class="flex justify-center items-center gap-2 mt-8">
                <button type="button" id="<?= htmlspecialchars($prevBtnId, ENT_QUOTES, 'UTF-8') ?>" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">Previous</button>
                <div id="<?= htmlspecialchars($pageNumbersId, ENT_QUOTES, 'UTF-8') ?>" class="flex gap-1"></div>
                <button type="button" id="<?= htmlspecialchars($nextBtnId, ENT_QUOTES, 'UTF-8') ?>" class="px-3 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300 disabled:opacity-50 disabled:cursor-not-allowed">Next</button>
            </div>
            <p id="noResults" class="hidden text-center text-gray-500 mt-4 text-sm sm:text-base"><?= htmlspecialchars($noResultsText, ENT_QUOTES, 'UTF-8') ?></p>
        </section>
    </div>
</div>
