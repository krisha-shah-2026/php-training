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
 <div class="card card-warning card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">login  Form</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                
                    <form action="insert1.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <span id="emailError" style="color: red;"></span><br><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required minlength="8">
    <span id="passwordError" style="color: red;"></span><br><br>

    <input type="submit" class="btn btn-warning" value="log in">
      <button type="submit"class="btn btn-warning">Sign Up</button>
</form>

<script>
function validateForm() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let emailError = document.getElementById('emailError');
    let passwordError = document.getElementById('passwordError');
    let isValid = true;

    emailError.textContent = '';
    passwordError.textContent = '';

    // Email format validation (basic regex)
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        emailError.textContent = 'Please enter a valid email address.';
        isValid = false;
    }

    // Password length and complexity validation
    if (password.length < 8) {
        passwordError.textContent = 'Password must be at least 8 characters long.';
        isValid = false;
    }
    if (!/[A-Z]/.test(password)) {
        passwordError.textContent = 'Password must contain at least one uppercase letter.';
        isValid = false;
    }
    if (!/[a-z]/.test(password)) {
        passwordError.textContent = 'Password must contain at least one lowercase letter.';
        isValid = false;
    }
    if (!/[0-9]/.test(password)) {
        passwordError.textContent = 'Password must contain at least one number.';
        isValid = false;
    }

    return isValid; // Prevents form submission if false
}
</script>