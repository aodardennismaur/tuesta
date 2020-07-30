<?php

require_once '../model/Usuario.php';
require_once '../util/funciones.php';

$id = $_POST["id"];

try{
    $obj = new Usuario();
    $data = $obj->solicitudesDocente($id);
    Funciones::imprimeJSON("200","solicitudes",$data);
}catch(Exception $ex){
    echo $ex->getMessage();
}