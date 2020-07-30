<?php

require_once '../model/Usuario.php';
require_once '../util/funciones.php';

try{
    $obj = new Usuario();
    $obj->logout();
}catch(Exception $ex){
    echo $ex->getMessage();
}