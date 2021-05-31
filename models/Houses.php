<?php

use core\Orm;

class Houses extends Orm{

    /**
     *
     * @param string $name
     * @return Houses
     */
    public static function create($address, $idCity, $phone, $postalCode, $idType, $price){
        $model = new self();
        $model->id = null;
        $model->ADDRESS = $address;
        $model->ID_CITY = $idCity;
        $model->PHONE = $phone;
        $model->POSTAL_CODE = $postalCode;
        $model->ID_TYPE = $idType;
        $model->PRICE = $price;
        $model->save();
        return $model;
    }
}