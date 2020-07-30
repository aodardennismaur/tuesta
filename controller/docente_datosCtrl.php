<?php

require_once '../model/Usuario.php';
require_once '../util/funciones.php';
session_start();


try{
    $obj = new Usuario();
    $data = $obj->datosDocente($_SESSION['idPerfil']);
    Funciones::imprimeJSON('200','Datos del Docente', $data);
}catch(Exception $ex){
    echo $ex->getMessage();
}