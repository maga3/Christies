<?php
session_start();

//Incluyo los archivos necesarios
require("./controller/AdminController.php");
require("./controller/UserController.php");
require("./model/Conexion.php");
require("./model/cruddb.php");
require("./model/ChristiesGestorDB.php");
require("./model/Categoria.php");
require("./model/ObjetoVirtual.php");
require("./model/Usuario.php");
require("./model/Comentario.php");

//Instancio el controlador
$adminController = new AdminController();
$userController = new UserController();

//Ruta de la home
$home = "/christies/mvc/index.php/";

$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);//accion
$array_ruta = array_filter(explode("/", $ruta));

if (isset($array_ruta[0], $array_ruta[1]) && $array_ruta[0] === "admin") {
    //Rutas del admin
    if (!isset($array_ruta[2])) {
        if ($array_ruta[1] === 'login') {
            $adminController->showLogin();
        } else if ($array_ruta[1] === 'recuperar') {
            $adminController->showRecuperar();
        } else if ($array_ruta[1] === 'register') {
            $adminController->showRegister();
        } else if ($array_ruta[1] === 'dashboard') {
            $adminController->showDashboard();
        } else if ($array_ruta[1] === 'categorias') {
            $adminController->categorias();
        } else if ($array_ruta[1] === 'productos') {
            $adminController->articles();
        } else if ($array_ruta[1] === 'users') {
            $adminController->users();
        } else if ($array_ruta[1] === 'comentarios') {
            $adminController->comentarios();
        } else if ($array_ruta[1] === 'compras') {
            $adminController->compras();
        } else if ($array_ruta[1] === 'logout') {
            $adminController->logout();
        }
    } else if (isset($array_ruta[1], $array_ruta[2]) && !isset($array_ruta[3])) {
        if ($array_ruta[1] === "categorias" && is_numeric($array_ruta[2])) {
            $adminController->categoriesCard($array_ruta[2]);
        } else if ($array_ruta[1] === "login" && $array_ruta[2] === "process") {
            $adminController->login();
        } else if ($array_ruta[1] === "productos" && is_numeric($array_ruta[2])) {
            $adminController->articlesCard($array_ruta[2]);
        } else if ($array_ruta[1] === "users" && is_numeric($array_ruta[2])) {
            $adminController->usersCard($array_ruta[2]);
        } else if ($array_ruta[2] === "add") {
            if ($array_ruta[1] === "users") {
                $adminController->usersAdd();
            } else if ($array_ruta[1] === "productos") {
                try {
                    $adminController->productosAdd();
                } catch (JsonException $e) {
                    echo "Error " . $e->getMessage();
                }
            } else if ($array_ruta[1] === "categorias") {
                $adminController->categoriasAdd();
            } else if ($array_ruta[1] === "comentarios") {
                try {
                    $adminController->comentariosAdd();
                } catch (JsonException $e) {
                    echo "Error " . $e->getMessage();
                }
            }
        }
    } else if (isset($array_ruta[1], $array_ruta[2], $array_ruta[3]) && !isset($array_ruta[4])) {
        if ($array_ruta[3] === "process" && is_numeric($array_ruta[2])) {
            if ($array_ruta[1] === "productos") {
                $adminController->productoProcess((int)$array_ruta[2]);
            } else if ($array_ruta[1] === "categorias") {
                $adminController->categoriasProcess((int)$array_ruta[2]);
            } else if ($array_ruta[1] === "users") {
                $adminController->usersProcess((int)$array_ruta[2]);
            }
        }else if ($array_ruta[3] === "delete" && is_numeric($array_ruta[2])) {
            if ($array_ruta[1] === "users") {
                $adminController->deleteUser((int)$array_ruta[2]);
            } else if ($array_ruta[1] === "comentarios") {
                $adminController->deleteComment((int)$array_ruta[2]);
            } else if ($array_ruta[1] === "categorias") {
                $adminController->deleteCategoria((int)$array_ruta[2]);
            } else if ($array_ruta[1] === "productos") {
                $adminController->deleteProducto((int)$array_ruta[2]);
            }
        }
    }
    /*
     *   Parte publica
     *
     *
     */
} else if (isset($array_ruta[0]) && $array_ruta[0] !== "admin" && $array_ruta[0] !== "api") {

    if (!isset($array_ruta[1])) {
        if ($array_ruta[0] === "login") {
            $userController->showLogin();
        } else if ($array_ruta[0] === "register") {
            $userController->showRegister();
        }else if ($array_ruta[0] === "home") {
            $userController->showHome();
        }else if($array_ruta[0] === "list"){
            $userController->showList();
        }else if($array_ruta[0] === "profile"){
            $userController->showProfile();
        }else if ($array_ruta[0] === "buy"){
            echo $userController->makePurchase();
        }else if($array_ruta[0] === "logout"){
            $userController->logout();
        }else if ($array_ruta[0] === "comment"){
            $userController->comment();
        }else if ($array_ruta[0] === "contact"){
            $userController->showContact();
        }
    } else if (isset($array_ruta[1]) && !isset($array_ruta[2])) {
        if ($array_ruta[1] === "process") {
            if ($array_ruta[0] === "login") {
                $userController->loginProcess();
            } else if ($array_ruta[0] === "register") {
                $userController->registerProcess();
            }else if ($array_ruta[0] === "users"){
                $userController->userProcess();
            }
        }else if (is_numeric($array_ruta[1])) {
            if ($array_ruta[0] === "product") {
                $userController->showProduct($array_ruta[1]);
            }
        }
    } else if (isset($array_ruta[1], $array_ruta[2])){
        if ($array_ruta[0]==="delete"){
            if ($array_ruta[1] === "user" && isset($array_ruta[2])){
                $userController->deleteUser($array_ruta[2]);
            }
        }
    }

//api calls jsons
}else if (isset($array_ruta[0]) && $array_ruta[0] === "api"){
    if (isset($array_ruta[1]) && $array_ruta[1] === "valuatedProds"){
        try {
            if (isset($_POST) && !empty($_POST)){
                echo \model\ChristiesGestorDB::productsValuated($_SESSION['login'] ?? false, $_POST['idcat'] ==='dont'?null:$_POST['idcat'],$_POST['index'],$_POST['order']??'DESC', $_POST['price']==='true',$_POST['slider']==='true');
            }else {
                echo \model\ChristiesGestorDB::productsValuated($_SESSION['login'] ?? false, !isset($_POST['idcat']) || $_POST['idcat'] ==='dont'?null:$_POST['idcat'],$_POST['index']??0,$_POST['order']??'DESC',$_POST['price']??false,$_POST['price']??false);
            }
        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        }
    } if (isset($array_ruta[1]) && $array_ruta[1] === "prodsCat"){

        try {
            if (isset($_POST) && !empty($_POST)){
                echo \model\ChristiesGestorDB::productosUnaCategoria($_POST['idcat'],$_POST['order']??'DESC');
            }else{
                echo "Error: " . $e->getMessage();
            }
        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        }
    }  if (isset($array_ruta[1], $array_ruta[2]) && $array_ruta[1] === "product" && is_numeric($array_ruta[2])){
        try {
            echo \model\ChristiesGestorDB::productById((int)$array_ruta[2]);
        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        }
    } if (isset($array_ruta[1]) && $array_ruta[1] === "listProds"){
        try {
            echo \model\ChristiesGestorDB::filteredListProds($_POST['search']);
        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        }
    } if (isset($array_ruta[1]) && $array_ruta[1] === "userData"){
        try {
            echo \model\ChristiesGestorDB::userdata($_POST['user']);
        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        }
    } if (isset($array_ruta[1]) && $array_ruta[1] === "userPurchases"){
        try {
            echo \model\ChristiesGestorDB::userPurchases($_POST['user']);
        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
else if ($array_ruta[0] === 'admin' || $array_ruta[1] === '' || !isset($array_ruta[1])  || !isset($array_ruta[0])) {
    $uri = $_SERVER['REQUEST_URI'];
    if ($uri[strlen($uri) - 1] === '/') {
        header('Location:' . $_SERVER['REQUEST_URI'] . 'login');
    } else {
        header('Location:' . $_SERVER['REQUEST_URI'] . '/login');
    }
}