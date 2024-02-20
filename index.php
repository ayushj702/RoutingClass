<?php

require_once 'autoload.php';
use src\Request;
use src\Router;
use src\ApiController;
use src\Response;
use src\BaseController;
use src\Controller\HomeController;


$request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']); //use dynamic url /home for get
//server req should also consists of server var
//pass it as homecontroller::class (key)
//directly make obj from that class
$router = new Router();
$router->addRoute(['GET'], '/work2/routingclass/home', HomeController::class, 'home');
$router->addRoute(['GET', 'POST'], '/api/user/{id}', 'ApiController', 'api.user');

$route = $router->resolveRoute($request);
$controller = new $route['controller'](); //treating string as an object
//try calling the function using the string variable

$response = $controller->render($request); //simplify 19-23, replace 20
$response->send();
//use .htaccess to get the default response to index.php (home)
//example user/1
?>