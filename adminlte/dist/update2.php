<?php include 'db.php';?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
      
 
// if (!empty($new_image)) {
 
//     $target_dir = "uploads/";
//     $target_file = $target_dir . basename($new_image);
 
//     move_uploaded_file($_FILES['new_image']['tmp_name'], $target_file);
 
//     if (!empty($old_image) && file_exists($target_dir . $old_image)) {
//         unlink($target_dir . $old_image);
//     }
 
//     $profile_image = $new_image;
 
// } else {
//     $profile_image = $old_image;
// }
//   $hobbies = $_POST['hobbies'] ?? [];
//     $hobby=implode(",",$hobbies);
//     $country = $_POST['country'];
// // echo $country; exit();
//     // $hobbies = $_POST['hobbies'] ?? [];
//     //  $hobby=implode(',', $hobbies);
//     // // echo" h"; exit();
 mysqli_query($conn, "UPDATE users SET 
    `first_name` = '$first_name', 
    `last_name` = '$last_name', 
    `email` = '$email', 
    `password` = '$password', 
    `confirm_password` = '$confirm_password' 
    WHERE user_id = '$id'");

    header("Location: process_form2.php");
      
 }//header("Location: process_form2.php");
      
?>