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
            background-color: #ffe5e5;
            border: 1px solid red;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            display: none; /* Hidden by default */
        }
    </style>
</head>
                <body>


    

    <!-- The 'action' attribute should point to the server-side script that will process the form data (e.g., register.php, /api/register) -->
    <!-- The 'method' attribute specifies how to send the data (POST is recommended for sensitive info like passwords) -->
     <!-- <form action="insert1.php" method="POST">
        <div>
            <label for="name">Full Name:</label>
            
            <input type="text" id="name" name="name" required>
        </div>
        <br>
        <div>
            <label for="email">Email Address:</label>
            
            <input type="email" id="email" name="email" required>
        </div>
        <br>
        <div>
            <label for="password">Password:</label>
            
            <input type="password" id="password" name="password" required minlength="8">
        </div>
        <br>
        <div>
            <label for="confirm_password">Confirm Password:</label>
           
            <input type="password" id="confirm_password" name="confirm_password" required minlength="8">
        </div>
        <br>
        <div>
          
            <button type="submit">Register</button>
        </div>
    </form>

</body>
</html> --> <form action="insert2.php" method="POST" onsubmit="return validateForm()">
    <!-- <div> -->
      <div class="card-body">
                      <div class="mb-3">
         <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>
 <!-- <input type="text" id="name" name="Name" placeholder="Enter your full name" /> -->
            <!-- <span id="name-error" class="error-message"></span> -->
   </div>
   <div class="mb-3">
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br><br>

    </div>
    <br>
    <div>
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>
    </div>
    <br>
    <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required minlength="8">
    </div>
    <br>
    <div>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required minlength="8">
    </div>
    <br>
    <!-- Element to display error messages -->
    <div id="error-message" class="error"></div>
    <br>
    <div>
        <input type="submit" name="submit" value="submit" class="btn btn-primary">
    </div>
</form>

<script>
    function validateForm() {
        // Get input values
       
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const confirm_password = document.getElementById('confirm_password').value;
        const errorMessage = document.getElementById('error-message');

        // Reset error messages
        errorMessage.textContent = '';
        errorMessage.style.display = 'none';

        // 1. Check for empty spaces in the 'name' field
        
        // 2. Check for empty spaces in the 'email' field
        if (email.trim() === '') {
            errorMessage.textContent = 'Email Address cannot be empty or contain only spaces.';
            errorMessage.style.display = 'block';
            return false;
        }
        
        // 3. Check for empty spaces in the 'password' field
        if (password.trim() === '') {
            errorMessage.textContent = 'Password cannot be empty or contain only spaces.';
            errorMessage.style.display = 'block';
            return false;
        }

        // 4. Check if passwords match
        if (password !== confirm_password) {
            errorMessage.textContent = 'Passwords do not match.';
            errorMessage.style.display = 'block';
            return false;
        }

        // If all checks pass, the form will submit
        alert('Form submitted successfully! (If PHP file exists)');
        return true;
    }
</script>