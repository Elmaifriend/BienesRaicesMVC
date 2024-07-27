<?php

namespace Model;

use mysqli;

class Admin extends ActiveRecord{
    protected static $tabla = "usuarios";
    protected static $columnasDB = ["id", "correo", "contrasenia", "created_at"];

    public $id;
    public $correo;
    public $contrasenia;
    public $created_at;

    public function __construct( $args = [] ){
        $this->id = $args["id"] ?? NULL;
        $this->correo = $args["correo"] ?? NULL;
        $this->contrasenia = $args["contrasenia"] ?? NULL;
        $this->created_at = $args["created_at"] ?? NULL;
    } 

    public function validar(){
        if( !$this->correo ){
            self::$errores[] = "El email es obligatorio";
        }

        if( !$this->contrasenia ){
            self::$errores[] = "La contrasenia es obligatoria";
        }

        return self::$errores;
    }

    public function existeUsuario(){

        $query = "SELECT * FROM " . self::$tabla . " WHERE correo = '" . $this->correo . "' LIMIT 1";
        
        $resultado = self::$db->query($query);

        if( !$resultado->num_rows ){
            self::$errores[] = "El usuario no existe";
            return NULL;
        } else {
            return $resultado;
        }
    }

    public function comprobarPassword( $resultado ){
        $usuario = $resultado->fetch_object();

        $auth = password_verify( $this->contrasenia, $usuario->contrasenia);

        if( !$auth ){
            self::$errores[] = "El password es incorrecto";
        }

        return $auth;
    }

    public function autenticar(){
        session_start();

        //Llenar el arreglo de sesion
        $_SESSION["usuario"] = $this->correo;
        $_SESSION["login"] = true;

        header( "Location: /admin" );
    }

}
