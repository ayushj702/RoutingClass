<?php

namespace src;

use src\Controller\NotFoundController;

class Router {
    private $routes = [];

    public function addRoute($methods, $path, $controller, $name = null) {
        $this->routes[] = [
            'methods' => $methods,
            'path' => $path,
            'controller' => $controller,
            'name' => $name
        ];
    }

    public function resolveRoute($request) {
        $url = $request->getUrl();
        $method = $request->getMethod();
        $parameter = $request->getParameters();

        foreach ($this->routes as $route) {
            if ($url == $route['path']) {
                return $route;
            }
        }

        return ['controller' => NotFoundController::class];
        //make default controller, 403 controller (route not found)
        
        //show the error message with controller
    }
}