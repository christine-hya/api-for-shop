<?php

class Cart
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function displayCart($userId)
    {
        // $messages = [];
        $query = "SELECT * FROM carts WHERE 
       userId = :userId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":userId", $userId);
        $stmt->execute();
        return $stmt;

        //    if ($stmt->fetch() != true) {
        //        $messages[] = 'No items in cart.';
        //        return $messages;
        //    }else{
        //     return $stmt;
        //    }
    }
}
