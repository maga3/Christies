<?php

namespace controller;

use model\ChristiesGestorDB;
use model\Usuario;
use model\Mailer2;

/**
 * @author Martin Ruiz
 */
class UserController
{

    /**
     * @author Martin Ruiz
     * @return void
     */
    public function showLogin(): void
    {
        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            header('Location: ../index.php/home');
        } else {
            require './view/public/login.php';
        }
    }

    /**
     * @author Martin Ruiz
     * @return void
     */
    public function loginProcess(): void
    {
        unset($_SESSION['userError'], $_SESSION['passError']);
        $usr = $_POST['email'];
        $pass = $_POST['pass'];

        if (!filter_var($usr, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["userError"] = true;
        }
        if (!preg_match('/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $pass)) {
            $_SESSION["passError"] = true;
        }

        if (!isset($_SESSION["passError"]) && !isset($_SESSION["userError"]) &&
            ChristiesGestorDB::login($usr, $pass)) {
            $_SESSION['login'] = true;
            $_SESSION['user'] = $usr;
            header('Location: ../home');
        }else {
            $_SESSION["userPassError"] = true;
        }
        header('Location: ../login');
    }

    /**
     * @author Martin Ruiz
     * @return void
     */
    public function showRegister(): void
    {
        require './view/public/register.php';
    }

    /**
     * @return void
     * @throws JsonException
     * @author Martin Ruiz
     */
    public function registerProcess(): void
    {
        $captcha = $_POST['g-recaptcha-response'];
        if (isset($_POST['email'], $_POST['pass'])) {
            $captchasecretekey = '6LfNGC0kAAAAAF8ZHwvLnOuvunNIipKI9mg7sKU0';

            $usr = $_POST['email'];
            $pass = $_POST['pass'];
            if (!filter_var($usr, FILTER_VALIDATE_EMAIL)) {
                $_SESSION["userError"] = true;
            }
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$/', $pass)) {
                $_SESSION["passError"] = true;
            }

            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$captchasecretekey&response=$captcha");
            $decode_response = json_decode($response, true, 512, JSON_THROW_ON_ERROR);

            if (!$decode_response['success']) {
                $_SESSION["captchaError"] = true;
            }

            if (!isset($_SESSION["passError"]) && !isset($_SESSION["userError"]) && !isset($_SESSION['captchaError']) &&
                ChristiesGestorDB::addUser($usr, $pass)) {
                $_SESSION['login'] = true;
                $_SESSION['user'] = $usr;
                header('Location: ../login');
                die();
            }
        }
        header('Location: ../register');
    }

    /**
     * @author Martin Ruiz
     * @return void
     */
    public function showHome(): void
    {
        $content = 'home.php';
        require './view/public/template.php';
    }

    /**
     * @author Martin Ruiz
     * @param float|int|string $id
     * @return void
     */
    public function showProduct(float|int|string $id): void
    {
        $product = \model\ObjetoVirtual::read($id);
        $content = 'product.php';
        require './view/public/templateRuta2.php';
    }

    /**
     * @author Martin Ruiz
     * @return void
     */
    public function showList(): void
    {
        try {
            $cats = json_decode(ChristiesGestorDB::jsonCatIdNombre(), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        }
        $content = 'lista_productos.php';
        require './view/public/template.php';
    }

    /**
     * @author Martin Ruiz
     * @return void
     */
    public function showProfile(): void
    {
        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            $content = 'profile.php';
            require './view/public/template.php';
        } else {
            header('Location: ../index.php/login');
        }
    }

    /**
     * @author Martin Ruiz
     * @return void
     */
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

    /**
     * @author Martin Ruiz
     * @param $name
     * @return void
     */
    public function deleteUser($name): void
    {
        $users = ChristiesGestorDB::readUserOnName($name);
        if ($users instanceof Usuario){
            $users::delete($users->getId());
            session_destroy();
        }
        header('Location: ../../home');

    }

    /**
     * @return bool
     *@author Martin Ruiz
     */
    public function makePurchase(): bool
    {
        if (isset($_SESSION['login']) &&  $_SESSION['login']){
            if ( isset($_POST['user'], $_POST['object']) && !empty($_POST['user']) && !empty($_POST['object'])){
                $user = ChristiesGestorDB::readUserOnName($_POST['user']);
                $object = ChristiesGestorDB::readProduct($_POST['object']);
                return ChristiesGestorDB::makePurchase($user, $object);
            }
        }else {
            header('Location: profile');
        }
    }

    /**
     * @author Martin Ruiz
     * @return void
     */
    public function logout(): void
    {
        session_destroy();
        header('Location: login');
    }

    /**
     * @author Martin Ruiz
     * @return void
     */
    public function comment(): void
    {

        if (isset($_POST) && !empty($_POST)){
            $user = ChristiesGestorDB::readUserOnName($_POST['user']);
            if ($user instanceof Usuario){
                $com = new \model\Comentario((int)null,$_POST['comment'],'',\model\ObjetoVirtual::read($_POST['idobj']),$user);
                if ($com->create()){
                    header('Location: profile');
                }
            }
        }
    }

    /**
     * @author Martin Ruiz
     * @return void
     */
    public function showContact(): void
    {
        if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
            $content = 'contact.php';
            require './view/public/template.php';
        } else {
            header('Location: login');
        }
    }

    /**
     * @author Martin Ruiz
     * @return void
     */
    public function contactProcess(): void
    {
        if (isset($_POST) && !empty($_POST)) {
            if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['query'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $query = $_POST['query'];
                $send = true;

                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $send = false;
                }
                if (!preg_match("/^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/",$name)){
                    $send = false;
                }

                $queryFin = filter_var($query, FILTER_SANITIZE_STRING);

                if ($send){
                    $mailer = new Mailer2('mruizball92@gmail.com','mruizball92@gmail.com','Query christies',$queryFin);
                    $mailer->sendEmail();
                    header('Location: ../../index.php/profile');
                }
            }
        }
    }

    public function showMap()
    {
        $content = 'map.php';
        require './view/public/template.php';
    }
}