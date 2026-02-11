<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="./dist/includes/css/adminlte.css">
</head>
<body>
<div class="col-md-6">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Login Form</div>
        </div>
        <div class="card-body">
            <?php $success = $_SESSION['registration_success'] ?? '';

             //echo "<script>alert('" . addslashes($_SESSION['registration_success']) . "');</script>";
             unset($_SESSION['registration_success']);?>
             
 <?php if ($success): ?>
    <div class="success-message" style="color: green; padding: 10px; border: 1px solid green; background-color: #e8ebe9;">
        <?= htmlspecialchars($success) ?>
    </div>
<?php endif; 
   
            if (isset($_SESSION['login_error'])) {
                echo '<div style="color:red;">'.$_SESSION['login_error'].'</div>';
                unset($_SESSION['login_error']);
            }
            
              unset($_SESSION['registration_success']);?>

            <form action="logindata.php" method="POST">
                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" class="form-control" value="<?= $_SESSION['old']['email'] ?? ''?>">

                </div>
                <div class="mb-3">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control">

                </div>
                <input type="submit" name="submit" class="btn btn-primary"  value="Log In">
                <button type="button" onclick="window.location.href='register.php'" class="btn btn-secondary">
                    Register
                </button>
            </form>
        </div>
    </div>
</div>



</body>
</html>