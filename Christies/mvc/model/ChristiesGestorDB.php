<?php

namespace model;

class ChristiesGestorDB
{
    public static function login($usr,$pass): bool
    {
        try {
            $db = Conexion::connect();
            $res = $db->query("SELECT * FROM usuario WHERE email = '" . $usr . "' AND password = '".sha1($pass)."' AND rol = 'admin'");
            if (!$res->fetch()){
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    public function addUser($email,$password,$telf)
    {
        try {
            $db = Conexion::connect();
            $query = "INSERT INTO `usuario` (`id_user`, `email`, `password`, `rol`, `tokens`, `telf`) VALUES (NULL, ?, ?, 'user', '100', ?)";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$email,$password,$telf])) {
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