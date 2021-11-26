<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

include_once $_SERVER['DOCUMENT_ROOT'].'/api-for-shop/api/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/api-for-shop/api/controllers/categoriesclass.php';

$database = new Database();
$db = $database->getConnection();

$items = new Categories($db);
$stmt = $items->read();

$itemCount = $stmt->rowCount();

if($itemCount > 0):
    http_response_code(200);
    $arr = array();
    $arr['response'] = array();
    $arr['count'] = $itemCount;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
        $e = $row;
        array_push($arr['response'], $e);
    endwhile;  
    echo json_encode($arr);  
else:
    http_response_code(404);
    echo json_encode(
        array(
            "type"=>"danger",
            "title"=>"Failed",
            "message"=>"No records found."
        )
    );
endif;  