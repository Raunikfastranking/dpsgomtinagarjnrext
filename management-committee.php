<?php
include "includes/apis.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title><?= $management_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $management_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $management_data['data']['meta_keywords'] ?? "" ?>">
</head>

<body>

    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-center flex items-center text-center h-[300px]  brud-image">
            <div>
                <h1
                    class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    <?= strip_tags($management_data['data']['sections'][0]['content_heading']) ?? "" ?>
                </h1>
            </div>

            <div class="md:w-[100%]">
                <h2
                    class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    <?= strip_tags($management_data['data']['sections'][0]['content_heading']) ?? "" ?>
                </h2>
            </div>
        </div>

        <div class="flex m-5 overflow-x-auto" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse ol-overflow">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-[10px] sm:text-[16px] font-medium text-blue-main">
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
                        <p class="ms-1 text-[10px] sm:text-[16px] font-medium text-blue-main">About Us
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
                        <p class="ms-1 text-[10px] sm:text-[16px] font-medium text-blue-main">Leadership Team
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
                        <a href="management-committee" class="ms-1 text-[10px] sm:text-[16px] font-medium text-blue-main"> <?= strip_tags($management_data['data']['sections'][0]['content_heading']) ?? "" ?></a>
                    </div>
                </li>
            </ol>
        </div>
        <div class="mt-8 mx-3 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-3">
            <div class="sm:mt-10 relative">
                <div>
                    <div class="md:w-[100%]">
                        <div class="relative overflow-x-auto sm:rounded-lg my-5">
                            <div class="p-6">
                            <?php 
                            foreach (array_slice($management_data['data']['sections'], 1) as $data) {
                            ?>    
                             <?= $data['content'] ?? "" ?>
                              
                            <?php } ?>
                            
                             <!-- <div>
                                    <h2 class="text-xl font-bold mb-4 text-center ">Delhi Public School, Gomti Nagar Extn.,
                                        Lucknow</h2>
                                    <h3 class="text-lg font-semibold mb-2 text-center">School Management Committee Details
                                    </h3>
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full border-collapse border border-gray-200 mt-5">
                                            <thead>
                                                <tr>
                                                    <th class="border border-gray-200 px-4 py-2 text-left">S. No.</th>
                                                    <th class="border border-gray-200 px-4 py-2 text-left">MEMBERS NAME</th>
                                                    <th class="border border-gray-200 px-4 py-2 text-left">FATHER / SPOUSE NAME
                                                    </th>
                                                    <th class="border border-gray-200 px-4 py-2 text-left">DESIGNATION IN SMC
                                                    </th>
                                                    <th class="border border-gray-200 px-4 py-2 text-left">CONTACT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">1</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. MUKHTARUL AMIN</td>
                                                    <td class="border border-gray-200 px-4 py-2">LATE CHOUDHARY EHSAN KARIM</td>
                                                    <td class="border border-gray-200 px-4 py-2">PRESIDENT</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">2</td>
                                                    <td class="border border-gray-200 px-4 py-2">MRS. NAUSHEEN SHADAB</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. SHADAB</td>
                                                    <td class="border border-gray-200 px-4 py-2">MEMBER</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">3</td>
                                                    <td class="border border-gray-200 px-4 py-2">MRS. RUPAM SALUJA</td>
                                                    <td class="border border-gray-200 px-4 py-2">DR. PRITPAL SINGH SALUJA</td>
                                                    <td class="border border-gray-200 px-4 py-2">PRINCIPAL / SECRETARY</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">4</td>
                                                    <td class="border border-gray-200 px-4 py-2">MRS. POONAM ARORA</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. A. ARORA</td>
                                                    <td class="border border-gray-200 px-4 py-2">PRINCIPAL (ALLEN HOUSE
                                                        VRINDAVAN)</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">5</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. BARBARA AINBOSI</td>
                                                    <td class="border border-gray-200 px-4 py-2">LATE T. AINBOSI</td>
                                                    <td class="border border-gray-200 px-4 py-2">VICE-PRINCIPAL - DPS GOMTI
                                                        NAGAR</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">6</td>
                                                    <td class="border border-gray-200 px-4 py-2">MRS. VARINDER KAUR</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. HARPREET SINGH</td>
                                                    <td class="border border-gray-200 px-4 py-2">SR. HEADMISTRESS</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">7</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. PARUL GUPTA</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. SHISHIR GUPTA</td>
                                                    <td class="border border-gray-200 px-4 py-2">MEMBER (PARENT)</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">8</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. NUZHAT FATIMA</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. SYED NAVED AHMAD</td>
                                                    <td class="border border-gray-200 px-4 py-2">MEMBER (PARENT)</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">9</td>
                                                    <td class="border border-gray-200 px-4 py-2">DIOS</td>
                                                    <td class="border border-gray-200 px-4 py-2">NA</td>
                                                    <td class="border border-gray-200 px-4 py-2">MEMBER (GOVT. BODY)</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">10</td>
                                                    <td class="border border-gray-200 px-4 py-2">DR. AKANSHA SRIVASTAVA</td>
                                                    <td class="border border-gray-200 px-4 py-2">DR. ASHUTOSH SRIVASTAVA</td>
                                                    <td class="border border-gray-200 px-4 py-2">SCHOOL COUNSELLOR</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">11</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. NEERAJ KUMAR</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. MANJU SRIVASTAVA</td>
                                                    <td class="border border-gray-200 px-4 py-2">PET</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">12</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. KIRAN BAJPAI</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. KAMLESH BAJPAI</td>
                                                    <td class="border border-gray-200 px-4 py-2">PET</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">13</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. PURNIMA SAXENA</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. AMIT KUMAR SAXENA</td>
                                                    <td class="border border-gray-200 px-4 py-2">SCHOOL LIBRARIAN</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> -->
                                <!-- Second Table (Identical to First Table) -->
                                <!-- <div>
                                    <h3 class="text-lg font-semibold mb-2 mt-5 text-center">School Management Committee
                                        Details </h3>
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full border-collapse border border-gray-200">
                                            <thead>
                                                <tr>
                                                    <th class="border border-gray-200 px-4 py-2 text-left">S. No.</th>
                                                    <th class="border border-gray-200 px-4 py-2 text-left">MEMBERS NAME</th>
                                                    <th class="border border-gray-200 px-4 py-2 text-left">FATHER / SPOUSE NAME
                                                    </th>
                                                    <th class="border border-gray-200 px-4 py-2 text-left">DESIGNATION IN SMC
                                                    </th>
                                                    <th class="border border-gray-200 px-4 py-2 text-left">CONTACT</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">1</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. MUKHTARUL AMIN</td>
                                                    <td class="border border-gray-200 px-4 py-2">LATE CHOUDHARY EHSAN KARIM</td>
                                                    <td class="border border-gray-200 px-4 py-2">PRESIDENT</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">2</td>
                                                    <td class="border border-gray-200 px-4 py-2">MRS. NAUSHEEN SHADAB</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. SHADAB</td>
                                                    <td class="border border-gray-200 px-4 py-2">MEMBER</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">3</td>
                                                    <td class="border border-gray-200 px-4 py-2">MRS. RUPAM SALUJA</td>
                                                    <td class="border border-gray-200 px-4 py-2">DR. PRITPAL SINGH SALUJA</td>
                                                    <td class="border border-gray-200 px-4 py-2">PRINCIPAL / SECRETARY</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">4</td>
                                                    <td class="border border-gray-200 px-4 py-2">MRS. POONAM ARORA</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. A. ARORA</td>
                                                    <td class="border border-gray-200 px-4 py-2">PRINCIPAL (ALLEN HOUSE
                                                        VRINDAVAN)</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">5</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. BARBARA AINBOSI</td>
                                                    <td class="border border-gray-200 px-4 py-2">LATE T. AINBOSI</td>
                                                    <td class="border border-gray-200 px-4 py-2">VICE-PRINCIPAL - DPS GOMTI
                                                        NAGAR</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">6</td>
                                                    <td class="border border-gray-200 px-4 py-2">MRS. VARINDER KAUR</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. HARPREET SINGH</td>
                                                    <td class="border border-gray-200 px-4 py-2">SR. HEADMISTRESS</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">7</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. PARUL GUPTA</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. SHISHIR GUPTA</td>
                                                    <td class="border border-gray-200 px-4 py-2">MEMBER (PARENT)</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">8</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. NUZHAT FATIMA</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. SYED NAVED AHMAD</td>
                                                    <td class="border border-gray-200 px-4 py-2">MEMBER (PARENT)</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">9</td>
                                                    <td class="border border-gray-200 px-4 py-2">DIOS</td>
                                                    <td class="border border-gray-200 px-4 py-2">NA</td>
                                                    <td class="border border-gray-200 px-4 py-2">MEMBER (GOVT. BODY)</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">10</td>
                                                    <td class="border border-gray-200 px-4 py-2">DR. AKANSHA SRIVASTAVA</td>
                                                    <td class="border border-gray-200 px-4 py-2">DR. ASHUTOSH SRIVASTAVA</td>
                                                    <td class="border border-gray-200 px-4 py-2">SCHOOL COUNSELLOR</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">11</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. NEERAJ KUMAR</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. MANJU SRIVASTAVA</td>
                                                    <td class="border border-gray-200 px-4 py-2">PET</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">12</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. KIRAN BAJPAI</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. KAMLESH BAJPAI</td>
                                                    <td class="border border-gray-200 px-4 py-2">PET</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">13</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. PURNIMA SAXENA</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. AMIT KUMAR SAXENA</td>
                                                    <td class="border border-gray-200 px-4 py-2">SCHOOL LIBRARIAN</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> -->

                                <!-- Third Table -->
                                <!-- <div>
                                    <h3 class="text-lg font-semibold mb-2 text-center mt-5">School Management Committee
                                        Details </h3>
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full border-collapse border border-gray-200">
                                            <thead>
                                                <tr>
                                                    <th class="border border-gray-200 px-4 py-2 text-left">S. No.</th>
                                                    <th class="border border-gray-200 px-4 py-2 text-left">Member Name</th>
                                                    <th class="border border-gray-200 px-4 py-2 text-left">Designation in SMC
                                                    </th>
                                                    <th class="border border-gray-200 px-4 py-2 text-left">Phone</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">1</td>
                                                    <td class="border border-gray-200 px-4 py-2">MR. MUKHTARUL AMIN</td>
                                                    <td class="border border-gray-200 px-4 py-2">PRESIDENT</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">2</td>
                                                    <td class="border border-gray-200 px-4 py-2">MRS. NAUSHEEN SHADAB</td>
                                                    <td class="border border-gray-200 px-4 py-2">MEMBER</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">3</td>
                                                    <td class="border border-gray-200 px-4 py-2">DIOS</td>
                                                    <td class="border border-gray-200 px-4 py-2">MEMBER (GOVT. BODY)</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">4</td>
                                                    <td class="border border-gray-200 px-4 py-2">MRS. SMITA SINGH</td>
                                                    <td class="border border-gray-200 px-4 py-2">MEMBER (PARENT)</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">5</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. VARINDER KAUR</td>
                                                    <td class="border border-gray-200 px-4 py-2">SR. HEADMISTRESS</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">6</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. BARBARA AINBOSI</td>
                                                    <td class="border border-gray-200 px-4 py-2">VICE-PRINCIPAL - DPS GOMTI
                                                        NAGAR</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">7</td>
                                                    <td class="border border-gray-200 px-4 py-2">MRS. RUPAM SALUJA</td>
                                                    <td class="border border-gray-200 px-4 py-2">PRINCIPAL / SECRETARY</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">8</td>
                                                    <td class="border border-gray-200 px-4 py-2">MRS. KIRAN BAJPAI</td>
                                                    <td class="border border-gray-200 px-4 py-2">PET</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                                <tr>
                                                    <td class="border border-gray-200 px-4 py-2">9</td>
                                                    <td class="border border-gray-200 px-4 py-2">MS. POONAM ARORA</td>
                                                    <td class="border border-gray-200 px-4 py-2">PRINCIPAL (ALLEN HOUSE
                                                        VRINDAVAN)</td>
                                                    <td class="border border-gray-200 px-4 py-2">-</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>
    <?php include "includes/foot.php" ?>

</body>

</html>