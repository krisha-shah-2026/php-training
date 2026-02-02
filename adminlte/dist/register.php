
<?php 

session_start();

include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="./includes/css/adminlte.css" as="style" />
   
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
   
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
 <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
             </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
          
          <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row g-4">
              <!--begin::Col-->
              <div class="col-12">
</div>
 <div class="col-md-6">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">register form</div></div>
                  
                  <head>

    
</head>





<?php
    if (isset($_SESSION['registration_error'])) {
    foreach ($_SESSION['registration_error'] as $errors) {
        echo "<p style='color:red;'>$errors</p>";
    }
    unset($_SESSION['registration_error']);
}?>
           
 <form action="registerdata.php" method="POST">
    <!-- <div> -->
      <div class="card-body">
     <div class="mb-3">
    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" class="form-control" value="<?= $_SESSION['old']['first_name'] ?? '' ?>"><br>
   </div>
   <div class="mb-3">
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" class="form-control" value="<?= $_SESSION['old']['last_name'] ?? '' ?>"><br>
</div>
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
        <input type="password" id="password" name="password"  class="form-control">
      <!-- <?php $password = $_POST['password'] ?? '';?> -->

    </div>
    <br>
    <div>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password"  class="form-control">
    </div>
    <br>
    <!-- Element to display error messages -->
    <br>
    <div>

        <input type="submit" name="submit" value="submit" class="btn btn-primary" >
    </div>
</form>
</html>

</body>
</html>
