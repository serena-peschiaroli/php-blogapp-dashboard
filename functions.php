<?php

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
}

function urlIs($value)
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function routeToController($uri, $routes, $queryParams)
{
    if (array_key_exists($uri, $routes)) {
        // if the route is /post.php, check for id parameter
        if ($uri === '/post.php' && isset($queryParams['id'])) {
            require $routes[$uri];
        } elseif ($uri !== '/post.php') {
            require $routes[$uri];
        } else {
            abort();
        }
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);
    require "views/{$code}.php";
    die();
}
