<?php

require_once '../model/Usuario.php';
require_once '../util/funciones.php';

session_start();

$nombre = $_POST['nombre'];
$paterno = $_POST['paterno'];
$materno = $_POST['materno'];
$correo = $_POST['correo'];
$espe = $_POST['espe'];
$grado = $_POST['grado'];

if($_SESSION['idPerfil'] == "" || !isset($_SESSION['idPerfil']) ||
    $nombre == "" ||
    $paterno == "" ||
    $materno == "" ||
    $correo == "" ||
    $espe == "" ||
    $grado == "" ){

    return;
}

try{
    $obj = new Usuario();
    $data = $obj->actualizarDocente($_SESSION['idPerfil'],$nombre,$paterno,$materno,$correo,$espe,$grado);
    Funciones::imprimeJSON('200','Actualizo Docente', $data);
}catch(Exception $ex){
    echo $ex->getMessage();
}