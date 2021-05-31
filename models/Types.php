<?php

use core\Orm;


/**
 * Representación de la tabla TYPES de la base de datos en PHP
 */
class Types extends Orm{

    /**
     * Crea un registro
     * @param string $name
     * @return Types
     */
    public static function create($name){
        $model = new self();
        $model->id = null;
        $model->NAME = $name;
        $model->save();
        return $model;
    }

    /**
     * Obtiene un registro según us nombre
     *
     * @param string $name
     * @return void
     */
    public static function getByName($name){
        $model = new self();
        return $model->retrieveByField('NAME', $name);
    }
}