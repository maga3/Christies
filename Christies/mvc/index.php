<?php
session_start();
//Incluyo los archivos necesarios
require("./controller/Controller.php");
require("./model/Conexion.php");
require("./model/ChristiesGestorDB.php");
require("./model/Categoria.php");
require("./model/ObjetoVirtual.php");
require("./model/Usuario.php");
require("./model/Comentario.php");

//Instancio el controlador
$controller = new Controller();

//Ruta de la home
$home = "/christies/mvc/index.php/";

$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);//accion
$array_ruta = array_filter(explode("/", $ruta));

if (isset($array_ruta[0], $array_ruta[1]) && $array_ruta[0] === "admin" && $array_ruta[1] === "login" && !isset($array_ruta[2])) {
    $controller->showLogin();
} else if (isset($array_ruta[0], $array_ruta[1], $array_ruta[2]) && $array_ruta[0] === "admin" && $array_ruta[1] === "login" && $array_ruta[2] === "process") {
    $controller->login();
}else if (isset($array_ruta[0], $array_ruta[1]) && $array_ruta[0] === "admin" && $array_ruta[1] === "recuperar") {
    $controller->showRecuperar();
}else if (isset($array_ruta[0], $array_ruta[1]) && $array_ruta[0] === "admin" && $array_ruta[1] === "register") {
    $controller->showRegister();
}else if (isset($array_ruta[0]) && $array_ruta[0] === "admin" && !isset($array_ruta[1])) {
    header('Location:'.$_SERVER['REQUEST_URI'].'/login');
}else if (isset($array_ruta[0], $array_ruta[1]) && $array_ruta[0] === "admin" && $array_ruta[1] === "register") {
    $controller->showRegister();
}else if (isset($array_ruta[0], $array_ruta[1]) && $array_ruta[0] === "admin" && $array_ruta[1] === "dashboard") {
    $controller->showDashboard();
}else if (isset($array_ruta[0], $array_ruta[1]) && $array_ruta[0] === "admin" && $array_ruta[1] === "logout") {
    $controller->logout();
}else if (isset($array_ruta[0], $array_ruta[1]) && $array_ruta[0] === "admin" && $array_ruta[1] === "categorias"){
    $controller->categorias();
}