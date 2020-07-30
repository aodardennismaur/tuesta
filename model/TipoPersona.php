<?php

require_once 'conexion.php';

class TipoPersona extends Conexion {
    public function listar(){
        try{
            $db = $this->base->prepare("SELECT * FROM tipo_usuario");
            $db->execute();
            $row = $db->fetchAll();
            return $row;
        }catch (PDOException $ex){
            echo $ex->getMessage();
        }
    }
}