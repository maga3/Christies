<?php
//$action = '';
////$db =new DBManagerUsers();
//if(isset($_SESSION['action'])){
//    $action = $_SESSION['action'];
//}
//if($action==='update'){
//
//}

$table = 'usuario';
$primaryKey = 'id_user';
$columns = array(
    array('db' => 'id_user', 'dt' => 'id_user'),
    array('db' => 'email', 'dt' => 'email'),
    array('db' => 'password', 'dt' => 'password'),
    array('db' => 'rol', 'dt' => 'rol'),
    array('db' => 'tokens', 'dt' => 'tokens'),
    array('db' => 'telf', 'dt' => 'telf'),
);

$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db' => 'christies',
    'host' => 'localhost'
);
require('../../../model/ssp.class.php');
try {
    echo json_encode(SSP::simple($_POST, $sql_details, $table, $primaryKey, $columns), JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    echo "Error: " . $e->getMessage();
}
?>