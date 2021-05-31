<?php

namespace controllers;

use Cities;
use core\Request;
use Exception;

class PropertiesController{

    public function create(Request $request){
        if(is_null($request->name)){
            throw new Exception('El parámetro "name" es requerido.', 412);
        }
        Cities::create($request->name);
    }
    public function update(Request $request){
        var_dump($request);
    }
    public function delete(Request $request){
        var_dump($request);
    }

}