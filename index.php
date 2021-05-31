<?php

header('Content-Type: application/json');

use core\Application;

define('APP', __DIR__ . DIRECTORY_SEPARATOR);

/**
 * Manejador general de excepciones
 */
set_exception_handler(function($exception){
  http_response_code($exception->getCode());
  echo json_encode(['exception'=>$exception->getMessage()]);
});

require APP . 'autoload.php';

require APP . 'config'.DIRECTORY_SEPARATOR.'configDataBase.php';

$app = new Application();
$app->run();