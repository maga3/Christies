<?php

use model\ChristiesGestorDB;

class UserController
{

    public function showLogin()
    {
        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            header('Location: ../index.php/home');
        } else {
            require './view/public/login.php';
        }
    }

    public function loginProcess()
    {
        $usr = $_POST['email'];
        $pass = $_POST['pass'];

        if (!filter_var($usr, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["userError"] = true;
        }
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$/', $pass)) {
            $_SESSION["passError"] = true;
        }
        if (!isset($_SESSION["passError"]) && !isset($_SESSION["userError"]) &&
            ChristiesGestorDB::login($usr, $pass)) {
            $_SESSION['login'] = true;
            $_SESSION['user'] = $usr;
            header('Location: ../home');
            die();
        }
        header('Location: ../login');
    }

    public function showRegister()
    {
        require './view/public/register.php';
    }

    public function registerProcess()
    {
        $usr = $_POST['email'];
        $pass = $_POST['pass'];
        if (!filter_var($usr, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["userError"] = true;
        }
        if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$/', $pass)) {
            $_SESSION["passError"] = true;
        }

        if (!isset($_SESSION["passError"]) && !isset($_SESSION["userError"]) &&
            ChristiesGestorDB::addUser($usr, $pass)) {
            $_SESSION['login'] = true;
            $_SESSION['user'] = $usr;
            header('Location: ../login');
            die();
        }
        header('Location: ../register');
    }

    public function showHome()
    {
        require './view/public/home.php';
    }

    public function showProduct(float|int|string $id)
    {
        $product = ChristiesGestorDB::readProduct($id);
        require './view/public/product.php';
    }
}