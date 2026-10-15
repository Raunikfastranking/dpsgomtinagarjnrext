<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>
<script src="assets/js/wind.js"></script>

<!-- Scroll to top -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const scrollBtn = document.getElementById("scroll");
    if (!scrollBtn) return;

    window.addEventListener("scroll", function () {
        scrollBtn.style.display = window.scrollY > 100 ? "block" : "none";
    });

    scrollBtn.addEventListener("click", function () {
        setTimeout(function () {
            window.scrollTo({ top: 0, behavior: "smooth" });
        }, 500);
    });
});
</script>

<!-- Glide marquee carousel -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const marqueEl = document.querySelector('.glide-marque');
    if (!marqueEl) return;

    var glide09 = new Glide('.glide-marque', {
        type: 'carousel',
        autoplay: 1,
        animationDuration: 4500,
        animationTimingFunc: 'linear',
        perView: 3,
        classes: { activeNav: '[&>*]:bg-slate-700' },
        breakpoints: {
            1024: { perView: 2 },
            640:  { perView: 1, gap: 36 }
        }
    });
    glide09.mount();
});
</script>

<!-- Mobile nav menu toggles -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll('.dps-menu-toggle').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const submenu = this.nextElementSibling;
            if (submenu && submenu.classList.contains('dps-menu-open')) {
                submenu.classList.toggle('hidden-menu');
            }
        });
    });

    document.querySelectorAll('.dps2').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const submenu = this.nextElementSibling;
            if (submenu && submenu.classList.contains('dps-menu-openss')) {
                submenu.classList.toggle('hidden-menu');
            }
        });
    });

    document.querySelectorAll('.dps3').forEach(function (toggle) {
        toggle.addEventListener('click', function () {
            const submenu = this.nextElementSibling;
            if (submenu && submenu.classList.contains('dps-menu-opensss')) {
                submenu.classList.toggle('hidden-menu');
            }
        });
    });
});
</script>

<!-- Popup open/close (header enquiry popup) -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const popup       = document.getElementById("popupForm");
    const closePopup  = document.getElementById("closePopup");
    const openDesktop = document.getElementById("openPopupDesktop");
    const openMobile  = document.getElementById("openPopupMobile");

    // CTA enquiry popup (separate popup on some pages)
    const enquiryPopup   = document.getElementById("customEnquiryPopup");
    const openEnquiryBtn = document.getElementById("ctaEnquireBtn");
    const closeEnquiryBtn = document.getElementById("customCloseBtn");

    function openMainPopup(e) {
        if (e) e.preventDefault();
        if (!popup) return;
        popup.classList.remove("hidden");
        if (typeof window.loadBoards === "function") window.loadBoards();
    }

    function closeMainPopup() {
        if (!popup) return;
        popup.classList.add("hidden");
    }

    if (openDesktop) openDesktop.addEventListener("click", openMainPopup);
    if (openMobile)  openMobile.addEventListener("click", openMainPopup);

    // Legacy openPopup button (used on some pages)
    document.querySelectorAll("#openPopup").forEach(btn => {
        btn.addEventListener("click", openMainPopup);
    });

    if (closePopup) {
        closePopup.addEventListener("click", closeMainPopup);
    }

    if (popup) {
        popup.addEventListener("click", function (e) {
            if (e.target === popup) closeMainPopup();
        });
    }

    // CTA enquiry popup
    if (openEnquiryBtn && enquiryPopup) {
        openEnquiryBtn.addEventListener("click", function (e) {
            e.preventDefault();
            enquiryPopup.classList.remove("hidden");
        });
    }
    if (closeEnquiryBtn && enquiryPopup) {
        closeEnquiryBtn.addEventListener("click", function () {
            enquiryPopup.classList.add("hidden");
        });
    }
    if (enquiryPopup) {
        enquiryPopup.addEventListener("click", function (e) {
            if (e.target === enquiryPopup) enquiryPopup.classList.add("hidden");
        });
    }
});
</script>

<!-- Lead source capture -->
<script>
(function () {
    function getParam(name) {
        return new URLSearchParams(window.location.search).get(name);
    }
    let source = getParam("utm_source") || document.referrer || "";
    const src  = source.toLowerCase();

    if (!source)                                             source = "Website";
    else if (src.includes("google"))                         source = "Google-Ads by Agency";
    else if (src.includes("facebook") || src.includes("meta")) source = "Facebook by Agency";
    else if (src.includes("instagram") || src.includes("ig"))  source = "Instagram by Agency";
    else                                                     source = "Others";

    if (!sessionStorage.getItem("leadSource")) sessionStorage.setItem("leadSource", source);

    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll("#source").forEach(input => {
            input.value = sessionStorage.getItem("leadSource");
        });
    });
})();
</script>

