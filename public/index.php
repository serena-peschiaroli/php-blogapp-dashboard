<?php

use Core\Session;
use Core\ValidationException;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

const BASE_PATH = __DIR__ . '/../';

session_start();

var_dump($_SESSION);

//composer autoloader
require BASE_PATH . 'vendor/autoload.php';

require BASE_PATH . 'Core/functions.php';
require BASE_PATH . 'bootstrap.php';

$router = new \Core\Router();
require BASE_PATH . 'routes.php';



$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method']?? $_SERVER['REQUEST_METHOD'];

try{
    $router->route($uri, $method);
}catch(ValidationException $exception){

    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);

    return redirect($router->previousUrl());

}

Session::unflash();


