<?php

namespace src;
use src\Response;

abstract class ApiController {
    private $parameter;

    public function __construct($parameter) {
        $this->parameter = $parameter;
    }

    public function __invoke($request) {
        $response = new Response();
        $response->addHeader('Content-Type: application/json');
        $data = ['message' => 'Welcome to the API', 'params' => $this->parameter];
        $response->setContent(json_encode($data));
        return $response;
    }
}