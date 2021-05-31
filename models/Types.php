<?php

use core\Orm;

class Types extends Orm{

    /**
     *
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

    public static function getByName($name){
        $model = new self();
        return $model->retrieveByField('NAME', $name);
    }
}