<?php

namespace model;

use Couchbase\User;

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




    public static function readProduct($id): bool|ObjetoVirtual
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT * FROM objeto WHERE id_objeto =  ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$id])) {
                return false;
            }
            $result = $stmt->fetch();
            $product = new ObjetoVirtual($result['id_objeto'],(float) $result['precio'],$result['nombre'],$result['img1'],$result['img2'],$result['img3'],(float)$result['lat'],(float)$result['lon'],$result['id_cat']);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return $product;
    }


    //Area de objetos


    public static function getColumns($table): array
    {
        try {
            include_once '../../../model/Conexion.php';
            header('Content-Type: application/json');
            $db = Conexion::connect();
            $clause ="SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'".$table."' AND TABLE_SCHEMA = 'christies'";
            $result = $db->query($clause);
            $columns = [];
            foreach ($result as $r){
                $columns[] = $r['COLUMN_NAME'];
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return $columns;
    }

    public static function readCategory($id): Categoria|bool
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT * FROM categoria WHERE id_cat =  ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$id])) {
                return false;
            }
            $result = $stmt->fetch();
            $categoria = new Categoria($result['id_cat'],$result['nombre'],$result['descripcion'],$result['img']);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return $categoria;
    }
}