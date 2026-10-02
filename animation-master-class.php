<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title><?= $animation_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $animation_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $animation_data['data']['meta_keywords'] ?? "" ?>">
</head>


<body>

    <?php include "includes/header.php" ?>

    <div class="main relative  mb-[40px] sm:mb-[120px]">
        <div class="bg-center flex items-center text-center h-[300px] brud-image">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                   <?= strip_tags($animation_data['data']['sections'][0]['content_heading']) ?? "" ?>
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                   <?= strip_tags($animation_data['data']['sections'][0]['content_heading']) ?? "" ?>
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
                        <a href="animation" class="ms-1 text-sm font-medium text-blue-main"><?= strip_tags($animation_data['data']['sections'][0]['content_heading']) ?? "" ?></a>
                    </div>
                </li>
            </ol>
        </div>
        <div
            class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3 text-gray-600">
            <div class="sm:mt-10 relative">
             

                <div class="flex items-center gap-10">
                    <div class="sm:w-[50%] sm:block hidden">
                        <img src="<?= $animation_data['data']['sections'][1]['columns'][0]['image_path'] ?? "" ?>" alt="<?= cms_image_alt($animation_data['data']['sections'][1]['columns'][0] ?? [], $animation_data['data']['sections'][1]['columns'][1]['title'] ?? '') ?>">
                    </div>
                    <div class="mx-3 pb-0 sm:pt-0 pt-[100px] sm:w-[50%]">
                        <div class="sm:text-left text-center">
                            <!-- <h2 class="text-[30px] font-[700] text-blue-main hr-line inline relative">Mission</h2>
                        <p class="text-[16px] text-gray-500 mt-1">Our mission is to revolutionize education by providing
                            an immersive, personalized and holistic learning experience to every child, cultivating
                            intellectual agility, emotional intelligence and the mindset needed to thrive in a rapidly
                            evolving global landscape.</p> -->
                            <?= $animation_data['data']['sections'][1]['columns'][1]['content'] ?? "" ?>
                        </div>
                    </div>
                </div>
            </div>
         <?= $animation_data['data']['sections'][2]['content'] ?? "" ?>
            <!-- <div class="mt-10">
                <p>consoles (PlayStation/Xbox). The program at Animation
                    Masterclass is packed with interesting assignments, live projects & competitions which
                    makes learning fun & exciting. Students will work on the latest software & state of the
                    art machines.</p>
                <div class="mt-4">
                    <h3 class="text-[22px] font-[600] text-gray-700">Why Animation for Children
                    </h3>
                    <p class="  font-[400]">
                        This course provides an exciting opportunity for students to develop their aesthetic,
                        imaginative & expressive abilities through a combination of Art and Animation.
                    </p>
                </div>
                <div class="mt-4">
                    <h3 class="text-[22px] font-[600] text-gray-700">Developing Creative skills in the students
                    </h3>
                    <p class="  font-[400]">
                        In today’s era of Globalization and the Web, creative thinking and problem-solving are important
                        attributes for success. Animation training provides the necessary direction, facilities and
                        experience to develop creativity and thereby help each individual discover his/her own identity
                        and potential. A child develops an understanding of the multi-disciplinary nature of design and
                        the relationship of design with environment, culture, human senses and emotions.
                    </p>
                </div>
                <div class="mt-4">
                    <h3 class="text-[22px] font-[600] text-gray-700">Special Highlights
                    </h3>
                    <ul class="mt-3 sm:ml-5" style="list-style: disc;">
                        <li>Concept Development & Visualizations</li>
                        <li>Graphics Design & Image Editing </li>
                        <li>3D Architecture & Design </li>
                        <li>Visual Effects </li>
                        <li>Visual & Sound Editing</li>
                    </ul>
                </div>
                <div class="mt-4">
                    <h2 class="text-[22px] font-[600] text-gray-700 ">Our Programs</h2>
                    <h3 class="text-[22px] font-[600] text-gray-700">Primary Level Programs (Class – 3rd& 4th) </h3>
                    <ul class="mt-3 sm:ml-5" style="list-style: disc;">
                        <li>An introduction world of graphics where our kids learn
                            with fun and develop their creative skills.</li>
                        <li>Teaching children how they can create more effective
                            thoughts in digital space. </li>
                        <li>Exploring their talents and getting familiar with the
                            advanced yet creative technology at a young age.</li>
                        <li>Understanding the basic concept of digital drawing,
                            editing and photo manipulations.</li>
                    </ul>
                </div>
                <div class="mt-4">
                    <h3 class="text-[22px] font-[600] text-gray-700">Middle Level Programs (Class – 5th&6th)</h3>
                    <ul class="mt-3 sm:ml-5" style="list-style: disc;">
                        <li>Developing advanced skills in graphics and Image Editing
                            software. </li>
                        <li>Creating banners, posters, logos and graphics-related
                            projects. </li>
                        <li>Learning image editing, colour & image correction,
                            Layouts, and script-based designing.</li>
                        <li>Creating interesting effects of Images and photos.</li>
                    </ul>
                </div>
                <div class="mt-4">
                    <h3 class="text-[22px] font-[600] text-gray-700">Advanced Level Programs (Class – 7th&8th)</h3>
                    <ul class="mt-3 sm:ml-5" style="list-style: disc;">
                        <li>Developing an understanding of 3D concepts.</li>
                        <li>Creating innovative casting for events & movies.</li>
                        <li>Creating special visual effects for films.</li>
                        <li>Sound and video editing for films and events.</li>
                    </ul>
                </div>
                <div class="mt-4">
                    <h3 class="text-[22px] font-[600] text-gray-600">Our course structure is meticulously designed to
                        cater to different age groups:</h3>
                    <ul class="mt-3 ">
                        <li><span class="text-gray-600 font-[700]">Classes III:</span>
                            Students learn design basics using shapes and tools to create caricatures and simple logos,
                            laying a strong foundation in visual creativity.
                        </li>
                        <li><span class="text-gray-600 font-[700]">Class IV:</span> The
                            focus shifts to colour theory, colour concepts, paint and design using brush and selection
                            tools. Students create sketches, cartoonish effects and basic digital paintings, which
                            enhances their artistic skills.
                        </li>
                        <li><span class="text-gray-600 font-[700]">Class V:</span>
                            Students engage in complex design projects, including banners, logos, brochures and cards,
                            using article writing and tracing methods to refine their creative abilities.
                        </li>
                        <li><span class="text-gray-600 font-[700]">Class VI:</span> The
                            curriculum includes colour correction, photo retouching for photo shoots and magazines,
                            creating VFX posters and using scripts and green screens, providing a comprehensive
                            understanding of photo and video editing.
                        </li>
                        <li><span class="text-gray-600 font-[700]">Class VII:
                            </span>Students delve into VFX, motion graphics, green screens and composition and gain
                            hands-on experience in advanced animation techniques.
                        </li>
                        <li><span class="text-gray-600 font-[700]">Class VIII:</span> The
                            focus is on designing in a 3D environment, with projects involving architectural interiors
                            and exterior designs, preparing students for sophisticated animation work.
                        </li>
                    </ul>
                </div>
            </div> -->
        </div>

    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

</body>

</html>