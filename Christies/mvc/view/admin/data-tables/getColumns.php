<?php

include_once '../../../model/ChristiesGestorDB.php';
use model\ChristiesGestorDB;

$table = $_POST['table'];
$columns = ChristiesGestorDB::getColumns($table);

$json = [];
for ($i = 0, $iMax = count($columns); $i < $iMax; $i++) {
    if ($i===0){
        $array['className'] = 'theId';
    }
    $array['data'] = $columns[$i];
    $array['title'] = $columns[$i];
    $json['columns'][] = $array;
    unset($array['className']);
}

$array['data'] = null;
$array['className'] = 'dt-center';
$array['defaultContent'] = '<a onclick="deleteCol(this)"><button type="button" class="btn btn-danger"><i class="mdi mdi-eraser"></i></button></a>';
$array['title'] = 'Eraser';
$json['columns'][] = $array;

$array['data'] = null;
$array['className'] = 'dt-center';
$array['defaultContent'] = '<a onclick="llamar(this)"><button type="button" class="btn btn-behance view"><i class="mdi mdi-eye"></i></button></a>';
$array['title'] = 'View';
$json['columns'][] = $array;

try {
    echo json_encode($json, JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    echo "Error " . $e->getMessage();
}