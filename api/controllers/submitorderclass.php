<?php
class Order
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function submitOrder($name, $surname, $email, $message, $cartItems)
    {
        $messages = [];

        $stmt = $this->conn->prepare("INSERT INTO orders 
        (name, surname, email, message, cartItems)
        VALUES (?,?,?,?,?)");
        $stmt->execute([
            $name,
            $surname,
            $email,
            $message,
            $cartItems
        ]);

        $messages[] = 'Message submitted';
        return $messages;
    }
}
