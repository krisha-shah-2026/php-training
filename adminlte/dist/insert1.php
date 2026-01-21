







<?php include 'db.php';
// Display all errors on screen for debugging a specific script
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

//  echo 'h'; exit();
if (isset($_POST['submit']))
    //  echo 'h'; exit();
    {
    $first_name   = $_POST['first_name'];
    
    $last_name   = $_POST['last_name'];
    $email   = $_POST['email'];
    $password    = $_POST['password'];
    $confirm_password   = $_POST['confirm_password'];
    $address = $_POST['address'];
    $phone   = $_POST['phone_no'];
    $gender  = $_POST['gender'] ?? null;
   
    $hobby   = !empty($_POST["hobbies"]) ? implode(",", $_POST['hobbies']) : null;
    $country = $_POST['country'] ?? null;

 
    $img_name = $_FILES['profile_image']['name'];
    $tmp_name = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($tmp_name, "uploads/" . $img_name);
// INSERT INTO `user_table`(`user_id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`, `profile_image`, `address`, `phone_no`, `gender`, `hobby`, `Country`) VALUES 
   
    $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `confirm_password`, `profile_image`, `address`, `phone_no`, `gender`, `hobby`, `country`) VALUES 
('$first_name','$last_name','$email','$password','$confirm_password','$img_name','$address','$phone','$gender','$hobby ','$country')";

    if (mysqli_query($conn, $sql)){
        echo "inserted succesfully";
    }else{echo "not inserted";}

}
 header("Location: process_form1.php");