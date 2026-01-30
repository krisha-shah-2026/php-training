<?php
 //session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include 'db.php';


$error = "";
$formData = [];
if (isset($_POST['submit']))
{   $first_name   = $_POST['first_name']?? '';
    $last_name   = $_POST['last_name']?? '';
    $email   = $_POST['email']?? '';
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'] ?? '';
    $address = $_POST['address']?? '';
    $phone_no = $_POST['phone_no'] ?? '';
    $gender  = $_POST['gender'] ?? null;
    $country = $_POST['country'] ?? null;
    $hobby = $_POST['hobbies'] ?? [];
$_SESSION['old'] = [
        'first_name' => $first_name,
        'last_name'  => $last_name,
        'email'      => $email,
        'address'    => $address,
        'phone_no'   => $phone_no,
        'gender'     => $gender,
        'hobby'      => $hobby,
        'country'    => $country
];
if(empty($first_name))
 {
  $error = "enter your first name !";

 } else if(empty($last_name))
 {
  $error = "enter your last name !";
 
 } else if(empty($email))
 {
  $error = "enter your email !";
 } else if(empty($password))
 {
  $error = "enter your password !";

 } else if(empty($confirm_password))
 {
  $error = "enter your confirm password !";

 }else if ($password !== $confirm_password) {
    $error = "Passwords do not match!";
}else if (empty($img_name)) {

    $error = "Please select image file !";
} 
  else if (empty($address)) {
  $error = "enter your address !";
 }   else if (empty($phone_no)) {
    $error = "Enter your phone no.";
} elseif (strlen($phone_no) != 10) {
    $error = "Phone no. must be 10 digits";
} 


 else if (empty($gender)) {
  $error = "enter your gender !";
 }  else if (empty($hobby)) {
  $error = "enter your hobby !";
 } else  if (empty($country)) {
  $error = "enter your country !";
  
 } 
 
    
 
 if (!empty($error)) {
        $_SESSION['registration_error'] = $error;
      header('Location: registraionpageadmin.php');
     exit();
}
    
 


//   $_SESSION['old'] = [
//         'first_name' => $first_name,
//         'last_name'  => $last_name,
//         'email'      => $email,
//         'address'    => $address,
//         'phone_no'   => $phone_no,
//         'gender'     => $gender,
//         'hobby'      => $hobby,
//         'country'    => $country
// ];
$sql = "SELECT email FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) > 0) {
        $_SESSION['email_error'] = "Email already exists";
        header("Location: registraionpageadmin.php");
        exit;
    }
}


//     if ($_POST['password'] !== $_POST['confirm_password']) {
//     $_SESSION['error'] = "Passwords do not match";
//      header("Location: registraionpageadmin.php");
//     exit;
//    }


if (!preg_match('/^[0-9]{10}$/', $phone_no)) {
    $_SESSION['phone_error'] = "Phone number must be 10 digits";
    header("Location: registraionpageadmin.php");
    exit;
}

 
    $img_name = $_FILES['profile_image']['name'];
    $tmp_name = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($tmp_name, "uploads/" . $img_name);
// INSERT INTO `user_table`(`user_id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`, `profile_image`, `address`, `phone_no`, `gender`, `hobby`, `Country`) VALUES 
       $hobby   = !empty($_POST["hobbies"]) ? implode(",", $_POST['hobbies']) : null;

   $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `confirm_password`, `profile_image`, `address`, `phone_no`, `gender`, `hobby`, `country`) VALUES 
('$first_name','$last_name','$email','$password','$confirm_password','$img_name','$address','$phone','$gender','$hobby','$country')";

    if (mysqli_query($conn, $sql)){
        echo "inserted succesfully";
    }else{echo "not inserted";}
   header("Location: listing.php");


    
  unset($_SESSION['old']);
     }
     header("Location: listing.php");
     exit;