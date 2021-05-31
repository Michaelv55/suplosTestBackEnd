<?php

namespace helpers;

class SystemHelper{
    public static function getEnv($name){
        $data = parse_ini_file(APP.'enviroment.ini');
        return $data[$name];
    }

}