<?php

namespace Controller;
use MVC\Router;
use Model\Admin;


class LoginController{
    public static function login( Router $router ){
        echo "<h1> Login </h1>";
    }

    public static function logout( Router $router ){
        echo "<h1> Logout </h1>";
    }
}