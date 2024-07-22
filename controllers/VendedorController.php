<?php

namespace Controller;

use MVC\Router;
use Model\Vendedor;


class VendedorController{

    public static function crear( Router $router ) {

        $vendedor = new Vendedor();

        //Arreglo con los mensajes de error
        $errores = [];

        if($_SERVER["REQUEST_METHOD"] === "POST" ){

        $vendedor = new Vendedor( $_POST["vendedor"]);

        $errores = $vendedor->validar();

        if(!$errores){
            $vendedor->guardar();
        }
}

        $router->render("/vendedores/crear", [
            "vendedor" => $vendedor,
            "errores" => $errores,
        ]);
        
    }

    public static function actualizar( Router $router ){

        $id = filter_var($_GET["id"], FILTER_VALIDATE_INT );
        if(!$id){
            header("Location: /admin");
        }

        $vendedor = Vendedor::find($id);

        //Arreglo con los mensajes de error
        $errores = [];

        if($_SERVER["REQUEST_METHOD"] === "POST" ){

            $args = $_POST["vendedor"];

            $vendedor->sincronizar($args);
            $errores = $vendedor->validar();

            if(!$errores){
                $vendedor->guardar();
            }
        }

        $router->render("vendedores/actualizar",[
            "vendedor" => $vendedor,
            "errores" => $errores
        ]);
    }


    public static function eliminar( Router $router ){
        if( $_SERVER["REQUEST_METHOD"] === "POST"){

            $id = filter_var($_POST["id"], FILTER_VALIDATE_INT);
            
            if( $id ){
    
                $tipo = $_POST["tipo"];
                if( $tipo === "vendedor" && validarTipoContenido($tipo) ){
                    
                        $vendedor = Vendedor::find($id);
                        $vendedor->eliminar();
                }
            }
        }
    }

}