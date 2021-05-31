<?php

namespace core;

use Exception;
use helpers\ArrayHelper;

/**
 * Manejador de los datos del request
 */
class Request{

    public function __construct(){
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->params();
    }

    /**
     * Obtiene los parámetros del request
     *
     * @return Request
     */
    private function params(){
        if(!isset($_SERVER['PATH_INFO'])){
            throw new Exception("Bad Request", 412);
        }
        $pathParams = explode('/', trim($_SERVER['PATH_INFO']?:'','/'));
        SqlInjector::suppressInjection($pathParams);
        SqlInjector::suppressInjection($_GET);
        $this->controller = array_shift($pathParams);
        $this->method = array_shift($pathParams);
        $this->pathParams = $pathParams;
        $this->queryParams(ArrayHelper::arrayToObject($_GET));
        return $this;
    }

    /**
     * Convierte en objetos los parámetreos del request
     *
     * @param array $array
     * @return Request
     */
    private function queryParams($array){
        foreach ($array as $key => $value) {
            $this->$key=$value;
        }
        return $this;
    }

    /**
     * Obtiene una propiedad del objeto
     *
     * @param string $name
     * @return mixed
     */
    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }
}