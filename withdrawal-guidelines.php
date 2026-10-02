<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DPS Gomtinagar Jnr. | Coding</title>
    <?php include "includes/head.php" ?>
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative sm:top-[20px] mb-[40px] sm:mb-[120px] mx-0 sm:mx-2">
        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <div class="sm:mt-10 relative">

                <h1
                    class="text-[32px] sm:hidden block font-[700] text-blue-main uppercase text-center mb-5 sm:mb-8 hr-line relative leading-9">
                    Coding
                    <span class="sm:hidden"> <br></span> Academy
                </h1>
                <div>

                    <div class="md:w-[100%]">
                        <h1
                            class="sm:text-[32px] sm:block hidden font-[700] text-blue-main uppercase text-center sm:mb-1 hr-line relative leading-9">
                            Coding
                            <span class="sm:hidden"></span> Academy
                        </h1>

                        <div class="mt-10 text-justify">
                            <p>Robotics is an interdisciplinary field that integrates computer science and engineering. The goal of robotics is to design machines that can help and assist humans. Robotics integrates fields of mechanical engineering, electrical engineering, information engineering, mechatronics, electronics, bioengineering, computer engineering, control engineering, software engineering, among others.</p>
                            <p class="mt-2">Allen Robotics Academy provides the exposure to informal science education, which is an inspirational and hands-on learning in today’s technology-driven world. It’s important now more than ever to prepare students for the future. Teaching robotics to young students throughout their schooling can increase their ability to be creative and innovative thinkers and more productive members of society. By teaching our students the basics of robotics, we can open a whole new world to them and exciting opportunities that they wouldn’t have access to otherwise.
                            </p>
                            <p class="mt-2">Allen Robotics Academy uses self-paced STEM Learning tool to motivate, inspire & engage students with interesting projects and activities. Students build various automated working mechanisms using building blocks program to create their masterpiece.</p>
                            <p class="mt-2">In order to be a responsible, educated and engaged citizen in the 21st century, one needs to understand the basics of Science, Technology, Engineering and Mathematics (STEM). We ensure that the future generation has strong STEM skills, both to fill workforce needs and to solve the complex problems of today's world.
                            </p>

                            <p class="text-[20px] font-[600] mt-3">PLAY & LEARN PROGRAMMING</p>
                            <p class="mt-2">An Easy & Exciting Platform for the young students for quick code- test & reiterate the code to achieve a desired mission in a play way method.</p>
                        <p class="mt-2">Coding is not syntax driven but driven by the logic and algorithm which naturally creates flow of thoughts in the student’s mind.</p>

                        <ul class="mt-2 ml-5 list-disc">
                     <li>   Drag & Drop Like Coding.</li>
<li>Configure a Virtual Robot</li>
<li>Games & Puzzles.</li>
<li>Physics Enabled Engine</li>
<li>3D Simulator</li>
<li>Custom Design</li>
</ul>

<p class="font-bold mt-2">ROBOTICS OFFERS</p>
<ul class="mt-2 ml-5 list-disc">
<li>Free Robox Kit for One Year</li>
<li>Rob Guru</li>
<li>Stem Based Classes</li>
</ul>
                        
<p class="mt-2">ROBOX is an excellent mean to develop useful life skills such as creativity and logical thinking. It immensely helps to sharpen ours innate skills by encouraging self-learning, experimenting, organizing, verifying, validating and recording results. It means ours teachers and parents will see a new you , a well-disciplined robotics artist with admirable time management skills. Hence, we are sure that no matter what- “A ROBOX student always has time to innovate” ."Components include blocks, motors, gears, sprockets, sensors, wheels etc., help the students put his/her idea into action by creatively constructing mechanical structures. Students learn various structural aspects while building creative mechanical structures with the given components”.</p>
<p class="mt-2">Robo Brain is a brick with a reprogrammable circuit which can be programmed through Roboguru Software. The programmed Robobrain can add intelligence to a mechanical structure to execute wide variety of tasks.</p>
<p class="mt-2">STEM is a curriculum based idea of educating students in four speciﬁc disciplines, namely, Science, Technology, Engineering and Mathematics in an interdisciplinary and Applied approach. Rather than teaching the four disciplines as separate and discrete subjects, Science Technology Engineering & Math skills.</p>
<p class="mt-2">RoboGuru is a 3D virtual robotics programming & simulation tool with physics enabled engine interesting games and challenging puzzles for the high school students Analytical and Problem-Solving skills helps one to evaluate the problem and to make decisions. A logical and methodical approach is best in some circumstances: for example, one will need to be able to draw on your academic or subject knowledge to identify solutions of a Robotic Model</p>
<p class="mt-2">Robotics at DPS, AmrapaliYojna,Dubagga, Lucknow emphasizes increasing teamwork skills such as giving and receiving support, communication and sharing. Teams with fewer interpersonal conflicts generally function more effectively than others.</p>
                        
                        
                        
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

    <script>
    function toggleAccordion(index) {
        const content = document.getElementById(`content-${index}`);
        const icon = document.getElementById(`icon-${index}`);

        // SVG for Minus icon
        const minusSVG = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" class="w-4 h-4">
        <path d="M3.75 7.25a.75.75 0 0 0 0 1.5h8.5a.75.75 0 0 0 0-1.5h-8.5Z" />
      </svg>
    `;

        // SVG for Plus icon
        const plusSVG = `
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="white" class="w-4 h-4">
        <path d="M8.75 3.75a.75.75 0 0 0-1.5 0v3.5h-3.5a.75.75 0 0 0 0 1.5h3.5v3.5a.75.75 0 0 0 1.5 0v-3.5h3.5a.75.75 0 0 0 0-1.5h-3.5v-3.5Z" />
      </svg>
    `;

        // Toggle the content's max-height for smooth opening and closing
        if (content.style.maxHeight && content.style.maxHeight !== '0px') {
            content.style.maxHeight = '0';
            icon.innerHTML = plusSVG;
        } else {
            content.style.maxHeight = content.scrollHeight + 'px';
            icon.innerHTML = minusSVG;
        }
    }
    </script>
</body>