<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$queryString = parse_url($_SERVER['REQUEST_URI'], PHP_URL_QUERY);

// Initialize an empty array for query parameters
$queryParams = [];

// Only parse the query string if it's not null
if ($queryString !== null) {
    parse_str($queryString, $queryParams);
}

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
    '/mission' => 'controllers/mission.php',
    '/post.php' => 'controllers/show.php'
];

routeToController($uri, $routes, $queryParams);
