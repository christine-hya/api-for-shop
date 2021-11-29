<?php

class Services {
    private $conn;

    private $db_table = 'services';

    public function __construct($db){
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT b.orderid, b.slug, b.title, b.description, b.price, b.image, a.categories FROM " . $this->db_table .
       " AS b INNER JOIN categories AS a ON b.categoryId = a.categoryId ORDER BY 
       orderid ASC";
       $stmt = $this->conn->prepare($query);
       $stmt->execute();
       return $stmt;
    }

    public function single($slug) {
        $query = "SELECT b.title, b.description, b.price, b.image, a.categories FROM " . $this->db_table .
       "  AS b INNER JOIN categories AS a ON b.categoryId = a.categoryId WHERE 
       slug = :slug";
       $stmt = $this->conn->prepare($query);
       $stmt->bindParam(":slug", $slug);
       $stmt->execute();
       return $stmt;
    }
}