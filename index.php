<?php

require_once 'autoload.php';
use src\Request;
use src\Router;
use src\ApiController;
use src\Response;
use src\BaseController;
use src\Controller\HomeController;


$request = new Request($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
//server req should also consists of server var
//pass it as homecontroller::class (key)
//directly make obj from that class
$router = new Router();
$router->addRoute(['GET'], '/work2/routingclass/home', HomeController::class, 'home');
$router->addRoute(['GET', 'POST'], '/api/user/{id}', 'ApiController', 'api.user');

$route = $router->resolveRoute($request);

//extracting controller class name from route
$controllerClass = $route['controller'];

//passing a string:
$response = call_user_func([$controllerClass, 'render'], $request);



//passing as object/instance of class
//$response = $controllerClass::render($request);
$response->send();

//simplification of above 3 lines:
//$response = $route['controller']::render($request)->send();

//simplification of above 3 lines as string:
//call_user_func([$route['controller'], 'render'], $request)->send();


//$controller = new $route['controller'](); //treating string as an object
//try calling the function using the string variable

//$response = $controller->render($request); //simplify 19-23, replace 20
//$response->send();
//use .htaccess to get the default response to index.php (home)
//example user/1
?>
