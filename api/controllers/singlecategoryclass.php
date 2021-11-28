<?php

class Category {
    private $conn;

    private $db_table = 'services';

    public function __construct($db){
        $this->conn = $db;
    }

    public function single($category) {
        $query = "SELECT orderid, slug, title, description, price, image FROM " . $this->db_table .
       "  WHERE 
       categoryId = :categoryId";
       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(":categoryId", $category);
       $stmt->execute();
       return $stmt;
    }
}