<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include 'database.php';

$id = $_GET['id'];
// if (isset($_GET['user_id'])) {
//     $id = $_GET['user_id'];
// } else {
//     // Handle the case where the user_id is missing
//     // e.g., redirect to an error page or a default page
//     // header('Location: error.php'); 
//     // exit;
//     echo "Error: User ID not provided.";
// }
// $sql2=[];
 $sql2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_table WHERE user_id=$id"));?>
<form method="post">
    
    First Name: <input type="text" name="first_name" value="<?php echo $sql2['first_name']; ?>"><br><br>
    Last Name: <input type="text" name="last_name" value="<?php echo $sql2['last_name']; ?>"><br><br>
    Email: <input type="email" name="email" value="<?php echo $sql2['email']; ?>"><br><br>
    Password: <input type="password" name="password" value="<?php echo $sql2['password']; ?>"><br><br>
    Confirm Password: <input type="confirm_password" name="confirm_password" value="<?php echo $sql2['confirm_password']; ?>"><br><br>
 
    Address: <textarea name="address"><?php echo $sql2['address']; ?></textarea><br><br>
    Phone: <input type="number" name="phone" value="<?php echo $sql2['phone_no']; ?>"><br><br>
 
    Gender:
    <input type="radio" name="gender" value="Male" <?php if($sql2['gender']=="Male") echo "checked"; ?>>Male
    <input type="radio" name="gender" value="Female" <?php if($sql2['gender']=="Female") echo "checked"; ?>>Female<br><br>
 
    Hobby:
    <?php $hobby= explode(",", $sql2['hobby']); ?>
    <input type="checkbox" name="hobby[]" value="Reading" <?php if(in_array("Reading",$hobby)) echo "checked"; ?>>Reading
    <input type="checkbox" name="hobby[]" value="Music" <?php if(in_array("Music",$hobby)) echo "checked"; ?>>Music
    <input type="checkbox" name="hobby[]" value="Sports" <?php if(in_array("Sports",$hobby)) echo "checked"; ?>>Sports<br><br>
 
    Country:
    <select name="Country">
        <option <?php if($sql2['Country']=="India") echo "selected"; ?>>India</option>
        <option <?php if($sql2['Country']=="USA") echo "selected"; ?>>USA</option>
        <option <?php if($sql2['Country']=="UK") echo "selected"; ?>>UK</option>
    </select><br><br>
 
    <input type="submit" name="update" value="Update">
</form>
 <?php
include 'database.php';

$id = $_GET['id'];
// if (isset($_GET['user_id'])) {
//     $id = $_GET['user_id'];
// } else {
//     // Handle the case where the user_id is missing
//     // e.g., redirect to an error page or a default page
//     // header('Location: error.php'); 
//     // exit;
//     echo "Error: User ID not provided.";
// }
// $sql2=[];
 $sql2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_table WHERE user_id=$id"));
//  echo "ghghgh"; die ();
if (isset($_POST['update'])) {
    $first_name   = $_POST['first_name'];
    $last_name   = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    $address = $_POST['address'];
    $phone   = $_POST['phone'];
    $gender = $_POST['gender'] ?? '';
//     if (isset($_POST['hobby'])) {
//     $hobby = $_POST['hobby'];
// } else {
//     $hobby = [];
//     $country = $_POST['country'];

    // echo $hobby;
    
    
    //  if ($password !== $confirm_password) {
    //     die("Password do not match!");
    // }
    // $password = password_hash($password, PASSWORD_DEFAULT);

    //     mysqli_query($conn, "UPDATE `user_table` SET 
    //     'first_name`='$first_name',`last_name`='$last_name',`email`='$email`,
    //     `password`='$password`,`confirm_password`='$confirm_password`,`profile_image`='null`,
    //     `address`='$address`,`phone_no`='$phone`,`gender`='$gender`,`hobby`='$hobby`,`Country`='$country` 
    // WHERE user_id=$id");}

    if (is_array($hobby)) {
    $hobby_string = implode(', ', $hobby);
} else {
    // If it's already a string (or null), use it directly
    $hobby_string = $hobby;
}

// Prepare your query with the new string variable
 mysqli_query($conn, "UPDATE user_table SET 
    `first_name` = '$first_name', 
    `last_name` = '$last_name', 
    `email` = '$email', 
    `password` = '$password', 
    `confirm_password` = '$confirm_password', 
    `address` = '$address', 
    `phone_no` = '$phone', 
    `gender` = '$gender', 
    `hobby` = '$hobby', 
    `country` = '$country'
    WHERE user_id = '$id'");


        header("Location: process_form.php");
}
?>