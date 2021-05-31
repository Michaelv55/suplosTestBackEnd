<?php

namespace controllers;

use Cities;
use core\Request;
use Exception;
use Houses;
use Types;

class PropertiesController{

    public function create(Request $request){
        $this->validations($request);

        $city = Cities::getByName($request->city);
        $city = empty($city) ? Cities::create($request->city) : $city[0];

        $houseType = Types::getByName($request->houseType);
        $houseType = empty($houseType) ? Types::create($request->houseType) : $houseType[0];

        $house = Houses::create(
            $request->address, 
            $city->ID, 
            $request->phone, 
            $request->postalCode, 
            $houseType->ID, 
            $request->price
        );

        var_dump($house);
    }
    public function update(Request $request){
        var_dump($request);
    }
    public function delete(Request $request){
        var_dump($request);
    }

    protected function validations(Request $request){
        if($request->method == 'create'){
            if(is_null($request->address)){
                throw new Exception('El parámetro "address" es requerido.', 412);
            }
            if(is_null($request->city)){
                throw new Exception('El parámetro "city" es requerido.', 412);
            }
            if(is_null($request->phone)){
                throw new Exception('El parámetro "phone" es requerido.', 412);
            }
            if(is_null($request->postalCode)){
                throw new Exception('El parámetro "postalCode" es requerido.', 412);
            }
            if(is_null($request->houseType)){
                throw new Exception('El parámetro "type" es requerido.', 412);
            }
            if(is_null($request->price)){
                throw new Exception('El parámetro "price" es requerido.', 412);
            }
        }
    }

}