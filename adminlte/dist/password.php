<?php session_start();


// $passwordErr = "";

// if (isset($_POST['submit'])) {
//     $password = $_POST['password'];
//     $confirm_password = $_POST['confirm_password'];

//     if ($password !== $confirm_password) {
//         $passwordErr = "Passwords do not match";
//     }
// }
// ?>


<?php include_once('includes/header.php'); ?>

  <?php include_once('includes/sidebar.php'); ?>
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
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
            
 <!--begin::Horizontal Form-->
                <div class="card card-warning card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Employee registration Form</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                <body>
    <form  method="POST" onsubmit="return validateForm()" enctype="multipart/form-data">

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" class="form-control" value="<?php echo htmlspecialchars($first_name); ?>">
><br><br>

   
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" class="form-control" required><br><br>

   
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" class="form-control" required><br><br>

  
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" class="form-control"><br><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" class="form-control"><br><br>
   <?php if (isset($_SESSION['error'])) {
    echo '<p style="color:red;">' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']);
}?> 

    <!-- <?php if (!empty($passwordErr)) { ?>
    <span style="color:red; font-size:14px;">
        <?php echo $passwordErr; ?>
    </span>
<?php } ?> -->


 
    <label for="profile_image">Profile Image:</label>
    <input type="file" id="profile_image" name="profile_image" accept="uploads/*" required ><br><br>
    <!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
        

    <!-- Address -->
    <label for="address">Address:</label><br>
    <textarea id="address" name="address" rows="4" cols="50" class="form-control" required></textarea><br>

    <!-- Phone Number -->
    <label for="phone_no">Phone Number:</label>
    <input type="number" id="phone_no" name="phone_no" class="form-control" required><br><br>

    <!-- Gender -->
    <label>Gender:</label><br>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label><br>
    <input type="radio" id="other" name="gender" value="other">
    <label for="other">Other</label><br><br>
<small class="text-danger" id="gender_error"></small><br><br>

    <!-- Hobby (Checkbox) -->
    <label>Hobbies:</label><br>
    <input type="checkbox" id="hobby1" name="hobbies[]" value="reading">
    <label for="hobby1"> Reading</label><br>
    <input type="checkbox" id="hobby2" name="hobbies[]" value="gaming">
    <label for="hobby2"> Gaming</label><br>
    <input type="checkbox" id="hobby3" name="hobbies[]" value="coding">
    <label for="hobby3"> Coding</label><br><br>

    <!-- Country (Dropdown) -->
    <label for="country">Country:</label>
    <select id="country" name="country" required>
        <option value="">Select a country</option>
        <option value="usa">USA</option>
        <option value="canada">Canada</option>
        <option value="india">India</option>
 
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

    let isValid = true;

    // get values
    let firstName = document.getElementById("first_name").value.trim();
    let lastName  = document.getElementById("last_name").value.trim();
    let email     = document.getElementById("email").value.trim();
    let password  = document.getElementById("password").value.trim();
    let confirm   = document.getElementById("confirm_password").value.trim();
    let phone     = document.getElementById("phone_no").value.trim();

    // clear all errors
    document.querySelectorAll(".text-danger").forEach(el => el.innerHTML = "");

    // First name
    if (firstName === "") {
        document.getElementById("first_name_error").innerHTML = "First name is required";
        isValid = false;
    }

    // Last name
    if (lastName === "") {
        document.getElementById("last_name_error").innerHTML = "Last name is required";
        isValid = false;
    }

    // Email
    if (email === "") {
        document.getElementById("email_error").innerHTML = "Email is required";
        isValid = false;
    } else if (!email.match(/^\S+@\S+\.\S+$/)) {
        document.getElementById("email_error").innerHTML = "Invalid email format";
        isValid = false;
    }

    // Password
    if (password === "") {
        document.getElementById("password_error").innerHTML = "Password is required";
        isValid = false;
    } else if (password.length < 6) {
        document.getElementById("password_error").innerHTML = "Minimum 6 characters";
        isValid = false;
    }

    // Confirm password
    if (confirm === "") {
        document.getElementById("confirm_password_error").innerHTML = "Confirm your password";
        isValid = false;
    } else if (password !== confirm) {
        document.getElementById("confirm_password_error").innerHTML = "Passwords do not match";
        isValid = false;
    }

    // Phone
    if (phone === "") {
        document.getElementById("phone_error").innerHTML = "Phone number is required";
        isValid = false;
    }
          let address = document.getElementById("address").value.trim();
    if (address === "") {
        document.getElementById("address_error").innerHTML = "Address is required";
        isValid = false;
    }

    // Gender (radio)
    let genderChecked = document.querySelector('input[name="gender"]:checked');
    if (!genderChecked) {
        document.getElementById("gender_error").innerHTML = "Please select gender";
        isValid = false;
    }

    // Hobby (checkbox – at least one)
    let hobbiesChecked = document.querySelectorAll('input[name="hobbies[]"]:checked');
    if (hobbiesChecked.length === 0) {
        document.getElementById("hobby_error").innerHTML = "Select at least one hobby";
        isValid = false;
    }

    // Country
    let country = document.getElementById("country").value;
    if (country === "") {
        document.getElementById("country_error").innerHTML = "Please select country";
        isValid = false;
    }

    return isValid;
}
</script>

<?php include_once('includes/footer.php'); ?>











