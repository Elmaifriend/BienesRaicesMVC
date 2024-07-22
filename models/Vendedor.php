<?php

namespace Model;
use mysqli;

class Vendedor extends ActiveRecord{
    protected static mysqli $db;
    protected static $columnasDB = ["id", "creado", "nombre", "apellido", "telefono"];
    protected static $tabla = "vendedores";

    public $id;
    public $creado;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct( $args = []){
        $this->id = $args["id"] ?? NULL;
        $this->nombre = htmlspecialchars( $args["nombre"] ?? "" );
        $this->apellido = htmlspecialchars( $args["apellido"] ?? "" );
        $this->telefono = htmlspecialchars( $args["telefono"] ?? "" );
        $this->creado = date("Y/m/d");
    }

    public function validar(){

        if(!$this->nombre){
            self::$errores[] = "El nombre es obligatorio";
        }

        if(!$this->apellido){
            self::$errores[] = "El apellido es obligatorio";
        }

        if(!$this->telefono){
            self::$errores[] = "El telefono es obligatorio";
        }

        if(!preg_match("/[0-9]{10}/", $this->telefono) ){
            self::$errores[] = "El formato del telefono no es valido";
        }

        return self::$errores;
    }

}