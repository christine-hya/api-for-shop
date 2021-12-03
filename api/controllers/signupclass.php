<?php

//creating table

class Signup
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function signup($username, $fname, $lname, $email, $password)
    {
        $message = [];
        $json = [];
        

        $stmtUExists = $this->conn->prepare(
            "SELECT * FROM users WHERE username=?"
        );
        $stmtUExists->execute([$username]);

        $i = 0;

        //if nothing matches that username
        if ($stmtUExists->fetch() != true) {

        $stmt = $this->conn->prepare("INSERT INTO users 
        (username, fname, lname, email, password, active)
        VALUES (?,?,?,?,?,?)");
            $stmt->execute([
                $username,
                $fname,
                $lname,
                $email,
                password_hash(
                    $password,
                    PASSWORD_DEFAULT
                ),
                1
            ]);
            $i++;
            //add user to JSON
           
            // $username = $json['username'];
            // $fname = $json['fname'];
            // $lname = $json['lname'];
            // $email = $json['email'];
            // return json_encode($json);

        } else {
            $message[] = 'User already exists.';
        }

        $stmtReturn = $this->conn->prepare("SELECT id, username, fname, lname, email FROM users 
        WHERE username=?");

        $stmtReturn->execute([$username]);


        while ($row = $stmtReturn->fetch(PDO::FETCH_ASSOC)){

            if($stmtReturn){

                $json['id'] = $row['id'];
                $json['username'] = $row['username'];
                $json['fname'] = $row['fname'];
                $json['lname'] = $row['lname'];
                $json['email'] = $row['email'];
                return json_encode($json);
            }
        }
        $message[] = 'Inserted ' . $i . ' rows into USERS table';
        return $message;
    }
}



// class Users {

//     private $conn;

//     private $db_table = 'users';

//     public function __construct($db){
//         $this->conn = $db;
//     }
    
//     public function auth($username, $password){
//         $json = [];
//         $stmt = $this->conn->prepare("SELECT id, username, fname, lname, email, password FROM " . $this->db_table .
//         " WHERE username=? AND active");
//         $stmt->execute([$username]);
//         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
//             if(password_verify($password, $row['password'])){
//                 $json['id'] = $row['id'];
//                 $json['username'] = $row['username'];
//                 $json['fname'] = $row['fname'];
//                 $json['lname'] = $row['lname'];
//                 $json['email'] = $row['email'];
//                 return json_encode($json);
//             }
//         }
//         return false;
//     }
// }