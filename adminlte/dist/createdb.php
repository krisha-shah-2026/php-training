<<<<<<< HEAD



<?php include 'db.php';
CREATE DATABASE employee;
USE employee;
 
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    email VARCHAR(150),
    password VARCHAR(255),
    profile_image VARCHAR(255),
    address TEXT,
    phone_no VARCHAR(20),
    gender VARCHAR(10),
    hobby VARCHAR(255),
    country VARCHAR(100)
);
 <!-- <!DOCTYPE html>
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
    /><div class="col-md-6">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">login form</div></div>
 
                  <!--begin::Form-->
                
                    <form action="samplepage.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="card-body">
                      <div class="mb-3">
     <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <span id="emailError" style="color: red;"></span><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required minlength="8">
    
    <?php
?><br> </br>

    <input type="submit" name= "submit" class="btn btn-primary" value="log in">
    
      <button onclick="window.location.href='register.php'" class="btn btn-primary"> Register</button>if you does not register then click here
</form>
<?php

include 'db.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT email FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 0) {
        $_SESSION['login_error'] = "Email not registered";
        header("Location: login.php");
        exit;
    }

    mysqli_stmt_bind_result($stmt, $hashed_password);
    mysqli_stmt_fetch($stmt);

    if (!password_verify($password, $hashed_password)) {
        $_SESSION['login_error'] = "Incorrect password";
        header("Location: login.php");
        exit;
    }

    $_SESSION['user_email'] = $email;
    header("Location: samplepage.php");
    exit;

// After verifying email + password
$_SESSION['user_id'] = $user['id'];
$_SESSION['email']   = $user['email'];

header("Location: samplepage.php");
exit;
}

//  header("Location: samplepage.php")
?>
=======



<?php include 'db.php';
CREATE DATABASE employee;
USE employee;
 
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100),
    last_name VARCHAR(100),
    email VARCHAR(150),
    password VARCHAR(255),
    profile_image VARCHAR(255),
    address TEXT,
    phone_no VARCHAR(20),
    gender VARCHAR(10),
    hobby VARCHAR(255),
    country VARCHAR(100)
);
 <!-- <!DOCTYPE html>
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
    /><div class="col-md-6">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">login form</div></div>
 
                  <!--begin::Form-->
                
                    <form action="samplepage.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="card-body">
                      <div class="mb-3">
     <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <span id="emailError" style="color: red;"></span><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required minlength="8">
    
    <?php
?><br> </br>

    <input type="submit" name= "submit" class="btn btn-primary" value="log in">
    
      <button onclick="window.location.href='register.php'" class="btn btn-primary"> Register</button>if you does not register then click here
</form>
<?php

include 'db.php';

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT email FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) == 0) {
        $_SESSION['login_error'] = "Email not registered";
        header("Location: login.php");
        exit;
    }

    mysqli_stmt_bind_result($stmt, $hashed_password);
    mysqli_stmt_fetch($stmt);

    if (!password_verify($password, $hashed_password)) {
        $_SESSION['login_error'] = "Incorrect password";
        header("Location: login.php");
        exit;
    }

    $_SESSION['user_email'] = $email;
    header("Location: samplepage.php");
    exit;

// After verifying email + password
$_SESSION['user_id'] = $user['id'];
$_SESSION['email']   = $user['email'];

header("Location: samplepage.php");
exit;
}

//  header("Location: samplepage.php")
?>
>>>>>>> 07d84f53fadea864880f2cac57f5fd2a4869f4f7
</body> -->