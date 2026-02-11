<?php
include '../db.php';
 
if(isset($_POST['id'])){
 
    $id = $_POST['id'];
    $sql = "DELETE FROM userajax WHERE user_id = '$id'";
    $result = mysqli_query($conn, $sql);
 
    if($result){
        echo json_encode(["success" => true]);
    }else{
        echo json_encode([
            "success" => false,
            "message" => mysqli_error($conn)
        ]);
    }
 
}else{
    echo json_encode([
        "success" => false,
        "message" => "ID not received"
    ]);
}


?>