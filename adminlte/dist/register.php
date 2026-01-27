<?php 

session_start();

include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="./includes/css/adminlte.css" as="style" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
      integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
      crossorigin="anonymous"
      media="print"
      onload="this.media='all'"
    />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
      crossorigin="anonymous"
    />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="./includes/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
      integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
      crossorigin="anonymous"
    />
    <!-- jsvectormap -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
      integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
      crossorigin="anonymous"
    />
 <!-- <div class="card card-warning card-outline mb-4">
                  begin::Header-->
                  <!-- <div class="card-header"><div class="card-title"> register Form</div></div>  -->
                  <!--end::Header-->
                  <!--begin::Form-->

 <div class="col-md-6">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">register form</div></div>
                  
                  <head>
    <style>
        .error {
            color: red;
            background-color: #797676;
            border: 1px solid red;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            display: none; /* Hidden by default */
        }
        
    .error1 {
        color: red;
        background-color: #797676;
        border: 1px solid red;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 4px;
         display: none;

    }
</style>

    
</head>
               
 <form action="insert2.php" method="POST" onsubmit="return validateForm()">
    <!-- <div> -->
      <div class="card-body">
     <div class="mb-3">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" class="form-control" value="<?= $_SESSION['old']['first_name'] ?? '' ?>"><br><br>
   </div>
   <div class="mb-3">
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" class="form-control" value="<?= $_SESSION['old']['last_name'] ?? '' ?>"><br><br>

    </div>
    <br>
    <div>
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" class="form-control" value="<?= $_SESSION['old']['email'] ?? '' ?>">
<?php if (isset($_SESSION['email_error'])) { ?>
    <small class="text-danger">
        <?php echo $_SESSION['email_error']; ?>
    </small>
<?php unset($_SESSION['email_error']); } ?>
    <br>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"  class="form-control" required minlength="8">
      <!-- <?php $password = $_POST['password'] ?? '';?> -->
       <?php if (isset($_SESSION['password_error'])) { ?>
<div class="error1" style="display:block;">
        <?php echo $_SESSION['password_error']; ?>
    </div>
<?php unset($_SESSION['password_error']); } ?>

    </div>
    <br>
    <div>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password"  class="form-control"required minlength="8">
    </div>
    <br>
    <!-- Element to display error messages -->
    <div id="error-message" class="error"></div>
    <br>
    <div>
        <input type="submit" name="submit" value="submit" class="btn btn-primary">
    </div>
</form>
</html>

<script>
    function validateForm() {
        //  const email = document.getElementById('email').value;

        const password = document.getElementById('password').value;
        const confirm_password = document.getElementById('confirm_password').value;
        const errorMessage = document.getElementById('error-message');

        // Reset error messages

        // 4. Check if passwords match
        if (password !== confirm_password) {
            errorMessage.textContent = 'Passwords do not match.';
            errorMessage.style.display = 'block';
            return false;
        }

        // If all checks pass, the form will submit
        // alert('Form submitted successfully! (done)');
        return true;
    }
</script>
</body>
</html>