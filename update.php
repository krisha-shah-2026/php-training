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
   //   $old_image = $_POST['old_image'] ?? '';
   //  $new_image = $_FILES['new_image']['name'] ?? '';
 
   //  $target_dir = "uploads/";
 
   //  if (!empty($new_image)) {
 
   //      $target_file = $target_dir . basename($new_image);
   //      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
 
   //      $allowed = ['jpg', 'jpeg', 'png', 'gif'];
   //      if (!in_array($imageFileType, $allowed)) {
   //          die("Invalid image format");
   //      }
 
   //      if (move_uploaded_file($_FILES['new_image']['tmp_name'], $target_file)) {
 
   //          if (!empty($old_image) && file_exists($target_dir . $old_image)) {
   //              unlink($target_dir . $old_image);
   //          }
 
   //          $profile_image = $new_image; // new image
   //      } else {
   //          die("Image upload failed");
   //      }
 
   //  } else {
   //      $profile_image = $old_image; // 
   //  }
   $old_image = $_POST['old_image'];
$new_image = $_FILES['new_image']['name'];
 
if (!empty($new_image)) {
 
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($new_image);
 
    move_uploaded_file($_FILES['new_image']['tmp_name'], $target_file);
 
    if (!empty($old_image) && file_exists($target_dir . $old_image)) {
        unlink($target_dir . $old_image);
    }
 
    $profile_image = $new_image;
 
} else {
    $profile_image = $old_image;
}
   //  $profile_image = $_POST['profile_image'] ?? '';
   // $new_image = $_FILES['new_image']['name'] ?? null;
   // //  $img_name = $_POST['profile_image']; 
   // // //   $old_image = $_POST['old_image'];
   // //  $new_image = $_FILES['new_image']['name'];

   //  if ($new_image != "") {
   //      $target_dir = "uploads/";
   //      $target_file = $target_dir . basename($new_image);
   //      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

   //      // Basic validation and moving the file (add more robust validation as needed)
   //      if (move_uploaded_file($_FILES['new_image']['tmp_name'], $target_file)) {
   //          // New image uploaded successfully, now delete the old one
   //          if (file_exists($target_dir . $img_name)) {
   //              unlink($target_dir . $profile_image); // Delete old image file
   //          }
   //          $update_filename = $new_image;
   //      } else {
   //          echo "Error uploading new image.";
   //          // Handle error, maybe redirect or stop execution
   //          exit();
   //      }
   //  } else {
   //      $update_filename = $profile_image; // Keep the old image name
   //  }
// }
   
    $hobbies = $_POST['hobbies'] ?? [];
    $hobby=implode(',', $hobbies);
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

 ?>
 <script type="text/javascript"> 
   window.location.href = 'http://localhost/php-training/process_form.php';
    </script>