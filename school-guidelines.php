<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include "includes/head.php" ?>
  <title><?= $school_data['data']['title'] ?? "" ?></title>
  <meta name="description" content="<?= $school_data['data']['meta_description'] ?? "" ?>">
  <meta name="keywords" content="<?= $school_data['data']['meta_keywords'] ?? "" ?>">
</head>

<body>

  <?php include "includes/header.php" ?>

  <div class="main relative">
    <div class="bg-center flex items-center text-center h-[300px] brud-image">
      <div>
        <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
          <?= strip_tags($school_data['data']['sections'][0]['content_heading']) ?? "" ?>
        </h1>
      </div>

      <div class="md:w-[100%]">
        <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
          <?= strip_tags($school_data['data']['sections'][0]['content_heading']) ?? "" ?>
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
            <a href="school-guidelines" class="ms-1 text-sm font-medium text-blue-main"> <?= strip_tags($school_data['data']['sections'][0]['content_heading']) ?? "" ?></a>
          </div>
        </li>
      </ol>
    </div>

    <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 sm:py-10 py-0 sm:p-20 p-0 space-y-6 text-gray-600">

      <?= $school_data['data']['sections'][1]['content'] ?? "" ?>



      <!-- <div class="p-5">
    <h2 class="text-[18px] font-semibold mb-3">2. UNIFORM & PERSONAL APPEARANCE</h2>
    <ul class="list-disc ml-6 space-y-1">
      <li><strong>Dress Code:</strong> Students must wear the prescribed school uniform and maintain neatness and tidiness at all times.</li>
      <li><strong>Almanac:</strong> Every student should carry the school almanac daily, complete with their photograph and necessary details.</li>
    </ul>
  </div>
 
  <div class=" p-5">
    <h2 class="text-[18px] font-semibold mb-3">3. ACADEMIC INTEGRITY & PROPERTY RESPECT</h2>
    <ul class="list-disc ml-6 space-y-1">
      <li><strong>Academic Honesty:</strong> Students are expected to uphold academic integrity and avoid any form of dishonesty.</li>
      <li><strong>Respect for Property:</strong> School property must be treated with care. Any damage will be charged to the responsible student.</li>
    </ul>
  </div>

 
  <div class=" p-5">
    <h2 class="text-[18px] font-semibold mb-3">4. TRANSPORT & ATTENDANCE</h2>
    <ul class="list-disc ml-6 space-y-1">
      <li><strong>Transport Rules:</strong> Students using school transport must adhere to the rules and maintain decorum during transit.</li>
      <li><strong>Attendance:</strong> Regular attendance is mandatory. Leave applications must be submitted in advance, except in emergencies.</li>
    </ul>
  </div>
 
  <div class=" p-5">
    <h2 class="text-[18px] font-semibold mb-3">5. PARENTAL INVOLVEMENT</h2>
    <ul class="list-disc ml-6 space-y-1">
      <li><strong>Communication:</strong> Parents are encouraged to maintain regular communication with teachers and attend Parent-Teacher Meetings (PTMs) to stay informed about their child’s progress.</li>
      <li><strong>Support:</strong> Parental support in enforcing school rules and guidelines at home is crucial for the holistic development of students.</li>
    </ul>
  </div>   -->
    </div>



    <!-- Toggle Accordion Script -->
    <script>
      function toggleAccordion(id) {
        const panel = document.getElementById(id);
        panel.classList.toggle("hidden");
      }
    </script>


    <?php include "includes/footer.php" ?>
  </div>
  <?php include "includes/foot.php" ?>
 
</body>

</html>