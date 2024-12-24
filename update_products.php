<?php

    header("Assess-Control-Allow-Method:PUT");
    header("Content-Type: application/json");
    // mysqli_fetch_assoc(php://input.php);
    // file_get_contents
    // array_push()
    include("config.php");
    
    $c1 = new Config();
    
    if($_SERVER["REQUEST_METHOD"]=="PUT")
    {
        $data = file_get_contents("php://input");
        parse_str($data,$result);
        // $product_name = $_POST["product_name"];
        // print_r($result);
        $id = $result["id"];
        $price = $result["price"];

        $res = $c1->updateProducts($id,$price);
        
        if($res)
        {
            $arr["data"]="Data successfully Inserted";
        }else{
            $arr["error"] = "Error";
        }
    }else{
        $arr["error"] = "PUT method must be req";
    }

    echo json_encode($arr);
?>