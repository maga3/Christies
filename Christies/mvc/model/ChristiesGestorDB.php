<?php

namespace model;

class ChristiesGestorDB
{
    public static function login($usr,$pass): bool
    {
        try {
            $db = Conexion::connect();
            $res = $db->query("SELECT * FROM usuario WHERE email = '" . $usr . "' AND password = '".sha1($pass)."' AND rol = 'admin'");
            $correo = $res->fetch();
            if (!$correo){
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }
}