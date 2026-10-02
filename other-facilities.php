<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title><?= $other_info_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $other_info_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $other_info_data['data']['meta_keywords'] ?? "" ?>">
</head>


<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-center flex items-center text-center h-[300px] brud-image">
            <div>
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    Other Facilities
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Other Facilities
                </h1>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="index.php" class="inline-flex items-center text-sm font-medium text-blue-main">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">Academics
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="other-facilities.php" class="ms-1 text-sm font-medium text-blue-main">Other Facilities</a>
                    </div>
                </li>
            </ol>
        </div>


        <div
            class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 sm:py-10 py-0 sm:p-20 p-0">
            <div class="sm:flex gap-10  mt-16">
                <div class="sm:w-[50%] sm:block hidden">
                    <img src="<?= $other_info_data['data']['sections'][1]['columns'][0]['image_url'] ?? "" ?>" alt="<?= cms_image_alt($other_info_data['data']['sections'][1]['columns'][0] ?? [], 'Other Facilities') ?>">
                </div>
                <div class="mx-3 pb-0 sm:pt-0 pt-[100px] sm:w-[50%]">
                    <div>
                        <h1 class="text-[16px] font-[700] text-gray-500 leading-8 relative"><span
                                class="text-[32px] font-[700] text-blue-main hr-line">Other Facilities </span></h1>
                    </div>
                    <div>
                        <?= $other_info_data['data']['sections'][1]['columns'][1]['content'] ?? "" ?>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <?php include "includes/footer.php" ?>
    </div>
    <?php include "includes/foot.php" ?>
   
</body>

</html>