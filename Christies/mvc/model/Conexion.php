<?php

namespace model;

use PDO;

require_once('parametros.php');

/**
 *@author Martin Ruiz
 */
class Conexion {
    /**
     * @return ?PDO|void
     *@author Martin Ruiz
     */
    public static function connect(){
        try {
            return new PDO(DB_CADENA, DB_USER, DB_PASSWORD);
        } catch (\PDOException $e) {
            echo "Error en la DB: " . $e->getMessage();
        }
    }
}
