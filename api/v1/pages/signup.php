<?php

header('Access-Control-Allow-Origin:  http://127.0.0.1:5500');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization');


include_once $_SERVER['DOCUMENT_ROOT'].'/api-for-shop/api/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/api-for-shop/api/controllers/signupclass.php';

$data = json_decode(file_get_contents('php://input'));

$username = '';
$fname = '';
$lname = '';
$email = '';
$password = '';

$database = new Database();
$db = $database->getConnection();

if(isset($data)){
    $username = $data->username;
    $fname = $data->fname;
    $lname = $data->lname;
    $email = $data->email;
    $password = $data->password;
}

http_response_code(200);

    $signup = new Signup($db);

    $json = $signup->signup($username, $fname, $lname, $email, $password);
    if($json){
        echo $json;
    }else{
        echo json_encode([
            'error'=>true,
            'message'=>'Sign up failed'
        ]);
        }
        exit();
    // $messages = $setup->createTables();
    // foreach ($messages as $message) {
    //     echo $message. '<br>';
    // }