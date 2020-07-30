<?php 

require_once '../model/Usuario.php';
require_once '../util/funciones.php';

$usuario = $_POST['usu'];
$clave = $_POST['cla'];

if($usuario == "" || $clave == "" ) {
    echo 'vacio';
    return;
}

try{
    $obj = new Usuario();
    $data = $obj->login($usuario,$clave);
    
    if($data == true){
        echo 1;
    }else{
        echo 0;
    }

}catch(Exception $ex){
    echo $ex->getMessage();
}