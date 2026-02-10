<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
 
$conn = new mysqli("localhost","root","admin123","employee");
if($conn->connect_error){
    die("Connection Failed");
}

$errors = []; 

if($_SERVER["REQUEST_METHOD"] == "POST"){ 
    // GET FORM DATA
    $first_name = trim($_POST['first_name'] ?? ''); 
    $last_name = trim($_POST['last_name'] ?? ''); 
    $email = trim($_POST['email'] ?? ''); 
    $password = trim($_POST['password'] ?? ''); 
    $confirm_password = trim($_POST['confirm_password'] ?? ''); 
    $gender = $_POST['gender'] ?? ''; 
    $country = $_POST['country'] ?? ''; 
    $address = trim($_POST['address'] ?? ''); 
    $phone_no = trim($_POST['phone_no'] ?? ''); 
if (!empty($_FILES['profile_image']['name'])) {

        $img_name = $_FILES['profile_image']['name'];
    $tmp_name = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($tmp_name, "uploads/" . $img_name);
// // Image upload
} else {
    $img_name = $_SESSION['old']['profile_image'] ?? '';
}
    // HOBBIES
    $hobby = ""; 
    if(isset($_POST['hobbies'])){ 
        $hobby = implode(",", $_POST['hobbies']); 
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
        $img_name,
        $address,
        $phone_no,
        $gender,
        $hobby,
        $country
    );
 
    if($stmt->execute()){
        echo "success";
    }else{
        echo "DB ERROR: " . $stmt->error;
    }
}
?>