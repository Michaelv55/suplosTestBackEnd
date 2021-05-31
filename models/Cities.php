<?php

use core\Orm;

/**
 * Representación de la tabla CITIES de la base de datos en PHP
 */
class Cities extends Orm{

    /**
     * crea un registro
     * @param string $name
     * @return Cities
     */
    public static function create($name){
        $model = new self();
        $model->id = null;
        $model->NAME = $name;
        $model->save();
        return $model;
    }

    /**
     * Obtiene un registro según su nombre
     *
     * @param string $name
     * @return void
     */
    public static function getByName($name){
        $model = new self();
        return $model->retrieveByField('NAME', $name);
    }
}