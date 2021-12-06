<?php

class deleteItem {
    private $conn;

    public function __construct($db){
        $this->conn = $db;       
    }

    public function deleteItem($cartId){
        $i = 0;
        $messages = [];

        //select item to be deleted
        $query = "DELETE FROM carts WHERE cartId=:cartId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":cartId", $cartId);
        
        // $stmt->execute();
        if($stmt->execute()){
            $i++;
            $messages[] = "Deleted ". $i ." rows from carts";
            }  else{
                $messages[] = "Failed to delete item.";
            }
            return $messages;       
    } 
}