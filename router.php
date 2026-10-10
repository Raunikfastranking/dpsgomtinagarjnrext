<?php
/**
 * Dev-server router for `php -S localhost:8000 router.php`.
 * Mirrors the IIS URL-rewrite rules in web.config so clean URLs
 * (/contact-us, /blog/slug, CMS page slugs) work locally.
 * Production (IIS) does not use this file.
 */

if (!dps_route($_SERVER['REQUEST_URI'])) {
    return false; // real file on disk -> let php -S serve it as-is
}

function dps_route(string $requestUri): bool
{
    $root = __DIR__;
    $path = trim((string) parse_url($requestUri, PHP_URL_PATH), '/');
    $staticExt = '#\.(jpe?g|png|gif|css|js|pdf|svg|ico|webp|apk|zip|rar|txt|xml|json|mp4|webm|ogg|map|woff2?|ttf|eot)$#i';

    // Rule: strip trailing slash on extensionless URLs (skip real directories)
    if (substr($requestUri, -1) === '/' && $path !== '' && !is_dir($root . '/' . $path)) {
        $qs = $_SERVER['QUERY_STRING'] ?? '';
        header('Location: /' . $path . ($qs !== '' ? "?$qs" : ''), true, 301);
        return true;
    }

    // Real files (assets, existing .php, directories are handled below)
    if ($path !== '' && is_file($root . '/' . $path)) {
        return false; // signal php -S to serve it directly
    }

    // Rule: /proxy/name -> proxy/name.php
    if (preg_match('#^proxy/([A-Za-z0-9_-]+)$#i', $path, $m)) {
        require $root . "/proxy/{$m[1]}.php";
        return true;
    }

    // Rule: directory index (e.g. /admissions-open-2026-27)
    if ($path !== '' && is_file("$root/$path/index.php")) {
        require "$root/$path/index.php";
        return true;
    }

    // Rule: /home, /index -> index.php
    if (preg_match('#^(home|index)$#i', $path)) {
        require "$root/index.php";
        return true;
    }

    // Rule: /blog/slug -> detail.php?slug=
    if (preg_match('#^blog/([A-Za-z0-9-]+)$#i', $path, $m)) {
        $_GET['slug'] = $m[1];
        require "$root/detail.php";
        return true;
    }

    // Rule: /view/slug -> detail-view.php?slug=
    if (preg_match('#^view/([A-Za-z0-9-]+)$#i', $path, $m) && is_file("$root/detail-view.php")) {
        $_GET['slug'] = $m[1];
        require "$root/detail-view.php";
        return true;
    }

    // Rule: clean URL -> existing .php file
    if ($path !== '' && !preg_match($staticExt, $path) && is_file("$root/$path.php")) {
        require "$root/$path.php";
        return true;
    }

    // Rule: CMS page slug -> page-template.php?page=slug
    if (preg_match('#^[^/]+$#', $path) && !preg_match($staticExt, $path)) {
        $_GET['page'] = $path;
        require "$root/page-template.php";
        return true;
    }

    // Fallback
    if ($path === '') {
        require "$root/index.php";
        return true;
    }
    http_response_code(404);
    require "$root/404.php";
    return true;
}
