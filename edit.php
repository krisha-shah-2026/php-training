<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
include 'database.php';

$id = $_GET['id'];
 $sql2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM user_table WHERE user_id=$id"));?>
 <form action="update.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    First Name: <input type="text" name="first_name" value="<?php echo $sql2['first_name']; ?>"><br><br>
    Last Name: <input type="text" name="last_name" value="<?php echo $sql2['last_name']; ?>"><br><br>
    Email: <input type="email" name="email" value="<?php echo $sql2['email']; ?>"><br><br>
    Password: <input type="password" name="password" value="<?php echo $sql2['password']; ?>"><br><br>
    Confirm Password: <input type="confirm_password" name="confirm_password" value="<?php echo $sql2['confirm_password']; ?>"><br><br>
 
    Address: <textarea name="address"><?php echo $sql2['address']; ?></textarea><br><br>
    Phone: <input type="number" name="phone_no" value="<?php echo $sql2['phone_no']; ?>"><br><br>
 
    Gender:
    <input type="radio" name="gender" value="male" <?php if($sql2['gender']=="male") echo "checked"; ?>>Male
    <input type="radio" name="gender" value="female" <?php if($sql2['gender']=="female") echo "checked"; ?>>Female<br><br>
     <input type="radio" name="gender" value="other" <?php if($sql2['gender']=="other") echo "checked"; ?>>other<br><br>
   <label for="profile_picture">Profile Picture:</label>
   <?php $image_path = "/php-training/uploads/" . $sql2['profile_image'];

     $image_src = '/php-training/uploads/'. htmlspecialchars($sql2['profile_image']);//<?php echo $sql2['profile_image'];
     echo "<td><img src='" . $image_src . "' alt='Profile Image' width='50' height='50'></td>";?></ -->
    <input type="file" name="profile_image" id="profile_image"><br>
    Hobby:
    <?php
        $hobby = explode(",",$sql2['hobby']);
    ?>
    <input type="checkbox" name="hobbies[]" value="reading" <?php if(in_array("reading",$hobby)) echo "checked"; ?>>Reading
    <input type="checkbox" name="hobbies[]" value="gaming" <?php if(in_array("gaming",$hobby)) echo "checked"; ?>>Gaming
    <input type="checkbox" name="hobbies[]" value="coding" <?php if(in_array("coding",$hobby)) echo "checked"; ?>>Coding<br><br> 
   <?php $hobbies = $_POST['hobbies'] ?? [];
    $hobby=implode(",",$hobbies);?> 
    Country:
    <select name="Country">
        <option <?php if($sql2['Country']=="India") echo "selected"; ?>>USA</option>
        <option <?php if($sql2['Country']=="USA") echo "selected"; ?>>CANADA</option>
        <option <?php if($sql2['Country']=="UK") echo "selected"; ?>>INDIA</option>
    </select><br><br>
 
    <input type="submit" name="update" value="Update">
   
</form>
 