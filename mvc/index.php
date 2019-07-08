<?php


error_reporting(E_ALL);

function __autoload($class) {
    $file_name = 'application/core/' . $class . '.php';
    if (file_exists($file_name)) {
        require_once $file_name;
    }
}

$router = new Router();
$router->start();
