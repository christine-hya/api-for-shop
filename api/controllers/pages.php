<?php

class Pages {
    private $conn;

    private $db_table = 'pages';

    public function __construct($db){
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT slug,title FROM " . $this->db_table .
       "  ORDER BY 
       orderid ASC";
       $stmt = $this->conn->prepare($query);
       $stmt->execute();
       return $stmt;
    }
}