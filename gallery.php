<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title>DPS Gomtinagar Jnr. | About Us</title>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
<div class="px-6 py-10 max-w-6xl mx-auto">
    <h1 class="text-3xl font-bold text-blue-main mb-6">Gallery</h1>

    <div class="mb-8">
        <h2 class="text-2xl  text-blue-main font-semibold mb-2">1. Inter House</h2>
        <ul class="list-disc ml-6">
            <li>Co-curricular</li>
            <li>Sports</li>
        </ul>
    </div>

    <div class="mb-8">
        <h2 class="text-2xl  text-blue-main font-semibold mb-2">2. Club Activities</h2>
    </div>

    <div class="mb-8">
        <h2 class="text-2xl  text-blue-main font-semibold mb-2">3. Assembly</h2>
        <ul class="list-disc ml-6">
            <li>Class Assembly</li>
            <li>Special Assembly</li>
        </ul>
    </div>

    <div class="mb-8">
        <h2 class="text-2xl  text-blue-main font-semibold mb-2">4. Alumni Connect</h2>
    </div>

    <div class="mb-8">
        <h2 class="text-2xl  text-blue-main font-semibold mb-2">5. Sports</h2>
        <ul class="list-disc ml-6">
            <li>Inter-School</li>
            <li>District</li>
            <li>State</li>
            <li>National</li>
        </ul>
    </div>

    <div class="mb-8">
        <h2 class="text-2xl  text-blue-main font-semibold mb-2">6. Inter-School Events</h2>
        <ul class="list-disc ml-6">
            <li>Co-Scholastic</li>
            <li>Scholastic</li>
        </ul>
    </div>

    <div class="mb-8">
        <h2 class="text-2xl  text-blue-main font-semibold mb-2">7. Capacity Development Programme</h2>
        <p class="mb-4">
            <strong>DPSS – Human Resource Development Council</strong> – At Delhi Public School Bareilly, we are proud to be a part of the Delhi Public School Society (DPSS), which is known for its commitment to excellence in education. One of the key pillars of this commitment is the DPSS Training Programs—designed to continually upgrade the skills, knowledge, and mindset of educators and school leaders across all DPS institutions.
        </p>
        <p class="mb-4">
            DPSS believes that great teachers build great futures. Its training programs aim to create reflective, innovative, and effective educators who can inspire and guide students in a dynamic learning environment.
        </p>
        <ul class="list-disc ml-6">
            <li><strong>CBSE:</strong> At Delhi Public School Bareilly, we believe that continuous professional growth is the key to delivering quality education. In alignment with the vision of the Central Board of Secondary Education (CBSE), our school regularly conducts and participates in structured CBSE Training Programs that equip our educators with the skills, methodologies, and perspectives needed in today’s dynamic academic environment.</li>
            <li><strong>Superhouse Education Foundation:</strong> Lays the foundation for various training programs for the school teachers which enhances their ability to deliver as per the requirements of the academics at various levels.</li>
            <li><strong>Debriefing Sessions:</strong> All the educators being trained conduct in-house sessions in school for all the teachers to impart their learnings and share all relevant details. This helps in uniformity of instructions and workings for all staff members.</li>
        </ul>
    </div>

    <div class="mb-8">
        <h2 class="text-2xl  text-blue-main font-semibold mb-2">8. School Publications</h2>
        <p class="mb-2"><a class="text-blue-600 underline" href="https://dpskalyanpur.com/Site/DocumentAndInformation/160000001_160000008_160000059_Home-Magazine,NEWSLetterandMUSE" target="_blank" rel="noopener noreferrer">View Publications</a></p>
        <ul class="list-disc ml-6">
            <li>Newsletter - Gazette</li>
        </ul>
    </div>
</div>

    </div>

    <?php include "includes/footer.php" ?>
    </div>
    <?php include "includes/foot.php" ?>
    <script>
        $('.moreless-button').click(function() {
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