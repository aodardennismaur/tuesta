<?php
require_once '../model/Usuario.php';
require_once '../util/funciones.php';

$alu = $_POST["alu"];
$doc = $_POST["doc"];

try{
    $obj = new Usuario();
    $data = $obj->mensajeSolicitud($alu,$doc);

    Funciones::imprimeJSON("200","mensaes",$data);
}catch(Exception $ex){
    echo $ex->getMessage();
}