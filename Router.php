<?php

    namespace MVC;

    include __DIR__ . "/includes/app.php";

    class Router{

        public $rutasGET = [];
        public $rutasPOST = [];

        //Registar rutas GET y asociarles una funcion
        public function get( $url, $function ){
            $this->rutasGET[$url] = $function;
        }


        public function post( $url, $function ){
            $this->rutasPOST[$url] = $function;
        }


        public function comprobrarRutas(){
            $urlActual = $_SERVER["PATH_INFO"] ?? "/";
            $metodo = $_SERVER["REQUEST_METHOD"];

            if( $metodo === "GET" ){
                $function = $this->rutasGET[$urlActual] ?? NULL;
            } else {
                $function = $this->rutasPOST[$urlActual] ?? NULL;
            }

            //Si la URL existe y tiene una funcion asociada 
            if( $function ){
                call_user_func( $function, $this );
                
            } else {
                echo "Pagina no encontrada";
            }

        }

        //Muestra la vista
        public function render( $view, $datos = [] ){

            foreach( $datos as $key => $value ){
                $$key = $value;
            }

            ob_start(); //Almacena en memoria durante un momento...

            include_once __DIR__ . "/views/{$view}.php";
            $contenido = ob_get_clean(); //Limpia el buffer y pasa el contenido a la variable 

            include_once __DIR__ . "/views/layout.php";


        }
    }

?>