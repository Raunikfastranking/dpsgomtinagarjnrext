<?php
include "includes/apis.php";
// print_r($process_page_data);

// ✅ FIX: Correct data path — items are inside sections[1]['resolved_content']['items']
$processItems = $process_page_data['data']['sections'][1]['resolved_content']['items'] ?? [];

// ✅ Extra safety: sort by "Step N" number in case API returns reverse order
usort($processItems, function ($a, $b) {
    preg_match('/Step\s+(\d+)/i', $a['title'] ?? '', $aMatch);
    preg_match('/Step\s+(\d+)/i', $b['title'] ?? '', $bMatch);
    return (int)($aMatch[1] ?? 999) - (int)($bMatch[1] ?? 999);
});

$totalSteps = count($processItems);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title><?= $process_page_data['data']['title'] ?? "" ?></title>
    <meta name="description" content="<?= $process_page_data['data']['meta_description'] ?? "" ?>">
    <meta name="keywords" content="<?= $process_page_data['data']['meta_keywords'] ?? "" ?>">
</head>
<style>
    html, body {
        max-width: 100%;
        overflow-x: hidden;
    }

    [data-tab-content="step-4"] {
        max-width: 100%;
        overflow-x: hidden;
        overflow-y: visible;
    }

    [data-tab-content="step-4"] table {
        display: block;
        max-width: 100%;
        width: max-content;
        min-width: 100%;
        overflow-x: auto;
        overflow-y: hidden;
        -webkit-overflow-scrolling: touch;
        overscroll-behavior-x: contain;
    }

    [data-tab-content="step-4"] th,
    [data-tab-content="step-4"] td {
        white-space: nowrap;
    }

    .customSelect {
        position: relative !important;
        overflow: visible !important;
    }

    @media (max-width: 767px) {
        .mt-10.flex.justify-center.p-8.bg-\[\#003618\].overflow-x-auto {
            justify-content: flex-start !important;
            padding-left: 16px !important;
            padding-right: 80px !important;
            overflow-x: auto !important;
            -webkit-overflow-scrolling: touch !important;
            overscroll-behavior-x: none !important;
            scrollbar-width: thin;
        }

        #tab-buttons {
            justify-content: flex-start !important;
            gap: 12px !important;
        }

        .tab-btn {
            padding: 8px 16px !important;
            font-size: 14px !important;
            white-space: nowrap;
            flex: 0 0 auto !important;
        }
    }
</style>

