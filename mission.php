<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title><?= $mv_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $mv_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $mv_data['data']['meta_keywords'] ?? "" ?>">

    <script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "Home Page",
    "item": "https://dpsgnext.com/"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "About Us",
    "item": "https://dpsgnext.com/mission"
  }]
}
</script>

</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <!-- Start Brudcrumb -->
        <div class="bg-center flex items-center text-center h-[300px] brud-image">
            <div>
                <h2 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    <?= strip_tags($mv_data['data']['sections'][0]['content_heading']) ?? "" ?>
                </h2>
            </div>

            <div class="md:w-[100%]">
                <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    <?= strip_tags($mv_data['data']['sections'][0]['content_heading']) ?? "" ?>
                </h2>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse ol-overflow">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-blue-main">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">About Us
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="mission" class="ms-1 text-sm font-medium text-blue-main"><?= strip_tags($mv_data['data']['sections'][0]['content_heading']) ?? "" ?></a>
                    </div>
                </li>
            </ol>
        </div>
        <!-- End -->

        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 sm:py-10 py-0 sm:p-20 p-0">
            <div>
                <?= $mv_data['data']['sections'][1]['content'] ?? "" ?>
            </div>
        </div>

        <div class="mt-[-80px] 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3 sm:mt-3 bg-center sm:mb-10 mb-0 sm:px-20 p-0 relative">
            <div class="sm:flex gap-10 items-center">
                <div class="mx-3 pb-0 sm:pt-0 pt-[100px] sm:w-[50%]">
                    <div class="sm:text-left text-center">
                        <?= $mv_data['data']['sections'][2]['columns'][0]['content'] ?? "" ?>
                    </div>
                </div>
                <div class="sm:w-[50%]">
                    <img src="<?= $mv_data['data']['sections'][2]['columns'][1]['image_path'] ?? "" ?>" alt="<?= cms_image_alt($mv_data['data']['sections'][2]['columns'][1] ?? [], $mv_data['data']['sections'][2]['columns'][1]['title'] ?? '') ?>">
                </div>
            </div>
        </div>

        <div class="mt-[-80px] 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3 sm:mt-0 bg-center sm:mb-10 mb-0 sm:px-20 p-0 relative">
            <div class="flex flex-col-reverse sm:flex-row items-center gap-10">
                <!-- Image section -->
                <div class="sm:w-[50%]">
                    <img src="<?= $mv_data['data']['sections'][3]['columns'][0]['image_path'] ?? '' ?>"
                        alt="<?= cms_image_alt($mv_data['data']['sections'][3]['columns'][0] ?? [], $mv_data['data']['sections'][3]['columns'][1]['title'] ?? '') ?>">
                </div>

                <!-- Content section -->
                <div class="mx-3 pb-0 sm:pt-0 pt-[100px] sm:w-[50%]">
                    <div class="sm:text-left text-center">
                        <?= $mv_data['data']['sections'][3]['columns'][1]['content'] ?? '' ?>
                    </div>
                </div>
            </div>
        </div>


        <div
            class=" 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4 sm:mt-0 bg-center sm:mb-10 mb-0 sm:px-20 p-0 relative mb-10">

            <div class="sm:flex items-center gap-10">
                <div class="pb-0 sm:pt-0 pt-[100px] sm:w-[50%]">
                    <div class="sm:text-left text-center">
                        <?= $mv_data['data']['sections'][4]['columns'][0]['content'] ?? "" ?>
                    </div>
                </div>
                <div class="sm:w-[50%] sm:mt-0 mt-5">
                    <!-- <img src="https://dummyimage.com/292x196/e6e6ed/000000&text=Not+Provided" alt=""> -->
                    <img src="<?= $mv_data['data']['sections'][4]['columns'][1]['image_path'] ?? "" ?>" class="w-[100%] mx-auto" alt="<?= cms_image_alt($mv_data['data']['sections'][4]['columns'][1] ?? [], $mv_data['data']['sections'][4]['columns'][1]['title'] ?? $mv_data['data']['sections'][3]['columns'][1]['title'] ?? '') ?>">
                </div>
            </div>
        </div>


    </div>

    <?php include "includes/footer.php" ?>
    </div>
    <?php include "includes/foot.php" ?>

</body>

</html>