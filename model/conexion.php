<?php

class Conexion {
    protected $base;
    public function __construct(){
        $this->abrirConexion();
    }   
    public function __destruct(){
        $this->base = NULL;
    }

    private function abrirConexion(){
        try{
            $this->base = new PDO("mysql:host=localhost;dbname=tuesta;port=3306", "root", "123456789");
            $this->base->exec("SET NAMES 'utf8', lc_time_names='es_PE', time_zone = '-05:00';");
            $this->base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
        return $this->base;
    }
}