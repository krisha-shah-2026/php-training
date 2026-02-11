<?php 

session_start();

include '../db.php';
?>
<?php include_once('../header.php'); ?>

  <?php include_once('../sidebar.php'); 

$id = $_GET['id'];

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
}?><?php
if (isset($_SESSION['editGeneralErrors']['email'])): ?>
    <span style="color:red;">
        <?php 
            echo $_SESSION['editGeneralErrors']['email']; 
           
            unset($_SESSION['editGeneralErrors']['email']); 
        ?>
    </span>
    <?php endif; ?>
    <form action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    First Name: <input type="text" name="first_name" value="<?php echo $_SESSION['old']['first_name'] ??$sql2['first_name']; ?>" class="form-control"><br><br>
    Last Name: <input type="text" name="last_name" value="<?php echo $_SESSION['old']['last_name'] ??$sql2['last_name']; ?>" class="form-control"><br><br>
    Email: <input type="email" name="email" value="<?php echo $sql2['email']; ?>" class="form-control"><br><br>
     Password: <input type="password" name="password" value="<?php echo $sql2['password']; ?>"  class="form-control" ><br><br>
    Confirm Password: <input type="password" name="confirm_password" value="<?php echo $sql2['confirm_password']; ?>" class="form-control" ><br><br>
    <label for="profile_picture">Profile Picture:</label>

    <?php $profileImage = $sql2['profile_image'] ?? '';


    if (!empty($profileImage)) {
    echo "<img src='/php-training/uploads/".htmlspecialchars($profileImage)."' width='50'>";
   }?>

   <!-- <?php $image_path = "/php-training/uploads/" . $sql2['profile_image'];
    $image_src = '/php-training/uploads/'. htmlspecialchars($sql2['profile_image']);
     echo "<td><img src='" . $image_src . "' alt='Profile Image' width='50' height='50'></td>";?> -->

    <input type="hidden" name="old_image" value="<?= $sql2['profile_image'] ?>">
    <input type="file" name="new_image"><br></br>
    Address: <textarea name="address" class="form-control"><?php echo $_SESSION['old']['address'] ??$sql2['address']; ?></textarea><br><br>
    Phone: <input type="number" name="phone_no" value="<?php echo $_SESSION['old']['phone_no'] ??$sql2['phone_no'];  ?>"  class="form-control" ><br><br>
 
    Gender:<?php
    $genderValue = $_SESSION['old']['gender'] ?? $sql2['gender'] ?? '';
?>

    <input type="radio" name="gender" value="male" <?php echo ($genderValue == 'male') ? 'checked' : '';?>>Male
    <input type="radio" name="gender" value="female" <?php  echo ($genderValue == 'female') ? 'checked' : ''; ?>>Female<br><br>
     <input type="radio" name="gender" value="other" <?php  echo ($genderValue == 'other') ? 'checked' : ''; ?>>other<br><br>
   
   
     
   Hobby:<?php
    $hobbyValue = $_SESSION['old']['hobbies'] ?? $sql2['hobby'] ?? '';
?>
    <?php
        // $hobby = explode(",",$sql2['hobby']);
        $hobby = !empty($sql2['hobby']) ? explode(',', $sql2['hobby']) : [];

    ?>
    <input type="checkbox" name="hobbies[]" value="reading"  <?php echo ($hobbyValue == 'reading') ? 'checked' : ''; ?>>Reading
    <input type="checkbox" name="hobbies[]" value="gaming"  <?php echo ($hobbyValue == 'gaming') ? 'checked' : ''; ?>>Gaming
    <input type="checkbox" name="hobbies[]" value="coding"  <?php echo ($hobbyValue == 'coding') ? 'checked' : ''; ?>>Coding<br><br> 
   <?php $hobbies = $_POST['hobbies'] ?? [];
    $hobby=implode(",",$hobbies);?> 
    Country:
   
  
      <?php 
$selectedCountry = $_SESSION['old']['country'] ?? $sql2['country'] ?? '';
?>
<select name="country">
    <!-- Changed 'USA' to 'usa' -->
    <option value="India" <?php echo ($selectedCountry == 'India') ? 'selected' : ''; ?>>INDIA</option>
    <option value="usa" <?php echo ($selectedCountry == 'usa') ? 'selected' : ''; ?>>usa</option>
    <!-- Changed 'UK' to 'uk' -->
    <option value="uk" <?php echo ($selectedCountry == 'uk') ? 'selected' : ''; ?>>UK</option>
</select>
                     <div class="card-footer">
                      
                      <!-- <button type="submit" class="btn btn-warning"  name="submit" value="register">register</button>  -->
                      <!-- <button type="submit" class="btn float-end">Cancel</button> -->
                           <input type="submit" name="update" class="btn btn-warning" value="Update">

                    </div>
                    <!--end::Footer-->
                  </form>
                 </div>
<?php include_once('../footer.php'); ?>