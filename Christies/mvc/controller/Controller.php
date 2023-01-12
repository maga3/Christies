<?php

use model\ChristiesGestorDB;

/**
 * @author martin ruiz
 * Clase controladora de acciones
 *
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
            if (!filter_var($usr, FILTER_VALIDATE_EMAIL)){
                $_SESSION["userError"] = true;
                header('Location: http://localhost/christies/mvc/index.php/admin/login');
            }else if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$/',$pass)){
                $_SESSION["passError"] = true;
                header('Location: http://localhost/christies/mvc/index.php/admin/login');
            }else if (ChristiesGestorDB::login($usr,$pass)){
                $_SESSION['loginAdmin'] = true;
                $_SESSION['user'] = $usr;
                header('Location: http://localhost/christies/mvc/index.php/admin/dashboard');
            }else {
                header('Location: http://localhost/christies/mvc/index.php/admin/login');
            }
        }else {
            header('Location: http://localhost/christies/mvc/index.php/admin/login');
        }
    }

    public function showLogin(): void
    {
        if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']===true){
            header('Location: http://localhost/christies/mvc/index.php/admin/dashboard');
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
        header('Location: http://localhost/christies/mvc/index.php/admin/login');
    }

    public function categorias(): void
    {
        require './model/sesiones.php';
        require './view/admin/categorias.php';
    }
}