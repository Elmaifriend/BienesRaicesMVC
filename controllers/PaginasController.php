<?php

    namespace Controller;

    use MVC\Router;
    use Model\Propiedad;

    class PaginasController{
        public static function index( Router $router ){ 
            
            $inicio = true;

            $limiteDePropiedades = 3;
            $propiedades = Propiedad::get($limiteDePropiedades);

            $router->render("paginas/index", [
                "inicio" => $inicio,
                "propiedades" => $propiedades
            ]);
        }

        public static function nosotros( Router $router ){
            $router->render("paginas/nosotros");
        }

        public static function propiedades( Router $router ){
            $propiedades = Propiedad::getAll();

            $router->render("paginas/propiedades",[
                "propiedades" => $propiedades
            ]);
        }


        public static function propiedad( Router $router ){
            $id = validarIDRedireccionar("/propiedades");
            
            $propiedad = Propiedad::find($id);
            if( !$propiedad ){
                header("Location: /");
            }
    
            $router->render("paginas/propiedad",[
                "propiedad" => $propiedad
            ]);
        }

        public static function blog( Router $router ){
            $router->render("paginas/blog");
        }

        public static function entrada( Router $router ){
            $router->render("paginas/entrada");

        }

        public static function contacto( Router $router ){
            
            if( $_SERVER["REQUEST_METHOD"] === "POST"){

                debuguear($_POST);

                $args = $_POST["contacto"];
                debuguear($args);
            }
            
            
            $router->render("paginas/contacto", [

            ]);
        }


    }