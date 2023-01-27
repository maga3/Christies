<?php

namespace controller;

use JsonException;
use model\ChristiesGestorDB;


/**
 * @author Martin Ruiz
 */
class ApiController
{

    /**
     * @author Martin Ruiz
     * @return bool|string
     */
    public function productsJSON(): bool|string
    {
        try {
            if (isset($_POST) && !empty($_POST)){
                $json = ChristiesGestorDB::productsValuated($_SESSION['login'] ?? false, $_POST['idcat'] ==='dont'?null:$_POST['idcat'],$_POST['index'],$_POST['order']??'DESC', $_POST['price']==='true',$_POST['slider']==='true',$_SESSION['user']??null,$_POST['punt']==='true');
            }else {
                $json = ChristiesGestorDB::productsValuated($_SESSION['login'] ?? false, !isset($_POST['idcat']) || $_POST['idcat'] ==='dont'?null:$_POST['idcat'],$_POST['index']??0,$_POST['order']??'DESC',$_POST['price']??false,$_POST['slider']??false,$_SESSION['user']??null,$_POST['punt']??false);
            }

        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        } finally
        {
            return $json;
        }
    }

    /**
     * @author Martin Ruiz
     * @return bool|string
     */
    public function productsCatJSON(): bool|string
    {
        try {
            if (isset($_POST) && !empty($_POST)){
                $json = ChristiesGestorDB::productosUnaCategoria($_POST['idcat'],$_POST['order']??'DESC');
            }
        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        }finally{
            return $json ?? false;
        }
    }

    /**
     * @author Martin Ruiz
     * @param $id
     * @return bool|string
     */
    public function productByIdJSON($id): bool|string
    {
        try {
            $json = ChristiesGestorDB::productById($id);
        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        }finally{
            return $json ?? false;
        }
    }

    /**
     * @author Martin Ruiz
     * @return bool|string
     */
    public function searchBarObjectJSON(): bool|string
    {
        try {
            if (isset($_POST) && !empty($_POST)){
                $json = ChristiesGestorDB::filteredListProds($_POST['search']);
            }
        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        }finally {
            return $json ?? false;
        }
    }

    /**
     * @author Martin Ruiz
     * @return bool|string
     */
    public function userDataJSON(): bool|string
    {
        try {
            if (isset($_POST) && !empty($_POST)){
                $json = ChristiesGestorDB::userdata($_POST['user']);
            }
        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        }finally{
            return $json ?? false;
        }
    }

    /**
     * @author Martin Ruiz
     * @return bool|string
     */
    public function userPurchasesJSON(): bool|string
    {
        try {
            if (isset($_POST) && !empty($_POST)){
                $json = ChristiesGestorDB::userPurchases($_POST['user']);
            }
        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        }finally{
            return $json ?? false;
        }
    }

    /**
     * @author Martin Ruiz
     * @return bool|string
     */
    public function prodLocationJSON(): bool|string
    {
        try {
            if (isset($_POST) && !empty($_POST)){
                $json = ChristiesGestorDB::prodslocation();
            }
        } catch (JsonException $e) {
            echo "Error: " . $e->getMessage();
        }finally{
            return $json??false;
        }
    }

}