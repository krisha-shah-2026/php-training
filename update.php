<?php include 'database.php';
 
 
$user_id = $_POST['user_id'];
$first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

 $cpass   = $_POST['confirm_password'];
    $address = $_POST['address'];
    $phone   = $_POST['phone'];
$gender = $_POST['gender'];
$hobby = $_POST['hobby'];
$country = $_POST['country'];
 
$sql = "UPDATE user_table SET
firstname='$first_name',
lastname='$last_name',
gender='$gender',
country='$country'
WHERE user_id=$id";
 
mysqli_query($conn, $query);
header("Location: process_form.php");
?>
Update code