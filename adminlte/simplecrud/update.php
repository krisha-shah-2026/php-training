<?php
 session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// session_start();
//  include 'auth.php';



// session_start();
include '../db.php';
// $id = $_GET['id'];
// $id = $_SESSION['user_id'];  

//   $errors = [];   
// $editGeneralErrors = [];
if (isset($_POST['update']))

   {//echo"h"; exit();
     $id = $_POST['id']; 
    //  echo $id; exit();
// $id = $_SESSION['user_id'];  


    $first_name   = $_POST['first_name'];
    // echo $_POST['first_name']; exit();
    $last_name   = $_POST['last_name'];
//  echo $last_name; exit();
    $email = $_POST['email'];
     // echo $email; exit();
    $password = $_POST['password'];
    // echo $password; exit();
    $confirm_password = $_POST['confirm_password'];
      // echo $confirm_password; exit();
    $address = $_POST['address'];
// echo $address; exit();
    $phone_no = $_POST['phone_no'];
    //   echo $_POST['phone_no'] ; exit();
    $gender = $_POST['gender'] ?? '';
      // echo $_POST['gender']; exit();
    $old_image = $_POST['old_image'];
    $new_image = $_FILES['new_image']['name'];
 
if (!empty($new_image)) {
 
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($new_image);
 
    move_uploaded_file($_FILES['new_image']['tmp_name'], $target_file);
//    $_SESSION["image"] = $targetdir;
    if (!empty($old_image) && file_exists($target_dir . $old_image)) {
        unlink($target_dir . $old_image);
    }
 
    $profile_image = $new_image;
//  $_SESSION["image"] = $targetdir;
} else {
    $profile_image = $old_image;
} 
// $targetdir = "uploads/".$profile_image;
// $users = $_SESSION['user_id'];
//  $_SESSION['profile_image'] = $profile_image;

                    // $_SESSION["image"] = $targetdir;
                
 
  $hobbies = $_POST['hobbies'] ?? [];
    $hobby=implode(",",$hobbies);
    $country = $_POST['country'];
// echo $country; exit();
$_SESSION['old'] = [
        'first_name' => $first_name,
        'last_name'  => $last_name,
        'email'      => $email,
        'profile_image' => $profile_image,
        'address'    => $address,
         'phone_no'   => $phone_no,
        'gender'     => $gender,
        'hobbies'    => $hobby,   
        'country'    => $country
]; 
    $errors = [];

    // Validation
    if (empty($first_name)) {
        $errors['first_name'] = "Please enter your first name!";
    }

    if (empty($last_name)) {
        $errors['last_name'] = "Please enter your last name!";
    }

    if (empty($email)) {
        $errors['email'] = "Please enter your email!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format!";
    }

    if (empty($password)) {
        $errors['password'] = "Please enter your password!";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters";
    }

    if (empty($confirm_password)) {
        $errors['confirm_password'] = "Please confirm your password!";
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match";
    }

    if (empty($new_image) && empty($old_image)) {
        $errors['profile_image'] = "Please select an image!";
    }

    if (empty($address)) {
        $errors['address'] = "Please enter your address!";
    }

    if (empty($phone_no)) {
        $errors['phone_no'] = "Please enter phone number!";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone_no)) {
        $errors['phone_no'] = "Phone number must be 10 digits";
    }

    if (empty($gender)) {
        $errors['gender'] = "Please select gender!";
    }

    if (empty($hobby)) {
        $errors['hobby'] = "Please select at least one hobby!";
    }

    if (empty($country)) {
        $errors['country'] = "Please select country!";
    }

    // If errors exist, store in session and redirect back
    if (!empty($errors)) {
        $_SESSION['registration_error'] = $errors;
        $_SESSION['old_values'] = $_POST; // to keep previous values
        header("Location: edit.php?id=$id");
        exit;
    }

    // Image handling
    if (!empty($new_image)) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($new_image);
        move_uploaded_file($_FILES['new_image']['tmp_name'], $target_file);

        // Remove old image
        if (!empty($old_image) && file_exists($target_dir . $old_image)) {
            unlink($target_dir . $old_image);
        }

        $profile_image = $new_image;
    } else {
        $profile_image = $old_image;
    }
    
    
$editGeneralErrors = [];


// $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ? AND user_id != ?");
// $stmt->bind_param("si", $email, $id);
// $stmt->execute();
// $result = $stmt->get_result();
if (mysqli_num_rows(mysqli_query($conn, "SELECT user_id FROM users WHERE email='$email' AND user_id != $id")) > 0) {
         $_SESSION['editGeneralErrors']['email'] = "Email already exists.";
         header("Location: edit.php?id=$id");
    }

   




 mysqli_query($conn, "UPDATE users SET 
    `first_name` = '$first_name', 
    `last_name` = '$last_name', 
    `email` = '$email', 
    `password` = '$password', 
    `confirm_password` = '$confirm_password', 
    `address` = '$address', 
    `phone_no` = '$phone_no', 
    `gender` = '$gender', 
    `profile_image` = '$profile_image',
    `hobby` = '$hobby', 
    `country` = '$country'
    WHERE user_id = '$id'");



$_SESSION['profile_image'] = !empty($profile_image) ? $profile_image : 'default.jpg';
  unset($_SESSION['old']);
   header("Location: listing.php");
exit;

 }    
?>