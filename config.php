<?php
class Config{

    private $hostname = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "demo";
    private $connection;
    
    public function connect()
    {
        $this->connection = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
    }
    
    public function __construct()
    {
        $this->connect();
    }
    
    public function insertUser($name,$email,$phone)
    {
        $query = "INSERT INTO `user`(`name`, `email`, `phone`) VALUES ('$name','$email','$phone')";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }
    
    public function readUser()
    {
        $query = "SELECT * FROM `user`";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }
    public function readOrder()
    {
        $query = "SELECT * FROM `orders`";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }
    public function readProducts()
    {
        $query = "SELECT * FROM `products`";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }
    
    public function insertProducts($product_name, $price)
    {
        $query = "INSERT INTO `products`( `product_name`, `price`) VALUES ('$product_name','$price')";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }
    
    public function updateProducts($id,$price)
    {
        $query = "UPDATE `products` SET `price`='$price' WHERE `id`='$id'";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }

    public function insertOrder($order_date, $status)
    {
        $query = "INSERT INTO `orders`(`order_date`, `status`) VALUES ('$order_date','$status')";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }
    
    public function deleteOrder($id)
    {
        $query = "DELETE FROM `orders` WHERE id='$id'";
        $res = mysqli_query($this->connection,$query);
        return $res;
    }

}

// header("Assess-Control-Allow-Method:POST");
// header("Contant-Type: application/json");
// mysqli_fetch_assoc(php://input.php);
// file_get_contents
// array_push()
?>