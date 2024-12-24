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
        $order_date = $_POST["order_date"];
        $status = $_POST["status"];

        $res = $c1->insertOrder($order_date, $status);
        
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