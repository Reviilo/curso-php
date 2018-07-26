<?php

require_once "conexion.php";

class Datos extends Conexion {

    # REGISTRO DE USUARIOS
    #-------------------------------------
    
    public function registroUsuarioModel ($datos, $tabla) {

        $stmt = Conexion::conectar()->prepare(
            "INSERT INTO 
                $tabla (usuario, password, email) 
            VALUES 
                (:usuario,:password,:email)"
        );

        $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);

        if ( $stmt -> execute() ) {
            return "success";
        } else {
            return "error";
        }

        $stmt->close();

    }

    # INGRESO DE USUARIOS
    #-------------------------------------
    
    public function ingresoUsuarioModel ($datos, $tabla) {

        $stmt = Conexion::conectar()->prepare(
            "SELECT
                usuario, password
            FROM
                $tabla
            WHERE
                usuario = :usuario"
        );

        $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

        $stmt -> execute();

        return $stmt -> fetch();

        $stmt->close();

    }

    # INGRESO DE USUARIOS
    #-------------------------------------

    public function vistaUsuariosModel ($tabla) {

        $stmt = Conexion::conectar()->prepare(
            "SELECT
                id, usuario, password, email
            FROM
                $tabla"
        );

        $stmt -> execute();

        return $stmt -> fetchAll(); 

        $stmt->close();

    }

    # TRAER DATOS DEL USUARIO CON EL ID
    #-------------------------------------

    public function verUsuarioModel ($id, $tabla) {

        $stmt = Conexion::conectar()->prepare(
            "SELECT
                id, usuario, password, email
            FROM
                $tabla
            WHERE
                id = :id"
        );

        $stmt -> bindParam(":id", $id, PDO::PARAM_INT);

        $stmt -> execute();

        return $stmt -> fetch(); 

        $stmt->close();

    }

    # ACTUALIZAR LOS DATOS DEL USUARIOS
    #-------------------------------------

    public function actualizarUsuarioModel ($datos, $tabla) {

        $stmt = Conexion::conectar()->prepare(
            "
            UPDATE 
                $tabla
            SET 
                id = :id, usuario = :usuario, password = :password, email = :email
            WHERE 
                id = :id
            "
        );

        $stmt -> bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
        $stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
        
        return $stmt -> execute();

        $stmt -> close();
    }

    # BORRAR USUARIO
    #-------------------------------------

    public function borrarUsuarioModel ($id, $tabla) {

        $stmt = Conexion::conectar()->prepare(
            "DELETE FROM 
                $tabla
            WHERE 
                id = :id"
        );

        $stmt -> bindParam(":id", $id, PDO::PARAM_INT);

        return $stmt -> execute();

        $stmt -> close();
    }
}