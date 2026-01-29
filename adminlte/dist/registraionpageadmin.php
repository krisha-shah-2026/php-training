<?php 
  session_start();
   include 'auth.php';
  include_once('includes/header.php');
  include_once('includes/sidebar.php'); ?>
    
            <head>
              <style>
               
  .text-danger {
    color: red;
    font-size: 14px;
  }
</style>


 <!--begin::Horizontal Form-->
                <div class="card card-warning card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Employee registration Form</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                <body>
    <form action="insert1.php" method="POST"  enctype="multipart/form-data">

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" class="form-control" value="<?= $_SESSION['old']['first_name'] ?? '' ?>">
<br><br>

   
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" class="form-control" value="<?= $_SESSION['old']['last_name'] ?? '' ?>">
<br><br>

   
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" class="form-control" value="<?= $_SESSION['old']['email'] ?? '' ?> ">
<br><br>
<?php if (isset($_SESSION['email_error'])) { ?>
    <small class="text-danger">
        <?php echo $_SESSION['email_error']; ?>
    </small>
<?php unset($_SESSION['email_error']); } ?>


  
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" class="form-control"><br><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" class="form-control"><br><br>
    <!-- <p style='color: red;'><?php echo $_SESSION['password_errors'] ?? ''; ?></p> 
    <?php unset($_SESSION['password_errors']); ?> -->
   <?php if (isset($_SESSION['error'])) {
    echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']);
}?> 
  <label for="profile_image">Profile Image:</label>
    <input type="file" id="profile_image" name="profile_image" class="form-control" accept="uploads/*"><br><br>
    <!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
        

    <!-- Address -->
    <label for="address">Address:</label><br>    
    <textarea id="address" name="address" class="form-control" value="<?= $_SESSION['old']['address'] ?? '' ?>"rows="4" cols="50"></textarea><br>

    <!-- Phone Number -->
    <label for="phone_no">Phone Number:</label>
    <input type="number" id="phone_no" name="phone_no" class="form-control" value="<?= $_SESSION['old']['phone_no'] ?? '' ?>">
<br><br>
<?php if (isset($_SESSION['phone_error'])) { ?>
    <p style="color:red;">
        <?php echo $_SESSION['phone_error']; ?>
    </p>
<?php unset($_SESSION['phone_error']); } ?>


    <!-- Gender -->

   <label>Gender:</label><br>
     <label for="male">Male</label><br>
    <input type="radio" id="male" name="gender"  value="Male"
<?= (($_SESSION['old']['gender'] ?? '') === 'Male') ? 'checked' : '' ?>>

     <label for="female">Female</label><br>
    <input type="radio" id="female" name="gender" value="female" <?= (($_SESSION['old']['gender'] ?? '') === 'Female') ? 'checked' : '' ?>>

    <label for="other">Other</label><br><br>
    <input type="radio" id="other" name="gender" value="other" <?= (($_SESSION['old']['gender'] ?? '') === 'Other') ? 'checked' : '' ?>>

    <label for="other">Other</label><br><br>

    <!-- Hobby (Checkbox) -->
    <label>Hobbies:</label><br>
    <input type="checkbox" id="hobby1" name="hobbies[]" value="reading" <?= in_array('reading', $_SESSION['old']['hobby'] ?? []) ? 'checked' : '' ?>>

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


                    <!--begin::Body-->
                    <!-- <div class="card-body"> -->
                      <!-- <div class="row mb-3"> -->
                         
                    <div class="card-footer">
                      
                      <button type="submit" class="btn btn-warning"  name="submit" value="register">register</button>
                      <!-- <button type="submit" class="btn float-end">Cancel</button> -->
                    </div>
                    <!--end::Footer-->
                  </form>
                 </div>
                <!--end::Horizontal Form-->
              

                  <!--end::Form-->
           

</body>

<script>
      function validateForm() {
  let x = document.forms["myform"]["fname"].value;
  if (x == "") {
    alert("first Name must be filled out");
    return false;
  }




      
        const password = document.getElementById('password').value;
        const confirm_password = document.getElementById('confirm_password').value;
        const errorMessage = document.getElementById('error-message');

        // Reset error messages
        errorMessage.textContent = '';
        errorMessage.style.display = 'none';

        
       
        if (password.trim() === '') {
            errorMessage.textContent = 'Password cannot be empty or contain only spaces.';
            errorMessage.style.display = 'block';
            return false;
        }

      
        if (password !== confirm_password) {
            errorMessage.textContent = 'Passwords do not match.';
            errorMessage.style.display = 'block';
            return false;
        }
        return true;
    }



}
</script>
<?php include_once('includes/footer.php'); ?>










 