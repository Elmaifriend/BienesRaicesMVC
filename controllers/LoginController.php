<?php

namespace Controller;
use MVC\Router;
use Model\Admin;


class LoginController{
    public static function login( Router $router ){
        
        $errores = [];

        if( $_SERVER["REQUEST_METHOD"] === "POST"){
            $auth = new Admin( $_POST );

            $errores = $auth->validar(); 

            if( !$errores ){
                //Verificar si el usuario existe
                $resultado = $auth->existeUsuario();
    
                if( !$resultado ){
                    //Verificar si el usuario existe o no ( Mensaje de error )
                    $errores = admin::getErrores();
                } else {
                    //Verificar password
                    $autenticado = $auth->comprobarPassword( $resultado );
                        
                    //Autentica usuario
                    if( $autenticado ){
                        $auth->autenticar();

                    } else {
                        $errores = admin::getErrores();
                    }
                }
    
            }
        }

        $router->render( "auth/login", [
            "errores" => $errores
        ]);
    }

    public static function logout( Router $router ){
        session_start();

        $_SESSION = [];

        header("Location: /");
    }
}