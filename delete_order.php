<?php

    header("Assess-Control-Allow-Method:DELETE");
    header("Content-Type: application/json");
    // mysqli_fetch_assoc(php://input.php);
    // file_get_contents
    // array_push()
    include("config.php");
    
    $c1 = new Config();
    
    if($_SERVER["REQUEST_METHOD"]=="DELETE")
    {
        $data = file_get_contents("php://input");
        parse_str($data,$result);
        // $product_name = $_POST["product_name"];
        // print_r($result);
        $id = $result["id"];

        $res = $c1->deleteOrder($id);
        
        if($res)
        {
            $arr["data"]="Data successfully Inserted";
        }else{
            $arr["error"] = "Error";
        }
    }else{
        $arr["error"] = "DELETE method must be req";
    }

    echo json_encode($arr);
?>