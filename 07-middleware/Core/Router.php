<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function add($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function put($uri, $controller)
    {
        return $this->add($uri, $controller, 'PUT');
    }

    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, 'PATCH');
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                // if($route['middleware'] === 'guest') {
                //     (new Guest)->handle();
                // }

                // if($route['middleware'] === 'auth') {
                //     (new Auth)->handle();
                // }
                
                //REFACTOR::no need to check condition for each route
                // if($route['middleware']) {
                //     $middleware = Middleware::MAP[$route['middleware']];
                //     (new $middleware)->handle();
                // }

                //REFACTOR::run handle method directly for associated middleware 
                Middleware::resolve($route['middleware']);

                return require basePath($route['controller']);
            }
        }

        abort();
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }
}
