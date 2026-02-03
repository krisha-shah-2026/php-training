<?php
require_once 'conectivityoops.php';
  include 'auth.php';


include_once('../header.php');

   include_once('../sidebar.php'); ?>
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
    <!DOCTYPE html>
    <html lang="en">
                <div class="card card-warning card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Employee registration Form</div></div>

            <head>
                <body>
                  <?php
if (isset($_SESSION['registration_error'])) {
    foreach ($_SESSION['registration_error'] as $errors) {
        echo "<p style='color:red;'>$errors</p>";
    }
    unset($_SESSION['registration_error']);
}?>
<form action="insertopps.php" method="POST" enctype="multipart/form-data">


    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" class="form-control" value="<?= $_SESSION['old']['first_name'] ?? '' ?>"><br><br>

   
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" class="form-control" value="<?= $_SESSION['old']['last_name'] ?? '' ?>"><br><br>

   
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" class="form-control"  value="<?= $_SESSION['old']['email'] ?? ''?>"><br><br>

  
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" class="form-control"><br><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" class="form-control"><br><br>

 
    <label for="profile_image">Profile Image:</label>
    <input type="file" id="profile_image" name="profile_image" class="form-control" accept="uploads/*"><br><br>
        <!-- <label for="profile_image">Profile Image:</label> -->
  

    <label for="address">Address:</label><br>
    <textarea id="address" name="address" rows="4" cols="50" class="form-control" rows="4"><?= $_SESSION['old']['address'] ?? '' ?></textarea><br><br>

    <label for="phone_no">Phone Number:</label>
    <input type="number" id="phone_no" name="phone_no" class="form-control" value="<?= $_SESSION['old']['phone_no'] ?? '' ?>"><br><br>

    <label>Gender:</label><br>
    <input type="radio" id="male" name="gender" value="male" <?= (($_SESSION['old']['gender'] ?? '') === 'male') ? 'checked' : '' ?>>
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="female" <?= (($_SESSION['old']['gender'] ?? '') === 'female') ? 'checked' : '' ?>>
    <label for="female">Female</label><br>
    <input type="radio" id="other" name="gender" value="other" <?= (($_SESSION['old']['gender'] ?? '') === 'other') ? 'checked' : '' ?>>
    <label for="other">Other</label><br><br>

    <!-- Hobby (Checkbox) -->
    <label>Hobbies:</label><br>
    <input type="checkbox" id="hobby1" name="hobbies[]"  value="reading" <?= in_array('reading', $_SESSION['old']['hobby'] ?? []) ? 'checked' : '' ?>>
    <label for="hobby1"> Reading</label><br>
    <input type="checkbox" id="hobby2" name="hobbies[]" value="gaming" <?= in_array('gaming', $_SESSION['old']['hobby'] ?? []) ? 'checked' : '' ?>>

    <label for="hobby2"> Gaming</label><br>
    <input type="checkbox" id="hobby3" name="hobbies[]" value="coding" <?= in_array('coding', $_SESSION['old']['hobby'] ?? []) ? 'checked' : '' ?>>
 
    <label for="hobby3"> Coding</label><br><br>

    <!-- Country (Dropdown) -->
   <label for="country">Country:</label>
    <select id="country" name="country">
        <option value="">Select a country</option>
        <option value="usa"<?= ($_SESSION['old']['country'] ?? '') == 'usa' ? 'selected' : '' ?>>USA</option>
        <option value="canada"<?= ($_SESSION['old']['country'] ?? '') == 'canada' ? 'selected' : '' ?>>Canada</option>
        <option value="india"<?= ($_SESSION['old']['country'] ?? '') == 'India' ? 'selected' : '' ?>>India</option>
 
    </select><br><br>
                    <div class="card-footer">
                      
                      <button type="submit" class="btn btn-warning"  name="submit" value="register">register</button>
                      <!-- <button type="submit" class="btn float-end">Cancel</button> -->
                    </div>
                    <!--end::Footer-->
                  </form>
                 </div>
                <!--end::Horizontal Form-->


              


</body>
</html>

<?php include_once('../footer.php'); ?>