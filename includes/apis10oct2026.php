<?php
require_once dirname(__DIR__) . '/proxy/config.php';

require_once __DIR__ . '/image-alt.php';
require_once __DIR__ . '/layout-parts-resolve.php';

$api_url = "https://dps.allenhouseschools.com";

// CMS content embeds media as relative /upload/... paths — rewrite to absolute CMS host
// so images/files resolve on any frontend domain (local dev, production, etc.).
ob_start(function (string $html) use ($api_url): string {
    return str_replace(
        ['src="/upload/', "src='/upload/", 'href="/upload/', "href='/upload/"],
        ['src="' . $api_url . '/upload/', "src='" . $api_url . "/upload/", 'href="' . $api_url . '/upload/', "href='" . $api_url . "/upload/"],
        $html
    );
});

/** Branch id for gallery year API (photo_gallery_data / achievement_data use branch/5). */
if (!defined('DPS_GOMTINAGAR_JNREXT_GALLERY_BRANCH_ID')) {
    define('DPS_GOMTINAGAR_JNREXT_GALLERY_BRANCH_ID', DPS_GOMTINAGAR_JNREXT_BRANCH_ID);
}

function fetchMultipleApiData($endpoints)
{
    $baseUrl = "https://dps.allenhouseschools.com/api";
    $mh = curl_multi_init();
    $curlHandles = [];
    $responses = [];
    // Create all curl handles
    foreach ($endpoints as $key => $endpoint) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $baseUrl . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // disable SSL check if needed
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, api_auth_headers());
        curl_multi_add_handle($mh, $ch);
        $curlHandles[$key] = $ch;
    }
    $running = null;
    do {
        $status = curl_multi_exec($mh, $running);

        if ($status > CURLM_OK) {
             break;
        }
        curl_multi_select($mh);
        usleep(10000);
    } while ($running > 0);

    // Collect responses
    foreach ($curlHandles as $key => $ch) {
        $content = curl_multi_getcontent($ch);
        $responses[$key] = json_decode($content, true);
        curl_multi_remove_handle($mh, $ch);
        curl_close($ch);
    }
    curl_multi_close($mh);
    return $responses;
}
$endpoints = [
    'home_data'   => '/pages/home-page-gomtinagar-jnr',
    'menu_data'   => '/menus/3',
    'flyer_data'   => '/flyers/branch/5',
    'header_footer_data' => '/public/branches/5/layout-parts/',
    'scroll_text_data' => '/scrolling-texts/branch/5',
    'statistic_data' => '/statistics/branch/5',
    'excellence_data' => '/pages/excellence-in-action-page-gomtinagar-jnr',
    'celebrating_data' => '/pages/celebrating-excellence-page-gomtinagar-jnr',
    'spotlight_data' => '/pages/excellence-in-the-spotlight-page-gomtinagar-jnr',
    'embark_data' => '/pages/embark-on-a-journey-of-excellence-page-gomtinagar-jnr',
    'mv_data' => '/pages/mission-vision-core-values-page-gomtinagar-jnr',
    'h_data' => '/pages/dps-gomtinagar-jrn-ext-page-gomtinagar-jnr',
    'society_data' => '/pages/dps-gomtinagar-jrn-ext-page-gomtinagar-jnr',
    'chairman_data' => '/pages/pro-vice-chairmans-message-page-gomtinagar-jnr',
    'principal_data' => '/pages/principals-message-page-gomtinagar-jnr',
    'management_data' => '/pages/management-committee-page-gomtinagar-jnr',
    'school_data' => '/pages/25-school-guidelines-page-gomtinagar-jnr',
    'smart_data' => '/pages/smart-classrooms-page-gomtinagar-jnr',
    'animation_data' => '/pages/animation-master-class-page-gomtinagar-jnr',
    'other_info_data' => '/pages/other-facilities-page-gomtinagar-jnr',
    'activity_room_data' => '/pages/activity-room-page-gomtinagar-jnr',
    'cafeteria_data' => '/pages/cafeteria-page-gomtinagar-jnr',
    'dance_room_data' => '/pages/dance-room-page-gomtinagar-jnr',
    'infirmary_data' => '/pages/infirmary-page-gomtinagar-jnr',
    'sport_data' => '/pages/sports-page-gomtinagar-jnr-',
    'our_curriculum_data' => '/pages/32-our-curriculum-page-gomtinagar-jnr',
    'kindergarten_data' => '/pages/33-kindergarten-page-gomtinagar-jnr',
    'animation_page_data' => '/pages/animation-page-gomtinagar-jnr',
    'coding_data' => '/pages/coding-page-gomtinagar-jnr',
    'robotics_data' => '/pages/robotics-page-gomtinagar-jnr',
    'oluxi_smart_data' => '/pages/oluxi-smart-skills-page-gomtinagar-jnr',
    'financial_literacy_data' => '/pages/financial-literacy-page-gomtinagar-jnr',
    'north_west_data' => '/pages/north-west-sports-academy-page-gomtinagar-jnr',
    'almanac_pdf_data' => '/pages/almanac-pdf-page-gomtinagar-jnr',
    'school_clubs_data' => '/pages/school-clubs-page-gomtinagar-jnr-',
    'health_well_data' => '/pages/health-and-well-being-page-gomtinagar-jnr-',
    'student_led_data' => '/pages/student-led-programme-page-gomtinagar-jnr',

    'admission_overview_data' => '/pages/admission-overview-page-gomtinagar-jnr',
    'admission_criteria_data' => '/pages/admission-criteria-page-gomtinagar-jnr',
    'process_page_data' => '/pages/process-page-gomtinagar-jnr',
    'fee_structure_data' => '/pages/fee-structure-page-gomtinagar-jnr',
    'withdrawal_policy_data' => '/pages/withdrawal-policy-page-gomtinagar-jnr',
    'transfer_certificate_data' => '/pages/transfer-certificate-guidelines-page-gomtinagar-jnr',
    'group_transfer_policy_data' => '/pages/group-transfer-policy-page-gomtinagar-jnr',
    'bus_routes_data' => '/pages/bus-routes-page-gomtinagar-jnr',
    'school_rules_data' => '/pages/school-rules-page-gomtinagar-jnr',

    'academic_achievements_data' => '/pages/academic-achievements-page-gomtinagar-jnr',
    'extra_curricular_data' => '/pages/extra-curricular-achievements-page-gomtinagar-jnr',
    'school_awards_data' => '/pages/school-awards-page-gomtinagar-jnr',
    'principal_awards_data' => '/pages/principal-awards-page-gomtinagar-jnr',

    'other_information_data' => '/pages/other-information-page-gomtinagar-jnr',
    'parent_teacher_data' => '/pages/parent-teacher-association-page-gomtinagar-jnr',
    'sexual_harassment_data' => '/pages/sexual-harassment-committee-page-gomtinagar-jnr',
    'teacher_details_data' => '/pages/teacher-details-page-gomtinagar-jnr',
    'leadership_team_data' => '/pages/leadership-team-page-gomtinagar-jnr',
    'school_guidelines_data' => '/pages/25-school-guidelines-page-gomtinagar-jnr',
    'general_information_data' => '/pages/general-information-page-gomtinagar-jnr',
    'documents_information_data' => '/pages/documents-and-information-page-gomtinagar-jnr',
    'results_academic_data' => '/pages/results-and-academics-page-gomtinagar-jnr',
    'staff_data' => '/pages/staff-teaching-page-gomtinagar-jnr',
    'infrastructure_data' => '/pages/school-infrastructure-page-gomtinagar-jnr',
    'debriefing_data' => '/pages/debriefing-sessions-page-gomtinagar-jnr',
    'superhouse_data' => '/pages/superhouse-education-foundation-page-gomtinagar-jnr', 
    'cbse_data' => '/pages/cbse-page-gomtinagar-jnr',
    'dpss_human_data' => '/pages/dpss-human-resource-development-council-page-gomtinagar-jnr',
    'pocso_data' => '/pages/pocso-page-gomtinagar-jnr',
    'posh_data' => '/pages/posh-page-gomtinagar-jnr',
    'safety_security_data' => '/pages/safety-and-security-page-gomtinagar-jnr',
    'discipline_data' => '/pages/discipline-committee-page-gomtinagar-jnr',
    'anti_data' => '/pages/anti-bullying-committee-page-gomtinagar-jnr',
    'cbse_information_data' => '/pages/cbse-information-page-gomtinagar-jnr',
    'process_data' => '/accordions/branch/5',
    'faq_data' => '/pages/faq-page-gomtinagar-jnr',
    'facilities_data' => '/pages/facilities-page-gomtinagar-jnr',
    'our_story_data' => '/pages/our-story-page-gomtinagar-jnr',
    'photo_gallery_data' => '/galleries/type/gallery/branch/5',
    'achievement_data' => '/galleries/type/achievements/branch/5',
    'footer_link_data' => '/public/link-groups/position/footer/hierarchical?branch_id=5',
    'jobs_data' => '/jobs/branch/5',
    'contact_data' => '/pages/contact-us-page-gomtinagar-jnr',
    'video_gallery_data' => '/pages/video-gallery-page-gomtinagar-jnr',
    'route_data' => '/get-bus-routes/5',
    'blogData' => '/blogs/branch/5',
    'testimonial_data' => '/pages/testimonials-page-gomtinagar-jnr',
    'terms_and_conditions' => '/pages/terms-and-conditions-page-gomtinagar-jnr'
  ];

