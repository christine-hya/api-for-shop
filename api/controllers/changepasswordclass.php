<?php

class Changepwd
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function changePwd($newpassword, $userId)
    {
        $messages = [];

        $stmt = $this->conn->prepare("UPDATE users 
        SET password=? WHERE userId=?");

            $stmt->execute([password_hash(
            $newpassword,
            PASSWORD_DEFAULT), $userId]);

        if ($stmt) {
            $messages[] = 'Password succesfully updated';
            
        }else {
            $messages[] = 'Error in updating password.';
        }
        return $messages;
    }
}
