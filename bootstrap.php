<?php
session_start();

spl_autoload_register(function($className) {
    $includeFile = str_replace('\\', '/', $className .".php");

    if (!file_exists($includeFile)) return false;

    require_once $includeFile;
});

require_once 'config.php';
require_once 'vendor/autoload.php';
require_once "routes.php";

// 404 page
if (ROUTE_404 && !\Classes\Route::$availableRouteFound)
    return require_once "404.php";