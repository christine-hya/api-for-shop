<?php

class Addtocart {
    private $conn;

    public function __construct($db){
        $this->conn = $db;       
    }

    //create cart table
    public function createCart(){
        $messages = [];
        $messages[] = "[Setup Started]<br>";

        $query = "CREATE TABLE IF NOT EXISTS carts (
            cartId INT AUTO_INCREMENT,
            orderId INT(11),
            slug VARCHAR(100),
            title VARCHAR(100),
            description TEXT,
            price DECIMAL(10,2),
            image TEXT,
            userId INT(11),
            PRIMARY KEY(cartId)
            )";
            $stmt = $this->conn->prepare($query);
            if($stmt->execute()){
                $messages[] = "Successfully created carts table";
                }  else{
                    $messages[] = "Failed to create carts table.";
                }
                $messages[] = "[Setup Completed]<br>";
                return $messages;       
            }

            public function addtoCart($slug, $userId){
                $i = 0;
                $cartProducts = [];

                //select the product to be inserted
                $query = "SELECT * FROM services WHERE slug=:slug";
                $stmt = $this->conn->prepare($query);
                $stmt->bindParam(":slug", $slug);
                $stmt->execute();

                //get the array to insert into carts
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    if($stmt){
        
                        $cartProducts['orderid'] = $row['orderid'];
                        $cartProducts['slug'] = $row['slug'];
                        $cartProducts['title'] = $row['title'];
                        $cartProducts['description'] = $row['description'];
                        $cartProducts['price'] = $row['price'];
                        $cartProducts['image'] = $row['image'];
                        $cartProducts['userId'] = $userId;
                        // return $cartProducts;
                        print_r($cartProducts);
                        $i++;
                    }
                    echo 'Inserted '.$i. ' rows into carts table';
                }

                    //insert selected product into carts table
                    $stmt = $this->conn->prepare("INSERT INTO carts 
                    (orderid, slug, title, description, price, image, userId)
                    VALUES (?,?,?,?,?,?,?)");
                        if($stmt->execute([
                            $cartProducts['orderid'],
                            $cartProducts['slug'],
                            $cartProducts['title'],
                            $cartProducts['description'],
                            $cartProducts['price'],
                            $cartProducts['image'],
                            $cartProducts['userId']                         
                        ]));
            }            
}