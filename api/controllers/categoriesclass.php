<?php

class Categories {
    private $conn;

    private $db_table = 'categories';

    public function __construct($db){
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT categories FROM " . $this->db_table;
       
       $stmt = $this->conn->prepare($query);
       $stmt->execute();
       return $stmt;
    }

    public function single($slug) {
        $query = "SELECT title,description FROM " . $this->db_table .
       "  WHERE 
       slug = :slug";
       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(":slug", $slug);
       $stmt->execute();
       return $stmt;
    }
}