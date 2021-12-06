<?php
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Methods: GET, POST');

include_once $_SERVER['DOCUMENT_ROOT'].'/api-for-shop/api/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/api-for-shop/api/controllers/cartsclass.php';


$data = json_decode(file_get_contents('php://input'));
$userId = '';

$database = new Database();
$db = $database->getConnection();


if(isset($data)){
    $userId = $data->userId;
}

$item = new Cart($db);
$stmt = $item->displayCart($userId);

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

    echo json_encode(
        array(
            "userId"=>$userId,
            "message"=>"No items in cart."
        )
    );
 

endif; 
