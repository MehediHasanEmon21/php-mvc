<?php

namespace App;

use Exception;

class Router {

    private array $routes;

    public function register(string $requestMethod, string $route, callable|array $action): self
    {   
        $this->routes[$requestMethod][$route] = $action;
        return $this;
    }

    public function get(string $route, callable|array $action): self
    {
        return $this->register('get', $route, $action);
    }

    public function post(string $route, callable|array $action): self
    {
        return $this->register('post', $route, $action);
    }

    public function resolve(string $requestUri, string $requestMethod): void
    {
        $route = explode('?',$requestUri)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;

        if(!$action){
            throw new Exception('Route Not Found');
        }

        if(is_callable($action)){
            call_user_func($action);
        }

        if(is_array($action)){
            [$class, $method] = $action;

            if(class_exists($class)){

                $obj = new $class();

                if(method_exists($obj,$method)){
                    call_user_func_array([$obj, $method],[]);
                }
            }
        }
        
    }

}