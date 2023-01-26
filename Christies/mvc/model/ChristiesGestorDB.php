<?php

namespace model;

use JsonException;
use PDO;

/**
 * @author Martin Ruiz
 */

class ChristiesGestorDB
{
    /**
     * @author Martin Ruiz
     * @param $usr
     * @param $pass
     * @return bool
     */
    public static function loginAdmin($usr, $pass): bool
    {
        try {
            $db = Conexion::connect();
            $pass = sha1($pass);
            $res = $db->query("SELECT * FROM usuario u WHERE u.email = '".$usr."' AND u.password  = '".$pass."' AND 'admin' = (SELECT rol FROM usuario WHERE email = '".$usr."')");
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
    /**
     * @author Martin Ruiz
     * @param $usr
     * @param $pass
     * @return bool
     */
    public static function login($usr, $pass): bool
    {
        try {
            $db = Conexion::connect();
            $pass = sha1($pass);
            $res = $db->query("SELECT * FROM usuario u WHERE u.email = '".$usr."' AND u.password  = '".$pass."'");

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
    /**
     * @author Martin Ruiz
     * @param $email
     * @param $password
     * @return bool
     */
    public static function addUser($email, $password): bool
    {
        try {
            $db = Conexion::connect();
            $query = "INSERT INTO `usuario` (`id_user`, `email`, `password`, `rol`, `tokens`, `telf`) VALUES (NULL, ?, ?, 'user', '100', '')";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$email, sha1($password)])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    /**
     * @author Martin Ruiz
     * @param $id_user
     * @param $email
     * @param $tokens
     * @param $telf
     * @return bool
     */
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

    /**
     * @author Martin Ruiz
     * @param $id_user
     * @return bool
     */
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

    /**
     * @author Martin Ruiz
     * @param $id
     * @return Usuario|bool
     */
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
    /**
     * @author Martin Ruiz
     * @return bool
     */
    public static function addCat(): bool
    {
        try {
            $db = Conexion::connect();
            $query = "INSERT INTO `categoria` (`id_cat`, `nombre`, `descripcion`, `img`) VALUES (null, '', '', '')";
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

    /**
     * @author Martin Ruiz
     * @param $id_cat
     * @param $nombre
     * @param $descripcion
     * @param $img
     * @return bool
     */
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

    /**
     * @author Martin Ruiz
     * @param $id_cat
     * @return bool
     */
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

    /**
     * @author Martin Ruiz
     * @param $id
     * @return Categoria|bool
     */
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

    /**
     * @author Martin Ruiz
     * @param $id
     * @return bool|ObjetoVirtual
     */
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

    /**
     * @author Martin Ruiz
     * @param $nombre
     * @param $precio
     * @param $idcat
     * @return bool
     */
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

    /**
     * @author Martin Ruiz
     * @param $nombre
     * @param $precio
     * @param $img1
     * @param $img2
     * @param $img3
     * @param $idobj
     * @param $lat
     * @param $lon
     * @return bool
     */
    public static function updateProduct($nombre, $precio, $img1, $img2, $img3, $idobj, $lat, $lon)
    {
        try {
            $db = Conexion::connect();
            $query = "UPDATE `objeto` SET `nombre` = ?, `precio` = ?, `img1`= ?, `img2`= ?, `img3`= ?, `lat`= ?, `lon`= ?  WHERE `objeto`.`id_objeto` = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$nombre, $precio, $img1, $img2, $img3, $lat, $lon, $idobj])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    /**
     * @author Martin Ruiz
     * @param $id
     * @return bool
     */
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

    /**
     * @author Martin Ruiz
     * @param $content
     * @param $id_objeto
     * @param $id_user
     * @return bool
     */
    public static function createComment($content, $id_objeto, $id_user): bool
    {
        try {
            $db = Conexion::connect();
            $query = "INSERT INTO `comentario` (`id_com`, `contenido`, `fecha`, `id_objeto`, `id_user`) VALUES (NULL, ?, current_timestamp(), ?, ?); ";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$content, $id_objeto, $id_user])) {
                return false;
            }
            self::triggerPuntuacion($db, $id_objeto);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    /**
     * @author Martin Ruiz
     * @param $id
     * @return bool|Comentario
     */
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

    /**
     * @author Martin Ruiz
     * @param int $getId
     * @param string $getContenido
     * @return bool
     */
    public static function updateComment(int $getId, string $getContenido): bool
    {
        try {
            $db = Conexion::connect();
            $query = "UPDATE `comentario` SET `contenido` = ? WHERE `comentario`.`id_com` = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$getContenido, $getId])) {
                return false;
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    /**
     * @author Martin Ruiz
     * @param int $getId
     * @return bool
     */
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

    /**
     * @author Martin Ruiz
     * @param $idobj
     * @param $idusr
     * @return bool
     */
    public static function createCompra($idobj, $idusr)
    {
        try {
            $db = Conexion::connect();
            $query = "INSERT INTO `compra` (`id_compra`, `fecha`, `id_objeto`, `id_user`) VALUES (NULL, current_timestamp(), ?, ?);";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$idobj, $idusr])) {
                return false;
            }
            if (!$db->query("UPDATE usuario SET tokens = (tokens-(SELECT precio FROM objeto WHERE objeto.id_objeto=$idobj)) WHERE id_user = $idusr")) {
                return false;
            }
//            return self::triggerPuntuacion($db, $idobj);
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return true;
    }

    /**
     * @author Martin Ruiz
     * @param $id
     * @return bool|Compras
     */
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

    /**
     * @author Martin Ruiz
     * @return bool
     */
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

    /**
     * @author Martin Ruiz
     * @param int $getId
     * @return bool
     */
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

    /**
     * @author Martin Ruiz
     * @param $table
     * @return array
     */
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

    /**
     * @author Martin Ruiz
     * @param $id
     * @return bool|array
     */
    public static function getCommentsOnUserId($id): bool|array
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT * FROM `comentario` WHERE id_user =  ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$id])) {
                return false;
            }
            $result = $stmt->fetchAll();
            $arrayComentarios = [];
            foreach ($result as $row) {
                $arrayComentarios[] = new Comentario($row['id_com'], $row['contenido'], $row['fecha'], ObjetoVirtual::read(($row['id_objeto'])), Usuario::read($row['id_user']));
            }
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return $arrayComentarios;
    }

    /**
     * @author Martin Ruiz
     * @return int
     */
    public static function categoriaLastId(): int
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT MAX(id_cat) FROM `categoria`";
            $result = $db->query($query);
            $response = (int)$result->fetch()[0];
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return $response;
    }

    /**
     * @author Martin Ruiz
     * @return int
     */
    public static function userLastId(): int
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT MAX(id_user) FROM `usuario`";
            $result = $db->query($query);
            $response = (int)$result->fetch()[0];
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return $response;
    }

    /**
     * @author Martin Ruiz
     * @throws JsonException
     */
    public static function jsonCatIdNombre(): bool|string
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT id_cat,nombre FROM `categoria`";
            $result = $db->query($query);
            $response = $result->fetchAll();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return json_encode($response, JSON_THROW_ON_ERROR);
    }

