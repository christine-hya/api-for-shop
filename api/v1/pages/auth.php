<?php 
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

include_once $_SERVER['DOCUMENT_ROOT'].'/api-for-shop/api/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/api-for-shop/api/controllers/usersclass.php';

$data = json_decode(file_get_contents('php://input'));
 
$username = '';
$password = '';

$database = new Database();
$db = $database->getConnection();

$users = new Users($db);


if(isset($data)){
    $username = $data->username;
    $password = $data->password;
}
    
http_response_code(200);

if($username && $password){
    $json = $users->auth($username, $password);
    if($json){
        echo $json;
    }else{
        http_response_code(400);
        echo json_encode([
            'error'=>true,
            'message'=>'User account not found.'
        ]);
    }
}else{
    echo json_encode([
        'error'=>true,
        'message'=>'You are missing information.'
    ]);
}

exit();