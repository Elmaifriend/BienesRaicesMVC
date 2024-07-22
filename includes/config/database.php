<?php

/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); */

function conectarDB(){
    $hostName = "localhost";
    $user = "root";
    $password = "root";
    $database = "bienesraices_crud";

    $db = mysqli_connect($hostName, $user, $password, $database );

    if( !$db ){
        echo "Error no se pudo conectar";
        exit;
    }
    
    return $db;
}

?>