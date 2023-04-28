<?php

    // In case one is using PHP 5.4's built-in server
    $filename = __DIR__ . preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}
require_once __DIR__ . '/vendor/bramus/router/src/Bramus/Router/Router.php';

    // Create a Router
    $router = new \Bramus\Router\Router();
    // Static route: 
    $router->all('/', function () {
        require('Public/Views/Home.php');
    });
    // Custom 404 Handler
    $router->set404(function () {
        header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
        echo '404, route not found!';
    });
    $router->run();

// EOF
