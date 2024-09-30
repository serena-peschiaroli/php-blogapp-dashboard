<?php


$routes = [
    '' => 'controllers/index.php',
    'about' => 'controllers/about.php',
    'contact' => 'controllers/contact.php',
    'mission' => 'controllers/mission.php',
    'post' => 'controllers/post.php',
    'new-post' => 'controllers/new-post.php',
    'edit-post' => 'controllers/edit-post.php',
    'delete' => 'controllers/delete.php',
    'register-author' => 'controllers/auth/register-author.php',
    'register-user' => 'controllers/auth/register-user.php',
];

function routeToController($uri, $routes)
{
    foreach ($routes as $route => $controller) {
        // convert the route into a regular expression
        $routePattern = preg_replace('/{[^\/]+}/', '([^/]+)', $route);

        if (preg_match("#^$routePattern$#", $uri, $matches)) {
            array_shift($matches); // remove the full match from the $matches array

            // extract the route parameters if present
            $routeParams = [];
            if (preg_match_all('/{([^\/]+)}/', $route, $paramNames)) {
                $routeParams = array_combine($paramNames[1], $matches);
            }

            // merge route parameters with existing $_GET parameters
            $_GET = array_merge($_GET, $routeParams);

            require $controller;
            return;
        }
    }

    abort();
}

function abort($code = 404)
{
    http_response_code($code);
    require "views/{$code}.php";
    die();
}

routeToController($uri, $routes);
