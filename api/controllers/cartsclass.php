<?php

class Cart {
    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }

    public function displayCart($userId) {
        $query = "SELECT * FROM carts WHERE 
       userId = :userId";
       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(":userId", $userId);
       $stmt->execute();
       return $stmt;
    }
}