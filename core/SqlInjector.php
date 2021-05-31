<?php

namespace core;

use Exception;

class SqlInjector
{
    const VALIDACIONES = ['/\\\/', '/("|\')/',
        '/INSERT INTO/', '/SELECT/', '/UPDATE/', '/DELETE FROM/',
        '/MERGE/', '/STARTUP/', '/DBMS_LOCK.SLEEP/', '/DBMS_LOB/',
        '/ CONVERT/', '/AND/', '/OR/', '/NULL/', '/SHUTDOWN/',
        '/TRUNCATE TABLE/', '/UNION/', '/DROP TABLE/', '/TRUNCATE/'
    ];
    const CLAVE = '_CARACTERES_INVALIDOS_';

    public static function suppressInjection($data)
    {
        $data = (is_array($data)) ? $data : [$data];
        foreach ($data as $valor) {
            $resultado = preg_replace(self::VALIDACIONES, self::CLAVE, strtoupper($valor));
            if (strstr($resultado, self::CLAVE) != false) {
                self::convertirRequest();
                throw new Exception('Se han ingresado caracteres inválidos', 412);
            }
        }
    }

    private static function convertirRequest()
    {
        $_REQUEST = str_replace("'", '', $_REQUEST);
        $_REQUEST = str_replace('"', '', $_REQUEST);
    }
}