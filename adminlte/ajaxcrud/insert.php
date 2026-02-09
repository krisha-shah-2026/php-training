<?php
//  session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 session_start();
include '../db.php';


 
if (isset($_POST['submit']))
   
{   
     $first_name   = $_POST['first_name']?? '';
    //  echo $_POST['first_name'];exit();
    $last_name   = $_POST['last_name']?? '';
    $email   = $_POST['email']?? '';
    $password = $_POST['password']?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
     $address = $_POST['address']?? '';
    $phone_no = $_POST['phone_no'] ?? '';
    $gender  = $_POST['gender'] ?? null;
    $country = $_POST['country'] ?? null;
    $hobby = $_POST['hobbies'] ?? [];
    if (!empty($_FILES['profile_image']['name'])) {

        $img_name = $_FILES['profile_image']['name'];
    $tmp_name = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($tmp_name, "uploads/" . $img_name);

} else {
    $img_name = $_SESSION['old']['profile_image'] ?? '';
}


 $hobby   = !empty($_POST["hobbies"]) ? implode(",", $_POST['hobbies']) : null;

   $sql = "INSERT INTO `userajax`(`first_name`, `last_name`, `email`, `password`, `confirm_password`, `profile_image`, `address`, `phone_no`, `gender`, `hobby`, `country`) VALUES 
('$first_name','$last_name','$email','$password','$confirm_password','$img_name','$address','$phone_no','$gender','$hobby','$country')";

    if (mysqli_query($conn, $sql)){
    //   $_SESSION['profile_image'] = !empty($img_name) ? $img_name : 'default.jpg';

        echo "inserted succesfully";
    }else{echo "not inserted";}
 

}