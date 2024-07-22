<?php  

    namespace Model;
    use mysqli;

    class Propiedad extends ActiveRecord{
        protected static mysqli $db;
        protected static $columnasDB = ["id", "titulo", "precio", "imagen", "descripcion", "habitaciones", "wc", "estacionamientos", "vendedor_id", "creado"];
        protected static $tabla = "propiedades";

        public $id;
        public $titulo;
        public $precio;
        public $imagen;
        public $descripcion;
        public $habitaciones;
        public $wc;
        public $estacionamientos;
        public $vendedor_id;
        public $creado;

        public function __construct( $args = [] ){
            $this->id = $args["id"] ?? NULL;
            $this->titulo = htmlspecialchars( $args["titulo"] ?? "" );
            $this->precio = htmlspecialchars( $args["precio"] ?? "" );
            $this->imagen = htmlspecialchars( $args["imagen"] ?? "" );
            $this->descripcion = htmlspecialchars( $args["descripcion"] ?? "" );
            $this->habitaciones = htmlspecialchars( $args["habitaciones"] ?? "" );
            $this->wc = htmlspecialchars( $args["wc"] ?? "" ) ;
            $this->estacionamientos = htmlspecialchars( $args["estacionamientos"] ?? "" );
            $this->vendedor_id = htmlspecialchars( $args["vendedor_id"] ?? "" );
            $this->creado = date("Y/m/d");
        }

        public function validar()
        {
            if( !$this->titulo ){
                array_push(self::$errores, "Debes añadir un titulo");
            }

            if( !$this->precio ){
                array_push(self::$errores, "El precio es obligatorio");
            }

            if( strlen( $this->descripcion ) < 50 ){
                array_push( self::$errores, "La descripcion es obligaroria y debe tener al menos 50 caracteres." );
            }

            if( !$this->habitaciones ){
                array_push( self::$errores, "El numero de habitaciones es obligatorio");
            }

            if( !$this->wc ){
                array_push( self::$errores, "El numero de baños es obligatorio");
            }

            if( !$this->estacionamientos ){
                array_push( self::$errores, "El numero de lugares de estacionamiento es obligatorio");
            }

            if( !$this->vendedor_id ){
                array_push( self::$errores, "Elige un vendedor" );
            }

            if( !$this->imagen ){
                self::$errores[] = "La imagen es obligatoria";
            }

            return self::$errores;
        }
    }
?>