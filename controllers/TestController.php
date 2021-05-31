<?php

namespace controllers;

use core\Request;

class TestController{

    public function testMethod(Request $request, $pathParams){
        var_dump($request);
    }
}