<?php

use core\Orm;

class Cities extends Orm{

    /**
     *
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

    public static function getByName($name){
        $model = new self();
        return $model->retrieveByField('NAME', $name);
    }
}