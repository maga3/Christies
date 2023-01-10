<?php
session_start();
//Incluyo los archivos necesarios
require("./controller/Controller.php");
require("./model/Conexion.php");
require("./model/ChristiesGestorDB.php");
require("./model/Categoria.php");
require("./model/ObjetoVirtual.php");
require("./model/Usuario.php");

//Instancio el controlador
$controller = new Controller();

//Ruta de la home
$home = "/Christies/mvc/index.php/";

$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);//accion
$array_ruta = array_filter(explode("/", $ruta));


if (isset($array_ruta[0]) && $array_ruta[0] === "login" && !isset($array_ruta[1])) {
    $controller->login('hooa', 'asdkas');
} else if (isset($array_ruta[0]) && $array_ruta[0] === "login" && !isset($array_ruta[1])) {
    echo "echo";
}