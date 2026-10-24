<?php

/**
 * Shim helpers for cambridge/cambridge-page.php on this project.
 * This site does not use shared/includes/* — these are minimal
 * ports of the shared CMS helpers it expects.
 */

if (!function_exists('cmsMediaS3Base')) {
    function cmsMediaS3Base(): string
    {
        return 'https://myschool-assets.s3.ap-south-1.amazonaws.com';
    }
}

if (!function_exists('cmsMediaCmsBase')) {
    function cmsMediaCmsBase(): string
    {
        return 'https://dps.allenhouseschools.com';
    }
}

if (!function_exists('cmsResolveMediaUrl')) {
    /** Resolve CMS/API media paths to a public URL (S3, CMS host, or data URI). */
    function cmsResolveMediaUrl(?string $url): string
    {
        if ($url === null || trim($url) === '') {
            return '';
        }

        $path = str_replace(['\\/', '\\\\/'], '/', trim($url));
        if ($path === '') {
            return '';
        }
        if (preg_match('#^data:#i', $path)) {
            return $path;
        }
        if (preg_match('#^blob:#i', $path)) {
            return '';
        }
        if (preg_match('#^https?://#i', $path)) {
            return $path;
        }

        $relative = ltrim($path, '/');
        if (preg_match('#^(?:aps|dps|all_media|uploads)/#i', $relative)) {
            return cmsMediaS3Base() . '/' . $relative;
        }
        if (preg_match('#^upload/images/#i', $relative)) {
            return cmsMediaCmsBase() . '/' . $relative;
        }

        return cmsMediaCmsBase() . '/' . $relative;
    }
}

if (!function_exists('cmsFixMediaUrl')) {
    function cmsFixMediaUrl(?string $url): string
    {
        return cmsResolveMediaUrl($url);
    }
}

