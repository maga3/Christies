<?php

use model\ChristiesGestorDB;

/**
 * @author martin ruiz
 */
class Controller
{
    /**
     * @return void
     */
    public function login(): void
    {
        if (isset($_POST['usr'], $_POST['pass'])){
            $usr = $_POST['usr'];
            $pass = $_POST['pass'];
            if (ChristiesGestorDB::login($usr,$pass)){
                $_SESSION['loginAdmin'] = true;
                $_SESSION['user'] = $usr;
                header('Location: http://localhost/Christies/mvc/index.php/admin/dashboard');
            }else {
                header('Location: http://localhost/Christies/mvc/index.php/admin/login');
            }
        }else {
            header('Location: http://localhost/Christies/mvc/index.php/admin/login');
        }
    }

    public function showLogin(): void
    {
        if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']===true){
            header('Location: http://localhost/Christies/mvc/index.php/admin/dashboard');
        }else {
            require './view/admin/login.php';
        }
    }

    public function showRecuperar(): void
    {
        require './view/admin/recuperar.php';
    }

    public function showRegister(): void
    {
        require './view/admin/register.php';
    }

    public function showDashboard(): void
    {
        require './model/sesiones.php';
        require './view/admin/dashboard.php';
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: http://localhost/Christies/mvc/index.php/admin/login');
    }

    public function categorias(): void
    {
        require './model/sesiones.php';
        require './view/admin/categorias.php';
    }
}