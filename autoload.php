<?php

spl_autoload_register(function($className){
    $directorys = ['controllers', 'helpers', 'models'];
    foreach ($directorys as $key => $directory) {
        $fileRouteTmp = APP.$className.'.php';
        $fileRouteTmp2 = APP.$directory.DIRECTORY_SEPARATOR.$className.'.php';
        if(file_exists($fileRouteTmp)){
            include $fileRouteTmp;
            return;
        }else if(file_exists($fileRouteTmp2)){
            include APP.$directory.DIRECTORY_SEPARATOR.$className.'.php';
            return;
        }
    }
});












