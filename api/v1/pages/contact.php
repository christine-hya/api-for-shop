<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header('Access-Control-Allow-Headers: Content-Type, Authorization');


include_once $_SERVER['DOCUMENT_ROOT'] . '/api-for-shop/api/config/database.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/api-for-shop/api/controllers/contactclass.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api-for-shop/api/controllers/functions.php';

$data = json_decode(file_get_contents('php://input'));

$name = '';
$surname = '';
$email = '';
$message = '';

$database = new Database();
$db = $database->getConnection();

if (isset($data)) {
    $name = escape($data->name);
    $surname = escape($data->surname);
    $email = escape($data->email);
    $message = escape($data->message);
}

    http_response_code(200);

    $contact = new Contact($db);

    $messages = $contact->submitMsg($name, $surname, $email, $message);

    foreach ($messages as $message) {
        echo json_encode([
            'error' => false,
            'message' => $message
        ]);
    }

exit();
   

