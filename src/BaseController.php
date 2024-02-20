<?php

namespace src;

abstract class BaseController {
    abstract public function render($request);
}

//use this class for methods which are to be used in other controllers frequently