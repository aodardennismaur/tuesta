<?php

require_once '../model/TipoPersona.php';
require_once '../util/funciones.php';

try{
    $obj = new TipoPersona();
    $data = $obj->listar();
    Funciones::imprimeJSON('200','Datos encontrados',$data);
}catch(Exception $ex){
    echo $ex->getMessage();
}