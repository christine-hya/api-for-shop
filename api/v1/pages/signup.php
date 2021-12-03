<?php

header('Access-Control-Allow-Origin:  http://127.0.0.1:5500');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization');


include_once $_SERVER['DOCUMENT_ROOT'] . '/api-for-shop/api/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/api-for-shop/api/controllers/signupclass.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api-for-shop/api/controllers/functions.php';

$data = json_decode(file_get_contents('php://input'));

$username = '';
$fname = '';
$lname = '';
$email = '';
$password = '';

$database = new Database();
$db = $database->getConnection();

if (isset($data)) {
    $username = escape($data->username);
    $fname = escape($data->fname);
    $lname = escape($data->lname);
    $email = escape($data->email);
    $password = escape($data->password);
}

if ($username && $fname && $lname && $email && $password === "") {
    echo json_encode([
        'error' => true,
        'message' => 'Sign up failed'
    ]);
  
}
 else {
    http_response_code(200);

    $signup = new Signup($db);

    $json = $signup->signup($username, $fname, $lname, $email, $password);
    if ($json) {
        echo $json;
        // var_dump($signup->message);
    }
}
exit();
    // $messages = $setup->createTables();
    // foreach ($messages as $message) {
    //     echo $message. '<br>';
    // }