<!-- Board / Grade API + Form submission (shared across all forms) -->
<script>
(function () {
    const SCHOOL_ID  = 1;
    const BRANCH_ID  = 5; // Junior school

   
    const sitePrefix = window.location.pathname.match(/^\/dpsgomtinagarjnrext(?=\/|$)/i)?.[0] || '';
    // Use the real PHP endpoints so this also works on local PHP servers
    // that do not process .htaccess rewrite rules.
    const BOARDS_API = `${sitePrefix}/proxy/boards-proxy.php`;
    const GRADES_API = `${sitePrefix}/proxy/selected-grades-proxy.php`;

    // AbortController to cancel previous grade fetch
    let abortController = null;
    // Set to prevent duplicate requests for the same board within 2 seconds
    const requestedBoards = new Set();

    // ── Load boards into a <select> ──────────────────────────────────────────
    async function loadBoardsForElement(bSelect) {
        if (!bSelect) return;
        // Skip if already populated (avoid reloading)
        if (bSelect.options.length > 1 && !bSelect.innerHTML.includes("Loading")) return;

        bSelect.innerHTML = '<option value="" disabled selected>Loading boards...</option>';
        try {
            const res    = await fetch(BOARDS_API);
            if (!res.ok) throw new Error(`Boards API: ${res.status}`);
            const result = await res.json();
            let boards   = [];
            if (result?.status === true && Array.isArray(result.data)) boards = result.data;
            else if (Array.isArray(result))                             boards = result;
            else if (result?.data && Array.isArray(result.data))       boards = result.data;

            bSelect.innerHTML = '<option value="" disabled selected>Select Board / Curriculum</option>';
            if (boards.length === 0) {
                bSelect.innerHTML += '<option disabled>No boards available</option>';
            } else {
                boards.forEach(item => {
                    const opt = document.createElement("option");
                    opt.value = item.id || item.board_id || "";
                    opt.text  = item.board_name || item.name || "Unknown Board";
                    if (opt.value) bSelect.appendChild(opt);
                });
            }

            console.log("📋 Boards loaded for", bSelect.id, ":", boards);
        } catch (err) {
            console.error("Failed to load boards:", err);
            bSelect.innerHTML = '<option value="" disabled selected>Error loading boards</option>';
        }
    }

    // ── Load grades into a <select> based on board ───────────────────────────
    async function loadGradesForElement(gradeSelect, boardId, sourceElementId = 'unknown') {
        if (!gradeSelect || !boardId) return;

        // Prevent rapid duplicate requests for the same board
        if (requestedBoards.has(boardId)) {
            console.log(`⏳ Already requested board ${boardId} recently – ignoring duplicate.`);
            return;
        }
        requestedBoards.add(boardId);
        setTimeout(() => requestedBoards.delete(boardId), 2000);

        console.log(`🔔 loadGrades for [${sourceElementId}] with boardId = ${boardId}`);

        // Cancel any ongoing fetch
        if (abortController) {
            abortController.abort();
            console.log("   🛑 Previous fetch aborted");
        }
        abortController = new AbortController();
        const signal = abortController.signal;

        gradeSelect.disabled = true;
        gradeSelect.innerHTML = '<option value="" disabled selected>Loading grades...</option>';

        try {
            // ⚠️ NO MAPPING – use the board ID directly as returned by boards API
            const res = await fetch(`${GRADES_API}?board=${encodeURIComponent(boardId)}`, { signal });
            if (!res.ok) throw new Error(`Grades API: ${res.status}`);
            const result = await res.json();

            let grades = [];
            if (result?.data && Array.isArray(result.data)) {
                grades = result.data;
            } else if (Array.isArray(result)) {
                grades = result;
            }

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

            gradeSelect.innerHTML = '<option value="" disabled selected>Select Grade</option>';
            if (grades.length === 0) {
                gradeSelect.innerHTML += '<option disabled>No grades found for this board</option>';
                console.log(`   ⚠️ No grades for board ${boardId}`);
            } else {
                grades.forEach(item => {
                    const opt = document.createElement("option");
                    opt.value = item.id || item.grade_id || "";
                    opt.text  = item.grades || item.grade_name || item.name || "Grade";
                    if (opt.value) gradeSelect.appendChild(opt);
                });
                gradeSelect.disabled = false;
                console.log(`   ✅ Loaded ${grades.length} grades for board ${boardId}`);
            }
        } catch (err) {
            if (err.name === 'AbortError') {
                console.log('   Fetch aborted (normal)');
            } else {
                console.error("   ❌ Failed to load grades:", err);
                gradeSelect.innerHTML = '<option value="" disabled selected>Error loading grades</option>';
            }
        } finally {
            abortController = null;
        }
    }

    // Expose globally so popup open handlers can trigger a reload
    window.loadBoards = function () {
        document.querySelectorAll("#eboard, #aboard").forEach(loadBoardsForElement);
    };

    document.addEventListener("DOMContentLoaded", function () {

        // ── Board change → load grades (works for both #eboard and #aboard) ──
        document.addEventListener("change", function (e) {
            if (e.target.id === "eboard" || e.target.id === "aboard") {
                const form = e.target.closest("form");
                if (form) {
                    const gradeSelect = form.querySelector("#egrade, #agrade");
                    // Pass the element id as source for debugging
                    loadGradesForElement(gradeSelect, e.target.value, e.target.id);
                    // Clear board error
                    const bErr = form.querySelector("#boardError, #aboard-error");
                    if (bErr) bErr.classList.add("hidden");
                }
            }
        });

        // Initial board load for any visible forms
        window.loadBoards();

        // ── Form submission ────────────────────────────────────────────────
        const nameRegex    = /^[A-Za-z\s]+$/;
        const mobileRegex  = /^[6-9]\d{9}$/;
        const emailRegex   = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const pincodeRegex = /^[1-9][0-9]{5}$/;

        const handleSubmit = async function (e) {
            const form = e.currentTarget;
            if (form.id !== "enquiryForm" && form.id !== "AdmissionForm") return;
            e.preventDefault();

            // Field references
            const f_name      = form.querySelector("#estudent_name, #astudent_name");
            const f_parent    = form.querySelector("#eparent_name, #aparent_name");
            const f_mobile    = form.querySelector("#emobile, #amobile");
            const f_email     = form.querySelector("#eemail, #aemail");
            const f_pincode   = form.querySelector("#epincode, #apincode");
            const f_session   = form.querySelector("#esession, #asession");
            const f_board     = form.querySelector("#eboard, #aboard");
            const f_grade     = form.querySelector("#egrade, #agrade");
            const f_city      = form.querySelector("#ecity, #acity");
            const f_submitBtn = form.querySelector("#submitBtn, #AsubmitBtn");

            // Error elements
            const e_student = form.querySelector("#student-error, #astudent-error");
            const e_parent  = form.querySelector("#parent-error, #aparent-error");
            const e_mobile  = form.querySelector("#mobile-error, #amobile-error");
            const e_email   = form.querySelector("#email-error, #aemail-error");
            const e_pincode = form.querySelector("#pincode-error, #apincode-error");
            const e_board   = form.querySelector("#boardError, #aboard-error");
            const e_grade   = form.querySelector("#classError, #agrade-error");

            let isValid = true;

            // Validate name
            if (f_name && !nameRegex.test(f_name.value.trim())) {
                e_student?.classList.remove("hidden"); isValid = false;
            } else e_student?.classList.add("hidden");

            // Validate parent (optional – only validate if filled)
            if (f_parent && f_parent.value.trim() && !nameRegex.test(f_parent.value.trim())) {
                e_parent?.classList.remove("hidden"); isValid = false;
            } else e_parent?.classList.add("hidden");

            // Validate mobile
            if (f_mobile && !mobileRegex.test(f_mobile.value.trim())) {
                e_mobile?.classList.remove("hidden"); isValid = false;
            } else e_mobile?.classList.add("hidden");

            // Validate email
            if (f_email && !emailRegex.test(f_email.value.trim())) {
                e_email?.classList.remove("hidden"); isValid = false;
            } else e_email?.classList.add("hidden");

            // Validate pincode
            if (f_pincode && !pincodeRegex.test(f_pincode.value.trim())) {
                e_pincode?.classList.remove("hidden"); isValid = false;
            } else e_pincode?.classList.add("hidden");

            // Validate board
            if (f_board && !f_board.value) {
                e_board?.classList.remove("hidden"); isValid = false;
            } else e_board?.classList.add("hidden");

            // Validate grade
            if (f_grade && !f_grade.value) {
                e_grade?.classList.remove("hidden"); isValid = false;
            } else e_grade?.classList.add("hidden");

            if (!isValid) return;

            f_submitBtn.disabled    = true;
            f_submitBtn.textContent = "Submitting...";

            const payload = {
                session:      f_session?.value.trim()  || "",
                board:        f_board?.value           || "",
                //grade:        f_grade?.value.trim()    || "",
                grade:        f_grade?.options[f_grade.selectedIndex]?.text.trim() || "",
                name:         f_name.value.trim(),
                parent_name:  f_parent?.value.trim()   || "",
                phone:        f_mobile.value.trim(),
                email:        f_email.value.trim(),
                city:         f_city?.value.trim()     || "",
                pincode:      f_pincode.value.trim(),
                source:       sessionStorage.getItem("leadSource") || "Website",
                source_type:  "Website",
                enquiry_type: "Digital",
                message:      "This Message From DPS Gomti Nagar Junior Website",
                subject:      "Admission Enquiry",
                branch_id:    BRANCH_ID,
                school_id:    SCHOOL_ID,
                language_id:  1
            };

            try {
                // Use the real PHP endpoint for local servers without rewrite support.
                const res = await fetch(`proxy/admission-proxy.php`, {
                    method:  "POST",
                    headers: { "Content-Type": "application/json" },
                    body:    JSON.stringify(payload)
                });
                if (!res.ok) throw new Error(`HTTP error ${res.status}`);
                await res.json().catch(() => null);

                const successPopup = document.getElementById("esuccessPopup") || document.getElementById("AdmissionFormPopup");
                if (successPopup) {
                    successPopup.classList.remove("hidden");
                    setTimeout(() => successPopup.classList.add("hidden"), 5000);
                }
                form.reset();
                const cityTxt = form.querySelector(".selected-text");
                if (cityTxt) cityTxt.textContent = "Select City";
            } catch (err) {
                console.error("Submission failed:", err);
                alert("Submission failed. Please try again.");
            } finally {
                f_submitBtn.disabled    = false;
                f_submitBtn.textContent = "Submit";
            }
        };

        document.querySelectorAll("#enquiryForm, #AdmissionForm").forEach(form => {
            form.addEventListener("submit", handleSubmit);
        });

        // ── City searchable dropdown (unchanged) ───────────────────────────
        document.querySelectorAll(".customSelect").forEach(wrapper => {
            const realSelect  = wrapper.querySelector("select");
            const display     = wrapper.querySelector(".selected-text");
            const dropdown    = wrapper.querySelector("div.absolute");
            if (!realSelect || !display || !dropdown) return;

            const searchInput = dropdown.querySelector("input");
            const optionsList = dropdown.querySelector("ul");

            function loadOptions(filter = "") {
                optionsList.innerHTML = "";
                Array.from(realSelect.options).forEach(opt => {
                    if (opt.value && opt.text.toLowerCase().includes(filter.toLowerCase())) {
                        const li = document.createElement("li");
                        li.textContent   = opt.text;
                        li.dataset.value = opt.value;
                        li.className     = "p-2 hover:bg-gray-100 cursor-pointer";
                        optionsList.appendChild(li);
                    }
                });
            }

            display.parentElement.addEventListener("click", () => {
                dropdown.classList.toggle("hidden");
                searchInput.value = "";
                loadOptions();
                searchInput.focus();
            });

            searchInput.addEventListener("input", () => loadOptions(searchInput.value));

            optionsList.addEventListener("click", e => {
                if (e.target.tagName === "LI") {
                    realSelect.value    = e.target.dataset.value;
                    display.textContent = e.target.textContent;
                    dropdown.classList.add("hidden");
                    const cityErr = wrapper.closest("form")?.querySelector("#city-error, #acity-error");
                    if (cityErr) cityErr.classList.add("hidden");
                }
            });

            document.addEventListener("click", e => {
                if (!wrapper.contains(e.target)) dropdown.classList.add("hidden");
            });
        });
    });
})();
</script>

