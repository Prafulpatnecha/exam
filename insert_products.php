<?php

    header("Assess-Control-Allow-Method:POST");
    header("Content-Type: application/json");
    // mysqli_fetch_assoc(php://input.php);
    // file_get_contents
    // array_push()
    include("config.php");

    $c1 = new Config();

    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $product_name = $_POST["product_name"];
        $price = $_POST["price"];

        $res = $c1->insertProducts($product_name,$price);
        
        if($res)
        {
            $arr["data"]="Data successfully Inserted";
        }else{
            $arr["error"] = "Error";
        }
    }else{
        $arr["error"] = "POST method must be req";
    }

    echo json_encode($arr);
?>