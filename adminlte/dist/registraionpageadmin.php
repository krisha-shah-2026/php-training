
    <!--end::Accessibility Features-->
    <!--begin::Fonts-->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="./css/adminlte.css" as="style" />
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
    <link rel="stylesheet" href="./css/adminlte.css" />
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
                
                    <form action="insert1.php" method="POST" enctype="multipart/form-data">

    <label for="first_name">First Name:</label>
    <input type="text" id="first_name" name="first_name" required><br><br>

   
    <label for="last_name">Last Name:</label>
    <input type="text" id="last_name" name="last_name" required><br><br>

   
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

  
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required><br><br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password" required><br><br>

 
    <label for="profile_image">Profile Image:</label>
    <input type="file" id="profile_image" name="profile_image" accept="uploads/*"><br><br>
    <!-- <form action="upload.php" method="post" enctype="multipart/form-data"> -->
        

    <!-- Address -->
    <label for="address">Address:</label><br>
    <textarea id="address" name="address" rows="4" cols="50"></textarea><br><br>

    <!-- Phone Number -->
    <label for="phone_no">Phone Number:</label>
    <input type="number" id="phone_no" name="phone_no"><br><br>

    <!-- Gender -->
    <label>Gender:</label><br>
    <input type="radio" id="male" name="gender" value="male">
    <label for="male">Male</label><br>
    <input type="radio" id="female" name="gender" value="female">
    <label for="female">Female</label><br>
    <input type="radio" id="other" name="gender" value="other">
    <label for="other">Other</label><br><br>

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
    <select id="country" name="country">
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
                  <!--end::Form-->
                
















 