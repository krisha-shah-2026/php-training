<?php include 'db.php';?>
<?php
// $id = $_GET['id'];
          
if (isset($_POST['update']))

   {//echo"h"; exit();
    $id = $_POST['id']; 
        
    $first_name   = $_POST['first_name'];
    // echo $_POST['first_name']; exit();
    $last_name   = $_POST['last_name'];
//  echo $last_name; exit();
    $email = $_POST['email'];
    //  echo $email; exit();
    $password = $_POST['password'];
    // echo $password; exit();
    $confirm_password = $_POST['confirm_password'];
      // echo $confirm_password; exit();
    $address = $_POST['address'];
// echo $address; exit();
    $phone = $_POST['phone_no'];
    //  echo $_POST['phone_no'] ; exit();
    $gender = $_POST['gender'] ?? '';
      // echo $_POST['gender']; exit();
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
  $hobbies = $_POST['hobbies'] ?? [];
    $hobby=implode(",",$hobbies);
    $country = $_POST['country'];
// echo $country; exit();
    // $hobbies = $_POST['hobbies'] ?? [];
    //  $hobby=implode(',', $hobbies);
    // // echo" h"; exit();
 mysqli_query($conn, "UPDATE users SET 
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

    //header("Location: process_form1.php");
      
}header("Location: process_form1.php");
      
?>