if (!function_exists('cmsPrepareCmsHtml')) {
    function cmsPrepareCmsHtml(?string $html): string
    {
        if ($html === null || trim($html) === '') {
            return '';
        }

        $html = preg_replace('/&(?:nbsp|#160|#x0?A0);/i', "\xC2\xA0", (string) $html) ?? (string) $html;
        $html = html_entity_decode($html, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $html = preg_replace('/>\s+</u', '><', $html) ?? $html;

        // Resolve relative inline image srcs to CMS/S3 URLs.
        $html = preg_replace_callback(
            '/(<img\b[^>]*?\bsrc=")([^"]*)(")/i',
            static function (array $m): string {
                $fixed = cmsResolveMediaUrl(html_entity_decode($m[2], ENT_QUOTES | ENT_HTML5, 'UTF-8'));
                return $m[1] . ($fixed !== '' ? htmlspecialchars($fixed, ENT_QUOTES, 'UTF-8') : $m[2]) . $m[3];
            },
            $html
        ) ?? $html;

        return $html;
    }
}

if (!function_exists('cmsPrepareCmsPlainText')) {
    function cmsPrepareCmsPlainText(?string $text): string
    {
        if ($text === null || trim($text) === '') {
            return '';
        }

        return trim(preg_replace('/\s+/u', ' ', strip_tags(cmsPrepareCmsHtml($text))) ?? '');
    }
}

if (!function_exists('cmsSectionIsHero')) {
    function cmsSectionIsHero(array $section): bool
    {
        $columns = $section['columns'] ?? [];
        if (is_array($columns) && count($columns) >= 2) {
            return false;
        }

        $body = trim((string) ($section['content'] ?? ''));
        if ($body !== '') {
            $plain = trim(strip_tags(html_entity_decode($body, ENT_QUOTES | ENT_HTML5, 'UTF-8')));
            if (strlen($plain) > 80) {
                return false;
            }
        }

        $title = strtolower((string) ($section['title'] ?? ''));
        $layout = strtolower((string) ($section['layout'] ?? ''));

        return str_contains($title, 'hero') || str_contains($title, 'banner') || $layout === 'hero';
    }
}

if (!function_exists('cmsSectionInnerHtml')) {
    function cmsSectionInnerHtml(array $section): string
    {
        $html = '';
        foreach (['content', 'content_heading', 'description'] as $key) {
            if (!empty($section[$key]) && is_string($section[$key])) {
                $html = $section[$key];
                break;
            }
        }

        if ($html === '') {
            $resolved = $section['resolved_content'] ?? null;
            if (is_array($resolved)) {
                foreach (['content', 'heading', 'description', 'content_text'] as $key) {
                    if (!empty($resolved[$key]) && is_string($resolved[$key])) {
                        $html = $resolved[$key];
                        break;
                    }
                }
            }
        }

        return $html === '' ? '' : cmsPrepareCmsHtml($html);
    }
}

if (!function_exists('cmsCambridgeBannerTitleLooksGeneric')) {
    function cmsCambridgeBannerTitleLooksGeneric(string $title): bool
    {
        $normalized = strtolower(trim($title));
        if ($normalized === '' || $normalized === 'hero' || $normalized === 'banner') {
            return true;
        }

        foreach (['hero banner', 'page banner', 'inner banner', 'banner section', 'hero section'] as $generic) {
            if (str_contains($normalized, $generic)) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('cmsPageBannerDisplayTitle')) {
    /** Inner-page banner label: CMS hero section heading, then page title. */
    function cmsPageBannerDisplayTitle(?array $page): string
    {
        if (!is_array($page)) {
            return '';
        }

        $sections = $page['data']['sections'] ?? [];
        if (is_array($sections)) {
            foreach ($sections as $section) {
                if (!is_array($section) || !cmsSectionIsHero($section)) {
                    continue;
                }
                foreach (['content_heading', 'content', 'title'] as $key) {
                    $plain = cmsPrepareCmsPlainText((string) ($section[$key] ?? ''));
                    if ($plain !== '' && !cmsCambridgeBannerTitleLooksGeneric($plain)) {
                        return $plain;
                    }
                }
            }
        }

        $data = is_array($page['data'] ?? null) ? $page['data'] : [];

        return cmsPrepareCmsPlainText((string) ($data['page_heading'] ?? $data['title'] ?? ''));
    }
}

if (!function_exists('cmsRenderPageBanner')) {
    /** jnrext-style inner-page banner (brud-image class provides the bg). */
    function cmsRenderPageBanner(?array $page, array $options = []): void
    {
        $title = cmsPageBannerDisplayTitle($page);
        if ($title === '') {
            $title = trim((string) ($options['fallback_title'] ?? 'Cambridge Curriculum'));
        }
        $safe = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        ?>
        <div class="bg-center flex items-center text-center h-[300px] brud-image">
            <div>
                <h1 class="text-[32px] sm:hidden block font-[700] text-white text-left pl-4 mb-5 sm:mb-8 hr-line relative leading-9"><?= $safe ?></h1>
            </div>
            <div class="md:w-[100%]">
                <h1 class="sm:text-[32px] sm:block hidden font-[700] text-white text-left sm:mb-1 hr-line relative leading-9 ml-[7rem]"><?= $safe ?></h1>
            </div>
        </div>
        <?php
    }
}

if (!function_exists('cmsRenderPageBreadcrumbs')) {
    /**
     * jnrext-style breadcrumb row. Pass $options['trail'] as a list of
     * ['label' => ..., 'href' => ...] to override the default Home > title.
     */
    function cmsRenderPageBreadcrumbs(?array $page, array $options = []): void
    {
        $title = cmsPageBannerDisplayTitle($page);
        if ($title === '') {
            $title = trim((string) ($options['fallback_title'] ?? 'Cambridge Curriculum'));
        }
        $sep = '<svg class="rtl:rotate-180 w-3 h-3 text-blue-main mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>';

        $crumbs = $options['trail'] ?? [
            ['label' => 'Home', 'href' => 'index.php'],
            ['label' => $title, 'href' => 'cambridge.php'],
        ];
        if (!is_array($crumbs)) {
            $crumbs = [];
        }

        echo '<div class="flex m-5" aria-label="Breadcrumb"><ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">';
        $first = true;
        foreach ($crumbs as $crumb) {
            if (!is_array($crumb)) {
                continue;
            }
            $label = htmlspecialchars((string) ($crumb['label'] ?? ''), ENT_QUOTES, 'UTF-8');
            $href  = trim((string) ($crumb['href'] ?? ''));
            if ($label === '') {
                continue;
            }
            if ($first) {
                echo '<li class="inline-flex items-center">';
                echo $href !== ''
                    ? '<a href="' . htmlspecialchars($href, ENT_QUOTES, 'UTF-8') . '" class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">' . $label . '</a>'
                    : '<span class="inline-flex items-center sm:text-sm text-xs font-medium text-blue-main">' . $label . '</span>';
                echo '</li>';
                $first = false;
            } else {
                echo '<li><div class="flex items-center">' . $sep;
                echo $href !== ''
                    ? '<a href="' . htmlspecialchars($href, ENT_QUOTES, 'UTF-8') . '" class="ms-1 sm:text-sm text-xs font-medium text-blue-main">' . $label . '</a>'
                    : '<p class="ms-1 text-sm font-medium text-blue-main">' . $label . '</p>';
                echo '</div></li>';
            }
        }
        echo '</ol></div>';
    }
}

if (!function_exists('site_asset_url')) {
    /** Relative asset URL — works both on domain root and local subdir installs. */
    function site_asset_url(string $rel): string
    {
        return ltrim($rel, '/');
    }
}

if (!function_exists('site_base_url')) {
    function site_base_url(): string
    {
        return '';
    }
}
