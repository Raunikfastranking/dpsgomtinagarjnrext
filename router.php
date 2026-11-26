<?php
// Router for PHP built-in server — mirrors the IIS rewrite rules in web.config
// Run: php -S localhost:8000 router.php

$docroot = __DIR__;
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = ltrim(rawurldecode($uri), '/');

$staticExt = '#\.(jpg|jpeg|png|gif|css|js|pdf|svg|ico|webp|apk|zip|rar|txt|xml|json|mp4|webm|ogg|map|woff|woff2|ttf|eot)$#i';

// Serve real files (incl. .php) as-is
if ($path !== '' && is_file($docroot . '/' . $path)) {
    return false;
}

// Strip trailing slash on non-directory URLs
if ($path !== '' && substr($uri, -1) === '/' && !is_dir($docroot . '/' . rtrim($path, '/'))) {
    header('Location: ' . rtrim($uri, '/'), true, 301);
    exit;
}

// /proxy/name -> /proxy/name.php
if (preg_match('#^proxy/([A-Za-z0-9_-]+)/?$#i', $path, $m)) {
    $f = $docroot . '/proxy/' . $m[1] . '.php';
    if (is_file($f)) { require $f; return true; }
}

// Subfolder directory index
$dir = rtrim($path, '/');
if ($dir !== '' && is_file($docroot . '/' . $dir . '/index.php')) {
    require $docroot . '/' . $dir . '/index.php';
    return true;
}

// /home and /index -> index.php
if (preg_match('#^(home|index)/?$#i', $path)) {
    require $docroot . '/index.php';
    return true;
}

// /blog/slug -> detail.php?slug=
if (preg_match('#^blog/([A-Za-z0-9-]+)/?$#i', $path, $m)) {
    $_GET['slug'] = $m[1];
    require $docroot . '/detail.php';
    return true;
}

// /view/slug -> detail-view.php?slug=
if (preg_match('#^view/([A-Za-z0-9-]+)/?$#i', $path, $m) && is_file($docroot . '/detail-view.php')) {
    $_GET['slug'] = $m[1];
    require $docroot . '/detail-view.php';
    return true;
}

// Clean URL -> existing .php file (e.g. /smart-classrooms -> smart-classrooms.php)
if (!preg_match($staticExt, $path) && is_file($docroot . '/' . $path . '.php')) {
    require $docroot . '/' . $path . '.php';
    return true;
}

// Single-segment CMS page -> page-template.php?page=
if (preg_match('#^([^/]+)/?$#', $path, $m) && !preg_match($staticExt, $m[1])) {
    $_GET['page'] = $m[1];
    require $docroot . '/page-template.php';
    return true;
}

return false;
