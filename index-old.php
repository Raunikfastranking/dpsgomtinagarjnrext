<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPS Gomti Nagar Jnr.| Home</title>
    <?php include "includes/head.php" ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>

<body>

    <?php include "includes/header.php" ?>

    <style>
    ul.glide__slides {
        display: flex;
        padding: 0;
        margin: 0;
        list-style: none;
    }

    ul.tabs {
        padding: 0px;
        list-style: none;
    }

    ul.tabs li {
        background: none;
        color: #00371a;
        display: inline-block;
        padding: 10px 15px;
        cursor: pointer;

        background: #ededed;
    }

    @media (max-width: 640px) {
        ul.tabs li {
            font-size: 14px;
            padding: 8px;
            background: #ededed;
        }

    }


    ul.tabs li.current {
        background: #00371a;
        color: #fff;
    }

    .tab-content {
        display: none;
        padding-top: 15px;
    }

    .tab-content.current {
        display: block !important;
    }

    .img-popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: transparent;
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .popup-content {
        background: rgba(0, 0, 0, 0.85);
        border-radius: 12px;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        animation: animatepopup 0.3s ease-in-out forwards;

        /* Desktop default */
        width: 50vw;
        height: 90vh;
    }

    .popup-content img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        opacity: 0;
        transform: translateY(-100px);
        animation: animatepopup 0.3s ease-in-out forwards;
        border-radius: 10px;
    }

    /* Responsive for mobile screens */
    @media (max-width: 640px) {
        .popup-content {
            width: 100vw;
            height: 50vh;
        }
    }

    .close-btn {
        width: 35px;
        height: 30px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        position: absolute;
        top: 20px;
        right: 20px;
        cursor: pointer;
    }

    .close-btn .bar {
        height: 4px;
        background: #fff;
        border-radius: 2px;
    }

    .close-btn .bar:nth-child(1) {
        transform: rotate(45deg);
    }

    .close-btn .bar:nth-child(2) {
        transform: translateY(-4px) rotate(-45deg);
    }

    .img-popup.opened {
        display: flex;
    }

    @keyframes animatepopup {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .mySwiper .swiper-pagination-bullet {
        background-color: #00371a !important;
    }

    .mySwiper .swiper-pagination-bullet-active {
        background-color: #002A5B !important;
    }

    @media (max-width: 640px) {
        .swiper {
            box-shadow: none !important;
        }

        .swiper-slide {
            box-shadow: none !important;
        }

        .swiper-wrapper {
            margin: 0 !important;
            height: auto;
        }
    }

    .clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .expanded {
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
        display: block;
        -webkit-line-clamp: unset;
        white-space: normal;
    }


    .top-hide {
        transform: translateY(0);
        transition: .2s all
    }

    .top-hide::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 150px;
        background: linear-gradient(180deg, rgb(0, 87, 7), transparent);
        border-radius: 8px;
    }

    .top-hide h2 {
        transition: .2s ease-in-out
    }

    .card-top-peudo:hover .top-hide {
        transform: translateY(190px);
        opacity: 0;
        transition: transform 0.4s ease-in, opacity 0.4s ease-in 0.2s;
    }

    .card-top-peudo:hover .top-hide h2 {
        opacity: 0;
    }

    .bottom-card-content::after {
        content: "";
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 250px;
        z-index: -1;
        background: linear-gradient(180deg, rgb(0, 87, 7), rgb(0, 87, 7));
        opacity: .9;
    }

    .bottom-card-content {
        transition: .6s ease-in-out;
        z-index: 2;
        opacity: 0;
    }

    .card-top-peudo:hover .bottom-card-content {
        opacity: 1;
    }
    </style>
    <style>
    .img-popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: transparent;
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .popup-content {
        background: rgba(0, 0, 0, 0.85);
        border-radius: 12px;
        padding: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        animation: animatepopup 0.3s ease-in-out forwards;

        /* Desktop default */
        width: 50vw;
        height: 90vh;
    }

    .popup-content img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
        opacity: 0;
        transform: translateY(-100px);
        animation: animatepopup 0.3s ease-in-out forwards;
        border-radius: 10px;
    }

    /* Responsive for mobile screens */
    @media (max-width: 640px) {
        .popup-content {
            width: 100vw;
            height: 50vh;
        }
    }

    .close-btn {
        width: 35px;
        height: 30px;
        display: flex;
        justify-content: center;
        flex-direction: column;
        position: absolute;
        top: 20px;
        right: 20px;
        cursor: pointer;
    }

    .close-btn .bar {
        height: 4px;
        background: #fff;
        border-radius: 2px;
    }

    .close-btn .bar:nth-child(1) {
        transform: rotate(45deg);
    }

    .close-btn .bar:nth-child(2) {
        transform: translateY(-4px) rotate(-45deg);
    }

    .img-popup.opened {
        display: flex;
    }

    @keyframes animatepopup {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .mySwiper .swiper-pagination-bullet {
        background-color: #00371a !important;
    }

    .mySwiper .swiper-pagination-bullet-active {
        background-color: #002A5B !important;
    }

    @media (max-width: 640px) {
        .swiper {
            box-shadow: none !important;
        }

        .swiper-slide {
            box-shadow: none !important;
        }

        .swiper-wrapper {
            margin: 0 !important;
            height: auto;
        }
    }

    .clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .expanded {
        max-height: 200px;
        overflow-y: auto;
        overflow-x: hidden;
        display: block;
        -webkit-line-clamp: unset;
        white-space: normal;
    }
    </style>




    <div id="formOverlay"
        class="fixed inset-0 bg-gray-800 bg-opacity-60 flex items-center justify-center z-[99999] hidden">
        <!-- Custom Modal -->
        <div class="bg-white rounded-xl shadow-2xl p-6 w-full lg:max-w-xl md:max-w-lg sm:max-w-md relative">
            <!-- Dismiss Button -->
            <button id="dismissPopup"
                class="absolute top-4 right-4 text-gray-400 hover:text-red-400 text-2xl font-bold">&times;</button>
            <img src="assets/images/DPS SCHOOL POP UP IMAGE.jpg" alt="">
        </div>
    </div>

    <div class="main relative">
        <div class="mx-3">

            <div class="relative w-full heroSlider opne-hide-circle">
                <!-- Slides -->
                <div class="overflow-hidden" data-glide-el="track">
                    <ul
                        class="relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                        <li class="relative">
                            <img src="./assets/images/banner1.webp" alt="Experience Excellence"
                                class="sm:w-auto w-[100%] sm:hidden ">
                            <img src="./assets/images/banner1.webp" alt="Experience Excellence"
                                class="w-[100%] hidden sm:block">
                            <div class="absolute top-5 left-4 sm:top-[75px] sm:left-[180px] hidden">
                                <h2 class="text-gray-500 sm:text-4xl text-3xl font-[700]">
                                    Experience <br>
                                    <span class="text-[40px] sm:text-[60px] font-[700] text-blue-900">
                                        Excellence</span>
                                </h2>
                            </div>
                        </li>
                        <li class="relative">
                            <img src="./assets/images/banner2.webp" alt="Experience Excellence"
                                class="sm:w-auto w-[100%] sm:hidden ">
                            <img src="./assets/images/banner2.webp" alt="Experience Excellence"
                                class="w-[100%] hidden sm:block">
                            <div class="absolute top-5 left-4 sm:top-[75px] sm:left-[180px] hidden">
                                <h2 class="text-gray-500 sm:text-4xl text-3xl font-[700]">
                                    Experience <br>
                                    <span class="text-[40px] sm:text-[60px] font-[700] text-blue-900">
                                        Excellence</span>
                                </h2>
                            </div>
                        </li>
                        <li class="relative">
                            <img src="./assets/images/banner3.webp" alt="Experience Excellence"
                                class="sm:w-auto w-[100%] sm:hidden ">
                            <img src="./assets/images/banner3.webp" alt="Experience Excellence"
                                class="w-[100%] hidden sm:block">
                            <div class="absolute top-5 left-4 sm:top-[75px] sm:left-[180px] hidden">
                                <h2 class="text-gray-500 sm:text-4xl text-3xl font-[700]">
                                    Experience <br>
                                    <span class="text-[40px] sm:text-[60px] font-[700] text-blue-900">
                                        Excellence</span>
                                </h2>
                            </div>
                        </li>
                        <li class="relative">
                            <img src="./assets/images/banner4.webp" alt="Experience Excellence"
                                class="sm:w-auto w-[100%] sm:hidden ">
                            <img src="./assets/images/banner4.webp" alt="Experience Excellence"
                                class="w-[100%] hidden sm:block">
                            <div class="absolute top-5 left-4 sm:top-[75px] sm:left-[180px] hidden">
                                <h2 class="text-gray-500 sm:text-4xl text-3xl font-[700]">
                                    Experience <br>
                                    <span class="text-[40px] sm:text-[60px] font-[700] text-blue-900">
                                        Excellence</span>
                                </h2>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Controls -->
                <div class="absolute left-0 md:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle"
                    data-glide-el="controls">
                    <button
                        class="inline-flex items-center justify-center  relative right-[0px] hover:bg-[#FED72B] hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir="<" aria-label="prev slide">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                    <button
                        class="inline-flex items-center justify-center  relative left-[0px] hover:bg-[#FED72B] hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir=">" aria-label="next slide">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </div>

            </div>
            <style>
            .custom-blue-hover:hover {
                box-shadow: 0 5px 0 rgb(0 84 39 / 88%), 0 10px 0 rgb(0 84 39 / 61%), 0 15px 0 rgb(0 84 39 / 54%), 0 20px 0 rgb(0 84 39 / 31%), 0 25px 0 rgba(5, 59, 122, 0.05);
            }
            </style>
            <div
                class="mt-5 sm:mt-[60px] 2xl:w-[1080px] lg:w-[824px] md:w-[567px] sm:w-[440px] sm:mx-auto sm:px-5 px-3">
                <div>
                    <ul
                        class="grid 2xl:grid-cols-4 xl:grid-cols-4 lg:grid-cols-4 md:grid-cols-2 grid-cols-2 items-center gap-5">
                        <li>
                            <a href="https://erp.dpsgnext.com/RegistrationTransaction/OnlineRegistration"
                                target="_blank"
                                class="w-full h-[110px] sm:h-auto border border-[#00371a] rounded-[12px] bg-[#FED72B]/20 sm:p-[20px] transition-all duration-300 transform hover:scale-[1.03] custom-blue-hover flex-col sm:flex-row flex justify-center items-center">
                                <img src="./assets/images/onlinereg.png"
                                    alt=""
                                    class="2xl:w-[60px] 2xl:h-[60px] xl:w-[60px] xl:h-[60px] lg:w-[45px] lg:h-[45px] sm:w-[45px] sm:h-[45px] object-contain">
                                <span
                                    class="font-[600] text-[13px] sm:text-[16px] text-blue-main mt-2 sm:mt-0 sm:ml-2 text-center sm:text-left">
                                    Online Registration
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="https://erp.dpsgnext.com/" target="_blank"
                                class="w-full h-[110px] sm:h-auto border border-blue-main rounded-[12px] bg-[#FED72B]/20 sm:p-[20px]  transition-all duration-300 transform hover:scale-[1.03] custom-blue-hover flex-col sm:flex-row flex justify-center items-center">
                                <img src="./assets/images/rupee.png"
                                    alt=""
                                    class="2xl:w-[60px] 2xl:h-[60px] xl:w-[60px] xl:h-[60px] lg:w-[45px] lg:h-[45px] sm:w-[45px] sm:h-[45px] object-contain">
                                <span
                                    class="font-[600] text-[13px] sm:text-[16px] text-blue-main mt-2 sm:mt-0 sm:ml-2 text-center sm:text-left">
                                    Online Payment
                                </span>
                            </a>
                        </li>
                        <li>
                            <!-- href="admission-procedure.php" -->
                            <a href="process.php"
                                class="w-full h-[110px] sm:h-auto border border-blue-main rounded-[12px] bg-[#FED72B]/20 sm:p-[20px]  transition-all duration-300 transform hover:scale-[1.03] custom-blue-hover flex-col sm:flex-row flex justify-center items-center">
                                <img src="./assets/images/chat.png"
                                    alt=""
                                    class="2xl:w-[60px] 2xl:h-[60px] xl:w-[60px] xl:h-[60px] lg:w-[45px] lg:h-[45px] sm:w-[45px] sm:h-[45px] object-contain">
                                <span
                                    class="font-[600] text-[13px] sm:text-[16px] text-blue-main mt-2 sm:mt-0 sm:ml-2 text-center sm:text-left">
                                    Admission Enquiry
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="campus-tour.php"
                                class="w-full h-[110px] sm:h-auto border border-blue-main rounded-[12px] bg-[#FED72B]/20 sm:p-[20px]  transition-all duration-300 transform hover:scale-[1.03] custom-blue-hover flex-col sm:flex-row flex justify-center items-center">
                                <img src="./assets/images/campus.png"
                                    alt=""
                                    class="2xl:w-[60px] 2xl:h-[60px] xl:w-[60px] xl:h-[60px] lg:w-[45px] lg:h-[45px] sm:w-[45px] sm:h-[45px] object-contain">
                                <span
                                    class="font-[600] text-[13px] sm:text-[16px] text-blue-main mt-2 sm:mt-0 sm:ml-2 text-center sm:text-left">
                                    Campus Tour
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div
                class="sm:block hidden mt-10 sm:mt-[60px] 2xl:w-[1480px] lg:w-[1224px] md:w-[967px] sm:w-[840px] sm:mx-auto sm:px-5 px-3">
                <div class="grid sm:grid-cols-4 grid-cols-1 gap-5">
                    <div class="overflow-hidden">
                        <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                            <div class="top-hide">
                                <div class="absolute z-10 p-3">
                                    <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                        style="color: #FED72B;">
                                        Excellence <br>
                                        <span
                                            class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                            In Action</span>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <img src="./assets/images/Excellence in Action 2.png" class="w-[100%]" alt="">
                            </div>
                            <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open w-full">
                                <div class="relative bottom-[16px]">
                                    <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                        style="color: #FED72B;">
                                        Excellence <br>
                                        <span
                                            class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                            In Action</span>
                                    </h2>
                                    <p class="mt-3 text-white">At our school, we believe that excellence is not a destination, but a continuous journey of learning, growth, and achievement</p>
                                    <button class="w-[100%]"><a href="excellence-in-action.php"
                                            class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                            More

                                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#00371a"
                                                    stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                    stroke="#00371a" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="overflow-hidden">
                        <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                            <div class="top-hide">
                                <div class="absolute z-10 p-3">
                                    <h2
                                        class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] text-white/80">
                                        Celebrating <br>
                                        <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700]"
                                            style="color: #FED72B;">
                                            Excellence</span>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <img src="./assets/images/Celebrating Excellence 4.png" class="w-[100%]" alt="">
                            </div>
                            <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open w-full">
                                <div class="relative bottom-[16px]">
                                    <h2
                                        class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] text-white/80">
                                        Celebrating <br>
                                        <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700]"
                                            style="color: #FED72B;">
                                            Excellence</span>
                                    </h2>
                                    <p class="mt-3 text-white">At our school, we believe every achievement—big or small—is a step towards greatness.</p>

                                    <button class="w-[100%]"><a href=""></a><a href="celebrating-excellence.php"
                                            class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                            More

                                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#00371a"
                                                    stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                    stroke="#00371a" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden">
                        <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                            <div class="top-hide">
                                <div class="absolute z-10 p-3">
                                    <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                        style="color: #FED72B;">
                                        Excellence <br>
                                        <span
                                            class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                            In the Spotlight</span>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <img src="./assets/images/Excellence in Spotlight 2.png" class="w-[100%]" alt="">
                            </div>
                            <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open w-full">
                                <div class="relative bottom-[16px]">
                                    <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                        style="color: #FED72B;">
                                        Excellence <br>
                                        <span
                                            class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                            In the Spotlight</span>
                                    </h2>
                                    <p class="mt-3 text-white">At our school, excellence is more than an achievement—it is a way of life.</p>
                                    <button class="w-[100%]"><a href="excellence-in-spotlight.php"
                                            class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                            More

                                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#00371a"
                                                    stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                    stroke="#00371a" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden">
                        <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                            <div class="top-hide">
                                <div class="absolute z-10 p-3">
                                    <h2 class=" text-[22px] 2xl:text-[22px] lg:text-[16px] leading-8 font-[700] "
                                        style="color: #FED72B;">
                                        Embark on a Journey of<br>
                                        <span
                                            class="text-[35px] 2xl:text-[35px] lg:text-[24px] font-[700] text-white/80">
                                            Excellence</span>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <img src="./assets/images/Embark on a journey of Excellence.jpg.png" class="w-[100%]"
                                    alt="">
                            </div>
                            <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open w-full">
                                <div class="relative bottom-[16px]">
                                    <h2 class=" text-[22px] 2xl:text-[22px] lg:text-[16px] leading-8 font-[700] "
                                        style="color: #FED72B;">
                                        Embark on a Journey of<br>
                                        <span
                                            class="text-[35px] 2xl:text-[35px] lg:text-[24px] font-[700] text-white/80">
                                            Excellence</span>
                                    </h2>
                                    <p class="mt-3 text-white">Education is not just about reaching a destination—it is about embracing the journey.</p>
                                    <button class="w-[100%]"><a href="embark-on-journey.php"
                                            class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                            More

                                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#00371a"
                                                    stroke-width="1.5" stroke-linecap="round"></path>
                                                <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                    stroke="#00371a" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="block sm:hidden mt-10 px-0">
                <div class="swiper mySwiper w-full">
                    <div class="swiper-wrapper">
                        <!-- SLIDE 1 -->
                        <div class="swiper-slide px-3">
                            <div class="overflow-hidden">
                                <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                                    <div class="top-hide">
                                        <div class="absolute z-10 p-3">
                                            <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                                style="color: #FED72B;">
                                                Excellence <br>
                                                <span
                                                    class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                                    In Action</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="./assets/images/Excellence in Action 2.png" class="w-[100%]" alt="">
                                    </div>
                                    <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open w-full">
                                        <div class="relative bottom-[16px]">
                                            <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                                style="color: #FED72B;">
                                                Excellence <br>
                                                <span
                                                    class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                                    In Action</span>
                                            </h2>
                                            <p class="mt-3 text-white">At our school, we believe that excellence is not a destination, but a continuous journey of learning, growth, and achievement</p>
                                            <button class="w-[100%]"><a href="excellence-in-action.php"
                                                    class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                                    More

                                                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#00371a"
                                                            stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                            stroke="#00371a" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SLIDE 2 -->
                        <div class="swiper-slide px-3">
                            <div class="overflow-hidden">
                                <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                                    <div class="top-hide">
                                        <div class="absolute z-10 p-3">
                                            <h2
                                                class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] text-white/80">
                                                Celebrating <br>
                                                <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700]"
                                                    style="color: #FED72B;">
                                                    Excellence</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="./assets/images/Celebrating Excellence 4.png" class="w-[100%]" alt="">
                                    </div>
                                    <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open w-full">
                                        <div class="relative bottom-[16px]">
                                            <h2
                                                class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] text-white/80">
                                                Celebrating <br>
                                                <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700]"
                                                    style="color: #FED72B;">
                                                    Excellence</span>
                                            </h2>
                                            <p class="mt-3 text-white">At our school, we believe every achievement—big or small—is a step towards greatness.</p>

                                            <button class="w-[100%]"><a href=""></a><a href="celebrating-excellence.php"
                                                    class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                                    More

                                                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#00371a"
                                                            stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                            stroke="#00371a" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SLIDE 3 -->
                        <div class="swiper-slide px-3">
                            <div class="overflow-hidden">
                                <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                                    <div class="top-hide">
                                        <div class="absolute z-10 p-3">
                                            <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                                style="color: #FED72B;">
                                                Excellence <br>
                                                <span
                                                    class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                                    In the Spotlight</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="./assets/images/Excellence in Spotlight 2.png" class="w-[100%]"
                                            alt="">
                                    </div>
                                    <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open w-full">
                                        <div class="relative bottom-[16px]">
                                            <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                                style="color: #FED72B;">
                                                Excellence <br>
                                                <span
                                                    class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                                    In the Spotlight</span>
                                            </h2>
                                            <p class="mt-3 text-white">At our school, excellence is more than an achievement—it is a way of life.</p>
                                            <button class="w-[100%]"><a href="excellence-in-spotlight.php"
                                                    class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                                    More

                                                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#00371a"
                                                            stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                            stroke="#00371a" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- SLIDE 4 -->
                        <div class="swiper-slide px-3">
                            <div class="overflow-hidden">
                                <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                                    <div class="top-hide">
                                        <div class="absolute z-10 p-3">
                                            <h2 class=" text-[22px] 2xl:text-[22px] lg:text-[16px] leading-8 font-[700] "
                                                style="color: #FED72B;">
                                                Embark on a Journey of<br>
                                                <span
                                                    class="text-[35px] 2xl:text-[35px] lg:text-[24px] font-[700] text-white/80">
                                                    Excellence</span>
                                            </h2>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="./assets/images/Embark on a journey of Excellence.jpg.png"
                                            class="w-[100%]" alt="">
                                    </div>
                                    <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open w-full">
                                        <div class="relative bottom-[16px]">
                                            <h2 class=" text-[22px] 2xl:text-[22px] lg:text-[16px] leading-8 font-[700] "
                                                style="color: #FED72B;">
                                                Embark on a Journey of<br>
                                                <span
                                                    class="text-[35px] 2xl:text-[35px] lg:text-[24px] font-[700] text-white/80">
                                                    Excellence</span>
                                            </h2>
                                            <p class="mt-3 text-white">Education is not just about reaching a destination—it is about embracing the journey.</p>
                                            <button class="w-[100%]"><a href="embark-on-journey.php"
                                                    class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                                    More

                                                    <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#00371a"
                                                            stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                            stroke="#00371a" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination  mt-4"></div>
                </div>
            </div>

            <!-- <div
                class="sm:block hidden mt-10 sm:mt-[60px] 2xl:w-[1480px] lg:w-[1224px] md:w-[967px] sm:w-[840px] sm:mx-auto sm:px-5 px-3">
                <div class="grid sm:grid-cols-4 grid-cols-1 gap-5">
                    <div class="overflow-hidden">
                        <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                            <div class="top-hide">
                                <div class="absolute z-10 p-3">
                                    <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                        style="color: #FED72B;">
                                        Excellence <br>
                                        <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                            In Action</span>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <img src="https://dummyimage.com/442x297/e6e6ed/000000&text=Not+Provided"
                                    class="w-[100%]" alt="">
                            </div>
                            <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open">
                                <div class="relative bottom-[16px]">
                                    <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                        style="color: #FED72B;">
                                        Excellence <br>
                                        <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                            In Action</span>
                                    </h2>
                                    <p class="mt-3 text-white">At Allenhouse Schools, excellence is more than a goal; it is a way of life.</p>
                                    <button class="w-[100%]"><a href="excellence-in-action.php"
                                            class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                            More

                                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#00371a"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542" stroke="#00371a"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="overflow-hidden">
                        <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                            <div class="top-hide">
                                <div class="absolute z-10 p-3">
                                    <h2
                                        class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] text-white/80">
                                        Celebrating <br>
                                        <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700]"
                                            style="color: #FED72B;">
                                            Excellence</span>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <img src="https://dummyimage.com/442x297/e6e6ed/000000&text=Not+Provided"
                                    class="w-[100%]" alt="">
                            </div>
                            <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open">
                                <div class="relative bottom-[16px]">
                                    <h2
                                        class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] text-white/80">
                                        Celebrating <br>
                                        <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700]"
                                            style="color: #FED72B;">
                                            Excellence</span>
                                    </h2>
                                    <p class="mt-3 text-white"> At Allenhouse Schools, excellence is not just a value we uphold; it is a way of life.</p>

                                    <button class="w-[100%]"><a href=""><a href="celebrating-excellence.php"
                                                class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                                More

                                                <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#00371a"
                                                        stroke-width="1.5" stroke-linecap="round" />
                                                    <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542"
                                                        stroke="#00371a" stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </a></a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden">
                        <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                            <div class="top-hide">
                                <div class="absolute z-10 p-3">
                                    <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                        style="color: #FED72B;">
                                        Excellence <br>
                                        <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                            In the Spotlight</span>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <img src="https://dummyimage.com/442x297/e6e6ed/000000&text=Not+Provided"
                                    class="w-[100%]" alt="">
                            </div>
                            <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open">
                                <div class="relative bottom-[16px]">
                                    <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700] "
                                        style="color: #FED72B;">
                                        Excellence <br>
                                        <span class="text-[22px] 2xl:text-[22px] lg:text-[16px] font-[700] text-white/80">
                                            In the Spotlight</span>
                                    </h2>
                                    <p class="mt-3 text-white"> At Allenhouse, the pursuit of excellence is not confined to the classroom.</p>
                                    <button class="w-[100%]"><a href="excellence-in-spotlight.php"
                                            class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                            More

                                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#00371a"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542" stroke="#00371a"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="overflow-hidden">
                        <div class="relative w-full card-top-peudo rounded-[8px] cursor-pointer">
                            <div class="top-hide">
                                <div class="absolute z-10 p-3">
                                    <h2 class=" text-[22px] 2xl:text-[22px] lg:text-[16px] leading-8 font-[700] "
                                        style="color: #FED72B;">
                                        Embark on a Journey of<br>
                                        <span class="text-[35px] 2xl:text-[35px] lg:text-[24px] font-[700] text-white/80">
                                            Excellence</span>
                                    </h2>
                                </div>
                            </div>
                            <div>
                                <img src="https://dummyimage.com/442x297/e6e6ed/000000&text=Not+Provided"
                                    class="w-[100%]" alt="">
                            </div>
                            <div class="absolute bottom-0 px-6 z-10 bottom-card-content bottom-open">
                                <div class="relative bottom-[16px]">
                                    <h2 class=" text-[22px] 2xl:text-[22px] lg:text-[16px] leading-8 font-[700] "
                                        style="color: #FED72B;">
                                        Embark on a Journey of<br>
                                        <span class="text-[35px] 2xl:text-[35px] lg:text-[24px] font-[700] text-white/80">
                                            Excellence</span>
                                    </h2>
                                    <p class="mt-3 text-white">At Allenhouse Schools, the pursuit of excellence is more than a goal; it is a pledge.</p>
                                    <button class="w-[100%]"><a href="embark-on-journey.php"
                                            class=" rounded-full text-blue-main p-2 font-[600] bg-white mt-5 flex justify-center items-center gap-2">Read
                                            More

                                            <svg width="14" height="10" viewBox="0 0 14 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.929932 5.16199L12.6731 5.16199" stroke="#00371a"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.42798 1.39856L13.1917 5.16174L9.42798 8.92542" stroke="#00371a"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="ralative hidden">
                <img src=""
                    alt="Experience Excellence" class="sm:w-auto w-[100%] sm:hidden ">
                <img src="assets/images/hero_bannner.jpg" alt="Experience Excellence" class="w-[100%] hidden sm:block">

                <div class="absolute top-5 sm:top-[50px] sm:left-[80px] left-[30px]">
                    <h2 class="text-gray-500 sm:text-4xl text-3xl font-[700]">
                        Experience <br>
                        <span class="text-[40px] sm:text-[60px] font-[700] text-blue-900">
                            Excellence</span>
                    </h2>
                </div>
            </div>
        </div>

        <!-- <div class="mt-5 sm:mt-[60px] 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto  sm:px-5 px-3">

            <div class="relative w-full slider2">
               
                <div class="overflow-hidden" data-glide-el="track">
                    <ul
                        class="relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                        <li class="relative">
                            <a href="excellence-in-action.php" class="img-hover">
                                <div
                                    class="absolute top-5 2xl:left-[20px] lg:left-[10px] md:left-[10px] left-[10px] flex">
                                    <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700]  "
                                        style="color: #FED72B;">
                                        Excellence <br>
                                        <span
                                            class="text-[22px] 2xl:text-[22px] lg:text-[18px] font-[700] text-white/80">
                                            IN Action</span>
                                    </h2>
                                </div>
                                <img src="assets/images/excellence-in-Action.png" alt="Excellence In Action"
                                    class="w-[100%]">
                                <h6 class="mt-4 text-blue-main font-[600] text-[16px] hover:text-[#FED72B]">Read More
                                    <span class="relative top-[2px] left-[2px]"><i
                                            class="fa-solid fa-arrow-up-long rotate-90"></i></span>
                                </h6>
                            </a>
                        </li>
                        <li class="relative">
                            <a href="celebrating-excellence.php" class="img-hover">
                                <div
                                    class="absolute top-5 2xl:left-[20px] lg:left-[10px] md:left-[10px] left-[10px] flex">
                                    <h2
                                        class="text-[22px] 2xl:text-[22px] lg:text-[18px] font-[700] text-gray-400  ">
                                        Celebrating <br>
                                        <span
                                            class=" text-blue-900 text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700]">
                                            Excellence</span>
                                    </h2>
                                </div>
                                <img src="assets/images/img4.png" alt="Celebrating Excellence" class="w-[100%]">
                                <h6 class="mt-4 text-blue-main font-[600] text-[16px] hover:text-[#FED72B]">Read More
                                    <span class="relative top-[2px] left-[2px]"><i
                                            class="fa-solid fa-arrow-up-long rotate-90"></i></span>
                                </h6>
                            </a>
                        </li>
                        <li class="relative">
                            <a href="excellence-in-spotlight.php" class="img-hover">
                                <div
                                    class="absolute top-5 2xl:left-[20px] lg:left-[10px] md:left-[10px] left-[10px] flex">
                                    <h2 class="text-[35px] 2xl:text-[35px] lg:text-[24px] leading-8 font-[700]  "
                                        style="color: #FED72B;">
                                        Excellence <br>
                                        <span class=" text-[22px] 2xl:text-[22px] lg:text-[18px] font-[700] text-white">
                                            in the Spotlight</span>
                                    </h2>
                                </div>
                                <img src="assets/images/img3.png" alt="Excellence  in the Spotlight" class="w-[100%]">
                                <h6 class="mt-4 text-blue-main font-[600] text-[16px] hover:text-[#FED72B]">Read More
                                    <span class="relative top-[2px] left-[2px]"><i
                                            class="fa-solid fa-arrow-up-long rotate-90"></i></span>
                                </h6>
                            </a>
                        </li>
                        <li class="relative">
                            <a href="embark-on-journey.php" class="img-hover">
                                <div
                                    class="absolute top-5 2xl:left-[20px] lg:left-[10px] md:left-[10px] left-[10px] flex">
                                    <h2
                                        class=" text-white text-[22px] 2xl:text-[22px] lg:text-[18px] leading-8 font-[700] ">
                                        Embark on a Journey <br>
                                        <span
                                            class="text-[35px] 2xl:text-[35px] lg:text-[24px] font-[700] text-gray-400"
                                            style="color: #FED72B;">
                                            <span class="text-white text-[22px]">of</span> Excellence</span>
                                    </h2>
                                </div>
                                <img src="assets/images/img1.png" alt="Embark on a Journey of Excellence"
                                    class="w-[100%]">
                                <h6 class="mt-4 text-blue-main font-[600] text-[16px] hover:text-[#FED72B]">Read More
                                    <span class="relative top-[2px] left-[2px]"><i
                                            class="fa-solid fa-arrow-up-long rotate-90"></i></span>
                                </h6>
                            </a>
                        </li>
                    </ul>
                </div>
              

            </div>
        </div> -->



        <div style="background-image: url('./assets/images/yellow.png');  background-repeat: no-repeat;"
            class="bg-cover">
            <div
                class="mt-10 sm:mt-8 sm:py-16 py-4 2xl:w-[880px] lg:w-[624px] md:w-[467px] sm:w-[340px] sm:mx-auto mx-3">
                <div class="text-center">
                    <h2 class="text-[32px] font-[700] leading-9 text-blue-main  relative">The Delhi Public School
                        Approach
                    </h2>
                    <p class="mt-4 text-[#808080] text-[18px]">“Our goal is to equip students for a future brimming with
                        opportunities. In this effort, we enable them to thrive academically, socially, and emotionally.
                        At DPS, we firmly believe that an education combining Indian culture and values with a global
                        outlook will develop students into caring global citizens”</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-[-30px] ">
        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto">

        </div>
        <div class="mt-10">

            <div class="bg-[#005427] text-center pt-5 sm:pb-2 pb-5">
                <h2 class="text-[32px] font-[700] leading-9 text-white  relative text-center ">Legacy of Excellence
                </h2>
            </div>
            <div class="sm:py-8 py-5 bg-feature m-bg-feature mt-[-1px] ">
                <div class="grid grid-cols-1 sm:grid-cols-5 ">
                    <div class="flex justify-center gap-4 items-center sm:py-0 py-6">
                        <span class="sm:w-[50%] w-[35%] inline-block "><img
                                src="./assets/images/legacy1.png"
                                alt="Years" class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]"
                                style="margin: 0 0 0 auto;"></span>
                        <div class="inline-block w-[50%]">
                            <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px] 
                        ">27+</h2>
                            <h3
                                class="text-white font-[700]  text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px] ">
                                Years</h3>
                        </div>
                    </div>
                    <div class="flex justify-center gap-4 items-center sm:pb-0 pb-10">
                        <span class="sm:w-[50%] w-[35%] inline-block "><img
                                src="./assets/images/legacy2.png"
                                alt="Campus" class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]"
                                style="margin: 0 0 0 auto;"></span>
                        <div class="inline-block w-[50%]">
                            <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px] 
                        ">25+</h2>
                            <h3
                                class="text-white font-[700]  text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px]">
                                Campus</h3>
                        </div>
                    </div>
                    <div class="flex justify-center gap-4 items-center sm:pb-0 pb-10">
                        <span class="sm:w-[50%] w-[35%] inline-block "><img
                                src="./assets/images/legacy3.png"
                                alt="Students" class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]"
                                style="margin: 0 0 0 auto;"></span>
                        <div class="inline-block w-[50%]">
                            <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px] 
                        ">30,000+</h2>
                            <h3
                                class="text-white font-[700]  text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px]">
                                Students</h3>
                        </div>
                    </div>
                    <div class="flex justify-center gap-4 items-center sm:pb-0 pb-10">
                        <span class="sm:w-[50%] w-[35%] inline-block "><img
                                src="./assets/images/legacy4.png"
                                alt="Staff" class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]"
                                style="margin: 0 0 0 auto;"></span>
                        <div class="inline-block w-[50%]">
                            <h2 class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px] 
                        ">1850+</h2>
                            <h3
                                class="text-white font-[700]  text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px]">
                                Staff</h3>
                        </div>
                    </div>
                    <div class="flex justify-center gap-4 items-center ">
                        <span class="sm:w-[50%] w-[35%] inline-block "><img
                                src="./assets/images/legacy5.png"
                                alt="Alumni" class="w-[50px] 2xl:w-[50px] lg:w-[45px] md:w-[40px]"
                                style="margin: 0 0 0 auto;"></span>
                        <div class="inline-block w-[50%]">
                            <h2
                                class="text-white font-[700] text-[35px] 2xl:text-[30px] lg:text-[20px] md:text-[20px] ">
                                15000+</h2>
                            <h3
                                class="text-white font-[700]  text-[22px] 2xl:text-[20px] lg:text-[15px] md:text-[15px]">
                                Alumni</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <div
        class="mt-10 sm:mt-[60px] 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto  py-10 sm:px-5 px-5">
        <div class="text-center">
            <h2 class="text-[32px] font-[700] leading-8 text-blue-main">Our Philosophy <span class="sm:hidden">
                    <br></span> Centres Around
            </h2>
        </div>
        <div class="relative w-full philosophy mt-5 opne-hide-circle">
            <div class="overflow-hidden" data-glide-el="track">
                <ul
                    class="relative w-full overflow-hidden  p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                    <li>
                        <img src="./assets/images/A multidimensional Approach in Education.png" alt="A Multidimensional
                                Approach to Education" class="w-[100%] rounded-[12px]">
                        <div class="mt-2">
                            <h2 class="text-[18px] font-[700] leading-5 text-blue-main">A Multidimensional
                                Approach to Education</h2>
                            <p class="text-gray-600 text-[16px] mt-1">Going beyond traditional academic boundaries to
                                nurture well-rounded individuals</p>
                        </div>
                    </li>
                    <li>
                        <img src="./assets/images/Holistic Development.png" alt="Holistic Development"
                            class="w-[100%] rounded-[12px]">
                        <div class="mt-2">
                            <h2 class="text-[18px] font-[700] leading-5 text-blue-main">Holistic
                                Development</h2>
                            <p class="text-gray-600 text-[16px] mt-1">Emphasis on the spiritual, moral, intellectual,
                                social, emotional, and physical growth of each student</p>
                        </div>
                    </li>
                    <li>
                        <img src="./assets/images/Innovative Curriculum.png" alt="Innovative Curriculum"
                            class="w-[100%] rounded-[12px]">
                        <div class="mt-2">
                            <h2 class="text-[18px] font-[700] leading-5 text-blue-main">Innovative Curriculum</h2>
                            <p class="text-gray-600 text-[16px] mt-1">A blend of advanced academics, creative
                                co-curricular activities, and practical life skills, focuses on emerging technologies,
                                entrepreneurship, and global awareness</p>
                        </div>
                    </li>
                    <li>
                        <img src="./assets/images/Supportive learning Environment.png"
                            alt="Supportive Learning Environment" class="w-[100%] rounded-[12px]">
                        <div class="mt-2">
                            <h2 class="text-[18px] font-[700] leading-5 text-blue-main">Supportive Learning Environment
                            </h2>
                            <p class="text-gray-600 text-[16px] mt-1">Fostering a culture of compassion and
                                collaboration, encouraging students to think critically, explore their passions, and
                                make a positive impact.</p>
                        </div>
                    </li>
                    <li>
                        <img src="./assets/images/Experiential Learning.png" alt="Experiential Learning"
                            class="w-[100%] rounded-[12px]">
                        <div class="mt-2">
                            <h2 class="text-[18px] font-[700] leading-5 text-blue-main">Experiential Learning
                            </h2>
                            <!-- <p class="text-gray-600 text-[16px] mt-1">Hands-on projects, field trips, and real-world
                                applications to complement classroom instruction; opportunities for students to develop
                                leadership, problem-solving, and communication skills</p> -->
                            <p class="text-gray-600 text-[16px] mt-1">Hands-on projects, field trips, and real-world
                                applications to complement classroom instruction. We bring opportunities for students to
                                develop leadership, problem-solving, and communication skills</p>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- Controls -->
            <div class="absolute left-0 md:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle"
                data-glide-el="controls">
                <button
                    class="inline-flex items-center justify-center  relative right-[66px] hover:bg-[#FED72B] hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                    data-glide-dir="<" aria-label="prev slide">
                    <i class="fa-solid fa-angle-left"></i>
                </button>
                <button
                    class="inline-flex items-center justify-center  relative left-[66px] hover:bg-[#FED72B] hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                    data-glide-dir=">" aria-label="next slide">
                    <i class="fa-solid fa-angle-right"></i>
                </button>
            </div>
            <div class="absolute bottom-[-20px] md:flex hidden items-center justify-center w-full gap-2"
                data-glide-el="controls[nav]">
                <button class=" group" data-glide-dir="=0" aria-label="goto slide 1"><span
                        class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-200 focus:outline-none"></span></button>
                <button class=" group" data-glide-dir="=1" aria-label="goto slide 2"><span
                        class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-200 focus:outline-non2"></span></button>
                <button class=" group" data-glide-dir="=2" aria-label="goto slide 3"><span
                        class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-200 focus:outline-none"></span></button>
                <button class=" group" data-glide-dir="=3" aria-label="goto slide 4"><span
                        class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-200 focus:outline-none"></span></button>
            </div>
        </div>
    </div>
    </div>

    <div style="background-image: url('./assets/images/yellow.png');  background-repeat: no-repeat;"
        class="bg-cover  sm:mt-20 mt-10 pt-5 pb-16">
        <h2 class="text-[28px] sm:text-[30px] font-[700] leading-10  text-blue-main relative text-center"> Future Ready
            Skills </h2>
        <div class="container mx-auto">

            <ul class="grid sm:grid-cols-3 grid-cols-2 sm:gap-5 gap-3 sm:mt-5 mt-10 sm:mx-[80px] sm:px-0 px-3">
                <li class="mx-auto"><a href="robotics.php" class=""><img
                            class="border-[1px] border-blue-main rounded-lg academic-box sm:w-[80%] w-[] hover:shadow-[6px_8px_20px_rgba(0,82,36,0.8)] transition-shadow duration-300"
                            src="./assets/images/robo.png" alt=""></a></li>
                <li class="mx-auto"><a href="sports.php" class=""><img
                            class="border-[1px] border-blue-main rounded-lg academic-box sm:w-[80%] w-[] hover:shadow-[6px_8px_20px_rgba(0,82,36,0.8)] transition-shadow duration-300"
                            src="./assets/images/northwest.png" alt=""></a></li>
                <li class="mx-auto"><a href="animation.php" class=""><img
                            class="border-[1px] rounded-lg border-blue-main  academic-box sm:w-[80%] w-[] hover:shadow-[6px_8px_20px_rgba(0,82,36,0.8)] transition-shadow duration-300"
                            src="./assets/images/ams.png" alt=""></a></li>
                <li class="mx-auto"><a href="oluxi-smart-skill.php" class=""><img
                            class="border-[1px] border-blue-main rounded-lg academic-box sm:w-[80%] w-[] hover:shadow-[6px_8px_20px_rgba(0,82,36,0.8)] transition-shadow duration-300"
                            src="./assets/images/oss.png" alt=""></a></li>
                <li class="mx-auto"><a href="coding.php" class=""><img
                            class="border-[1px] border-blue-main rounded-lg academic-box sm:w-[80%] w-[] hover:shadow-[6px_8px_20px_rgba(0,82,36,0.8)] transition-shadow duration-300"
                            src="./assets/images/dojo.png" alt=""></a></li>
                <li class="mx-auto"><a href="social-intelligence.php" class=""><img
                            class="border-[1px] border-blue-main rounded-lg academic-box sm:w-[80%] w-[] hover:shadow-[6px_8px_20px_rgba(0,82,36,0.8)] transition-shadow duration-300"
                            src="./assets/images/social.png" alt=""></a></li>
            </ul>
        </div>
    </div>

    <div>
        <h2 class="text-[28px] sm:text-[30px] font-[700] leading-10  text-blue-main relative text-center mt-10">
            Cambridge Curriculum</h2>
        <div class="mt-5 sm:flex sm:justify-center sm:items-center sm:mx-[100px] sm:px-0 px-3 gap-20">
            <div class="sm:w-[30%]">
                <img src="https://myschool-assets.s3.ap-south-1.amazonaws.com/uploads/r7CG61YuqFFYKlDUnAYXBCRLNiA8sQhr1hMnqA6w.png"
                    alt="">
            </div>

            <div class="md:w-[40%]">
                <div>
                    <p class="mt-5 text-gray-600"><strong>Cambridge Curriculum English</strong> is a unique approach to
                        teaching, learning and assessing English. It combines the experience and expertise
                        of the <strong>Cambridge English</strong> Language Curriculum.</p>
                    <p class=" mt-5 text-gray-600"><strong>Cambridge English</strong> is driven by world-class research
                        and a profound commitment to </p>
                    <ul class="text-sm mt-2 sm:ml-5 text-gray-600" style="list-style:disc;">
                        <li>Delivering educational excellence.</li>
                        <li>Providing increased opportunities for learners and teachers.</li>
                        <li>Offering value to teachers, educational institutions and employers.</li>
                        <li>Promoting language learning to benefit society </li>

                    </ul>
                </div>

                <div class="mt-3">
                    <a href="cambridge.php" class="text-[15px] text-blue-main font-[600]">Read More...</a>
                </div>
            </div>
        </div>
    </div>

    <!-- START -->
    <div class="sm:mt-[100px] mt-10">
        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto ">

            <div class="relative ">
                <div class="o-video mx-auto">
                    <iframe width="560" height="315"
                        src="https://www.youtube.com/embed/5bfEfHJ-FnQ?autoplay=1&mute=1&loop=1&playlist=5bfEfHJ-FnQ"
                        frameborder="0" allow="autoplay;" allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- END -->
    </div>


    <div class="sm:mt-12 mt-8 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto relative">

        <div class="mx-5">
            <div class="text-center">
                <h2 class="text-[30px] font-[700] leading-10 text-blue-main relative">Our
                    Campuses</h2>
            </div>

            <div class="relative w-full campus mt-5 opne-hide-circle">
                <div class="overflow-hidden" data-glide-el="track">
                    <ul
                        class="relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                        <li class="bg-white mb-5 rounded-[10px] "
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/Allenhouse-Rooma.jpg" alt="APS Rooma"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allenhouse Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Kulgaon road, National Highway 2, Chakeri Ward, Kanpur, Uttar Pradesh 208008">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Rooma, Kanpur
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:919235400468"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 9235400468</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">
                                        <a href="https://allenhouserooma.com/Site/Home/40000001_40000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>


                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/Allenhouse-Panki.jpg" alt="APS Panki"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allenhouse Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]" alt="884 B Block, Panki Rd, MIG,
                                                Ratanpur, Colony, Panki, Kanpur, Uttar Pradesh 208020">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Panki, Kanpur
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:918853075656"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 8853075656</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">
                                        <a href="https://allenhousepanki.com/Site/Home/20000001_20000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/Allenhouse-Jhansi.jpg" alt="APS Jhansi"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allenhouse Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt=">Allenhouse Public School Phase I, 1st A Growth  Centre, Bijauli Jhansi, India, 284135">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Bijauli, Jhansi</p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:917380850614"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 7380850614</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">
                                        <a href="https://allenhousejhansi.com/Site/Home/180000001_180000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                            <img src="assets/images/Allenhouse-Lucknow.jpg" alt="APS  Lucknow"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allenhouse Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Allenhouse Public School Plot No. HS01, Sector 6C, Vrindavan Yojna Near Teli Bagh, Lucknow">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Vrindavan Yojna, Lucknow
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a class="text-gray-500 capitalize text-[16px] w-[85%]">+91 9026624548 </a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="https://allenhouselucknow.com/Site/Home/210000001_210000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/Allenhouse-Ghaziabad.jpg" alt="APS Ghaziabad"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allenhouse Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Allenhouse Public School Sector 2A, Vasundhara, Ghaziabad, Uttar Pradesh, 201012">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Vasundhara, Ghaziabad
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:916390907005"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 6390907005</a>

                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="https://allenhouseghaziabad.com/Site/Home/70000001_70000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/Allenhouse-Agra.jpg" alt="APS Agra" class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allenhouse Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Shastripuram, Agra
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="918090155519"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 8090155519</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="https://allenhouseagra.com"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <!-- Allen Kids -->
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/AK-Kakadeo.jpg" alt="AkidKakdeo"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allen
                                    Kids
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Kakadeo, Kanpur
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="917042676336"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 7042676336</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="https://allenhouseagra.com"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
                            <img src="assets/images/school/AK-Swaroop-Nagar.jpg" alt="AkidSwaropnagar"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allen Kids </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Swaroop Nagar, Kanpur
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="917800661660"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 7800661660
                                            </a> </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="https://allenhouseagra.com"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="./assets/images/mukherjivihar.png" alt="Akid MukherjiVihar"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allen Kids
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Mukherji Vihar, Kanpur
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:916390907030"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 6390907030
                                            </a></p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="https://allenhouseagra.com"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/AK-Bareilly.jpg" alt="Akid Bareilly"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Allen
                                    Kids
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Veer Savarkar Nagar,
                                            Bareilly
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="919720010109"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 9720010109
                                            </a> </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="https://allenhouseagra.com"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <!-- DPS -->
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-Kalyanpur.jpg" alt="DPS Gomtinagar Jnr. "
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Kalyanpur, Kanpur
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:919044055605"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 9044055605
                                            </a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpskalyanpur.com/Site/Home/160000001_160000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-Unnao.jpg" alt="DPS Unnao"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Akrampur, Unnao
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="919839513636"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 9839513636</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpsunnao.com/Site/Home/120000001_120000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-Indira-Nagar.jpg" alt="DPS Indira Nagar"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Indira Nagar, Lucknow
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:915222717293"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 5222717293</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpsindiranagar.com/Site/Home/230000001_230000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-ldeco.jpg" alt="DPS Gomtinagar Jnr. "
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi
                                    Public School</h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Eldeco Colony, Lucknow
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:917522002115"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 7522002115</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpseldeco.com/Site/Home/150000001_150000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>

                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-Gomti-Nagar.jpg" alt="DPS Gomti Nagar Extension"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Gomti Nagar Extn.,
                                            Lucknow
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:917275036866"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 7275036866</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpsgomtinagar.com/Site/Home/250000001_250000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-JANKIPURAm.jpg" alt="DPS Jankipuram"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Jankipuram Extn.,
                                            Lucknow
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:918737040977"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 8737040977</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpsjankipuram.com/Site/Home/240000001_240000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-Amrapli-Yojna.jpg" alt="DPS Amrapali"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Amrapali Yojna, Dubagga,
                                            Lucknow
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:918707354579"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 8707354579</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpsamrapali.com/Site/Home/270000001_270000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPSBareilly.jpg" alt="DPS Gomtinagar Jnr. "
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Parsakhera, Bareilly
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:917081444424"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 7081444424</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpsbareilly.com/Site/Home/90000001_90000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-Saharanpur.jpg" alt="DPS Saharanpur"
                                class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Delhi Road, Saharanpur
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:917088100160"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 7088100160</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpssaharanpur.com/Site/Home/140000001_140000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>

                        </li>
                        <li class="bg-white mb-5 rounded-[10px]"
                            style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">

                            <img src="assets/images/school/DPS-Gomti-Nagar-Jr-Branch.jpg"
                                alt="DPS Gomti Nagar Junior Branch" class="w-[100%] rounded-[10px]">
                            <div class="mx-3 mt-4 mb-5">
                                <h2 class="text-[22px] font-[700] leading-8 text-blue-main">Delhi Public School Jr.
                                </h2>
                                <div class="mt-3">
                                    <div class="flex gap-3">
                                        <span class="mt-1">
                                            <img src="./assets/images/loc.png"
                                                class="w-[20px] h-[20px]"
                                                alt="Plot No. C2, Sector-C2, Shastripuram, Agra, Uttar Pradesh-282007">
                                        </span>
                                        <p class="text-gray-500 capitalize text-[16px] w-[85%]">Gomti Nagar Vistar,
                                            Lucknow
                                        </p>
                                    </div>
                                    <div class="flex gap-3 mt-2 items-center">
                                        <span>
                                            <img src="./assets/images/call.png"
                                                class="w-[20px] h-[20px]" alt="2652 255 5468, 2652 255 5468">
                                        </span>
                                        <p><a href="tel:919151112813"
                                                class="text-gray-500 capitalize text-[16px] w-[85%]">+91 9151112813</a>
                                        </p>
                                    </div>
                                    <button class="w-full rounded-full text-white bg-blue-main mt-5">

                                        <a href="http://www.dpsgomtinagar.com/Site/ContactUsNew/250000001_250000001_Home"
                                            class="flex items-center gap-2 p-2 justify-center">
                                            Visit Website

                                            <svg width="15" height="10" viewBox="0 0 15 10" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.36914 4.71826L13.1123 4.71826" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" />
                                                <path d="M9.86719 0.955078L13.6309 4.71826L9.86719 8.48193"
                                                    stroke="white" stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                            </svg>

                                        </a>
                                    </button>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Controls -->
                <div class="absolute left-0 md:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle"
                    data-glide-el="controls">
                    <button
                        class="inline-flex items-center relative sm:right-[66px] justify-center hover:bg-[#FED72B] hover:text-[#005224] w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-[#005224] hover:border-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir="<" aria-label="prev slide">
                        <i class="fa-solid fa-angle-left text-[#005224]"></i>
                    </button>
                    <button
                        class="inline-flex items-center relative sm:left-[66px] justify-center hover:bg-[#FED72B] hover:text-[#005224] w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-[#005224] hover:border-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir=">" aria-label="next slide">
                        <i class="fa-solid fa-angle-right text-[#005224]"></i>
                    </button>
                </div>
                <div class="absolute bottom-[-20px] md:flex hidden items-center justify-center w-full gap-2"
                    data-glide-el="controls[nav]">
                    <button class=" group" data-glide-dir="=0" aria-label="goto slide 1"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                    <button class=" group" data-glide-dir="=1" aria-label="goto slide 2"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-non2"></span></button>
                    <button class=" group" data-glide-dir="=2" aria-label="goto slide 3"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                    <button class=" group" data-glide-dir="=3" aria-label="goto slide 4"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="relative sm:py-6 py-5 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto mt-10">
       

        <div class="text-center">
            <h2 class="sm:text-[30px] text-[28px] font-[700] leading-10 text-blue-main relative">Life at DPS</h2>
        </div>

        <div class="mx-5 mt-7">
            <div class="sm:flex gap-3">
                <div class="sm:w-[33.33%]">
                    <div>
                        <a><img src="./assets/images/4.png" alt="student 1"
                                class="popup-img rounded-[10px] mb-2 object-cover hover:scale-90 transition delay-300"
                                style="width:100%"></a>
                    </div>
                    <div class="mt-3">
                        <a><img src="./assets/images/5.png" alt="student 2"
                                class="popup-img rounded-[10px] mb-2 object-cover hover:scale-90 transition delay-300"
                                style="width:100%"></a>
                    </div>
                </div>

                <div class="sm:w-[33.33%]">
                    <div>
                        <a><img src="./assets/images/3.png" alt="student 3"
                                class="popup-img rounded-[10px] object-cover hover:scale-90 transition delay-300"
                                style="width:100%"></a>
                    </div>
                </div>

                <div class="w-[33.33%] sm:block hidden">
                    <div>
                        <a><img src="./assets/images/6.png" alt="student 4"
                                class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300"
                                style="width:100%"></a>
                    </div>
                    <div class="mt-3">
                        <a><img src="./assets/images/7.png" alt="student 5"
                                class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300"
                                style="width:100%"></a>
                    </div>
                </div>
            </div>

            <div class="mt-[6px] sm:flex gap-3">
                <div>
                    <a><img src="./assets/images/1.png" alt="student 7"
                            class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300"
                            style="width:100%"></a>
                </div>
                <div>
                    <a><img src="./assets/images/2.png" alt="student 8"
                            class="popup-img rounded-[10px] mb-2 hover:scale-90 transition delay-300"
                            style="width:100%"></a>
                </div>
            </div>
        </div>
    </div>

    <div class="img-popup">
        <div class="popup-content">
            <img src="" alt="Popup Image">
            <div class="close-btn">
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </div>
    </div>


    <div class="relative sm:mt-20 mt-10" id="testimonials">

        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 px-3">
            <div class="text-center">
                <h2 class="text-[28px] sm:text-[30px] font-[700] leading-10 text-blue-main relative">
                    Testimonials
                </h2>
            </div>
            <div class="relative  sm:pt-5 pt-2 ">

                <!-- <ul class="tabs 2xl:ml-[432px] md:ml-[298px]  ml-[6px]">
                    <li class="tab-link current" data-tab="tab-1">Image Testimonials</li>
                    <li class="tab-link" data-tab="tab-2">Video Testimonials</li>
                </ul> -->

                <div id="tab-1" class="tab-content current Testimonials">
                    <div class=" overflow-hidden mt-1" data-glide-el="track">
                        <ul class="glide__slides">

                            <li
                                class=" sm:flex items-start gap-2 mb-4 border-[1px] border-gray-300 p-3 rounded-[8px] bg-blue-main">
                                <div class="text-center sm:w-[30%] w-[90%]">
                                    <img src="./assets/images/Mother of  Tiyasha Lahiri.png" alt=""
                                        class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px]">
                                    <h2 class="font-[700] text-[16px] text-gray-100">Mother of Tiyasha Lahiri
                                        <br>
                                        Class – 1 B
                                    </h2>
                                </div>
                                <div class="sm:w-[50%] w-[90%] sm:mt-0 mt-3 sm:text-left text-center ">
                                    <p
                                        class="testimonial-text text-[16px] text-gray-200 text-center sm:text-left clamp-2">
                                        Teachers are very cooperative and with interactive teaching methods they
                                        make learning enjoyable.
                                    </p>
                                    <button class="moreless-button font-[600] text-white text-sm mt-1">Read
                                        more...</button>
                                </div>
                            </li>

                            <li
                                class=" sm:flex items-start gap-2 mb-4 border-[1px] border-gray-300 p-3 rounded-[8px] bg-blue-main">
                                <div class="text-center sm:w-[30%] w-[90%]">
                                    <img src="./assets/images/Mother of Shaurya.png" alt=""
                                        class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px] ">
                                    <h2 class="font-[700] text-[16px] text-gray-100">Mother of Shaurya <br>
                                        Class - 1 B
                                    </h2>
                                </div>
                                <div class="sm:w-[60%] w-[90%] sm:mt-0 mt-3  sm:text-left text-center">
                                    <p
                                        class="testimonial-text text-[16px] text-gray-200 text-center sm:text-left clamp-2">
                                        Every day is a new day for the child to learn new something and not only
                                        the children are learning here even we as parents being given a chance
                                        to revive a childhood we also perform on stage sometime.
                                    </p>
                                    <button class="moreless-button font-[600] text-white text-sm mt-1">Read
                                        more...</button>
                                </div>
                            </li>
                            <li
                                class=" sm:flex items-start gap-2 mb-4 border-[1px] border-gray-300 p-3 rounded-[8px] bg-blue-main">
                                <div class="text-center sm:w-[30%] w-[90%]">
                                    <img src="./assets/images/Mr. Gaurav Saxena.png" alt=""
                                        class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px] ">
                                    <h2 class="font-[700] text-[16px] text-gray-100">Father of Swasti Saxena
                                        <br> Class - 3 C
                                    </h2>
                                </div>
                                <div class="sm:w-[60%] w-[90%] sm:mt-0 mt-3  sm:text-left text-center">
                                    <p
                                        class="testimonial-text text-[16px] text-gray-200 text-center sm:text-left clamp-2">
                                        Education open doors to amazing things. Only with education you can
                                        achieve your goals in life. If you want to be a scientist, doctor,
                                        engineer or teacher, education is the key to reach there.
                                    </p>
                                    <button class="moreless-button font-[600] text-white text-sm mt-1">Read
                                        more...</button>
                                </div>
                            </li>

                            <li
                                class=" sm:flex items-start gap-2 mb-4 border-[1px] border-gray-300 p-3 rounded-[8px] bg-blue-main">
                                <div class="text-center sm:w-[30%] w-[90%]">
                                    <img src="./assets/images/Mr.Vibhash Kumar.png" alt=""
                                        class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px] ">
                                    <h2 class="font-[700] text-[16px] text-gray-100">Father of Vedant Kumar
                                        <br> Class - 2 B
                                    </h2>
                                </div>
                                <div class="sm:w-[60%] w-[90%] sm:mt-0 mt-3  sm:text-left text-center">
                                    <p
                                        class="testimonial-text text-[16px] text-gray-200 text-center sm:text-left clamp-2">
                                        SBI Bank is a trusted name in the banking sector, and DPS is a trusted
                                        name in the education sector.
                                    </p>
                                    <button class="moreless-button font-[600] text-white text-sm mt-1">Read
                                        more...</button>
                                </div>
                            </li>

                            <li
                                class=" sm:flex items-start gap-2 mb-4 border-[1px] border-gray-300 p-3 rounded-[8px] bg-blue-main">
                                <div class="text-center sm:w-[30%] w-[90%]">
                                    <img src="./assets/images/Ms. Priya Sharma.png" alt=""
                                        class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px] ">
                                    <h2 class="font-[700] text-[16px] text-gray-100">Mother of Kridha Dev
                                        <br> Class - 3 A
                                    </h2>
                                </div>
                                <div class="sm:w-[60%] w-[90%] sm:mt-0 mt-3  sm:text-left text-center">
                                    <p
                                        class="testimonial-text text-[16px] text-gray-200 text-center sm:text-left clamp-2">
                                        Time management is very important, when you manage your time, you
                                        achieve anything
                                    </p>
                                    <button class="moreless-button font-[600] text-white text-sm mt-1">Read
                                        more...</button>
                                </div>
                            </li>

                            <li
                                class=" sm:flex items-start gap-2 mb-4 border-[1px] border-gray-300 p-3 rounded-[8px] bg-blue-main">
                                <div class="text-center sm:w-[30%] w-[90%]">
                                    <img src="./assets/images/Mother of Trishika.png" alt=""
                                        class="mb-2 mx-auto rounded-[10px] w-[130px] h-[130px] ">
                                    <h2 class="font-[700] text-[16px] text-gray-100">Mother of Kridha Dev
                                        <br> Class - 1 C
                                    </h2>
                                </div>
                                <div class="sm:w-[60%] w-[90%] sm:mt-0 mt-3  sm:text-left text-center">
                                    <p
                                        class="testimonial-text text-[16px] text-gray-200 text-center sm:text-left clamp-2">
                                        The various clubs sports events and competitions help in the overall
                                        development of children
                                    </p>
                                    <button class="moreless-button font-[600] text-white text-sm mt-1">Read
                                        more...</button>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>

                <!-- <div id="tab-2" class="tab-content Testimonials2">
                    <div class=" overflow-hidden mt-1" data-glide-el="track">
                        <ul class="glide__slides">
                            <li class="mb-4">
                                <div class="video-container">
                                    NOT PROVIDED
                                </div>
                            </li>

                        </ul>
                    </div>
                </div> -->
            </div>
        </div>


    </div>
    </div>
    </div>



    <div class="relative mt-8 mb-10">

        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <div class="text-center">
                <h2 class="text-[28px] sm:text-[32px] font-[700] leading-10  text-blue-main relative">Images
                </h2>
            </div>
            <div class="relative Images sm:pt-5 pt-2  opne-hide-circle">
                <!-- Slides -->
                <div class="overflow-hidden mt-1" data-glide-el="track">
                    <ul
                        class="relative w-full overflow-hidden p-0 pb-5 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                        <li class="mb-4">
                            <div class="flex">
                                <div><img src="./assets/images/i1.png" alt="Image 1"></div>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="flex">
                                <div><img src="./assets/images/i2.png" alt="Image 4"></div>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="flex">
                                <div><img src="./assets/images/i3.png" alt="Image 6"></div>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="flex">
                                <div><img src="./assets/images/i4.png" alt="Image 7"></div>
                            </div>
                        </li>
                        <li class="mb-4">
                            <div class="flex">
                                <div><img src="./assets/images/i5.png" alt="Image 7"></div>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Controls -->
                <div class="absolute left-0 md:flex hidden items-center justify-between w-full h-0 px-4 top-1/2 hide-circle"
                    data-glide-el="controls">
                    <button
                        class="inline-flex items-center justify-center hover:bg-[#FED72B]  relative right-[66px] hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir="<" aria-label="prev slide">
                        <i class="fa-solid fa-angle-left"></i>
                    </button>
                    <button
                        class="inline-flex items-center justify-center hover:bg-[#FED72B]  relative left-[66px] hover:text-white w-8 h-8 transition duration-300 border rounded-full lg:w-10 lg:h-10 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20"
                        data-glide-dir=">" aria-label="next slide">
                        <i class="fa-solid fa-angle-right"></i>
                    </button>
                </div>

                <!-- <div class="absolute bottom-0 md:flex hidden items-center justify-center w-full gap-2 hidden"
                    data-glide-el="controls[nav]">
                    <button class=" group" data-glide-dir="=0" aria-label="goto slide 1"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                    <button class=" group" data-glide-dir="=1" aria-label="goto slide 2"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-non2"></span></button>
                    <button class=" group" data-glide-dir="=2" aria-label="goto slide 3"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                    <button class=" group" data-glide-dir="=3" aria-label="goto slide 4"><span
                            class="block w-[10px] h-[10px] transition-colors duration-300 rounded-full bg-gray-300 focus:outline-none"></span></button>
                </div> -->
                <div class="text-center mt-3">
                    <a href="photo-gallery.php"
                        class="text-[16px]font-[600] rounded-[20px] p-[5px] px-4 border-[1px] border-blue-main  hover:bg-[#005224] hover:text-white hover:boder-[#FED72B]">View
                        All</a>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>


    </div>

    <?php include "includes/foot.php" ?>

    <script>
    window.addEventListener('load', () => {
        document.getElementById('formOverlay').classList.remove('hidden');
    });

    document.getElementById('dismissPopup').addEventListener('click', () => {
        document.getElementById('formOverlay').classList.add('hidden');
    });
    </script>
    <script>
    $('.moreless-button').click(function() {
        const moreText = $(this).siblings('.moretext');
        moreText.slideToggle();

        if ($(this).text() == "Read more...") {
            $(this).text("Read less");
        } else {
            $(this).text("Read more...");
        }
    });
    </script>
    <script>
    var Images = new Glide('.Images', {
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
    Images.mount();

    var Videos = new Glide('.videos', {
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
    Videos.mount();
    </script>

    <script>
    $(document).ready(function() {
        var imgPopup = $('.img-popup');
        var popupImage = $('.img-popup img');
        var closeBtn = $('.close-btn');

        // Open on image click
        $('.popup-img').on('click', function() {
            var img_src = $(this).attr('src');
            popupImage.attr('src', img_src);
            imgPopup.addClass('opened');
        });

        // Close popup
        imgPopup.on('click', function() {
            imgPopup.removeClass('opened');
            popupImage.attr('src', '');
        });

        closeBtn.on('click', function() {
            imgPopup.removeClass('opened');
            popupImage.attr('src', '');
        });

        popupImage.on('click', function(e) {
            e.stopPropagation();
        });

        // ESC key to close
        $(document).on('keydown', function(e) {
            if (e.key === "Escape") {
                imgPopup.removeClass('opened');
                popupImage.attr('src', '');
            }
        });
    });
    </script>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        new Swiper(".mySwiper", {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    });
    </script>

</body>

</html>