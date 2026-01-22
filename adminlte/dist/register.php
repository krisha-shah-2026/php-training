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
                  <div class="card-header"><div class="card-title"> register Form</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                <body>


    

    <!-- The 'action' attribute should point to the server-side script that will process the form data (e.g., register.php, /api/register) -->
    <!-- The 'method' attribute specifies how to send the data (POST is recommended for sensitive info like passwords) -->
    <form action="insert1.php" method="POST">
        <div>
            <label for="name">Full Name:</label>
            <!-- Input for the user's name -->
            <input type="text" id="name" name="name" required>
        </div>
        <br>
        <div>
            <label for="email">Email Address:</label>
            <!-- Input type 'email' provides basic email validation -->
            <input type="email" id="email" name="email" required>
        </div>
        <br>
        <div>
            <label for="password">Password:</label>
            <!-- Input type 'password' masks the characters as you type -->
            <input type="password" id="password" name="password" required minlength="8">
        </div>
        <br>
        <div>
            <label for="confirm_password">Confirm Password:</label>
            <!-- Input type 'password' for confirmation -->
            <input type="password" id="confirm_password" name="confirm_password" required minlength="8">
        </div>
        <br>
        <div>
            <!-- The submit button sends the form data to the server -->
            <button type="submit">Register</button>
        </div>
    </form>

</body>
</html>