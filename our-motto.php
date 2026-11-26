<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title>DPS Gomti Nagar Jnr. | Our Motto</title>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-center flex items-center text-center h-[300px] brud-image">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    Our Motto & Aspiration
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h1
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Our Motto & Aspiration
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
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">About Us
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
                        <a href="our-motto.php" class="ms-1 text-sm font-medium text-blue-main">Our Motto & Aspiration </a>
                    </div>
                </li>
            </ol>
        </div>

        <div
            class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px]  sm:mx-auto sm:px-5 mx-3 sm:py-10 py-0 sm:p-20 p-0">
            <div>
                <p class="text-[16px] text-gray-500 mt-4">
                    Children will be happy and secure, and their achievements will be celebrated and valued by all.
                </p>
            </div>
            <div class=" mt-4">
                <h1 class="text-[16px] font-[700] text-gray-500 leading-8 relative"><span
                        class="text-[22px] font-[700] text-blue-main hr-line uppercase">CREATIVITY</span></h1>
                <p class="text-[15px] text-gray-500">
                    A strong focus ensuring that school is fun! The school will be a bright, attractive and stimulating
                    place to harness creativity.
                </p>
            </div>
            <div class="mt-4">
                <h1 class="text-[16px] font-[700] text-gray-500 leading-8 relative"><span
                        class="text-[22px] font-[700] text-blue-main hr-line uppercase">CHALLENGE</span></h1>
                <p class="text-[15px] text-gray-500">
                    We aim to challenge learners through high expectations of learning and behavior to promote
                    excellence.
                </p>
            </div>
            <div class="mt-4">
                <h1 class="text-[16px] font-[700] text-gray-500 leading-8 relative"><span
                        class="text-[22px] font-[700] text-blue-main hr-line uppercase">COMMUNITY</span></h1>
                <p class="text-[15px] text-gray-500">
                    We value parents as our partners in education and will involve them, and the wider community in
                    school life.
                </p>
            </div>
            <div class="mt-4">
                <h1 class="text-[16px] font-[700] text-gray-500 leading-8 relative"><span
                        class="text-[22px] font-[700] text-blue-main hr-line uppercase">CONSISTENCY</span></h1>
                <p class="text-[15px] text-gray-500">
                    The school will grow and change but we will remain true to our aims and mission.
                </p>
            </div>
            <div class="mt-4">
                <h1 class="text-[16px] font-[700] text-gray-500 leading-8 relative"><span
                        class="text-[22px] font-[700] text-blue-main hr-line uppercase">CONTRIBUTION </span></h1>
                <p class="text-[15px] text-gray-500">
                    All members of the school community will be valued and recognized for their outstanding works.
                </p>
            </div>
            <div class="mt-4">
                <h1 class="text-[16px] font-[700] text-gray-500 leading-8 relative"><span
                        class="text-[22px] font-[700] text-blue-main hr-line uppercase">COMMUNICATION </span></h1>
                <p class="text-[15px] text-gray-500">
                    We realize the importance of effective communication. Everyone must have equal opportunities for
                    consultation and information.
                </p>
            </div>
        </div>

    </div>

    <?php include "includes/footer.php" ?>
    </div>
    <?php include "includes/foot.php" ?>
    <script>
        $('.moreless-button').click(function () {
            const moreText = $(this).siblings('.moretext');

            $('.moretext').not(moreText).slideUp();
            $('.moreless-button').not(this).text('Read more');

            // Toggle the current one
            moreText.slideToggle();

            if ($(this).text() == "Read more") {
                $(this).text("Read less");
            } else {
                $(this).text("Read more");
            }
        });

        var aboutCarousel = new Glide('.about-carousel', {
            type: 'carousel',
            focusAt: 1,
            perView: 4,
            autoplay: 3500,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1024: {
                    perView: 4
                },
                640: {
                    perView: 1
                }
            },
        });
        aboutCarousel.mount();

        var aboutCarousel2 = new Glide('.about-carousel2', {
            type: 'carousel',
            focusAt: 1,
            perView: 4,
            autoplay: 3500,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1680: {
                    perView: 4
                },
                1024: {
                    perView: 3
                },
                820: {
                    perView: 2
                },
                640: {
                    perView: 1
                }
            },
        });
        aboutCarousel2.mount();




        var glide03 = new Glide('.glide-03', {
            type: 'carousel',
            focusAt: 1,
            perView: 4,
            autoplay: 3500,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1680: {
                    perView: 4
                },
                1024: {
                    perView: 3
                },
                820: {
                    perView: 2
                },
                640: {
                    perView: 1
                }
            },
        });

        glide03.mount();

        var latestNews2 = new Glide('.latestNews2', {
            type: 'carousel',
            focusAt: 1,
            perView: 4,
            autoplay: 3500,
            animationDuration: 700,
            gap: 24,
            classes: {
                activeNav: '[&>*]:bg-slate-700',
            },
            breakpoints: {
                1680: {
                    perView: 4
                },
                1024: {
                    perView: 3
                },
                820: {
                    perView: 2
                },
                640: {
                    perView: 1
                }
            },
        });
        latestNews2.mount();
    </script>
</body>

</html>