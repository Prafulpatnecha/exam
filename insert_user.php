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
        // $email = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        $res = $c1->insertUser($name,$email,$phone);
        
        if($res)
        {
            // $user = [];
            // while($data = mysqli_fetch_assoc($res)){
            //     array_push($user,$data);
            // }
            $arr["data"]="Data successfully Inserted";
        }else{
            $arr["error"] = "Error";
        }
    }else{
        $arr["error"] = "POST method must be req";
    }

    echo json_encode($arr);
?>