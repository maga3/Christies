<?php

use model\ChristiesGestorDB;
use model\DBApi;

/**
 * @author martin ruiz
 * Clase controladora de acciones parte admin
 *
 */
class Controller
{
    /**
     * Valida el login y da feedback del error
     * @return void
     */
    public function login(): void
    {
        if (isset($_POST['usr'], $_POST['pass'])){
            $usr = $_POST['usr'];
            $pass = $_POST['pass'];
            if (!filter_var($usr, FILTER_VALIDATE_EMAIL)){
                $_SESSION["userError"] = true;
            }else if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$/',$pass)){
                $_SESSION["passError"] = true;
            }else if (ChristiesGestorDB::login($usr,$pass)){
                $_SESSION['loginAdmin'] = true;
                $_SESSION['user'] = $usr;
                header('Location: http://localhost/christies/mvc/index.php/admin/dashboard');
            }
                header('Location: http://localhost/christies/mvc/index.php/admin/login');
        }
    }

    /**
     * Muestra el formulario de login
     * @return void
     */
    public function showLogin(): void
    {
        if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']===true){
            header('Location: http://localhost/christies/mvc/index.php/admin/dashboard');
        }else {
            require './view/admin/login.php';
        }
    }

    /**
     * Muestra el formulario de recuperar la password
     * @return void
     */
    public function showRecuperar(): void
    {
        require './view/admin/recuperar.php';
    }

    /**
     * Muestra el formulario para registrarse
     * @return void
     */
    public function showRegister(): void
    {
        require './view/admin/register.php';
    }

    /**
     * Muestra el dashboard
     * @return void
     */
    public function showDashboard(): void
    {
        require './model/sesiones.php';
        require './view/admin/plantilla.php';
    }

    /**
     * Logsout
     * @return void
     */
    public function logout(): void
    {
        session_destroy();
        header('Location: http://localhost/christies/mvc/index.php/admin/login');
    }

    /**
     * @return void
     */
    public function categorias(): void
    {
        require './model/sesiones.php';
        $contenido = 'categorias';
        $content = './view/admin/data-tables/table.php';
        require './view/admin/categorias.php';
    }

    public function users()
    {
        require './model/sesiones.php';
        $contenido = 'usuarios';
        $content = './view/admin/data-tables/table.php';
        require './view/admin/plantilla.php';
    }

    public function articles()
    {
        require './model/sesiones.php';
        $contenido = 'objetos';
        $content = './view/admin/data-tables/table.php';
        require './view/admin/plantilla.php';
    }

    public function articlesCard($id)
    {
        require './model/sesiones.php';
        $contenido = 'Articulos';
        $article = ChristiesGestorDB::readProduct($id);
        $content = './view/admin/cards/card.php';
        require './view/admin/plantilla.php';
    }
}