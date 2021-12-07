<?php
class Contact
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function submitMsg($name, $surname, $email, $message)
    {
        $messages = [];

        $stmt = $this->conn->prepare("INSERT INTO contactdetails 
        (name, surname, email, message)
        VALUES (?,?,?,?)");
        $stmt->execute([
            $name,
            $surname,
            $email,
            $message
        ]);

        $messages[] = 'Message submitted';
        return $messages;
    }
}
