<?php

require __DIR__ . "/../init.php";

$pathInfo = $_SERVER["PATH_INFO"];

if ($pathInfo == "/index") {
    $postsController = $container->make("postsController");
    $postsController->index();
} elseif ($pathInfo == "/post") {
    $postsController = $container->make("postsController");
    $postsController->show();
}