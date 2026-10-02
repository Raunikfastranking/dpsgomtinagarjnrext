<?php
/**
 * Single source for CMS image alt text across the site.
 * API may expose media_alt_text (MS), image_alt_text, or legacy image_alt — same precedence everywhere.
 *
 * @param array|null $row Associative slice from CMS (column, carousel item, media row, etc.)
 * @param string $fallback Used when none of the known keys hold a non-empty string
 */
function cms_image_alt(?array $row, string $fallback = ''): string
{
    if (!is_array($row)) {
        return htmlspecialchars((string) $fallback, ENT_QUOTES, 'UTF-8');
    }

    foreach (['media_alt_text', 'image_alt_text', 'image_alt'] as $key) {
        if (isset($row[$key]) && $row[$key] !== '' && $row[$key] !== null) {
            return htmlspecialchars((string) $row[$key], ENT_QUOTES, 'UTF-8');
        }
    }

    return htmlspecialchars((string) $fallback, ENT_QUOTES, 'UTF-8');
}