$data = fetchMultipleApiData($endpoints);
$home_data   = $data['home_data'];
$menu_data = $data['menu_data'];
$flyer_data = $data['flyer_data'];
$header_footer_data = $data['header_footer_data'];
$footer_layout_meta = dps_resolve_footer_layout_meta($header_footer_data);
$scroll_text_data = $data['scroll_text_data'];
$excellence_data   = $data['excellence_data'];
$celebrating_data   = $data['celebrating_data'];
$spotlight_data   = $data['spotlight_data'];
$embark_data   = $data['embark_data'];
$statistic_data = $data['statistic_data'];
$mv_data   = $data['mv_data'];
$h_data = $data['h_data'];
$society_data = $data['society_data'];
$chairman_data = $data['chairman_data'];
$principal_data = $data['principal_data'];
$management_data = $data['management_data'];
$other_info_data = $data['other_info_data'];
$animation_data = $data['animation_data'];
$activity_room_data = $data['activity_room_data'];
$cafeteria_data = $data['cafeteria_data'];
$dance_room_data = $data['dance_room_data'];
$infirmary_data = $data['infirmary_data'];
$sport_data = $data['sport_data'];
$our_curriculum_data = $data['our_curriculum_data'];
$kindergarten_data = $data['kindergarten_data'];
$animation_page_data   = $data['animation_page_data'];
$coding_data   = $data['coding_data'];
$robotics_data   = $data['robotics_data'];
$oluxi_smart_data   = $data['oluxi_smart_data'];
$financial_literacy_data   = $data['financial_literacy_data'];
$north_west_data   = $data['north_west_data'];
$almanac_pdf_data   = $data['almanac_pdf_data'];
$school_clubs_data   = $data['school_clubs_data'];
$health_well_data   = $data['health_well_data'];
$student_led_data   = $data['student_led_data'];

