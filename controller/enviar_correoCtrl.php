<?php

require_once '../model/Correo.php';
require_once '../model/Usuario.php';
require_once '../util/funciones.php';

$idDocente = $_POST["idDocente"];
$idAlumno = $_POST["idAlumno"];
$corre = $_POST["NDoc"];
$nombre = $_POST["CDoc"];
$destino = $_POST["destino"];
$destinatario = $_POST["destinatario"];
$asunto = 'Solicitud de Asesoria';
$mensaje = $_POST["mensaje"];

try{
    $obj = new Usuario();
    $data = $obj->enviarSolicitud($idDocente,$idAlumno,$mensaje);

    $obj = new Correo();
    $data = $obj->enviarCorreo($destino,$destinatario,$asunto,$mensaje,$corre,$nombre);
    Funciones::imprimeJSON("200","Enviar Correo", $data);
}catch(Exception $ex){
    echo $ex->getMessage();
}