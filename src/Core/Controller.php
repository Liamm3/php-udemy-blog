<?php

namespace App\Core;

abstract class Controller
{
    protected function render($view, $params)
    {
        extract($params);
        include __DIR__ . "/../../views/{$view}.php";
    }
}
