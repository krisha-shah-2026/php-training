

<?php
include 'db.php';?>
<?php include_once('includes/header.php'); ?>

  <?php include_once('includes/sidebar.php'); 
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
 $sql2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE user_id=$id"));?>
<form method="post">
    
    First Name: <input type="text" name="first_name" value="<?php echo $sql2['first_name']; ?>"><br><br>
    Last Name: <input type="text" name="last_name" value="<?php echo $sql2['last_name']; ?>"><br><br>
    Email: <input type="email" name="email" value="<?php echo $sql2['email']; ?>"><br><br>
    Password: <input type="password" name="password" value="<?php echo $sql2['password']; ?>"><br><br>
    Confirm Password: <input type="confirm_password" name="confirm_password" value="<?php echo $sql2['confirm_password']; ?>"><br><br>
 
    Address: <textarea name="address"><?php echo $sql2['address']; ?></textarea><br><br>
    Phone: <input type="number" name="phone" value="<?php echo $sql2['phone_no']; ?>"><br><br>
 
    Gender:
    <input type="radio" name="gender" value="male" <?php if($sql2['gender']=="male") echo "checked"; ?>>Male
    <input type="radio" name="gender" value="female" <?php if($sql2['gender']=="female") echo "checked"; ?>>Female<br><br>
     <input type="radio" name="gender" value="other" <?php if($sql2['gender']=="other") echo "checked"; ?>>other<br><br>
   <label for="profile_picture">Profile Picture:</label>
   <?php $image_path = "/php-training/uploads/" . $sql2['profile_image'];

   
     $image_src = '/php-training/uploads/'. htmlspecialchars($sql2['profile_image']);;//<?php echo $sql2['profile_image'];
     echo "<td><img src='" . $image_src . "' alt='Profile Image' width='50' height='50'></td>";?></ -->
 <input type="file" name="profile_image" id="profile_image"><br>



  <!-- echo "h";exit(); -->
    Hobby:
    
     <?php 
    $hobby = explode(',', $sql2['hobby']); 
    

   ?>
    <input type="checkbox" name="hobbies[]" value="reading" <?php if(in_array("reading",$hobby)) echo "checked"; ?>>Reading
    <input type="checkbox" name="hobbies[]" value="gaming" <?php if(in_array("gaming",$hobby)) echo "checked"; ?>>Gaming
    <input type="checkbox" name="hobbies[]" value="coding" <?php if(in_array("coding",$hobby)) echo "checked"; ?>>Coding<br><br> 
 <!-- echo "h";exit(); --><?php
    $hobbies = $_POST['hobbies'] ?? [];
    $hobby=implode(",", $hobbies);
    ?>
    Country:
    <select name="country">
        <option <?php if($sql2['country']=="India") echo "selected"; ?>>USA</option>
        <option <?php if($sql2['country']=="USA") echo "selected"; ?>>CANADA</option>
        <option <?php if($sql2['country']=="UK") echo "selected"; ?>>INDIA</option>
    </select><br><br>
 
    <input type="submit" name="update" value="Update">
</form>
 <?php
include 'db.php';
 
$id = $_GET['id'];

 $sql2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE user_id=$id"));
//  echo "ghghgh"; die ();
if (isset($_POST['update'])) {
    $first_name   = $_POST['first_name'];
    $last_name   = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    $address = $_POST['address'];
    $phone   = $_POST['phone_no'];
    $gender = $_POST['gender'] ?? '';
    $profile_image =$_POST['profile_image']; 
    $country = $_POST['country'];

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

      header("Location: process_form1.php");
      
}
?>
<?php include_once('includes/footer.php'); ?>