<?php

//Mostrar todos los errores en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "funciones.php";
require_once "config/database.php";
require_once __DIR__ . "/../vendor/autoload.php";

$db = conectarDB();

use Model\ActiveRecord;
ActiveRecord::setDB($db);




?>