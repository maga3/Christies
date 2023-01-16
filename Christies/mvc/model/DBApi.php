<?php

namespace model;

use JsonException;

class DBApi
{
    public static function getCategorias():string
        {

            try {
                $con = Conexion::connect();
                header('Content-Type: application/json');

                $sql = "SELECT * FROM categoria";

                $result = $con->query($sql);

                $datos = [];
                foreach ($result as $row) {
                    $datos[] = $row;
                }

                try {
                    return json_encode($datos, JSON_THROW_ON_ERROR);
                } catch (JsonException $e) {
                    echo "Error decoding " . $e->getMessage();
                }
            } catch (\PDOException $e) {
                echo "Error: " . $e->getMessage();
            } finally {
                $con = null;
            }
        }
}