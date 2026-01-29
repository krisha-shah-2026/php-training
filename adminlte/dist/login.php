<?php
  session_start();
include 'db.php'; 
if (isset($_POST['submit'])) {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sql = "SELECT user_id, email, password FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        // Email not registered
        $_SESSION['login_error'] = "Email not registered";
        header("Location: login.php");
        exit;
    }
    if ($password !== $user['password']) {
    $_SESSION['login_error'] = "Incorrect password";
    header("Location: login.php");
    exit;
     }
      $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['user_email'] = $user['email'];

    header("Location: samplepage.php");
    exit;
}
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
    <link rel="stylesheet" href="./includes/css/adminlte.css">
</head>
<body>
<div class="col-md-6">
    <div class="card card-primary card-outline mb-4">
        <div class="card-header">
            <div class="card-title">Login Form</div>
        </div>
        <div class="card-body">
            <?php
            if (isset($_SESSION['login_error'])) {
                echo '<div style="color:red;">'.$_SESSION['login_error'].'</div>';
                unset($_SESSION['login_error']);
            }
            ?>
            <form action="" method="POST" onsubmit="return validateForm()">
                <div class="mb-3">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                </div>
                <input type="submit" name="submit" class="btn btn-primary"  value="Log In">
                <button type="button" onclick="window.location.href='register.php'" class="btn btn-secondary">
                    Register
                </button>
            </form>
        </div>
    </div>
</div>

<script>
function validateForm() {
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
    if (email === "" || password === "") {
        alert("Please fill in all fields.");
        return false;
    
    
    }
    return true;
}
</script>
</body>
</html>