<body>

    <?php include "includes/header.php"; ?>

    <div class="main relative">
        <div class="bg-center flex items-center text-center h-[300px] brud-image">
            <div>
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    Process
                </h1>
            </div>
            <div class="md:w-[100%]">
                <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Process
                </h1>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse ol-overflow">
                <li class="inline-flex items-center">
                    <a href="/" class="inline-flex items-center text-[10px] sm:text-[16px] font-medium text-blue-main">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-[10px] sm:text-[16px] font-medium text-blue-main">Admission</p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-[10px] sm:text-[16px] font-medium text-blue-main">Admission Overview</p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="process" class="ms-1 text-[10px] sm:text-[16px] font-medium text-blue-main">Process</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 mx-3 sm:py-10 py-0 sm:p-20 p-0 space-y-10 text-gray-600">
            <div>
                <?= $process_page_data['data']['sections'][1]['content'] ?? "" ?>
            </div>

            <div class="mt-10 flex sm:justify-center p-8 bg-[#003618] bg-no-repeat md:h-[140px] overflow-x-auto">
                <ul class="flex gap-8 items-center justify-center" id="tab-buttons">
                    <?php for ($i = 1; $i <= $totalSteps; $i++): ?>
                        <li class="tab-btn <?= $i === 1 ? 'active' : '' ?> text-[#fff] border-[1px] border-[#fff] p-[8px] px-6 cursor-pointer whitespace-nowrap rounded-[5px]"
                            data-tab="step-<?= $i ?>">Step <?= $i ?></li>
                    <?php endfor; ?>
                </ul>
            </div>

            <?php for ($i = 0; $i < $totalSteps; $i++): ?>
                <!-- Step <?= $i + 1 ?> -->
                <div class="tab-content <?= $i === 0 ? '' : 'hidden' ?>" data-tab-content="step-<?= $i + 1 ?>">
                    <?= $processItems[$i]['title'] ?? "" ?>
                    <?= $processItems[$i]['content'] ?? "" ?>

                    <?php if ($i === 1): // Step 2 ke saath form ?>
                        <div class="sm:mt-20 mt-10 mx-4 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4">
                            <div class="relative">
                                <div class="mt-10">
                                    <style>
                                        /* ExtraaEdge enquiry widget — single column, taller inputs, spacing */
                                        #ee-form-18 .ee-form-widget .ee-form-body {
                                            display: block !important;
                                        }
                                        #ee-form-18 .ee-form-widget .ee-form-body .ee-row {
                                            width: 100% !important;
                                            margin-right: 0 !important;
                                            margin-left: 0 !important;
                                            margin-bottom: 18px;
                                        }
                                        #ee-form-18 .ee-form-widget input:not([type=checkbox]):not([type=radio]):not([type=search]):not([type=tel]),
                                        #ee-form-18 .ee-form-widget select {
                                            height: 48px !important;
                                            padding: 10px 12px !important;
                                        }
                                        #ee-form-18 .ee-form-widget .iti input[type=tel] {
                                            height: 48px !important;
                                            padding-top: 10px !important;
                                            padding-bottom: 10px !important;
                                        }
                                        #ee-form-18 .ee-form-widget .iti--separate-dial-code input[type=tel],
                                        #ee-form-18 .ee-form-widget .iti--separate-dial-code input[type=text] {
                                            padding-left: 96px;
                                        }
                                        #ee-form-18 .ee-form-widget .select2-container .select2-selection--single {
                                            height: 48px !important;
                                            padding: 10px 12px !important;
                                            border: 1px solid var(--ee-border-color) !important;
                                            border-radius: 4px;
                                            display: flex;
                                            align-items: center;
                                        }
                                        #ee-form-18 .ee-form-widget .select2-selection--single .select2-selection__rendered {
                                            line-height: normal !important;
                                            padding: 0 !important;
                                        }
                                        #ee-form-18 .ee-form-widget .select2-selection--single .select2-selection__arrow {
                                            height: 46px !important;
                                        }
                                        #ee-form-18 .ee-form-widget .ee-form-heading {
                                            display: none;
                                        }
                                        #ee-form-18 .ee-form-widget .btnContainer {
                                            display: block;
                                        }
                                        #ee-form-18 .ee-form-widget .btn.btn-submit {
                                            width: 100%;
                                            padding: 14px;
                                            font-size: 16px;
                                            font-weight: 600;
                                            border-radius: 4px;
                                            background-color: #005224 !important;
                                            border-color: #005224 !important;
                                        }
                                        #ee-form-18 .ee-form-widget .btn.btn-submit:hover {
                                            background-color: #003618 !important;
                                            border-color: #003618 !important;
                                        }
                                    </style>
                                    <div id="ee-form-18"></div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endfor; ?>
        </div>

        <?php include "includes/footer.php" ?>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // ── Tab switching ───────────────────────────────────────────
        const tabButtons = document.querySelectorAll(".tab-btn");
        const tabContents = document.querySelectorAll(".tab-content");
        tabButtons.forEach(button => {
            button.addEventListener("click", function () {
                tabButtons.forEach(btn => btn.classList.remove("active"));
                tabContents.forEach(content => content.classList.add("hidden"));
                this.classList.add("active");
                const target = this.getAttribute("data-tab");
                document.querySelector(`[data-tab-content="${target}"]`).classList.remove("hidden");
            });
        });
    });
    </script>

    <script>
        // ==================== EXTRAAEDGE ENQUIRY FORM WIDGET ====================
        window.addEventListener("DOMContentLoaded", function() {
            window.ee_form_widget_baseurl = "https://eeconfigstaticfiles.blob.core.windows.net/staticfiles/ee-form-widget/";
            if (!document.getElementById("__formWidgetCss")) {
                var e = document.createElement("link");
                e.id = "__formWidgetCss";
                e.rel = "stylesheet";
                e.href = window.ee_form_widget_baseurl + "css/stylesheet.min.css";
                e.type = "text/css";
                document.getElementsByTagName("head")[0].appendChild(e);
            }
            var t = document.createElement("script");
            t.type = "text/javascript";
            t.onload = async function() {
                _eeFormWidget = new eeFormWidget;
                await _eeFormWidget.init("superhouseeducation", "form-18", "ee-form-18");
            };
            t.src = window.ee_form_widget_baseurl + "js/eeFormWidget.min.js";
            document.getElementsByTagName("head")[0].appendChild(t);
        });
    </script>

    <?php include "includes/foot.php" ?>
</body>
</html>