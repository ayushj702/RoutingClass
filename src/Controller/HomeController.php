<?php

namespace src\Controller;

use src\Response;
use src\BaseController;

class HomeController extends BaseController{
    public function render($request) {
        $response = new Response();
        $response->setContent("This is home page.");
        return $response;
    } //html render or json
}