<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Content-Type: application/json"); 
 
$conn = new mysqli("localhost","root","admin123","employee");
if($conn->connect_error){
    die("Connection Failed");
}
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
   
    $first_name = trim($_POST['first_name'] ?? '');
    $last_name  = trim($_POST['last_name'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $password   = trim($_POST['password'] ?? '');
    $confirm_password = trim($_POST['confirm_password'] ?? '');
 
    $profile_image = $_FILES['profile_image']['name'] ?? '';
  $address  = trim($_POST['address'] ?? '');
    $phone_no = trim($_POST['phone_no'] ?? '');
 
    $gender     = $_POST['gender'] ?? '';
    $country    = $_POST['country'] ?? '';
 
    
    $hobby = "";
    if(isset($_POST['hobbies'])){
        $hobby = implode(",", $_POST['hobbies']);
    }
 

$filename = "";
 
if(isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] == 0)
{
    $targetDir = "uploads/";
$filename = $_FILES['profile_image']['name'];
    $targetFile = $targetDir . $filename;
 
    move_uploaded_file($_FILES['profile_image']['tmp_name'], $targetFile);
}
 
 
   
    $sql = "INSERT INTO userajax
    (first_name,last_name,email,password,confirm_password,profile_image,address,phone_no,gender,hobby,country)
    VALUES (?,?,?,?,?,?,?,?,?,?,?)";
 
 
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssss",
        $first_name,
        $last_name,
        $email,
        $password,
        $confirm_password,
        $filename,  
 
        $address,
        $phone_no,
        $gender,
        $hobby,
        $country
    );
 
if($stmt->execute()){
 
    $last_id = $stmt->insert_id;
 
    echo json_encode([
        "status" => "success",
        "message" => "User added successfully",
        "id" => $last_id,
        "first_name" => $first_name,
        "last_name" => $last_name,
        "email" => $email,
        "password" => $password,
        "confirm_password" => $confirm_password,
        "profile_image" => $filename,
        "address" => $address,
        "phone_no" => $phone_no,
        "gender" => $gender,
        "hobby" => $hobby,
        "country" => $country
    ]);
    exit;
}
}
?>
   
 