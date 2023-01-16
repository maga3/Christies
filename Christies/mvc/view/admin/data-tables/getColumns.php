<?php

include_once '../../../model/ChristiesGestorDB.php';
use model\ChristiesGestorDB;

$table = $_POST['table'];
$columns = ChristiesGestorDB::getColumns($table);

$json = [];
for ($i = 0, $iMax = count($columns); $i < $iMax; $i++) {
    $array['data'] = $columns[$i];
    $json['columns'][] = $array;
}

try {
    echo json_encode($json, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    echo "Error " . $e->getMessage();
}