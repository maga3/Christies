<?php

use model\ChristiesGestorDB;

/**
 * @author martin ruiz
 */
class Controller
{
    /**
     * @param $usr
     * @param $pass
     * @return void
     */
    public function login($usr, $pass): void
    {
        if (ChristiesGestorDB::login($usr,$pass)){
            $_SESSION['login'] = true;
            require '../view/admin/index.html';
        }else {
            require '../view/admin/login.html';
        }
    }
}