<?php

if (!function_exists('dps_resolve_footer_layout_meta')) {
    /**
     * Prefer the primary CMS footer block (non–landing-page) from branch layout-parts.
     * Numeric indexes are fragile when new layout parts are added.
     *
     * @param mixed $header_footer_data
     * @return array<string, mixed>
     */
    function dps_resolve_footer_layout_meta($header_footer_data)
    {
        if (!is_array($header_footer_data)) {
            return [];
        }

        $footers = [];
        foreach ($header_footer_data as $part) {
            if (($part['type'] ?? '') === 'footer' && is_array($part['meta_data'] ?? null)) {
                $footers[] = $part;
            }
        }

        foreach ($footers as $part) {
            $slug = (string)($part['slug'] ?? '');
            if ($slug !== '' && stripos($slug, 'landing') !== false) {
                continue;
            }
            return $part['meta_data'];
        }

        if (!empty($footers[0]['meta_data']) && is_array($footers[0]['meta_data'])) {
            return $footers[0]['meta_data'];
        }

        if (isset($header_footer_data[1]['meta_data']) && is_array($header_footer_data[1]['meta_data'])) {
            return $header_footer_data[1]['meta_data'];
        }

        return [];
    }
}
