<?php

namespace Core;

class Router{
    protected $routes = [];

    public function add($method, $uri, $controller){
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function previousUrl()
    {
        return $_SERVER['HTTP_REFERER'];
    }

    protected function abort($code = 404)
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }

}