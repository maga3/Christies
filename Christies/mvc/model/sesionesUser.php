<?php
if (!isset($_SESSION['login']) || !$_SESSION['login']){
    header('Location: http://localhost/christies/mvc/index.php/login');
}
