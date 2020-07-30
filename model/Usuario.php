<?php

require_once 'conexion.php';

class Usuario extends Conexion
{
    public function registrar($tipo, $nombre, $paterno, $materno, $usuario, $clave)
    {
        try {
            $db = $this->base->prepare("call insert_usuario(:p_tipo, :p_nombre, :p_paterno, :p_materno, :p_usuario, :p_clave);");
            $db->bindParam(':p_tipo', $tipo);
            $db->bindParam(':p_nombre', $nombre);
            $db->bindParam(':p_paterno', $paterno);
            $db->bindParam(':p_materno', $materno);
            $db->bindParam(':p_usuario', $usuario);
            $db->bindParam(':p_clave', $clave);
            $db->execute();
            $row = $db->fetch(PDO::FETCH_ASSOC);
            return $row;
        } catch (PDOException $ex) {
            $this->base->rollBack();
            echo $ex->getMessage();
        }
    }

    public function login($usuario, $clave)
    {
        try {
            $db = $this->base->prepare("SELECT id FROM usuario where usuario = :p_usu and clave = :p_cla");
            $db->bindParam(':p_usu', $usuario);
            $db->bindParam(':p_cla', $clave);
            $db->execute();
            $row = $db->fetch(PDO::FETCH_ASSOC);

            if (is_array($row)) {
                if (count($row) == 1) {
                    session_start();
                    $_SESSION['idUsuario'] = $row['id'];
                }
                return true;
            } 
            return false;

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function direccionSistema($idUsuario){
        try{
            $db = $this->base->prepare("SELECT id, nombre, apePaterno, apeMaterno, correo, id_tipo_usuario FROM perfil where id_usuario = :p_usu");
            $db->bindParam(':p_usu', $idUsuario);
            $db->execute();
            $row = $db->fetch(PDO::FETCH_ASSOC);
            
            session_start();
            $_SESSION['idPerfil'] = $row['id'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['paterno'] = $row['apePaterno'];
            $_SESSION['materno'] = $row['apeMaterno'];
            $_SESSION['correo'] = $row['correo'];
            $_SESSION['tipo'] = $row['id_tipo_usuario'];

        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function logout(){
        try{
            session_start();
            session_unset();
            session_destroy();
        }catch(Exception $ex){
            echo $ex->getMessage();
        }
    }

    public function listarDocente(){
        $db = $this->base->prepare("SELECT * FROM perfil where id_tipo_usuario = 2");
        $db->execute();
        $row = $db->fetchAll();
        return $row;
    }

    public function detalleDocente($id){
        $db = $this->base->prepare("select * from docente inner join perfil on docente.id_perfil = perfil.id where docente.id_perfil = :p_id;");
        $db->bindParam(":p_id", $id);
        $db->execute();
        $row = $db->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function datosDocente($id){
        $db = $this->base->prepare("SELECT perfil.nombre, perfil.apePaterno, perfil.apeMaterno,perfil.correo,docente.espe,docente.grado FROM perfil LEFT JOIN docente ON (perfil.id = docente.id_perfil) WHERE perfil.id = :p_id");
        $db->bindParam(':p_id', $id);
        $db->execute();
        $row = $db->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    public function actualizarDocente($id,$nombre,$paterno,$materno,$correo,$espe,$grado){
        $db = $this->base->prepare("CALL update_docente(:p_id, :p_nombre, :p_paterno, :p_materno, :p_correo, :p_espe, :p_grado)");
        $db->bindParam(':p_id', $id);
        $db->bindParam(':p_nombre', $nombre);
        $db->bindParam(':p_paterno', $paterno);
        $db->bindParam(':p_materno', $materno);
        $db->bindParam(':p_correo', $correo);
        $db->bindParam(':p_espe', $espe);
        $db->bindParam(':p_grado', $grado);
        $db->execute();
        return "0";
    }

    public function enviarSolicitud($doc,$alu,$men){
        $db = $this->base->prepare("call insert_solicitud(:p_doc, :p_alu, :p_mensaje)");
        $db->bindParam(":p_doc", $doc);
        $db->bindParam(":p_alu", $alu);
        $db->bindParam(":p_mensaje", $men);
        $db->execute();
        return "0";
    }

    public function solicitudesDocente($id){
        $db = $this->base->prepare("select s.id_alumno as id, count(s.id_alumno) as cant, CONCAT(p.nombre,' ',p.apePaterno,' ',p.apeMaterno) as nombre from solicitud s inner join perfil p on p.id = s.id_alumno where s.id_docente = :p_id group by s.id_alumno;");
        $db->bindParam(":p_id",$id);
        $db->execute();
        $row = $db->fetchAll();
        return $row;
    }

    public function mensajeSolicitud($alumno,$docente){
        $db = $this->base->prepare("select CONCAT(p.nombre,' ',p.apePaterno,' ',p.apeMaterno) as nombre, s.mensaje, p.correo from solicitud s inner join perfil p on p.id = s.id_alumno where s.id_docente = :p_docente and s.id_alumno = :p_alumno");
        $db->bindParam(":p_docente",$docente);
        $db->bindParam(":p_alumno",$alumno);
        $db->execute();
        $row = $db->fetchAll();
        return $row;
    }
}
