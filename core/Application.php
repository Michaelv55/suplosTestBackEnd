<?php

namespace core;

use core\Request;
use Exception;

/**
 * Clase base de la aplicación del mini API
 */
class Application{

    /**
     * @var Request
     */
    private $request;

    public function __construct(){
        $this->request = new Request();
    }

    /**
     * Inicia la ejecución del controlador requerido
     *
     * @return void
     */
    public function run(){
        $class = $this->getValidateController();
        $method = $this->getValidateMethod();
        call_user_func([(new $class()), $method], $this->request, $this->request->pathParams);
    }

    /**
     * Valida si el controlador es válido
     *
     * @return string
     */
    private function getValidateController(){
        $class = 'controllers\\'.$this->request->controller;
        if(class_exists($class)){
            return $class;
        }
        throw new Exception('Controlador '.$this->request->controller.' no encontrado.', 500);
    }

    /**
     * Valida si el método para el controlador es válido
     *
     * @return string
     */
    private function getValidateMethod(){
        $class = 'controllers\\'.$this->request->controller;
        if(method_exists($class, $this->request->method)){
            return $this->request->method;
        }
        throw new Exception('Método '.$this->request->method.' no encontrado.', 500);

    }

    /**
     * forma general de la respuesta del mini API
     *
     * @param array $data
     * @param int $code
     * @return void
     */
    public static function response($data,$code){
        http_response_code($code);
        echo json_encode([
            'data'=>$data,
            'code'=>$code
        ]);
    }

}
