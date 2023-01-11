<?php
if (!isset($_SESSION['loginAdmin']) || !$_SESSION['loginAdmin']){
    header('Location: http://localhost/Christies/mvc/index.php/admin/login');
}