<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization');


include_once $_SERVER['DOCUMENT_ROOT'] . '/api-for-shop/api/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/api-for-shop/api/controllers/changepasswordclass.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api-for-shop/api/controllers/functions.php';

$data = json_decode(file_get_contents('php://input'));

$newpassword = '';
$userId = '';

$database = new Database();
$db = $database->getConnection();

if (isset($data)) { 
    $newpassword = escape($data->newpassword);
    $userId = escape($data->userId);
}

    http_response_code(200);

    $changepwd = new Changepwd($db);

    $messages = $changepwd->changePwd($newpassword, $userId);

    foreach ($messages as $message) {
        echo json_encode([
            'error' => false,
            'message' => $message
        ]);
    }

exit();
   