<!-- Popup form reset on close -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const popup     = document.getElementById("popupForm");
    const closeBtn  = document.getElementById("closePopup");
    const form      = document.getElementById("enquiryForm");
    const submitBtn = document.getElementById("submitBtn");

    if (!popup || !form) return;

    function fullResetPopupForm() {
        form.reset();

        ["esession", "egrade", "ecity"].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.selectedIndex = 0;
        });

        const cityText = form.querySelector(".selected-text");
        if (cityText) cityText.textContent = "Select City";

        const checkbox = document.getElementById("popupCheckbox");
        if (checkbox) checkbox.checked = false;

        if (submitBtn) {
            submitBtn.disabled    = false;
            submitBtn.textContent = "Submit";
        }

        form.querySelectorAll(
            "#student-error, #parent-error, #mobile-error, #email-error, " +
            "#pincode-error, #city-error, #classError, #checkboxError, #boardError"
        ).forEach(el => {
            el.classList.add("hidden");
            el.style.display = "none";
        });

        form.querySelectorAll("input, select").forEach(el => {
            el.classList.remove("border-red-500");
        });
    }

    if (closeBtn) closeBtn.addEventListener("click", () => setTimeout(fullResetPopupForm, 100));

    popup.addEventListener("click", function (e) {
        if (e.target === popup) setTimeout(fullResetPopupForm, 100);
    });

    // Also reset when popup becomes hidden (e.g. closed programmatically)
    new MutationObserver(() => {
        if (popup.classList.contains("hidden")) fullResetPopupForm();
    }).observe(popup, { attributes: true, attributeFilter: ["class"] });
});
</script>