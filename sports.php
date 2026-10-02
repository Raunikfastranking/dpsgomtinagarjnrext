<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title><?= $sport_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $sport_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $other_info_data['data']['meta_keywords'] ?? "" ?>">
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative mb:[40px] sm:mb-[120px] ">

        <div class="bg-center flex items-center text-center h-[300px] brud-image">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    Sports
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Sports
                </h1>
            </div>
        </div>


        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-sm font-medium text-blue-main">
                        Home
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">Academics
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">Facilities
                        </p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="sports" class="ms-1 text-sm font-medium text-blue-main">Sports</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 ">
            <div class=" gap-10  mt-10">

                <div class="mx-3 pb-0">
                    <div>

                    </div>
                    <div>
                        <?= $sport_data['data']['sections'][1]['content'] ?? "" ?>
                        <!-- <h3 class="text-[20px] font-[700] text-gray-600 mt-2">Karate</h3>
                        <p class="text-[16px] text-gray-600">We are seeing the rising trend of self-defense especially
                            for the women. The school is giving training in karate to help students gain self-defense.
                        </p>
                        <h3 class="text-[20px] font-[700] text-gray-600 mt-2">Volleyball Skating</h3>
                        <p class="text-[16px] text-gray-600">It has caught the imagination of the young students who
                            with excellent timing and zeal are being trained in it, to play various levels of
                            competitions both in local as well as nationals.</p>
                        <p class="text-[16px] text-gray-600">Grace and execution of style keeping with student
                            enthusiasts and experts on skates is part of school curriculum.</p>
                        <h3 class="text-[20px] font-[700] text-gray-600 mt-2">Basketball</h3>
                        <p class="text-[16px] text-gray-600">The provision of a proper international level basketball
                            court is part of the school to train students to excel & win accolades under trained
                            coaches.</p>
                        <h3 class="text-[20px] font-[700] text-gray-600 mt-2">Badminton And Table Tennis<h3>
                                <p class="text-[16px] text-gray-600">The game with racquet & shuttle cock make the game
                                    strenuous and pitted with stamina with sharp timing and judgment. The school has the
                                    latest courts as per the International Standards with expert guides.</p>
                                <p class="text-[16px] text-gray-600">The spin of the ball & wielding of the swift and
                                    accurate racquet makes the game a delight to watch, and the students have shown
                                    their proficiency at various levels by winning laurels. </p> -->
                    </div>
                </div>

            </div>
        </div>

    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>



</body>

</html>