    /**
     * @author Martin Ruiz
     * @throws JsonException
     */
    public static function jsonObjIdNombre(): bool|string
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT id_objeto,nombre FROM `objeto`";
            $result = $db->query($query);
            $response = $result->fetchAll();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return json_encode($response, JSON_THROW_ON_ERROR);
    }

    /**
     * @author Martin Ruiz
     * @throws JsonException
     */
    public static function jsonUsrIdNombre(): bool|string
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT id_user,email FROM `usuario`";
            $result = $db->query($query);
            $response = $result->fetchAll();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return json_encode($response, JSON_THROW_ON_ERROR);
    }

    /**
     * @author Martin Ruiz
     * @param PDO|null $db
     * @param $id_objeto
     * @return false|void
     */
    private static function triggerPuntuacion(?PDO $db, $id_objeto)
    {
        $queryCheckExists = 'SELECT puntuacion FROM `puntuacion` WHERE `id_obj` = ?';
        $stmt2 = $db->prepare($queryCheckExists);
        $stmt2->execute([$id_objeto]);
        $result = $stmt2->fetchAll();
        if (!empty($result)) {
            $punt = (int)$result[0][0];
            $query2 = 'UPDATE `puntuacion` SET `puntuacion` = ' . ++$punt . ' WHERE `puntuacion`.`id_obj` = ?';
        } else {
            $query2 = "INSERT INTO `puntuacion` (`id`, `id_obj`, `puntuacion`) VALUES (NULL,?, '1')";
        }

        $stmt3 = $db->prepare($query2);
        if (!$stmt3->execute([$id_objeto])) {
            return false;
        }
    }

    /**
     * @author Martin Ruiz
     * @throws JsonException
     */
    public static function productsValuated($signin, $id_cat, $index, $order, $price,$slider,$user): bool|string
    {
        try {
//            var_dump($signin, $id_cat, $index, $order, $price,$slider,$user);
            $db = Conexion::connect();
            if ($id_cat !== NULL && $order !== NULL && !$price && !$slider) {
                $sql = "SELECT puntuacion.puntuacion+(SELECT COUNT(*) FROM compra JOIN objeto o on compra.id_objeto = o.id_objeto WHERE objeto.id_cat = $id_cat) AS 'puntuacion', puntuacion.id_obj AS 'id_objeto', objeto.img1 AS ruta_img, categoria.descripcion AS 'descripcion', objeto.nombre AS 'nombre', objeto.precio AS 'precio' FROM `puntuacion` RIGHT JOIN `objeto` ON objeto.id_objeto=puntuacion.id_obj LEFT JOIN `categoria` ON categoria.id_cat=objeto.id_cat WHERE objeto.id_cat IN (SELECT id_cat FROM categoria WHERE id_cat=$id_cat) ORDER BY `puntuacion`.`puntuacion` $order LIMIT $index,10";
            } else if ($price && !$slider) {
                //Compras no precio
//                if ($id_cat !== NULL) {
//                    $sql = "SELECT COUNT(*) AS 'puntuacion', objeto.id_objeto AS 'id_objeto', objeto.img1 AS ruta_img, categoria.descripcion AS 'descripcion', objeto.nombre AS 'nombre', objeto.precio AS 'precio' FROM objeto LEFT JOIN compra c on objeto.id_objeto = c.id_objeto JOIN categoria ON categoria.id_cat=objeto.id_cat WHERE objeto.id_cat IN (SELECT id_cat FROM categoria WHERE id_cat=$id_cat) GROUP BY compra.id_objeto ORDER BY COUNT(*) $order LIMIT $index,10";
//                } else {
//                    $sql = "SELECT COUNT(*) AS 'puntuacion', objeto.id_objeto AS 'id_objeto', objeto.img1 AS ruta_img, categoria.descripcion AS 'descripcion', objeto.nombre AS 'nombre', objeto.precio AS 'precio' FROM objeto LEFT JOIN compra ON objeto.id_objeto=compra.id_objeto JOIN categoria ON categoria.id_cat=objeto.id_cat GROUP BY objeto.id_objeto ORDER BY COUNT(*) DESC LIMIT $index,10; ";
//                }
                if ($id_cat !== NULL){
                    $sql = "SELECT *, c.descripcion AS 'descripcion',objeto.img1 AS ruta_img FROM objeto JOIN categoria c on objeto.id_cat = c.id_cat WHERE objeto.id_cat=$id_cat ORDER BY objeto.precio $order LIMIT $index,10";
                }else {
                    $sql = "SELECT *, c.descripcion AS 'descripcion',objeto.img1 AS ruta_img FROM objeto JOIN categoria c on objeto.id_cat = c.id_cat ORDER BY objeto.precio $order LIMIT $index,10";
                }
            } else if(!$price && !$slider){
                $sql = "SELECT puntuacion.puntuacion+(SELECT COUNT(*) FROM compra) AS 'puntuacion', puntuacion.id_obj AS 'id_objeto', objeto.img1 AS ruta_img, categoria.descripcion AS 'descripcion', objeto.nombre AS 'nombre', objeto.precio AS 'precio', objeto.img1 AS ruta_img FROM `puntuacion` JOIN `objeto` ON objeto.id_objeto=puntuacion.id_obj JOIN `categoria` ON categoria.id_cat=objeto.id_cat ORDER BY `puntuacion`.`puntuacion` $order LIMIT $index,10";
            }else if ($slider){

                if ($signin){

                    $sql1 = "SELECT * FROM comentario c join usuario u on c.id_user=u.id_user where u.id_user = (SELECT id_user from usuario WHERE usuario.email= '".$user."')";
                    $hascoms = $db->query($sql1);

                    if(!$hascoms->fetch()){
                        $sql = "SELECT objeto.id_objeto AS 'id_objeto', objeto.img1 AS ruta_img, categoria.descripcion AS 'descripcion', objeto.nombre AS 'nombre', objeto.precio AS 'precio', objeto.img1 AS ruta_img FROM `puntuacion` JOIN `objeto` ON objeto.id_objeto=puntuacion.id_obj JOIN `categoria` ON categoria.id_cat=objeto.id_cat ORDER BY puntuacion.puntuacion DESC LIMIT $index,10";
                    }else {
                        $sql = "SELECT o.id_objeto AS 'id_objeto', o.img1 AS ruta_img FROM comentario c JOIN usuario u on c.id_user=u.id_user JOIN objeto o on c.id_objeto=o.id_objeto where u.id_user = (SELECT id_user from usuario WHERE usuario.email= '".$user."') LIMIT $index,10";
                    }
                }else {
                    $sql = "SELECT objeto.id_objeto AS 'id_objeto', objeto.img1 AS ruta_img, categoria.descripcion AS 'descripcion', objeto.nombre AS 'nombre', objeto.precio AS 'precio', objeto.img1 AS ruta_img FROM `puntuacion` JOIN `objeto` ON objeto.id_objeto=puntuacion.id_obj JOIN `categoria` ON categoria.id_cat=objeto.id_cat LIMIT $index,10";
                }
            }else{
                $sql = "SELECT objeto.id_objeto AS 'id_objeto', objeto.img1 AS ruta_img, categoria.descripcion AS 'descripcion', objeto.nombre AS 'nombre', objeto.precio AS 'precio', objeto.img1 AS ruta_img FROM `puntuacion` JOIN `objeto` ON objeto.id_objeto=puntuacion.id_obj JOIN `categoria` ON categoria.id_cat=objeto.id_cat ORDER BY puntuacion.puntuacion DESC LIMIT $index,10";
            }

            $result = $db->query($sql);
            $response = $result->fetchAll();

        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return json_encode($response, JSON_THROW_ON_ERROR);
    }

    /**
     * @author Martin Ruiz
     * @throws JsonException
     */
    public static function productosUnaCategoria($id_cat, $modo): bool|string
    {
        try {
            $db = Conexion::connect();
            $sql = "SELECT *, o.img1 AS 'ruta_img' FROM categoria LEFT JOIN objeto o on categoria.id_cat = o.id_cat LEFT JOIN puntuacion on puntuacion.id_obj=o.id_objeto WHERE o.id_cat=$id_cat ORDER BY puntuacion.puntuacion $modo";
            $result = $db->query($sql);
            $response = $result->fetchAll();

        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return json_encode($response, JSON_THROW_ON_ERROR);
    }

    /**
     * @author Martin Ruiz
     * @throws JsonException
     */
    public static function productById(int $id): bool|string
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT c2.nombre AS 'category', p.puntuacion AS 'num_comments',objeto.img2 AS 'img2', objeto.img3 AS 'img3', objeto.img1 AS 'img1', objeto.precio AS 'precio', objeto.nombre AS 'nombre', c.fecha AS 'fecha', u.email AS 'email', c.contenido AS 'contenido', objeto.lat AS 'lat', objeto.lon AS 'lon', (SELECT COUNT(*) FROM compra WHERE compra.id_objeto = ?) AS 'num_compras' FROM objeto JOIN comentario c on objeto.id_objeto = c.id_objeto JOIN usuario u on c.id_user = u.id_user JOIN puntuacion p on objeto.id_objeto = p.id_obj JOIN categoria c2 on objeto.id_cat = c2.id_cat WHERE objeto.id_objeto = ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$id, $id])) {
                return false;
            }
            $result = $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return json_encode($result, JSON_THROW_ON_ERROR);
    }

    /**
     * @author Martin Ruiz
     * @throws JsonException
     */
    public static function filteredListProds($cad): bool|string
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT DISTINCT(objeto.id_objeto), objeto.nombre AS 'nombre', objeto.precio AS 'precio', c.descripcion AS 'descripcion', c.nombre AS 'category', c2.contenido AS 'contenido' FROM objeto LEFT JOIN categoria c on c.id_cat = objeto.id_cat LEFT JOIN comentario c2 on objeto.id_objeto = c2.id_objeto WHERE objeto.nombre LIKE '%$cad%' OR c.nombre LIKE '%$cad%' OR c.descripcion LIKE '%$cad%' OR c2.contenido LIKE '%$cad%' GROUP BY objeto.id_objeto";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([])) {
                return false;
            }
            $result = $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return json_encode($result, JSON_THROW_ON_ERROR);
    }

    /**
     * @author Martin Ruiz
     * @throws JsonException
     */
    public static function userdata(mixed $user): bool|string
    {
        try {
            $db = Conexion::connect();
            $sql1 = "SELECT * FROM comentario JOIN usuario u on u.id_user = comentario.id_user WHERE u.email = '".$user."'";
            $hasComments = $db->query($sql1);


            if ($hasComments->fetch()){
                $query = "SELECT u.email AS 'email', u.tokens AS 'tokens', u.telf AS 'telf', c.contenido AS 'contenido', o.nombre AS 'producto', c.fecha AS 'fecha_com'  FROM usuario u JOIN comentario c on u.id_user = c.id_user JOIN objeto o on c.id_objeto = o.id_objeto WHERE u.email  = '".$user."'";
            }else {
                $query = "SELECT u.email AS 'email', u.tokens AS 'tokens', u.telf AS 'telf' FROM usuario u WHERE u.email = '".$user."'";
            }
            $stmt = $db->prepare($query);
            if (!$stmt->execute([])) {
                return false;
            }
            $result = $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return json_encode($result, JSON_THROW_ON_ERROR);
    }

    /**
     * @author Martin Ruiz
     * @throws JsonException
     */
    public static function userPurchases(mixed $user): bool|string
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT o.nombre AS 'producto', c.fecha AS 'fecha_com', o.img1 AS 'img' FROM usuario u JOIN compra c on u.id_user = c.id_user JOIN objeto o on c.id_objeto = o.id_objeto WHERE u.email  = '".$user."'";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([])) {
                return false;
            }
            $result = $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return json_encode($result, JSON_THROW_ON_ERROR);
    }

    /**
     * @author Martin Ruiz
     * @param mixed $actualName
     * @return Usuario|bool
     */
    public static function readUserOnName(mixed $actualName): Usuario|bool
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT * FROM usuario WHERE email =  ?";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([$actualName])) {
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

    /**
     * @author Martin Ruiz
     * @param Usuario $usuario
     * @param ObjetoVirtual $objeto
     * @return bool
     */
    public static function makePurchase(Usuario $usuario, ObjetoVirtual $objeto): bool
    {
        if ($usuario->getTokens() >= $objeto->getPrecio()) {
            return self::createCompra($objeto->getId(), $usuario->getId());
        }
        return false;
    }

    /**
     * @throws JsonException
     */
    public static function prodsloc(): bool|string
    {
        try {
            $db = Conexion::connect();
            $query = "SELECT DISTINCT(objeto.id_objeto), objeto.nombre AS 'nombre', objeto.precio AS 'precio', objeto.lat AS 'lat', objeto.lon AS 'lon' FROM objeto GROUP BY objeto.id_objeto";
            $stmt = $db->prepare($query);
            if (!$stmt->execute([])) {
                return false;
            }
            $result = $stmt->fetchAll();
        } catch (\PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $db = null;
        }
        return json_encode($result, JSON_THROW_ON_ERROR);
    }
}