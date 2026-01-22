<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'database.php';

// $id = $_GET['id'];

//  $sql2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_table WHERE user_id=$id"));
//  echo "ghghgh"; die ();
// echo "ghghgh"; die ();
// echo "<pre>";
// print_r($_POST); die;
if (isset($_POST['update']))
    {
    $id = $_POST['id']; 
    $first_name   = $_POST['first_name'];
    $last_name   = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    $address = $_POST['address'];
    $phone   = $_POST['phone_no'];
    $gender = $_POST['gender'] ?? '';
    $profile_image =$_POST['profile_image']; 
    $country = $_POST['Country'];

 mysqli_query($conn, "UPDATE user_table SET 
    `first_name` = '$first_name', 
    `last_name` = '$last_name', 
    `email` = '$email', 
    `password` = '$password', 
    `confirm_password` = '$confirm_password', 
    `address` = '$address', 
    `phone_no` = '$phone', 
    `gender` = '$gender', 
    `profile_image` = '$profile_image',
    `hobby` = '$hobby', 
    `country` = '$country'
    WHERE user_id = '$id'");
 
 }//header("Location: process_form.php");

 ?><script type="text/javascript"> 
 window.location.href = 'http://localhost/php-training/process_form.php';
 </script>