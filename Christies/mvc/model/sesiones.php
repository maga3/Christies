<?php
if (!isset($_SESSION['loginAdmin']) || !$_SESSION['loginAdmin']){
    header('Location: http://localhost/christies/mvc/index.php/admin/login');
}