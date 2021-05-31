<?php

namespace core;

use core\Request;
use Exception;

class Application{

    /**
     * @var Request
     */
    private $request;

    public function __construct(){
        $this->request = new Request();
    }

    public function run(){
        $class = $this->getValidateController();
        $method = $this->getValidateMethod();
        call_user_func([(new $class()), $method], $this->request, $this->request->pathParams);
    }

    private function getValidateController(){
        $class = 'controllers\\'.$this->request->controller;
        if(class_exists($class)){
            return $class;
        }
        throw new Exception('Controlador '.$this->request->controller.' no encontrado.', 500);
    }

    private function getValidateMethod(){
        $class = 'controllers\\'.$this->request->controller;
        if(method_exists($class, $this->request->method)){
            return $this->request->method;
        }
        throw new Exception('Método '.$this->request->method.' no encontrado.', 500);

    }

    public static function response($data,$code){
        http_response_code($code);
        echo json_encode([
            'data'=>$data,
            'code'=>$code
        ]);
    }

}
