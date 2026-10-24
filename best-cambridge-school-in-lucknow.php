<?php
include "includes/apis.php";

// CMS page data: /pages/best-cambridge-school-in-lucknow
$bcslFetch = api_fetch_cached(['best_cambridge_page' => '/pages/best-cambridge-school-in-lucknow']);
$bcsl_page = is_array($bcslFetch['best_cambridge_page'] ?? null) ? $bcslFetch['best_cambridge_page'] : null;
$bcslSections = is_array($bcsl_page['data']['sections'] ?? null) ? $bcsl_page['data']['sections'] : [];
$bcslHeading = trim(strip_tags((string) ($bcslSections[0]['content_heading'] ?? '')));
if ($bcslHeading === '') {
    $bcslHeading = 'Cambridge Curriculum';
}
$bcslContent = '';
foreach ($bcslSections as $bcslSection) {
    if (isset($bcslSection['is_active']) && !$bcslSection['is_active']) {
        continue;
    }
    $bcslContent .= (string) ($bcslSection['content'] ?? '');
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
        <div class="bg-center flex items-center text-center h-[300px] brud-image"
            >
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    <?= htmlspecialchars($bcslHeading) ?>
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    <?= htmlspecialchars($bcslHeading) ?>
                </h1>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="index.php" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">
                        Home
                    </a>
                </li>
             
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <a href="cambridge.php" class="ms-1 sm:text-sm text-xs font-medium text-blue-main"><?= htmlspecialchars($bcslHeading) ?></a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <div class="sm:mt-10 relative">

                <div>
                    <div class="md:w-[100%]">
                        <?= $bcslContent ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

</body>

</html>
