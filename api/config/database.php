<?php

// class Database {
//     private $host = "localhost";
//     private $database_name = "webstore_portfolio";
//     private $username = "root";
//     private $password = "root";

//     public $conn;

//     public function getConnection(){
//         $this->conn = null;
//         try{
//             $this->conn = new PDO (
//                 "mysql:host=" .$this->host . ";
//                 dbname=" . $this->database_name,
//                 $this->username,
//                 $this->password

//             );
//         }catch(PDOException $exception){
//             echo "Database could not be connected: " .
//             $exception->getMessage();

//         }
//         return $this->conn;
//     }
// }

class Database {
    private $host = "sql308.epizy.com";
    // private $port = "3306";
    private $database_name = "epiz_30614377_portfolioshop";
    private $username = "epiz_30614377";
    private $password = "fHdNAfTCsslYI";

    public $conn;

    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO (
                "mysql:host=" .$this->host . ";
                dbname=" . $this->database_name,
                $this->username,
                $this->password

            );
        }catch(PDOException $exception){
            echo "Database could not be connected: " .
            $exception->getMessage();

        }
        return $this->conn;
    }
}