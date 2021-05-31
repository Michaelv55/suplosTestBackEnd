<?php

namespace helpers;

class SystemHelper{
    /**
     * Obtiene una variable de entorno
     *
     * @param string $name
     * @return mixed
     */
    public static function getEnv($name){
        $data = parse_ini_file(APP.'enviroment.ini');
        return $data[$name];
    }

}