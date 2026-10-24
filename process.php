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
                                <div id="AdmissionFormPopup" class="relative mt-5 bg-green-500 text-white px-4 py-2 rounded mb-5 hidden" style="z-index:999">
                                    Form submitted successfully!
                                </div>

                                <div class="mt-10">
                                    <form id="AdmissionForm" method="post">
                                        <div class="mt-4">
                                            <select name="session" required id="asession" class="w-full border border-gray-300 p-2 rounded-md text-gray-500">
                                                <option value="" disabled selected>Enquiry For Session 2027–2028</option>
                                                <?php
                                                $sessions = include "includes/session-api.php";
                                                if (is_array($sessions)):
                                                foreach ($sessions as $item):
                                                    $sess = $item['session'] ?? '';
                                                    if (empty($sess)) continue;
                                                ?>
                                                    <option value="<?= htmlspecialchars($sess) ?>"><?= htmlspecialchars($sess) ?></option>
                                                <?php endforeach; endif; ?>
                                            </select>
                                        </div>

                                        <div class="mt-4">
                                            <select name="board" required id="aboard" class="w-full border border-gray-300 p-2 rounded-md text-gray-500">
                                                <option value="" disabled selected>Loading boards...</option>
                                            </select>
                                            <span id="aboard-error" class="text-red-500 text-sm mt-1 hidden">Please select a board.</span>
                                        </div>

                                        <div class="mt-4">
                                            <select name="grade" id="agrade" required disabled class="w-full border border-gray-300 p-[11px] rounded-md text-[#808080cc] disabled:bg-gray-100">
                                                <option value="" disabled selected>Select Grade</option>
                                            </select>
                                            <span id="agrade-error" class="text-red-500 text-sm mt-1 hidden">Please select a grade.</span>
                                        </div>

                                        <div class="mt-4">
                                            <input type="text" name="student-name" id="astudent_name" placeholder="Student Name" class="w-full border border-gray-300 p-[11px] rounded-md outline-none" required>
                                            <span id="astudent-error" class="text-red-500 text-sm mt-1 hidden">Only letters and spaces allowed.</span>
                                        </div>

                                        <div class="mt-4">
                                            <input type="text" name="parent-name" id="aparent_name" placeholder="Parents Name" class="w-full border border-gray-300 p-[11px] rounded-md outline-none">
                                            <span id="aparent-error" class="text-red-500 text-sm mt-1 hidden">Only letters and spaces allowed.</span>
                                        </div>

                                        <div class="mt-4">
                                            <input type="text" name="mobile" id="amobile" placeholder="Mobile Number" maxlength="10" class="w-full border border-gray-300 p-[11px] rounded-md outline-none">
                                            <div id="amobile-error" class="text-red-500 text-sm mt-1 hidden">Valid 10-digit number starting with 6-9</div>
                                        </div>

                                        <div class="mt-4">
                                            <input type="text" name="email" id="aemail" placeholder="Email" class="w-full border border-gray-300 p-[11px] rounded-md outline-none">
                                            <span id="aemail-error" class="text-red-500 text-sm mt-1 hidden">Valid email required.</span>
                                        </div>

                                        <div class="mt-4 relative customSelect">
                                            <select id="acity" name="city" class="hidden">
                                                <option value="">Select City</option>
                                                <?php
                                                $cities = include 'includes/get-city.php';
                                                foreach ($cities as $city):
                                                    $ct = $city['name'] ?? '';
                                                    if (empty($ct)) continue;
                                                ?>
                                                    <option value="<?= htmlspecialchars($ct) ?>"><?= htmlspecialchars($ct) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <div id="city-trigger" class="border border-gray-300 p-[11px] rounded-md bg-white cursor-pointer flex justify-between items-center">
                                                <span class="selected-text text-[#808080cc]">Select City</span>
                                                <span class="text-[12px]">▼</span>
                                            </div>
                                            <div class="absolute mt-1 border border-gray-300 rounded-md bg-white shadow-lg hidden z-50 w-full overflow-hidden">
                                                <input type="text" id="city-search" placeholder="Search..." class="w-full p-2 border-b border-gray-300 outline-none sticky top-0 bg-white">
                                                <ul class="max-h-48 overflow-y-auto" id="city-list"></ul>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <input type="text" name="pincode" id="apincode" placeholder="Pincode" class="w-full border border-gray-300 p-[11px] rounded-md" maxlength="6" required>
                                            <span id="apincode-error" class="text-red-500 text-sm hidden">Enter valid 6-digit Pincode.</span>
                                        </div>

                                        <div class="mt-4 flex items-center gap-2">
                                            <input type="checkbox" id="terms" required>
                                            <label for="terms">I agree to <a href="termsandconditions" class="text-blue-500 underline">Terms and Conditions</a>.</label>
                                        </div>

                                        <input type="hidden" name="source" id="source">

                                        <div class="mt-4">
                                            <button type="submit" id="AsubmitBtn" class="p-4 bg-blue-main w-full text-white font-semibold text-[18px] rounded hover:bg-red-500 transition">
                                                Submit
                                            </button>
                                        </div>
                                    </form>
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

        // ── City Dropdown Logic ─────────────────────────────────────
        const cityWrapper = document.querySelector(".customSelect");
        const cityTrigger = document.getElementById("city-trigger");
        const cityDropdown = cityWrapper.querySelector(".absolute");
        const citySearch = document.getElementById("city-search");
        const cityList = document.getElementById("city-list");
        const citySelect = document.getElementById("acity");
        const cityDisplay = cityWrapper.querySelector(".selected-text");

        function loadCityOptions(filter = "") {
            cityList.innerHTML = "";
            const options = Array.from(citySelect.options);
            let found = false;

            options.forEach(opt => {
                if (opt.value !== "" && opt.text.toLowerCase().includes(filter.toLowerCase())) {
                    const li = document.createElement("li");
                    li.textContent = opt.text;
                    li.className = "p-2 hover:bg-gray-100 cursor-pointer border-b border-gray-50 text-gray-700";
                    li.addEventListener("click", (e) => {
                        e.stopPropagation();
                        citySelect.value = opt.value;
                        cityDisplay.textContent = opt.text;
                        cityDisplay.classList.replace("text-[#808080cc]", "text-black");
                        cityDropdown.classList.add("hidden");
                    });
                    cityList.appendChild(li);
                    found = true;
                }
            });
            if (!found) cityList.innerHTML = '<li class="p-2 text-gray-400 italic">No cities found</li>';
        }

        cityTrigger.addEventListener("click", (e) => {
            e.stopPropagation();
            const isHidden = cityDropdown.classList.contains("hidden");
            if (isHidden) {
                cityDropdown.classList.remove("hidden");
                loadCityOptions("");
                citySearch.value = "";
                setTimeout(() => citySearch.focus(), 50);
            } else {
                cityDropdown.classList.add("hidden");
            }
        });

        citySearch.addEventListener("click", (e) => e.stopPropagation());
        citySearch.addEventListener("input", (e) => loadCityOptions(e.target.value));
        document.addEventListener("click", () => cityDropdown.classList.add("hidden"));

        // ── API Logic (Boards/Grades) ──────────────────────────────
        const SCHOOL_ID = 1;
        const BRANCH_ID = 5;
        const boardSelect = document.getElementById("aboard");
        const gradeSelect = document.getElementById("agrade");

        async function loadBoards() {
            try {
                const res = await fetch('proxy/boards-proxy.php');
                const result = await res.json();
                const boards = result.data || result;
                boardSelect.innerHTML = '<option value="" disabled selected>Select Board</option>';
                boards.forEach(b => {
                    const opt = document.createElement("option");
                    opt.value = b.id || b.board_id;
                    opt.text = b.board_name || b.name;
                    boardSelect.appendChild(opt);
                });
            } catch (err) { console.error("Board error:", err); }
        }

        boardSelect.addEventListener("change", async function() {
            gradeSelect.disabled = true;
            gradeSelect.innerHTML = '<option value="" disabled selected>Loading...</option>';
            try {
                const res = await fetch(`proxy/selected-grades-proxy.php?board=${encodeURIComponent(this.value)}`);
                const result = await res.json();
                let grades = result.data || result;

                const gradeOrder = ['P.G. I', 'P.G. II', 'Nursery', 'Prep', 'I', 'II', 'III', 'IV'];
                grades.sort((a, b) => {
                    const nameA = a.grades || a.grade_name || a.name || a.grade || "";
                    const nameB = b.grades || b.grade_name || b.name || b.grade || "";
                    const indexA = gradeOrder.indexOf(nameA);
                    const indexB = gradeOrder.indexOf(nameB);
                    const posA = indexA === -1 ? 999 : indexA;
                    const posB = indexB === -1 ? 999 : indexB;
                    return posA - posB;
                });

                gradeSelect.innerHTML = '<option value="" disabled selected>Select Grade</option>';
                grades.forEach(g => {
                    const opt = document.createElement("option");
                    opt.value = g.id || g.grade_id;
                    opt.text = g.grades || g.name;
                    gradeSelect.appendChild(opt);
                });
                gradeSelect.disabled = false;
            } catch (err) { console.error("Grade error:", err); }
        });

        loadBoards();

        // ── Form Validation & Submit ───────────────────────────────
        const form = document.getElementById("AdmissionForm");
        const nameRegex = /^[A-Za-z\s]+$/;
        const mobileRegex = /^[6-9]\d{9}$/;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        form.addEventListener("submit", async function(e) {
            e.preventDefault();
            const btn = document.getElementById("AsubmitBtn");

            if (!mobileRegex.test(document.getElementById("amobile").value)) {
                alert("Please enter a valid mobile number.");
                return;
            }

            btn.disabled = true;
            btn.textContent = "Submitting...";

            const payload = {
                session: document.getElementById("asession").value,
                grade: gradeSelect.value,
                board: boardSelect.value,
                name: document.getElementById("astudent_name").value,
                parent_name: document.getElementById("aparent_name").value,
                phone: document.getElementById("amobile").value,
                email: document.getElementById("aemail").value,
                city: citySelect.value,
                pincode: document.getElementById("apincode").value,
                source: sessionStorage.getItem("leadSource") || "Website",
                branch_id: BRANCH_ID,
                school_id: SCHOOL_ID
            };

            try {
                const response = await fetch("proxy/admission-proxy.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(payload)
                });
                if (response.ok) {
                    document.getElementById("AdmissionFormPopup").classList.remove("hidden");
                    form.reset();
                    cityDisplay.textContent = "Select City";
                }
            } catch (err) { alert("Submission failed."); }
            finally {
                btn.disabled = false;
                btn.textContent = "Submit";
            }
        });

        // Lead Source
        (function() {
            const params = new URLSearchParams(window.location.search);
            const source = params.get("utm_source") || (document.referrer.includes("google") ? "Google" : "Website");
            sessionStorage.setItem("leadSource", source);
            document.getElementById("source").value = source;
        })();
    });
    </script>

    <?php include "includes/foot.php" ?>
</body>
</html>