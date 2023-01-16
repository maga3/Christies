<?php

namespace model;

class ChristiesGestorDB
{
    public static function login($usr,$pass): bool
    {
        try {
            $db = Conexion::connect();
            $res = $db->query("SELECT * FROM usuario WHERE email = $usr AND password = sha1($pass) AND rol = 'admin'");
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

    //USUARIO
    //Area de usuario donde se realizan las operaciones del crud con las conexiones a la base de datos
    public static function addUser($email,$password,$telf): bool
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

    public static function updateUser($id_user,$email,$tokens,$telf): bool
    {
        try {
            $db = Conexion::connect();
            $query = "UPDATE `usuario` SET `email` = ?, `tokens` = (SELECT `tokens` FROM `usuario` where id_user=?)+?, `telf` = ? WHERE `usuario`.`id_user` = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$email,$id_user,$tokens,$telf,$id_user])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    public static function deleteUser($id_user): bool
    {
        try {
            $db = Conexion::connect();
            $query = "DELETE FROM usuario WHERE `usuario`.`id_user` = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$id_user])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }
    //Fin area usuario

    //CATEGORIAS
    //Area de ccategorias donde se realizan las operaciones del crud con las conexiones a la base de datos
    public static function addCat($nombre,$descripcion,$img): bool
    {
        try {
            $db = Conexion::connect();
            $query = "INSERT INTO `categoria` (`id_cat`, `nombre`, `descripcion`, `img`) VALUES (NULL, ?, ?, ?)";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$nombre,$descripcion,$img])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    public static function updateCat($id_cat,$nombre,$descripcion,$img): bool
    {
        try {
            $db = Conexion::connect();
            $query = "UPDATE `categoria` SET `nombre` = ?, `descripcion` = ?, `img`=? WHERE `categoria`.`id_cat` = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$nombre,$descripcion,$img,$id_cat])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }


    public static function deleteCat($id_cat): bool
    {
        try {
            $db = Conexion::connect();
            $query = "DELETE FROM categoria WHERE `categoria`.`id_cat` = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$id_cat])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }
    //Fin area categorias

    //COMENTARIOS
    //Area de comentarios donde se realizan las operaciones del crud con las conexiones a la base de datos
}