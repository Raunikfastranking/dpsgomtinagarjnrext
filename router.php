<?php
// Router for `php -S` — mirrors the .htaccess / web.config rewrite rules.

$docRoot = __DIR__;
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?: '/';
$uri = rawurldecode($uri);

$staticExt = 'jpg|jpeg|png|gif|css|js|pdf|svg|ico|webp|apk|zip|rar|txt|xml|json|mp4|webm|ogg|map|woff|woff2|ttf|eot';

// Strip trailing slash on extensionless URLs (skip real directories)
if ($uri !== '/' && substr($uri, -1) === '/' && !is_dir($docRoot . rtrim($uri, '/'))) {
    header('Location: ' . rtrim($uri, '/'), true, 301);
    return true;
}

// /proxy/name -> /proxy/name.php
if (preg_match('#^/proxy/([A-Za-z0-9_-]+)/?$#i', $uri, $m) && is_file($docRoot . "/proxy/{$m[1]}.php")) {
    require $docRoot . "/proxy/{$m[1]}.php";
    return true;
}

// Subfolder index.php (e.g. /admissions-open-2026-27/)
$dirPath = rtrim($uri, '/');
if (is_dir($docRoot . $dirPath) && is_file($docRoot . $dirPath . '/index.php')) {
    require $docRoot . $dirPath . '/index.php';
    return true;
}

// /home and /index -> index.php
if (preg_match('#^/(home|index)/?$#i', $uri)) {
    require $docRoot . '/index.php';
    return true;
}

// /blog/slug -> detail.php?slug=
if (preg_match('#^/blog/([A-Za-z0-9-]+)/?$#i', $uri, $m)) {
    $_GET['slug'] = $m[1];
    require $docRoot . '/detail.php';
    return true;
}

// /view/slug -> detail-view.php?slug=
if (preg_match('#^/view/([A-Za-z0-9-]+)/?$#i', $uri, $m) && is_file($docRoot . '/detail-view.php')) {
    $_GET['slug'] = $m[1];
    require $docRoot . '/detail-view.php';
    return true;
}

// Existing files/dirs -> let the built-in server handle them
if ($uri !== '/' && file_exists($docRoot . $uri)) {
    return false;
}

// Clean URL -> existing .php file (e.g. /smart-classrooms -> smart-classrooms.php)
if (!preg_match('/\.(' . $staticExt . ')$/i', $uri)) {
    $phpFile = $docRoot . $dirPath . '.php';
    if (is_file($phpFile)) {
        require $phpFile;
        return true;
    }

    // CMS pages when no local .php stub exists
    if (preg_match('#^/([^/]+)/?$#', $uri, $m)) {
        $_GET['page'] = $m[1];
        require $docRoot . '/page-template.php';
        return true;
    }
}

http_response_code(404);
require $docRoot . '/404.php';
return true;
