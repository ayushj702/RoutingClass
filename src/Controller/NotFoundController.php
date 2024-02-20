<?php

namespace src\Controller;

use src\Response;
use src\BaseController;

class NotFoundController extends BaseController{
    public function render($request) {
        $response = new Response();
        $response->setContent("404 Not found.");
        return $response;
    } //html render or json
}