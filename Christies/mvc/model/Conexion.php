<?php

namespace model;

require_once('parametros.php');

class Conexion {
    public static function connect(){
        try {
            return new \PDO(DB_CADENA, DB_USER, DB_PASSWORD);
        } catch (\PDOException $e) {
            echo "Error en la DB: " . $e->getMessage();
        }
    }
}
