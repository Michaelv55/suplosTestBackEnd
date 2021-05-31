<?php

namespace core;

use Exception;
use helpers\ArrayHelper;

class Request{
    public function __construct(){
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->params();
    }

    private function params(){
        if(!isset($_SERVER['PATH_INFO'])){
            throw new Exception("Bad Request", 412);
        }
        $pathParams = explode('/', trim($_SERVER['PATH_INFO']?:'','/'));
        $this->controller = array_shift($pathParams);
        $this->method = array_shift($pathParams);
        $this->pathParams = $pathParams;
        $this->queryParams(ArrayHelper::arrayToObject($_GET));
    }

    private function queryParams($array){
        foreach ($array as $key => $value) {
            $this->$key=$value;
        }
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }
        return null;
    }
}