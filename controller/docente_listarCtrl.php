<?php

require_once '../model/Usuario.php';
require_once '../util/funciones.php';

try{
    $obj = new Usuario();
    $data = $obj->listarDocente();
    Funciones::imprimeJSON('200','Docentes', $data);
}catch(Exception $ex){
    echo $ex->getMessage();
}