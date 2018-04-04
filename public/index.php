<?php

session_start();
require __DIR__ . "/../init.php";

$routes = [
    "/index" => [
        "controller" => "postsController",
        "method" => "index"
    ],
    "/post" => [
        "controller" => "postsController",
        "method" => "show"
    ],
    "/login" => [
        "controller" => "loginController",
        "method" => "login"
    ],
    "/logout" => [
        "controller" => "loginController",
        "method" => "logout"
    ],
    "/dashboard" => [
        "controller" => "loginController",
        "method" => "dashboard"
    ],
    "/posts-admin" => [
        "controller" => "postsAdminController",
        "method" => "index"
    ],
    "/posts-edit" => [
        "controller" => "postsAdminController",
        "method" => "edit"
    ]
];

$pathInfo = $_SERVER["PATH_INFO"];

if (isset($routes[$pathInfo])) {
    $route = $routes[$pathInfo];
    $controller = $container->make($route["controller"]);
    $method = $route["method"];
    $controller->$method();
}
