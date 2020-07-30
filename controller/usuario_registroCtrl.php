<?php

require_once '../model/Usuario.php';
require_once '../util/funciones.php';

$tipo = $_POST['tipo'];
$nombre = $_POST['nombre'];
$paterno = $_POST['apePaterno'];
$materno = $_POST['apeMaterno'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

if($nombre == "" || 
   $paterno == "" || 
   $materno == "" || 
   $usuario == "" || 
   $clave == ""){
    echo 'vacio';
    return;
}

if($tipo == '0'){
    echo 'tipo';
    return ;
}

try{
    $obj = new Usuario();
    $data = $obj->registrar($tipo,$nombre,$paterno,$materno,$usuario,$clave);
    Funciones::imprimeJSON('200','Usuario Registrado', $data);
}catch(Exception $ex){
    echo $ex->getMessage();
}