$admission_overview_data   = $data['admission_overview_data'];
$admission_criteria_data   = $data['admission_criteria_data'];
$process_page_data   = $data['process_page_data'];
$fee_structure_data   = $data['fee_structure_data'];
$withdrawal_policy_data   = $data['withdrawal_policy_data'];
$transfer_certificate_data   = $data['transfer_certificate_data'];
$group_transfer_policy_data   = $data['group_transfer_policy_data'];
$bus_routes_data   = $data['bus_routes_data'];
$route_data = $data['route_data'];
$school_rules_data   = $data['school_rules_data'];

$academic_achievements_data   = $data['academic_achievements_data'];
$extra_curricular_data   = $data['extra_curricular_data'];
$school_awards_data   = $data['school_awards_data'];
$principal_awards_data   = $data['principal_awards_data'];

$other_information_data   = $data['other_information_data'];
$parent_teacher_data   = $data['parent_teacher_data'];
$sexual_harassment_data   = $data['sexual_harassment_data'];
$teacher_details_data   = $data['teacher_details_data'];
$leadership_team_data   = $data['leadership_team_data'];
$school_guidelines_data   = $data['school_guidelines_data'];
$general_information_data   = $data['general_information_data'];
$documents_information_data   = $data['documents_information_data'];
$results_academic_data   = $data['results_academic_data'];
$staff_data   = $data['staff_data'];
$infrastructure_data   = $data['infrastructure_data'];
$debriefing_data   = $data['debriefing_data'];
$superhouse_data   = $data['superhouse_data'];
$cbse_data = $data['cbse_data'];
$dpss_human_data   = $data['dpss_human_data'];
$pocso_data   = $data['pocso_data'];
$posh_data = $data['posh_data'];
$safety_security_data   = $data['safety_security_data'];
$discipline_data   = $data['discipline_data'];
$anti_data   = $data['anti_data'];
$cbse_information_data   = $data['cbse_information_data'];
$process_data   = $data['process_data'];
$faq_data = $data['faq_data'];
$facilities_data = $data['facilities_data'];
$our_story_data = $data['our_story_data'];
$photo_gallery_data = $data['photo_gallery_data'];
$achievement_data = $data['achievement_data'];
$school_data = $data['school_data'];
$smart_data = $data['smart_data'];
$footer_link_data = $data['footer_link_data'];
$jobs_data = $data['jobs_data'];
$contact_data = $data['contact_data'];
$video_gallery_data = $data['video_gallery_data'];
$blogData = $data['blogData'];
$testimonial_data = $data['testimonial_data'];
$terms_and_conditions = $data['terms_and_conditions'];

// Aliases expected by includes/header.php $pageDataMap (fixes undefined variable notices)
$chairmans_data        = $chairman_data;
$facility_data        = $facilities_data;
$oc__data               = $our_curriculum_data;
$group_transfer_data    = $group_transfer_policy_data;
$school_award_data      = $school_awards_data;
$principal_award_data   = $principal_awards_data;
$studentled_data        = $student_led_data;

// Optional page buckets not loaded globally (achievement micro-pages, etc.)
$activities_data =
    $pedagogy_data =
    $m_data =
    $art__data =
    $mentalhealth_data =
    $careerguidance_data =
    $seniorjunior_data =
    $view_tc_data =
    $dance_music_data =
    $state_level_data =
    $national_level_data =
    $international_level_data =
    $city_topper_data =
    $aryabhat_ganit_data =
    $inter_school_data =
    $district_level_data =
    $cbse_east_data =
    $inter_roll_back =
    $seven_sub_jr_data = null;