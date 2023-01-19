<?php

use model\ChristiesGestorDB;
use model\ObjetoVirtual;

/**
 * @author martin ruiz
 * Clase controladora de acciones parte admin
 *
 */
class Controller
{
    /**
     * Valida el login y da feedback del error
     * @return void
     */
    public function login(): void
    {
        if (isset($_POST['usr'], $_POST['pass'])){
            $usr = $_POST['usr'];
            $pass = $_POST['pass'];
            if (!filter_var($usr, FILTER_VALIDATE_EMAIL)){
                $_SESSION["userError"] = true;
            }if(!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$/',$pass)){
                $_SESSION["passError"] = true;
            }else if (ChristiesGestorDB::login($usr,$pass)){
                $_SESSION['loginAdmin'] = true;
                $_SESSION['user'] = $usr;
                header('Location: http://localhost/christies/mvc/index.php/admin/dashboard');
            }
                header('Location: http://localhost/christies/mvc/index.php/admin/login');
        }
    }

    /**
     * Muestra el formulario de login
     * @return void
     */
    public function showLogin(): void
    {
        if (isset($_SESSION['loginAdmin']) && $_SESSION['loginAdmin']===true){
            header('Location: http://localhost/christies/mvc/index.php/admin/dashboard');
        }else {
            require './view/admin/login.php';
        }
    }

    /**
     * Muestra el formulario de recuperar la password
     * @return void
     */
    public function showRecuperar(): void
    {
        require './view/admin/recuperar.php';
    }

    /**
     * Muestra el formulario para registrarse
     * @return void
     */
    public function showRegister(): void
    {
        require './view/admin/register.php';
    }

    /**
     * Muestra el dashboard
     * @return void
     */
    public function showDashboard(): void
    {
        require './model/sesiones.php';
        require './view/admin/plantilla.php';
    }

    /**
     * Logsout
     * @return void
     */
    public function logout(): void
    {
        session_destroy();
        header('Location: http://localhost/christies/mvc/index.php/admin/login');
    }

    /**
     * @return void
     */
    public function categorias(): void
    {
        require './model/sesiones.php';
        $contenido = 'categorias';
        $content = './view/admin/data-tables/table.php';
        require './view/admin/plantilla.php';
    }

    public function users()
    {
        require './model/sesiones.php';
        $contenido = 'usuarios';
        $content = './view/admin/data-tables/table.php';
        require './view/admin/plantilla.php';
    }

    public function articles()
    {
        require './model/sesiones.php';
        $contenido = 'objetos';
        $content = './view/admin/data-tables/table.php';
        require './view/admin/plantilla.php';
    }

    public function articlesCard($id)
    {
        require './model/sesiones.php';
        $contenido = 'Articulos';
        $article = ChristiesGestorDB::readProduct($id);
        if ($article){
            $content = './view/admin/cards/card-product.php';
            require './view/admin/plantilla.php';
        }
    }

    public function categoriesCard($id)
    {
        require './model/sesiones.php';
        $contenido = 'Categoria';
        $categoria = ChristiesGestorDB::readCategory($id);
        if ($categoria){
            $content = './view/admin/cards/card-category.php';
            require './view/admin/plantilla.php';
        }
    }

    public function comentarios()
    {
        require './model/sesiones.php';
        $contenido = 'Comentarios';
        $content = './view/admin/data-tables/table.php';
        require './view/admin/plantilla.php';
    }

    public function compras()
    {
        require './model/sesiones.php';
        $contenido = 'Compras';
        $content = './view/admin/data-tables/table.php';
        require './view/admin/plantilla.php';
    }

    public function productoProcess($id)
    {
        require './model/sesiones.php';
        if ($id !== null){
            $article = ChristiesGestorDB::readProduct($id);

            if ($article instanceof ObjetoVirtual) {
                $change = false;

                $change1=$this->filecheck($article,1);
                $change2=$this->filecheck($article,2);
                $change3=$this->filecheck($article,3);

                if (isset($_POST['nombre']) && $article->getNombre() !== $_POST['nombre'] && preg_match('/^[a-zA-Záéíóú][a-zA-Záéíóú_\'.\-\s?]{2,23}$/u', $_POST['nombre'])) {
                    $article->setNombre($_POST['nombre']);
                    $change = true;
                }
                if (isset($_POST['lat']) && $_POST['lat'] !== '0' && $article->getLat() !== (float)$_POST['lat'] && ((float) $_POST['lat'] >= -90 && (float) $_POST['lat'] <= 90)){
                    $article->setLat((float)$_POST['lat']);
                    $change = true;
                }
                if (isset($_POST['lon']) && $_POST['lon'] !== '0' && $article->getLon() !== (float)$_POST['lon'] && ((float) $_POST['lon'] >= -180 && (float) $_POST['lon'] <= 180)){
                    $article->setLon((float)$_POST['lon']);
                    $change = true;
                }
                if (isset($_POST['precio']) && $article->getPrecio() !== (float)$_POST['precio']){
                    $article->setPrecio($_POST['precio']);
                    $change = true;
                }
                if ($change || $change1 || $change2 || $change3){
                    var_dump($article->update());
                }
            }
        }
        header('Location: http://localhost/christies/mvc/index.php/admin/productos/'.$id);
    }

    /**
     * @param ObjetoVirtual $article
     * @param $num
     * @return bool
     */
    public function filecheck(ObjetoVirtual $article,$num): bool
    {
        $change = false;
        $mega = 1024*2024;
        $img = 'img'.$num;

        if (isset($_FILES[$img]) && $_FILES[$img]['name'] !== '' && $_FILES[$img]['error'] === 0) {
            $tam = $_FILES[$img]['size'];
            if ($tam < 8 * $mega) {
                $temporal = $_FILES[$img]['tmp_name'];
                $ext = pathinfo($_FILES[$img]['name'], PATHINFO_EXTENSION);
                $filename = $article->getId() . '_' . $num. '.' . $ext;
                $path = $_SERVER['DOCUMENT_ROOT'] . '/christies/mvc/view/admin/imgs/productos/' . $filename;
                $absolutepath = __DIR__ . '/' . $path;
                if (!file_exists($absolutepath)) {
                    move_uploaded_file($temporal, $path);
                    $db = "http://localhost/christies/mvc/view/admin/imgs/productos/" . $filename;
                    if ($num === 1){
                        $article->setImg1($db);
                        $change = true;
                    }else if($num === 2){
                        $article->setImg2($db);
                        $change = true;
                    }else if($num === 3){
                        $article->setImg3($db);
                        $change = true;
                    }
                }
            } else {
                $_SESSION['mugrande'] = true;
            }
        }
        return $change;
    }
}