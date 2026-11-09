<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/head.php" ?>
    <title>DPS Gomtinagar | Online Enquiry Form</title>
</head>

<body>
    <?php include "includes/header.php" ?>

    <div class="main relative">
        <div class="bg-center flex items-center text-center h-[300px] brud-image">
            <div>
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9">
                    Online Enquiry Form
                </h1>
            </div>
            <div class="md:w-[100%]">
                <h2 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]">
                    Online Enquiry Form
                </h2>
            </div>
        </div>

        <div class="flex m-5" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="index" class="inline-flex items-center text-sm font-medium text-blue-main">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">Admission</p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <p class="ms-1 text-sm font-medium text-blue-main">Online</p>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"></path>
                        </svg>
                        <a href="online-enquiry-form" class="ms-1 text-sm font-medium text-blue-main">Online Enquiry Form</a>
                    </div>
                </li>
            </ol>
        </div>

        <div class="sm:mt-20 mt-10 mx-4 2xl:w-[1280px] lg:w-[1024px] md:w-[767px] sm:w-[640px] sm:mx-auto sm:px-5 px-4">
            <div class="relative">
                <h2 class="text-center sm:text-[32px] text-[28px] font-[700] text-blue-main leading-9">
                    Enquiry Form | Session 2026–2027
                </h2>

                <div class="my-10">
                    <form id="AdmissionForm" method="post">
                        <!-- Session -->
                        <div class="mt-4">
                            <select name="session" required id="asession" class="w-full border border-gray-300 p-2 rounded-md text-gray-500">
                                <option value="" disabled selected>Enquiry For Session</option>
                                <?php
                                $sessions = include "includes/session-api.php";
                                if (is_array($sessions)):
                                    foreach ($sessions as $item):
                                        $sessionName = trim($item['session'] ?? '');
                                        if ($sessionName === '') continue;
                                ?>
                                    <option value="<?= htmlspecialchars($sessionName) ?>"><?= htmlspecialchars($sessionName) ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                        </div>

                        <!-- Board -->
                        <div class="mt-4">
                            <select name="board" required id="aboard" class="w-full border border-gray-300 p-2 rounded-md text-gray-500">
                                <option value="" disabled selected>Loading boards...</option>
                            </select>
                            <span id="aboard-error" class="text-red-500 text-sm hidden">Please select a board.</span>
                        </div>

                        <!-- Grade -->
                        <div class="mt-4">
                            <select name="grade" id="agrade" required disabled class="w-full border border-gray-300 p-[11px] rounded-md text-[#808080cc] disabled:bg-gray-100 disabled:cursor-not-allowed">
                                <option value="" disabled selected>Select Grade</option>
                            </select>
                            <span id="aclass-error" class="text-red-500 text-sm hidden">Please select a grade.</span>
                        </div>

                        <!-- Student Name -->
                        <div class="mt-4">
                            <input type="text" name="student-name" id="astudent_name" placeholder="Student Name" class="w-full border border-gray-300 p-[11px] rounded-md outline-none" required>
                            <span id="astudent-error" class="text-red-500 text-sm mt-1 hidden">Only letters and spaces allowed.</span>
                        </div>

                        <!-- Parent Name -->
                        <div class="mt-4">
                            <input type="text" name="parent-name" id="aparent_name" placeholder="Parents Name" class="w-full border border-gray-300 p-[11px] rounded-md outline-none">
                            <span id="aparent-error" class="text-red-500 text-sm mt-1 hidden">Only letters and spaces allowed.</span>
                        </div>

                        <!-- Mobile -->
                        <div class="mt-4">
                            <input type="text" name="mobile" id="amobile" placeholder="Mobile Number" maxlength="10" class="w-full border border-gray-300 p-[11px] rounded-md outline-none">
                            <div id="amobile-error" class="text-red-500 text-sm mt-1 hidden">Please enter valid phone number</div>
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <input type="text" name="email" id="aemail" placeholder="Email" class="w-full border border-gray-300 p-[11px] rounded-md outline-none">
                            <span id="aemail-error" class="text-red-500 text-sm mt-1 hidden">Please enter a valid email address.</span>
                        </div>

                        <!-- CITY DROPDOWN -->
                        <div class="mt-4 relative" id="cityWrapper">
                            <select id="acity" name="city" class="hidden" required>
                                <option value="">Select City</option>
                                <?php
                                $cities = include 'includes/get-city.php';
                                if (!empty($cities)):
                                    foreach ($cities as $city):
                                        $cityName = trim($city['name'] ?? '');
                                        if ($cityName === '') continue;
                                ?>
                                    <option value="<?= htmlspecialchars($cityName) ?>"><?= htmlspecialchars($cityName) ?></option>
                                <?php endforeach;
                                else: ?>
                                    <option value="">No cities available</option>
                                <?php endif; ?>
                            </select>

                            <div id="cityTrigger" class="border border-gray-300 p-[11px] rounded-md bg-white cursor-pointer flex justify-between items-center">
                                <span class="selected-text text-[#808080cc]">Select City</span>
                                <span>▼</span>
                            </div>

                            <div id="cityDropdown" class="absolute mt-1 border border-gray-300 rounded-md bg-white shadow-md hidden z-50 w-full">
                                <input type="text" id="citySearch" placeholder="Search..." class="w-full p-2 border-b border-gray-300 outline-none">
                                <ul id="cityList" class="max-h-48 overflow-y-auto"></ul>
                            </div>
                        </div>

                        <!-- Pincode -->
                        <div class="mt-4">
                            <input type="text" name="pincode" id="apincode" placeholder="Pincode" class="w-full border border-gray-300 p-[11px] rounded-md" maxlength="6" oninput="this.value=this.value.replace(/\D/g,'')" required>
                            <span id="apincode-error" class="text-red-500 text-sm hidden">Please enter a valid Pincode.</span>
                        </div>

                        <!-- Terms -->
                        <div class="mt-4 flex items-center gap-2">
                            <input type="checkbox" id="terms" required>
                            <label for="terms">I agree to <a href="termsandconditions" class="text-blue-500 underline">Terms and Conditions</a>.</label>
                        </div>

                        <input type="hidden" name="source" id="source">

                        <!-- Success popup -->
                        <div id="AdmissionFormPopup" class="relative mt-5 bg-green-500 text-white px-4 py-2 rounded mb-5 hidden" style="z-index:999">
                            Form submitted successfully!
                        </div>

                        <!-- Submit -->
                        <div class="my-4">
                            <button type="submit" id="AsubmitBtn" class="p-4 bg-blue-main w-full text-white font-semibold text-[18px] rounded hover:bg-red-500 transition">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>

    <script>
        // ==================== SOURCE TRACKING ====================
        (function() {
            const params = new URLSearchParams(window.location.search);
            let source = params.get("utm_source") || document.referrer || "Website";
            const srcLower = source.toLowerCase();
            if (srcLower.includes("google")) {
                source = "Google-Ads by Agency";
            } else if (srcLower.includes("facebook") || srcLower.includes("meta")) {
                source = "Facebook by Agency";
            } else if (srcLower.includes("instagram") || srcLower.includes("ig")) {
                source = "Instagram by Agency";
            } else if (source !== "Website") {
                source = "Others";
            }
            if (!sessionStorage.getItem("leadSource")) {
                sessionStorage.setItem("leadSource", source);
            }
            document.getElementById("source").value = sessionStorage.getItem("leadSource");
        })();

        // ==================== CITY DROPDOWN ====================
        (function() {
            const cityWrapper = document.getElementById('cityWrapper');
            const trigger = document.getElementById('cityTrigger');
            const dropdown = document.getElementById('cityDropdown');
            const hiddenSelect = document.getElementById('acity');
            const cityList = document.getElementById('cityList');
            const searchInput = document.getElementById('citySearch');
            const selectedLabel = trigger.querySelector('.selected-text');

            if (!cityWrapper || !trigger || !dropdown || !hiddenSelect || !cityList || !searchInput || !selectedLabel) {
                console.error('City dropdown elements missing!');
                return;
            }

            function populateCityList() {
                cityList.innerHTML = '';
                const options = Array.from(hiddenSelect.options);
                if (options.length === 0 || (options.length === 1 && options[0].value === "")) {
                    const li = document.createElement('li');
                    li.className = "p-2 text-gray-400 text-sm";
                    li.textContent = "No cities available";
                    cityList.appendChild(li);
                    return;
                }

                options.forEach(opt => {
                    if (!opt.value) return;
                    const li = document.createElement('li');
                    li.className = "p-2 hover:bg-gray-100 cursor-pointer text-sm border-b last:border-0";
                    li.textContent = opt.text;
                    li.dataset.value = opt.value;
                    li.onclick = function(e) {
                        e.stopPropagation();
                        hiddenSelect.value = this.dataset.value;
                        selectedLabel.textContent = this.textContent;
                        selectedLabel.classList.remove('text-[#808080cc]');
                        dropdown.classList.add('hidden');
                    };
                    cityList.appendChild(li);
                });
            }

            populateCityList();

            trigger.onclick = function(e) {
                e.stopPropagation();
                dropdown.classList.toggle('hidden');
                if (!dropdown.classList.contains('hidden')) {
                    searchInput.value = '';
                    populateCityList();
                    searchInput.focus();
                }
            };

            searchInput.oninput = function(e) {
                const term = e.target.value.toLowerCase();
                const items = cityList.querySelectorAll('li');
                items.forEach(li => {
                    if (li.dataset.value) {
                        const text = li.textContent.toLowerCase();
                        li.style.display = text.includes(term) ? '' : 'none';
                    }
                });
            };

            document.addEventListener('click', function(e) {
                if (!cityWrapper.contains(e.target)) {
                    dropdown.classList.add('hidden');
                }
            });

            document.getElementById('AdmissionForm').addEventListener('reset', function() {
                selectedLabel.textContent = 'Select City';
                selectedLabel.classList.add('text-[#808080cc]');
                hiddenSelect.value = '';
                populateCityList();
            });
        })();

        // ==================== BOARD & GRADE LOADING ====================
        (function() {
            const SCHOOL_ID = 1;
            const BRANCH_ID = 5;
            const BOARDS_API = 'proxy/boards-proxy.php';
            const GRADES_API = 'proxy/selected-grades-proxy.php';

            let abortController = null;

            async function loadBoardsForElement(bSelect) {
                if (!bSelect) return;
                bSelect.innerHTML = '<option value="" disabled selected>Loading boards...</option>';
                try {
                    const res = await fetch(BOARDS_API);
                    if (!res.ok) throw new Error(`HTTP ${res.status}`);
                    const result = await res.json();
                    let boards = [];
                    if (result?.status === true && Array.isArray(result.data)) boards = result.data;
                    else if (Array.isArray(result)) boards = result;
                    else if (result?.data && Array.isArray(result.data)) boards = result.data;

                    bSelect.innerHTML = '<option value="" disabled selected>Select Board / Curriculum</option>';
                    boards.forEach(item => {
                        const opt = document.createElement("option");
                        opt.value = item.id || item.board_id || '';
                        opt.textContent = item.board_name || item.name || 'Unknown Board';
                        if (opt.value) bSelect.appendChild(opt);
                    });
                } catch (err) {
                    console.error("Board load failed:", err);
                    bSelect.innerHTML = '<option value="" disabled selected>Error loading boards</option>';
                }
            }

            async function loadGradesForElement(gradeSelect, boardId) {
                if (!gradeSelect || !boardId) return;
                if (abortController) abortController.abort();
                abortController = new AbortController();
                const signal = abortController.signal;

                gradeSelect.disabled = true;
                gradeSelect.innerHTML = '<option value="" disabled selected>Loading grades...</option>';

                try {
                    const apiUrl = `${GRADES_API}?board=${encodeURIComponent(boardId)}`;
                    const res = await fetch(apiUrl, { signal });
                    if (!res.ok) throw new Error(`HTTP ${res.status}`);
                    const result = await res.json();

                    let grades = [];
                    if (result?.data && Array.isArray(result.data)) {
                        grades = result.data;
                    } else if (Array.isArray(result)) {
                        grades = result;
                    }

                    gradeSelect.innerHTML = '<option value="" disabled selected>Select Grade</option>';
                    if (grades.length > 0) {
                       // === SORT GRADES FOR DPS GM JUNIOR ===
const gradeOrder = ['P.G. I', 'P.G. II', 'Nursery', 'Prep', 'I', 'II', 'III', 'IV'];
grades.sort((a, b) => {
    const nameA = a.grades || a.grade_name || a.name || a.grade || "";
    const nameB = b.grades || b.grade_name || b.name || b.grade || "";
    const indexA = gradeOrder.indexOf(nameA);
    const indexB = gradeOrder.indexOf(nameB);
    // Put any grade not in the list at the end
    const posA = indexA === -1 ? 999 : indexA;
    const posB = indexB === -1 ? 999 : indexB;
    return posA - posB;
});
// === END SORTING ===

                        grades.forEach(item => {
                            const opt = document.createElement("option");
                            opt.value = item.grades || item.grade_name || item.name || item.grade || item.id || "";
                            opt.textContent = item.grades || item.grade_name || item.name || item.grade || "Grade";
                            if (opt.value) gradeSelect.appendChild(opt);
                        });
                        gradeSelect.disabled = false;
                    } else {
                        gradeSelect.innerHTML = '<option value="" disabled selected>No grades available</option>';
                    }
                } catch (err) {
                    if (err.name === 'AbortError') {
                        console.log('Fetch aborted');
                    } else {
                        console.error("Grades load failed:", err);
                        gradeSelect.innerHTML = '<option value="" disabled selected>Error loading grades</option>';
                    }
                } finally {
                    abortController = null;
                }
            }

            document.addEventListener("DOMContentLoaded", function() {
                const aboard = document.getElementById("aboard");
                if (aboard) loadBoardsForElement(aboard);
            });

            document.addEventListener("change", function(e) {
                if (e.target.id === "aboard") {
                    const gradeSelect = document.getElementById("agrade");
                    if (gradeSelect && e.target.value) {
                        loadGradesForElement(gradeSelect, e.target.value);
                    }
                }
            });
        })();

        // ==================== FORM SUBMISSION ====================
        document.getElementById("AdmissionForm").addEventListener("submit", async function(e) {
            e.preventDefault();

            const f_name    = document.getElementById("astudent_name");
            const f_parent  = document.getElementById("aparent_name");
            const f_mobile  = document.getElementById("amobile");
            const f_email   = document.getElementById("aemail");
            const f_pincode = document.getElementById("apincode");
            const f_session = document.getElementById("asession");
            const f_board   = document.getElementById("aboard");
            const f_grade   = document.getElementById("agrade");
            const f_city    = document.getElementById("acity");
            const f_submitBtn = document.getElementById("AsubmitBtn");
            const terms     = document.getElementById("terms");

            const nameRegex    = /^[A-Za-z\s]+$/;
            const mobileRegex  = /^[6-9]\d{9}$/;
            const emailRegex   = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const pincodeRegex = /^[1-9][0-9]{5}$/;
            let isValid = true;

            if (!f_name.value.trim() || !nameRegex.test(f_name.value.trim())) {
                document.getElementById("astudent-error").classList.remove("hidden");
                isValid = false;
            } else {
                document.getElementById("astudent-error").classList.add("hidden");
            }

            if (f_parent.value.trim() && !nameRegex.test(f_parent.value.trim())) {
                document.getElementById("aparent-error").classList.remove("hidden");
                isValid = false;
            } else {
                document.getElementById("aparent-error").classList.add("hidden");
            }

            if (!f_mobile.value.trim() || !mobileRegex.test(f_mobile.value.trim())) {
                document.getElementById("amobile-error").classList.remove("hidden");
                isValid = false;
            } else {
                document.getElementById("amobile-error").classList.add("hidden");
            }

            if (f_email.value.trim() && !emailRegex.test(f_email.value.trim())) {
                document.getElementById("aemail-error").classList.remove("hidden");
                isValid = false;
            } else {
                document.getElementById("aemail-error").classList.add("hidden");
            }

            if (!f_pincode.value.trim() || !pincodeRegex.test(f_pincode.value.trim())) {
                document.getElementById("apincode-error").classList.remove("hidden");
                isValid = false;
            } else {
                document.getElementById("apincode-error").classList.add("hidden");
            }

            if (!f_board.value) {
                document.getElementById("aboard-error").classList.remove("hidden");
                isValid = false;
            } else {
                document.getElementById("aboard-error").classList.add("hidden");
            }

            if (!f_grade.value) {
                document.getElementById("aclass-error").classList.remove("hidden");
                isValid = false;
            } else {
                document.getElementById("aclass-error").classList.add("hidden");
            }

            if (!f_session.value) {
                alert("Please select a session");
                isValid = false;
            }

            if (!f_city.value) {
                alert("Please select a city");
                isValid = false;
            }

            if (!terms.checked) {
                alert("Please agree to Terms and Conditions");
                isValid = false;
            }

            if (!isValid) return;

            f_submitBtn.disabled = true;
            f_submitBtn.textContent = "Submitting...";

            const payload = {
                session: f_session.value.trim(),
                board: f_board.value,
                board_name: f_board.options[f_board.selectedIndex]?.text || "",
                grade: f_grade.value.trim(),
                grade_name: f_grade.options[f_grade.selectedIndex]?.text || "",
                name: f_name.value.trim(),
                parent_name: f_parent.value.trim() || "",
                phone: f_mobile.value.trim(),
                email: f_email.value.trim() || "",
                city: f_city.value.trim(),
                pincode: f_pincode.value.trim(),
                source: sessionStorage.getItem("leadSource") || "Website",
                source_type: "Website",
                enquiry_type: "Digital",
                message: "This Message From DPS Gomtinagar Website",
                subject: "Admission Enquiry",
                branch_id: 5,
                school_id: 1,
                language_id: 1
            };

            try {
                const res = await fetch("proxy/admission-proxy.php", {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(payload)
                });

                const responseData = await res.json();
                console.log("API Response:", responseData);

                if (!res.ok) {
                    throw new Error(`HTTP ${res.status}: ${responseData.message || 'Unknown error'}`);
                }

                if (responseData.status === false) {
                    throw new Error(responseData.message || 'API returned an error');
                }

                // Success – show only the green popup
                const popup = document.getElementById("AdmissionFormPopup");
                popup.classList.remove("hidden");
                setTimeout(() => popup.classList.add("hidden"), 5000);

                this.reset();

                const selectedLabel = document.querySelector('#cityTrigger .selected-text');
                if (selectedLabel) {
                    selectedLabel.textContent = "Select City";
                    selectedLabel.classList.add('text-[#808080cc]');
                }
                document.getElementById('acity').value = "";

                const gradeSelect = document.getElementById("agrade");
                if (gradeSelect) {
                    gradeSelect.disabled = true;
                    gradeSelect.innerHTML = '<option value="" disabled selected>Select Grade</option>';
                }

                // alert("Form submitted successfully!");  ← THIS LINE WAS REMOVED

            } catch (err) {
                console.error("Submission failed:", err);
                alert("Submission failed: " + err.message);
            } finally {
                f_submitBtn.disabled = false;
                f_submitBtn.textContent = "Submit";
            }
        });
    </script>

    <?php include "includes/foot.php" ?>
</body>
</html>