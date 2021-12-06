<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: DELETE');

include_once $_SERVER['DOCUMENT_ROOT'].'/api-for-shop/api/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/api-for-shop/api/controllers/deleteitemclass.php';


$database = new Database();
$db = $database->getConnection();

$cartId = $_GET['item'];

$deleteItem = new deleteItem($db);

$messages = $deleteItem->deleteItem($cartId);
    
http_response_code(200);

    foreach ($messages as $message) {
        echo $message. '<br>';
    }