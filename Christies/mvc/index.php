<?php
session_start();
//Incluyo los archivos necesarios
require("./controller/Controller.php");
require("./model/Conexion.php");
require("./model/cruddb.php");
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


if (isset($array_ruta[0]) && $array_ruta[0] === "admin") {
    //Rutas del admin
    if (isset($array_ruta[1]) && !isset($array_ruta[2])) {
        if ($array_ruta[1] === 'login') {
            $controller->showLogin();
        } else if ($array_ruta[1] === 'recuperar') {
            $controller->showRecuperar();
        } else if ($array_ruta[1] === 'register') {
            $controller->showRegister();
        } else if ($array_ruta[1] === 'dashboard') {
            $controller->showDashboard();
        } else if ($array_ruta[1] === 'categorias') {
            $controller->categorias();
        } else if ($array_ruta[1] === 'productos') {
            $controller->articles();
        } else if ($array_ruta[1] === 'users') {
            $controller->users();
        } else if ($array_ruta[1] === 'logout') {
            $controller->logout();
        }
    } else if (isset($array_ruta[1], $array_ruta[2])) {
        if (isset($array_ruta[0], $array_ruta[1], $array_ruta[2]) && $array_ruta[1] === "categorias") {
            $controller->categoriesCard($array_ruta[2]);
        } else if (isset($array_ruta[0], $array_ruta[1], $array_ruta[2]) && $array_ruta[1] === "login" && $array_ruta[2] === "process") {
            $controller->login();
        }else if (isset($array_ruta[0], $array_ruta[1], $array_ruta[2]) && $array_ruta[1] === "productos") {
            $controller->articlesCard($array_ruta[2]);
        }
    } else if ($array_ruta[1] === '' || !isset($array_ruta[1])) {
        $uri = $_SERVER['REQUEST_URI'];
        if ($uri[strlen($uri) - 1] === '/') {
            header('Location:' . $_SERVER['REQUEST_URI'] . 'login');
        } else {
            header('Location:' . $_SERVER['REQUEST_URI'] . '/login');
        }

    }
}