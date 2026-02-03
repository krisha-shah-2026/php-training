<?php
//  session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// session_start();
?>






<?php 

session_start();
// echo "<pre>";
// print_r($_SESSION);
// print_r($_GET);
// exit;

// include 'auth.php';

include '../db.php';
?>
<?php include_once('../header.php'); ?>

  <?php include_once('../sidebar.php'); 

  $id = $_GET['id'];

//  $id = $_SESSION['user_id'];

// if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
//     die("User ID not provided or invalid.");
// }

// $id = (int) $_GET['id'];

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
// $result = mysqli_query($conn, "SELECT * FROM users WHERE user_id = $id")
//           or die(mysqli_error($conn));

// $sql2 = mysqli_fetch_assoc($result);

// if (!$sql2) {
//     die("User not found.");
// }

 $sql2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE user_id=$id"));?>
                <div class="card card-warning card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Employee registration Form</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                <body>
                  <?php
if (isset($_SESSION['registration_error'])) {
    foreach ($_SESSION['registration_error'] as $errors) {
        echo "<p style='color:red;'>$errors</p>";
    }
    unset($_SESSION['registration_error']);
}?>

<form action="update.php" method="post" enctype="multipart/form-data">
     <input type="hidden" name="id" value="<?php echo $id; ?>">
    First Name: <input type="text" name="first_name" value="<?php echo $sql2['first_name']; ?>" class="form-control"><br><br>
    Last Name: <input type="text" name="last_name" value="<?php echo $sql2['last_name']; ?>" class="form-control"><br><br>
    Email: <input type="email" name="email" value="<?php echo $sql2['email']; ?>" class="form-control"><br><br>



    Password: <input type="password" name="password" value="<?php echo $sql2['password']; ?>"  class="form-control" ><br><br>
    Confirm Password: <input type="password" name="confirm_password" value="<?php echo $sql2['confirm_password']; ?>" class="form-control" ><br><br>
 <label for="profile_picture">Profile Picture:</label>
    <?php $profileImage = $sql2['profile_image'] ?? '';

if (!empty($profileImage)) {
    echo "<img src='/php-training/uploads/".htmlspecialchars($profileImage)."' width='50'>";
}?>

   <!-- <?php $image_path = "/php-training/uploads/" . $sql2['profile_image'];
   $image_src = '/php-training/uploads/'. htmlspecialchars($sql2['profile_image']);//<?php echo $sql2['profile_image'];
     echo "<td><img src='" . $image_src . "' alt='Profile Image' width='50' height='50'></td>";?> -->

 <input type="hidden" name="old_image" value="<?= $sql2['profile_image'] ?>">
 <input type="file" name="new_image"><br></br>
    Address: <textarea name="address" class="form-control"><?php echo $sql2['address']; ?></textarea><br><br>
    Phone: <input type="number" name="phone_no" value="<?php echo $sql2['phone_no']; ?>"  class="form-control" ><br><br>
 
    Gender:
    <input type="radio" name="gender" value="male" <?php if($sql2['gender']=="male") echo "checked"; ?>>Male
    <input type="radio" name="gender" value="female" <?php if($sql2['gender']=="female") echo "checked"; ?>>Female<br><br>
     <input type="radio" name="gender" value="other" <?php if($sql2['gender']=="other") echo "checked"; ?>>other<br><br>
   
   
     
   Hobby:
    <?php
        // $hobby = explode(",",$sql2['hobby']);
        $hobby = !empty($sql2['hobby']) ? explode(',', $sql2['hobby']) : [];

    ?>
    <input type="checkbox" name="hobbies[]" value="reading" <?php if(in_array("reading",$hobby)) echo "checked"; ?>>Reading
    <input type="checkbox" name="hobbies[]" value="gaming" <?php if(in_array("gaming",$hobby)) echo "checked"; ?>>Gaming
    <input type="checkbox" name="hobbies[]" value="coding" <?php if(in_array("coding",$hobby)) echo "checked"; ?>>Coding<br><br> 
   <?php $hobbies = $_POST['hobbies'] ?? [];
    $hobby=implode(",",$hobbies);?> 
    Country:
    <select name="country">
        <option <?php if($sql2['country']=="India") echo "selected"; ?>>INDIA</option>
        <option <?php if($sql2['country']=="USA") echo "selected"; ?>>usa</option>
        <option <?php if($sql2['country']=="UK") echo "selected"; ?>>UK</option>
    </select><br><br>
                     <div class="card-footer">
                      
                      <!-- <button type="submit" class="btn btn-warning"  name="submit" value="register">register</button>  -->
                      <!-- <button type="submit" class="btn float-end">Cancel</button> -->
                           <input type="submit" name="update" class="btn btn-warning" value="Update">

                    </div>
                    <!--end::Footer-->
                  </form>
                 </div>

    <!-- <input type="submit" name="update" value="Update"> -->

 
<?php include_once('../footer.php'); ?>