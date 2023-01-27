<?php

namespace controller;

use JsonException;
use model\Categoria;
use model\ChristiesGestorDB;
use model\Comentario;
use model\ObjetoVirtual;
use model\Usuario;

/**
 * @author Martin Ruiz
 * Clase controladora de acciones parte admin
 *
 */
class AdminController
{
    /**
     *
     * @return void
     * @author Martin Ruiz
     * Valida el login y da feedback del error
     */
    public function login(): void
    {
        if (isset($_POST['usr'], $_POST['pass'])) {
            $usr = $_POST['usr'];
            $pass = $_POST['pass'];
            if (!filter_var($usr, FILTER_VALIDATE_EMAIL)) {
                $_SESSION["userError"] = true;
            }
            if (!preg_match('/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*/', $pass)) {
                $_SESSION["passError"] = true;
            }

            if (ChristiesGestorDB::loginAdmin($usr, $pass)) {
                $_SESSION['loginAdmin'] = true;
                $_SESSION['user'] = $usr;
                header('Location: ../dashboard');
            } else {
                $_SESSION["userPassError"] = true;
            }
            header('Location: ../login');
        }
    }

    /**
     *
     * @return void
     * @author Martin Ruiz
     * Muestra el formulario de login
     */
    public function showLogin(): void
    {
        if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin'] === true) {
            header('Location: dashboard');
        } else {
            require './view/admin/login.php';
        }
    }

    /**
     *
     * @return void
     * @author Martin Ruiz
     * Muestra el formulario de recuperar la password
     */
    public function showRecuperar(): void
    {
        require './view/admin/recuperar.php';
    }

    /**
     *
     * @return void
     * @author Martin Ruiz
     * Muestra el formulario para registrarse
     */
    public function showRegister(): void
    {
        require './view/admin/register.php';
    }

    /**
     *
     * @return void
     * @author Martin Ruiz
     * Muestra el dashboard
     */
    public function showDashboard(): void
    {
        require './model/sesiones.php';
        require './view/admin/plantilla.php';
    }

    /**
     *
     * @return void
     * @author Martin Ruiz
     * Logsout
     */
    public function logout(): void
    {
        session_destroy();
        header('Location: login');
    }

    /**
     *
     * @return void
     * @author Martin Ruiz
     */
    public function categorias(): void
    {
        require './model/sesiones.php';
        $contenido = 'categorias';
        $content = './view/admin/data-tables/table.php';
        require './view/admin/plantilla.php';
    }

    /**
     *
     * @return void
     * @author Martin Ruiz
     */
    public function users()
    {
        require './model/sesiones.php';
        $contenido = 'usuarios';
        $content = './view/admin/data-tables/table.php';
        require './view/admin/plantilla.php';
    }

    /**
     *
     * @return void
     * @author Martin Ruiz
     */
    public function articles()
    {
        require './model/sesiones.php';
        $contenido = 'objetos';
        $content = './view/admin/data-tables/table.php';
        require './view/admin/plantilla.php';
    }

    /**
     *
     * @param $id
     * @return void
     * @author Martin Ruiz
     */
    public function articlesCard($id)
    {
        require './model/sesiones.php';
        $contenido = 'Articulos';
        $article = ChristiesGestorDB::readProduct($id);
        if ($article instanceof ObjetoVirtual) {
            $content = './view/admin/cards/card-product.php';
            require './view/admin/plantilla.php';
        }
    }

    /**
     *
     * @param $id
     * @return void
     * @author Martin Ruiz
     */
    public function categoriesCard($id): void
    {
        require './model/sesiones.php';
        $contenido = 'Categoria';
        $categoria = ChristiesGestorDB::readCategory($id);
        if ($categoria instanceof Categoria) {
            $content = './view/admin/cards/card-category.php';
            require './view/admin/plantilla.php';
        }
    }

    /**
     *
     * @return void
     * @author Martin Ruiz
     */
    public function comentarios(): void
    {
        require './model/sesiones.php';
        $contenido = 'Comentarios';
        $content = './view/admin/data-tables/table.php';
        require './view/admin/plantilla.php';
    }

    /**
     *
     * @param string $id
     * @return void
     * @author Martin Ruiz
     */
    public function usersCard(string $id): void
    {
        require './model/sesiones.php';
        $contenido = 'usuarios';
        $usuario = ChristiesGestorDB::readUser((int)$id);
        $comentarios = ChristiesGestorDB::getCommentsOnUserId((int)$id);


        if ($usuario instanceof Usuario) {
            $content = './view/admin/cards/card-usuario.php';
            require './view/admin/plantilla.php';
        }
    }

    /**
     *
     * @return void
     * @author Martin Ruiz
     */
    public function compras(): void
    {
        require './model/sesiones.php';
        $contenido = 'Compras';
        $content = './view/admin/data-tables/table.php';
        require './view/admin/plantilla.php';
    }

    /**
     *
     * @param $id
     * @return void
     * @author Martin Ruiz
     */
    public function productoProcess($id): void
    {
        require './model/sesiones.php';
        if ($id !== null) {
            $article = ChristiesGestorDB::readProduct($id);

            if ($article instanceof ObjetoVirtual) {
                $change = false;

                $change1 = $this->filecheck($article, 1);
                $change2 = $this->filecheck($article, 2);
                $change3 = $this->filecheck($article, 3);

                if (isset($_POST['nombre']) && $article->getNombre() !== $_POST['nombre'] && preg_match('/^[a-zA-Záéíóú][a-zA-Záéíóú_\'.\-\s?]{2,23}$/u', $_POST['nombre'])) {
                    $article->setNombre($_POST['nombre']);
                    $change = true;
                }
                if (isset($_POST['lat']) && $_POST['lat'] !== '0' && $article->getLat() !== (float)$_POST['lat'] && ((float)$_POST['lat'] >= -90 && (float)$_POST['lat'] <= 90)) {
                    $article->setLat((float)$_POST['lat']);
                    $change = true;
                }
                if (isset($_POST['lon']) && $_POST['lon'] !== '0' && $article->getLon() !== (float)$_POST['lon'] && ((float)$_POST['lon'] >= -180 && (float)$_POST['lon'] <= 180)) {
                    $article->setLon((float)$_POST['lon']);
                    $change = true;
                }
                if (isset($_POST['precio']) && $article->getPrecio() !== (float)$_POST['precio']) {
                    $article->setPrecio((float)$_POST['precio']);
                    $change = true;
                }
                if ($change || $change1 || $change2 || $change3) {
                    $article->update();
                }
            }
        }
        header('Location: ../' . $id);
    }

    /**
     *
     * @param $id
     * @return void
     * @author Martin Ruiz
     */
    public function categoriasProcess($id): void
    {
        require './model/sesiones.php';
        if ($id !== null) {
            $categoria = ChristiesGestorDB::readCategory($id);
            if ($categoria instanceof Categoria) {
                $change = false;

                $change1 = $this->filecheckC($categoria, 1);

                if (isset($_POST['nombre']) && $categoria->getNombre() !== $_POST['nombre'] && preg_match('/^[a-zA-Záéíóú][a-zA-Záéíóú_\'.\-\s?]{2,23}$/u', $_POST['nombre'])) {
                    $categoria->setNombre($_POST['nombre']);
                    $change = true;
                }

                if (isset($_POST['descripcion']) && $categoria->getDescripcion() !== $_POST['descripcion'] && preg_match('/[\w,-_\'¿¡!\"\s]{10,255}/mu', $_POST['nombre'])) {
                    $categoria->setDescripcion($_POST['descripcion']);
                    $change = true;
                }
                if ($change || $change1) {
                    $categoria->update();
                }
            }
        }
        header('Location: ../categorias/' . $id);
    }

    /**
     *
     * @param ObjetoVirtual $article
     * @param int $num
     * @return bool
     * @author Martin Ruiz
     */
    private function filecheck(ObjetoVirtual $article, int $num): bool
    {
        $change = false;
        $mega = 1024 * 2024;
        $img = 'img' . $num;

        if (isset($_FILES[$img]) && $_FILES[$img]['name'] !== '' && $_FILES[$img]['error'] === 0) {
            $tam = $_FILES[$img]['size'];
            if ($tam < 8 * $mega) {
                $temporal = $_FILES[$img]['tmp_name'];
                $ext = pathinfo($_FILES[$img]['name'], PATHINFO_EXTENSION);
                $filename = $article->getId() . '_' . $num . '.' . $ext;
                $path = $_SERVER['DOCUMENT_ROOT'] . '/christies/mvc/view/admin/imgs/productos/' . $filename;

                move_uploaded_file($temporal, $path);
                $db = "http://localhost/christies/mvc/view/admin/imgs/productos/" . $filename;
                if ($num === 1) {
                    $article->setImg1($db);
                    $change = true;
                } else if ($num === 2) {
                    $article->setImg2($db);
                    $change = true;
                } else if ($num === 3) {
                    $article->setImg3($db);
                    $change = true;
                }
            } else {
                $_SESSION['muygrande'] = true;
            }
        }
        return $change;
    }

    /**
     *
     * @param Categoria $categoria
     * @param int $num
     * @return bool
     * @author Martin Ruiz
     */
    private function filecheckC(Categoria $categoria, int $num): bool
    {
        $change = false;
        $mega = 1024 * 2024;
        $img = 'img' . $num;

        if (isset($_FILES[$img]) && $_FILES[$img]['name'] !== '' && $_FILES[$img]['error'] === 0) {
            $tam = $_FILES[$img]['size'];
            if ($tam < 8 * $mega) {
                $temporal = $_FILES[$img]['tmp_name'];
                $ext = pathinfo($_FILES[$img]['name'], PATHINFO_EXTENSION);
                $filename = $categoria->getId() . '_' . $num . '.' . $ext;
                $path = $_SERVER['DOCUMENT_ROOT'] . '/christies/mvc/view/admin/imgs/categorias/' . $filename;

                move_uploaded_file($temporal, $path);
                $db = "http://localhost/christies/mvc/view/admin/imgs/categorias/" . $filename;
                $categoria->setImg($db);
                $change = true;

            } else {
                $_SESSION['muygrande'] = true;
            }
        }
        return $change;
    }

    /**
     * @param int $id
     * @return void
     * @author Martin Ruiz
     */
    public function usersProcess(int $id)
    {
        require './model/sesiones.php';
        if ($id !== null) {
            $users = Usuario::read($id);
            $comentarios = ChristiesGestorDB::getCommentsOnUserId($id);

            if ($users instanceof Usuario) {
                $change = false;


                if (isset($_POST['email']) && $users->getEmail() !== $_POST['email'] && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $users->setEmail($_POST['email']);
                    $change = true;
                }

                foreach ($comentarios as $key => $comentario) {
                    $comment = "comentarios" . $key;
                    if (isset($_POST[$comment]) && $comentario->getContenido() !== $_POST[$comment] && preg_match('/[\w,-_\'¿¡!\"\s]{10,255}/mu', $_POST[$comment])) {
                        $comentario->setContenido($_POST[$comment]);
                        $comentario->update();
                    }
                }

                if (isset($_POST['tokens']) && $users->getTokens() !== (float)$_POST['tokens']) {
                    $users->setTokens((float)$_POST['tokens']);
                    $change = true;
                }

                if (isset($_POST['telf']) && $users->getTlf() !== $_POST['telf'] && preg_match('/^[+]?[(]?\d{3}[)]?[-\s.]?\d{3}[-\s.]?\d{4,6}$/m', $_POST['telf'])) {
                    $users->setTlf($_POST['telf']);
                    $change = true;
                }

                if ($change) {
                    $users->update();
                }
            }
        }
        header('Location: ../users/' . $id);
    }

    /**
     *
     * @param int $id
     * @return void
     * @author Martin Ruiz
     */
    public function deleteUser(int $id): void
    {
        require './model/sesiones.php';
        if ($id !== null) {
            Usuario::delete($id);
        }
    }

    /**
     *
     * @param int $id
     * @return void
     * @author Martin Ruiz
     */
    public function deleteComment(int $id): void
    {
        require './model/sesiones.php';
        if ($id !== null) {
            Comentario::delete($id);
        }
    }

    /**
     *
     * @return void
     * @author Martin Ruiz
     */
    public function categoriasAdd(): void
    {
        require './model/sesiones.php';
        $categoria = new Categoria((int)null, '', '', '');
        if ($categoria->create()) {
            $id = ChristiesGestorDB::categoriaLastId();
            header('Location: ../categorias/' . $id);
        } else {
            header('Location: ../categorias');
        }
    }

    /**
     *
     * @return void
     * @throws JsonException
     * @author Martin Ruiz
     */
    public function productosAdd(): void
    {
        require './model/sesiones.php';
        if (isset($_POST) && !empty($_POST)) {

            if (isset($_POST['id_cat'], $_POST['nombre'], $_POST['precio'])) {
                $obj = new ObjetoVirtual((int)null, (float)$_POST['precio'], $_POST['nombre'], '', '', '', (float)null, (float)null,(int) $_POST['id_cat']);

                if (preg_match('/^[a-zA-Záéíóú][a-zA-Záéíóú_\'.\-\s?]{2,23}$/u', $_POST['nombre']) &&
                    preg_match('/^(^\d+(\.\d{1,2})?$)$/', $_POST['precio']) &&
                    $obj->create()) {
                    header('Location: ../productos');
                }
            }

        }
        $contenido = 'Producto';
        $cats = json_decode(ChristiesGestorDB::jsonCatIdNombre(), true, 512, JSON_THROW_ON_ERROR);
        $content = './view/admin/adding/product.php';
        require './view/admin/plantilla.php';

    }

    /**
     *
     * @return void
     * @author Martin Ruiz
     */
    public function usersAdd(): void
    {
        if (isset($_POST) && !empty($_POST)) {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                $_SESSION["userError"] = true;
            }
            if ($_POST['pass1'] !== $_POST['pass2'] ||
                (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$/', $_POST['pass1']) &&
                    !preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$/', $_POST['pass2']))) {
                $_SESSION["passError"] = true;
            }
            if (($_SESSION['userError'] !== '' || !isset($_SESSION['userError'])) &&
                ($_SESSION['passError'] !== '' || !isset($_SESSION['passError'])) &&
                ChristiesGestorDB::addUser($_POST['email'], $_POST['pass1'])
            ) {
                header('Location: ../users/' . Usuario::lastid());
            }

        } else {
            header('Location: ../register');
        }
    }

    /**
     *
     * @param int $id
     * @return void
     * @author Martin Ruiz
     */
    public function deleteCategoria(int $id): void
    {
        require './model/sesiones.php';
        if ($id !== null) {
            Categoria::delete($id);
        }
    }

    /**
     *
     * @param int $id
     * @return void
     * @author Martin Ruiz
     */
    public function deleteProducto(int $id): void
    {
        require './model/sesiones.php';
        if ($id !== null) {
            Categoria::delete($id);
        }
    }

    /**
     *
     * @throws JsonException
     * @author Martin Ruiz
     */
    public function comentariosAdd()
    {
        require './model/sesiones.php';
        if (isset($_POST) && !empty($_POST)) {
            if (isset($_POST['obj'], $_POST['usr'], $_POST['descripcion']) &&
                is_numeric($_POST['obj']) &&
                is_numeric($_POST['usr']) &&
                preg_match('/[\w,-_\'¿¡!\"\s]{3,255}/mu', $_POST['descripcion']) &&
                ChristiesGestorDB::createComment($_POST['descripcion'], $_POST['obj'], $_POST['usr'])) {
                header('Location: ../comentarios');
            }
        } else {
            $contenido = 'Comentarios';
            $objs = json_decode(ChristiesGestorDB::jsonObjIdNombre(), true, 512, JSON_THROW_ON_ERROR);
            $usrs = json_decode(ChristiesGestorDB::jsonUsrIdNombre(), true, 512, JSON_THROW_ON_ERROR);
            $content = './view/admin/adding/comment.php';
            require './view/admin/plantilla.php';
        }
    }

}