<?php

    header("Assess-Control-Allow-Method:GET");
    header("Content-Type: application/json");
    // mysqli_fetch_assoc(php://input.php);
    // file_get_contents
    // array_push()
    include("config.php");

    $c1 = new Config();


    if($_SERVER["REQUEST_METHOD"]=="GET")
    {
        $res = $c1->readUser();
        $res1 = $c1->readOrder();
        $res2 = $c1->readProducts();
        if($res && $res1 && $res2)
        {
            $user = [];
            while($data = mysqli_fetch_assoc($res)){
                array_push($user,$data);
            }
            $arr["users"]=$user;
            $user1 = [];
            while($data = mysqli_fetch_assoc($res1)){
                array_push($user1,$data);
            }
            $arr["orders"]=$user1;
            $user2 = [];
            while($data = mysqli_fetch_assoc($res2)){
                array_push($user2,$data);
            }
            $arr["products"]=$user2;
        }else{
            $arr["error"] = "Error";
        }
    }else{
        $arr["error"] = "GET method must be req";
    }
    echo json_encode($arr);
?>