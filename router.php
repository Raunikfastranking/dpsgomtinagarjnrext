<?php
// Dev router for PHP built-in server — mirrors .htaccess rewrite rules.
// Run: php -S localhost:8000 router.php

$uri  = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = trim($uri, '/');

// Serve real files/dirs directly (assets, images, css, js, .php files)
if ($path !== '' && file_exists(__DIR__ . '/' . $path)) {
    return false;
}

// /home → index.php
if (preg_match('#^home/?$#', $path)) {
    require __DIR__ . '/index.php';
    return true;
}

// /blog/<slug> → detail.php?slug=<slug>
if (preg_match('#^blog/([A-Za-z0-9-]+)/?$#', $path, $m)) {
    $_GET['slug'] = $m[1];
    require __DIR__ . '/detail.php';
    return true;
}

// /photo-gallery → photo-gallery.php
if (preg_match('#^([A-Za-z0-9-]+)/?$#', $path, $m) && file_exists(__DIR__ . '/' . $m[1] . '.php')) {
    require __DIR__ . '/' . $m[1] . '.php';
    return true;
}

// Fallback → index.php
if ($path === '') {
    require __DIR__ . '/index.php';
    return true;
}

http_response_code(404);
require __DIR__ . '/404.php';
return true;
