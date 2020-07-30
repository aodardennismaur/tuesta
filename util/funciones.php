<?php

class Funciones {
    public static function imprimeJSON($estado,$mensaje,$datos){
        header("HTTP/1.1" . $estado);
        header('Content-Type: application/json');
        $data['estado'] = $estado;
        $data['mensaje'] = $mensaje;
        $data['datos'] = $datos;
        echo json_encode($data);
    }
}