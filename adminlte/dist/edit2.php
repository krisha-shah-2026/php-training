<?php include 'db.php';?>

<?php include_once('includes/header.php'); ?>

  <?php include_once('includes/sidebar.php'); 

$id = $_GET['id'];
// if (isset($_GET['user_id'])) {
//     $id = $_GET['user_id'];
// } else {
//     // Handle the case where the user_id is missing
//     // e.g., redirect to an error page or a default page
//     // header('Location: error.php'); 
//     // exit;
//     echo "Error: User ID not provided.";
// }
// $sql2=[];
 $sql2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE user_id=$id"));?>
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
    /><div class="card card-warning card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Employee edit Form</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->

<form action="update2.php" method="post" enctype="multipart/form-data">
     <input type="hidden" name="id" value="<?php echo $id; ?>">
    First Name: <input type="text" name="first_name" value="<?php echo $sql2['first_name']; ?>"><br><br>
    Last Name: <input type="text" name="last_name" value="<?php echo $sql2['last_name']; ?>"><br><br>
    Email: <input type="email" name="email" value="<?php echo $sql2['email']; ?>"><br><br>
    Password: <input type="password" name="password" value="<?php echo $sql2['password']; ?>"><br><br>
    Confirm Password: <input type="confirm_password" name="confirm_password" value="<?php echo $sql2['confirm_password']; ?>"><br><br>
 
    <!--  -->
 
    <input type="submit" name="update" value="Update">
</form>
 
<?php include_once('includes/footer.php'); ?>