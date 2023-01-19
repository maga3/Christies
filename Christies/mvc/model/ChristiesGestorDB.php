<?php

namespace model;

class ChristiesGestorDB
{
    public static function login($usr, $pass): bool
    {
        try {
            $db = Conexion::connect();
            $res = $db->query("SELECT * FROM usuario WHERE email = $usr AND password = sha1($pass) AND rol = 'admin'");
            if (!$res->fetch()) {
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
    public static function addUser($email, $password, $telf): bool
    {
        try {
            $db = Conexion::connect();
            $query = "INSERT INTO `usuario` (`id_user`, `email`, `password`, `rol`, `tokens`, `telf`) VALUES (NULL, ?, ?, 'user', '100', ?)";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$email, $password, $telf])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    public static function updateUser($id_user, $email, $tokens, $telf): bool
    {
        try {
            $db = Conexion::connect();
            $query = "UPDATE `usuario` SET `email` = ?, `tokens` = (SELECT `tokens` FROM `usuario` where id_user=?)+?, `telf` = ? WHERE `usuario`.`id_user` = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$email, $id_user, $tokens, $telf, $id_user])) {
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

    public static function readUser($id): Usuario|bool
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT * FROM usuario WHERE id_user =  ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$id])) {
                return false;
            }
            $result = $stmt->fetch();
            $usuario = new Usuario($result['id_user'], $result['email'], $result['password'], $result['rol'], $result['tokens'], $result['telf']);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return $usuario;
    }
    //Fin area usuario

    //CATEGORIAS
    //Area de ccategorias donde se realizan las operaciones del crud con las conexiones a la base de datos
    public static function addCat($nombre, $descripcion, $img): bool
    {
        try {
            $db = Conexion::connect();
            $query = "INSERT INTO `categoria` (`id_cat`, `nombre`, `descripcion`, `img`) VALUES (NULL, ?, ?, ?)";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$nombre, $descripcion, $img])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    public static function updateCat($id_cat, $nombre, $descripcion, $img): bool
    {
        try {
            $db = Conexion::connect();
            $query = "UPDATE `categoria` SET `nombre` = ?, `descripcion` = ?, `img`=? WHERE `categoria`.`id_cat` = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$nombre, $descripcion, $img, $id_cat])) {
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
            $categoria = new Categoria($result['id_cat'], $result['nombre'], $result['descripcion'], $result['img']);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return $categoria;
    }
    //Fin area categorias

    //PRODUCTOS
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
            $product = new ObjetoVirtual($result['id_objeto'], (float)$result['precio'], $result['nombre'], $result['img1'], $result['img2'], $result['img3'], (float)$result['lat'], (float)$result['lon'], $result['id_cat']);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return $product;
    }

    public static function createProduct($nombre, $precio, $idcat)
    {
        try {
            $db = Conexion::connect();
            $query = "INSERT INTO `objeto` (`id_objeto`, `nombre`, `lat`, `lon`, `precio`, `img1`, `img2`, `img3`, `id_cat`) VALUES(NULL,?, NULL, NULL, ?, '', NULL, NULL, ?);";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$nombre, $precio, $idcat])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    public static function updateProduct($nombre,$precio,$idobj)
    {
        try {
            $db = Conexion::connect();
            $query = "UPDATE `objeto` SET `nombre` = ?, `precio` = ? WHERE `objeto`.`id_objeto` = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$nombre,$precio,$idobj])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    public static function deleteProduct($id)
    {
        try {
            $db = Conexion::connect();
            $query = "DELETE FROM `objeto` WHERE `objeto`.`id_objeto` = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$id])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }


    //Comentario crud
    public static function createComment($content, $id_objeto, $id_user): bool
    {
        try {
            $db = Conexion::connect();
            $query = "INSERT INTO `comentario` (`id_com`, `contenido`, `fecha`, `id_objeto`, `id_user`) VALUES (NULL, ?, current_timestamp(), ?, ?); ";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$content, $id_objeto, $id_user])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    public static function readComment($id): bool|Comentario
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT * FROM comentario WHERE id_com =  ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$id])) {
                return false;
            }
            $result = $stmt->fetch();
            $comentario = new Comentario($result['id_com'], $result['contenido'], $result['fecha'], $result['id_objeto'], $result['id_user']);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return $comentario;
    }

    public static function updateComment(int $getId, string $getContenido): bool
    {
        try {
            $db = Conexion::connect();
            $query = "UPDATE `comentario` SET `contenido` = ? WHERE `comentario`.`id_com` = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$getId, $getContenido])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    public static function deleteComment(int $getId): bool
    {
        try {
            $db = Conexion::connect();
            $query = "DELETE FROM `comentario` WHERE `comentario`.`id_com` = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$getId])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }


    //Compras crud

    public static function createCompra($idobj,$idusr)
    {
        try {
            $db = Conexion::connect();
            $query = "INSERT INTO `compra` (`id_compra`, `fecha`, `id_objeto`, `id_user`) VALUES (NULL, current_timestamp(), ?, ?);";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$idobj,$idusr])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    public static function readCompra($id): bool|Compras
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT * FROM compra WHERE id_compra =  ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$id])) {
                return false;
            }
            $result = $stmt->fetch();
            $compras = new Compras($result['id_compra'], $result['fecha'], $result['id_objeto'], $result['id_user']);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return $compras;
    }

    public static function updateCompra(): bool
    {
        try {
            $db = Conexion::connect();
            $query = "UPDATE `compra` SET `compra`.`id_compra` = ? WHERE `compra`.`id_compra` = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    public static function deleteCompra(int $getId): bool
    {
        try {
            $db = Conexion::connect();
            $query = "DELETE FROM `compra` WHERE `compra`.`id_compra` = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$getId])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    public static function getColumns($table): array
    {
        try {
            include_once '../../../model/Conexion.php';
            header('Content-Type: application/json');
            $db = Conexion::connect();
            $clause = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'" . $table . "' AND TABLE_SCHEMA = 'christies'";
            $result = $db->query($clause);
            $columns = [];
            foreach ($result as $r) {
                $columns[] = $r['COLUMN_NAME'];
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return $columns;
    }


}