<?php

require __DIR__ . "/../init.php";

$routes = [
    "/index" => [
        "controller" => "postsController",
        "method" => "index"
    ],
    "/post" => [
        "controller" => "postsController",
        "method" => "show"
    ]
];

$pathInfo = $_SERVER["PATH_INFO"];

if (isset($routes[$pathInfo])) {
    $route = $routes[$pathInfo];
    $controller = $container->make($route["controller"]);
    $method = $route["method"];
    $controller->$method();
}
