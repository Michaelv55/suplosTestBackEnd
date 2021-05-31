<?php

namespace helpers;

use stdClass;

class ArrayHelper{

    /**
     * Convierte un arraya a un objeto
     *
     * @param array $array
     * @return object
     */
    public static function arrayToObject($array){
        $obj = new stdClass;
        foreach($array as $k => $v) {
           if(strlen($k)) {
              if(is_array($v)) {
                 $obj->{$k} = ArrayHelper::arrayToObject($v);
              } else {
                 $obj->{$k} = $v;
              }
           }
        }
        return $obj;
    }
    
}