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
}