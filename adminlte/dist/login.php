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
    /><div class="col-md-6">
                <!--begin::Quick Example-->
                <div class="card card-primary card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">login form</div></div>
 
                  <!--begin::Form-->
                
                    <form action="insert2.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <div class="card-body">
                      <div class="mb-3">
     <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <span id="emailError" style="color: red;"></span><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required minlength="8">
    <span id="passwordError" style="color: red;"></span><br><br>

    <input type="submit" class="btn btn-primary" value="log in">
    
      <button onclick="window.location.href='register.php'" class="btn btn-primary"> Register</button>
</form>
<script>
function validateForm() {
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var emailError = document.getElementById("emailError");
  var passwordError = document.getElementById("passwordError");

  // Reset error messages
  emailError.innerHTML = "";
  passwordError.innerHTML = "";

  var isValid = true;

  // Validate email
  if (email === "") {
    emailError.innerHTML = "Email is required";
    isValid = false;
  } else if (!isValidEmail(email)) {
    emailError.innerHTML = "Invalid email format";
    isValid = false;
  }

  // Validate password
  if (password === "") {
    passwordError.innerHTML = "Password is required";
    isValid = false;
  } else if (password.length < 8) {
    passwordError.innerHTML = "Password must be at least 8 characters long";
    isValid = false;
  }

  return isValid;
}
// 
// if (isset($_POST['submit'])) {
 
//     $password = $_POST['password'];
//     $confirm_password = $_POST['confirm_password'];
 
//     $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
 
//     if (!preg_match($passwordPattern, $password)) {
//         echo "<span style='color:red;'>Invalid password format</span>";
//     } elseif ($password !== $confirm_password) {
//         echo "<span style='color:red;'>Passwords do not match</span>";
//     } else {
//         // Secure password hash
//         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
//         echo "<span style='color:green;'>Password is valid</span>";
 
//         // Save $hashedPassword in database
//     }
// }
?>
</body>