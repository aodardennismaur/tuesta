<?php

require_once '../model/Usuario.php';

session_start();

if(isset($_SESSION['tipo'])){
    header("Location: ../");
    return;
}

$obj = new Usuario();

if (isset($_SESSION['idUsuario'])) {
    $obj->direccionSistema($_SESSION['idUsuario']);

    if ($_SESSION['tipo'] == 1) {
        header("Location: alumno/index.php");
    } else if ($_SESSION['tipo'] == 2) {
        header("Location: docente/index.php");
    }
} else {
    header("Location: ../index.php");
}
