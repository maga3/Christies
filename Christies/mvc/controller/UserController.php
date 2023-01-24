<?php

use model\ChristiesGestorDB;
use model\Usuario;

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

    public function showList()
    {
        try {
            $cats = json_decode(ChristiesGestorDB::jsonCatIdNombre(), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        }
        require './view/public/lista_productos.php';
    }

    public function showProfile()
    {
        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            require './view/public/profile.php';
        } else {
            header('Location: ../index.php/login');
        }
    }

    public function userProcess(): void
    {
        if (isset($_POST) && !empty($_POST)) {

            $users = ChristiesGestorDB::readUserOnName($_POST['actualEmail']);

            if ($users instanceof Usuario) {
                $change = false;

                if (isset($_POST['email']) && $users->getEmail() !== $_POST['email'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $users->setEmail($_POST['email']);
                    $change = true;
                }

                if (isset($_POST['tel']) && $users->getTlf() !== $_POST['tel'] && preg_match('/^[+]?[(]?\d{3}[)]?[-\s.]?\d{3}[-\s.]?\d{4,6}$/m', $_POST['tel'])) {
                    $users->setTlf($_POST['tel']);
                    $change = true;
                }

                if ($change) {

                    $users->update();
                }
            }
            header('Location: ../profile');
        }
    }

    public function deleteUser($name)
    {
        $users = ChristiesGestorDB::readUserOnName($name);
        if ($users instanceof Usuario) $users::delete($users->getId());
        session_destroy();
        header('Location: ../home');

    }

    public function makePurchase(): void
    {
        if (isset($_POST['user'], $_POST['object']) && !empty($_POST['user']) && !empty($_POST['object'])){
            $user = ChristiesGestorDB::readUserOnName($_POST['user']);
            $object = ChristiesGestorDB::readProduct($_POST['object']);
            if (ChristiesGestorDB::makePurchase($user, $object)){
                header('Location: ../profile');
            }
        }
        header('Location: ../home');
    }
}