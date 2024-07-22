<?php

    namespace Model;
    use mysqli;

    class ActiveRecord{
        protected static mysqli $db;
        protected static $columnasDB;
        protected static $tabla;

        //Errores 
        protected static $errores = [];

        public function guardar(){
            if( !is_null( $this->id ) ){
                //Actualizar registro
                $this->actualizar();
            
            } else {
                //Crear registro
                $this->crear();
            }
        }


        public function crear(){
            //Sanitizar Datos
            $atributos = $this->sanitizarDatos();

            //Armar query
            $query = "INSERT INTO " . static::$tabla . " ( ";
            $query .= join(", ", array_keys($atributos) );
            $query .= ") VALUES ('";
            $query .= join( "', '", array_values($atributos));
            $query .= "')";

            $resultado = self::$db->query($query);

            if( $resultado ){
                //Redirecciona al usuario.
                header("location: /admin?alert_type=1&msj=Creado Correctamente");
            }
        }

        public function actualizar(){
            //Sanitizar los datos
            $atributos = $this->sanitizarDatos();
            
            $valores = [];
            foreach( $atributos as $key => $value ){
                $valores[] = "{$key}='{$value}'";
            }

            $query = "UPDATE " . static::$tabla . " SET ";
            $query .= join( ", ", $valores);
            $query .= " WHERE id ='" . self::$db->escape_string($this->id) . "' ";
            $query .= "LIMIT 1";

            $resultado = self::$db->query($query);

            if( $resultado ){
                //Redirecciona al usuario.
                header("location: /admin?alert_type=2&msj=Actualizado Correctamente");
            }
        }

        //Eliminar registro
        public function eliminar(){
            $query = "DELETE FROM " . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1"; 
            $resultado = self::$db->query($query);

            if( $resultado ){
                $this->eliminarImagen();
                header("location: /admin?alert_type=3&msj=Anuncio Eliminado");
            }
        }


        //Establecer conexion a la base de datos
        public static function setDB( $database ){
            self::$db = $database;
        }


        public function sanitizarDatos( ){
            $atributos = $this->atributos();
            
            $sanitizado = [];
            foreach($atributos as $key => $value ){
                $sanitizado[$key] = self::$db->escape_string($value);
            }

            return $sanitizado;
        }


        public function atributos(){
            $atributos = [];

            foreach( static::$columnasDB as $columna ){
                
                if( $columna === "id" ) continue;
                $atributos[$columna] = $this->$columna;
            }
            return $atributos;
        }

        public static function getErrores(){
            return static::$errores;
        }

        public function validar(){
            
            static::$errores = [];

            return self::$errores;
        }

        //Modificar el nombre de la imagen del objeto en memoria
        public function setImg( $imagen ){
            //Elimina la imagen previa
            if( !is_null($this->id) ){
                $this->eliminarImagen();
            }

            //Asginar al atrubuto imagen el nombre de la imagen
            if($imagen){
                $this->imagen = $imagen;
            }
        }

        //Eliminar imagen
        public function eliminarImagen(){
            //Comprueba si existe el archivo
            $archivoExiste = file_exists(CARPETA_IMAGENES . $this->imagen);
            if( $archivoExiste ){
                unlink( CARPETA_IMAGENES . $this->imagen );
            }
        }

        //Listar todas los registros
        static public function getAll(){
            $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC";

            $resultado = self::consultarSQL( $query );

            return $resultado;
        }

        //Obtiene determinado numero de registros
        static public function get( $cantidad ){
            $query = "SELECT * FROM " . static::$tabla . " ORDER BY creado DESC" . " LIMIT " . $cantidad ;

            $resultado = self::consultarSQL( $query );

            return $resultado;
        }



        static public function find( $id ){
            $query = "SELECT * FROM " . static::$tabla . " WHERE id = '{$id}'";
            $resultado = self::consultarSQL($query);

            return array_shift( $resultado );
        }

        static public function consultarSQL( $query ){
            //Consultar base de datos 
            $resultado = self::$db->query( $query );

            //Iterar por los resultados, y convertir a objeto
            $array = [];
            while( $registro = $resultado->fetch_assoc()){
                $array[] = static::crearObjeto( $registro );
            }

            //Liberar memora
            $resultado->free();

            //Retornar resultados
            return $array;

        }

        static public function crearObjeto( $registro ){
            $objeto = new static;

            foreach($registro as $key => $value ){
                if(property_exists($objeto, $key)){
                    $objeto->$key = $value;
                }
            }

            return $objeto;
        }

        //Sicroniza en memoria con los cambios realizados por el usuario
        public function sincronizar( $args = [] ){
            foreach( $args as $key => $value ){
                if( property_exists( $this, $key ) && !is_null($value) ){
                    $this->$key = $value;
                }
            }
        }
    }


?>