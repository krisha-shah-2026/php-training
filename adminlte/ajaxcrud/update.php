<?php
include '../db.php';
header("Content-Type: application/json");
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 $user_id = $_POST['user_id'];
$oldImage = $_POST['old_image'] ?? "";
 
$newImage = $_FILES['profile_image']['name'];
 
if($newImage != "")
{
   
    $tmp = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($tmp, "uploads/".$newImage);
 
   
    if($oldImage != "" && file_exists("uploads/".$oldImage)){
        unlink("uploads/".$oldImage);
    }
 
    
    $finalImage = $newImage;
}
else
{
    
    
    $finalImage = $oldImage;
}
    $id = $_POST['user_id'];
 
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $address    = $_POST['address'];
    $phone_no   = $_POST['phone_no'];
    $gender     = $_POST['gender'];
    $country    = $_POST['country'];
 
    $hobby="";
    if(isset($_POST['hobbies'])){
        $hobby = implode(",", $_POST['hobbies']);
    }

    if($_FILES['profile_image']['name'] != ""){
        $filename = $_FILES['profile_image']['name'];
        move_uploaded_file($_FILES['profile_image']['tmp_name'], "uploads/".$filename);
 
        $sql = "UPDATE userajax SET
        first_name=?, last_name=?, email=?, password=?, confirm_password=?,
        profile_image=?, address=?, phone_no=?, gender=?, hobby=?, country=?
        WHERE user_id=?";
       
        $stmt = $conn->prepare($sql);
     
        $stmt->bind_param("sssssssssssi",
        $first_name,$last_name,$email,$password,$confirm_password,
        $filename,$address,$phone_no,$gender,$hobby,$country,$id);
 
    }else{
        $sql = "UPDATE userajax SET
        first_name=?, last_name=?, email=?, password=?, confirm_password=?,
        address=?, phone_no=?, gender=?, hobby=?, country=?
        WHERE user_id=?";
 
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssi",
        $first_name,$last_name,$email,$password,$confirm_password,
        $address,$phone_no,$gender,$hobby,$country,$id);
    }
 
    if($stmt->execute()){
        echo json_encode(["status"=>"success"]);
    }
}
?>