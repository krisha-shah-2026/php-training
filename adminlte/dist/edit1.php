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
    />
                <div class="card card-warning card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Employee registration Form</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                <body>

<form action="update1.php" method="post">
     <input type="hidden" name="id" value="<?php echo $id; ?>">
    First Name: <input type="text" name="first_name" value="<?php echo $sql2['first_name']; ?>" class="form-control"><br><br>
    Last Name: <input type="text" name="last_name" value="<?php echo $sql2['last_name']; ?>" class="form-control"><br><br>
    Email: <input type="email" name="email" value="<?php echo $sql2['email']; ?>" class="form-control"><br><br>
    Password: <input type="password" name="password" value="<?php echo $sql2['password']; ?>"><br><br>
    Confirm Password: <input type="confirm_password" name="confirm_password" value="<?php echo $sql2['confirm_password']; ?>" class="form-control" ><br><br>
 
    Address: <textarea name="address" class="form-control"><?php echo $sql2['address']; ?></textarea><br><br>
    Phone: <input type="number" name="phone_no" value="<?php echo $sql2['phone_no']; ?>"><br><br>
 
    Gender:
    <input type="radio" name="gender" value="male" <?php if($sql2['gender']=="male") echo "checked"; ?>>Male
    <input type="radio" name="gender" value="female" <?php if($sql2['gender']=="female") echo "checked"; ?>>Female<br><br>
     <input type="radio" name="gender" value="other" <?php if($sql2['gender']=="other") echo "checked"; ?>>other<br><br>
   <label for="profile_picture">Profile Picture:</label>
   <?php $image_path = "/php-training/uploads/" . $sql2['profile_image'];

   
     $image_src = '/php-training/uploads/'. htmlspecialchars($sql2['profile_image']);//<?php echo $sql2['profile_image'];
     echo "<td><img src='" . $image_src . "' alt='Profile Image' width='50' height='50'></td>";?>
 <!-- <input type="file" name="profile_image" id="profile_image"><br> -->
 <input type="hidden" name="old_image" value="<?= $sql2['profile_image'] ?>">
 <input type="file" name="new_image"><br></br>
   Hobby:
    <?php
        $hobby = explode(",",$sql2['hobby']);
    ?>
    <input type="checkbox" name="hobbies[]" value="reading" <?php if(in_array("reading",$hobby)) echo "checked"; ?>>Reading
    <input type="checkbox" name="hobbies[]" value="gaming" <?php if(in_array("gaming",$hobby)) echo "checked"; ?>>Gaming
    <input type="checkbox" name="hobbies[]" value="coding" <?php if(in_array("coding",$hobby)) echo "checked"; ?>>Coding<br><br> 
   <?php $hobbies = $_POST['hobbies'] ?? [];
    $hobby=implode(",",$hobbies);?> 
    Country:
    <select name="country">
        <option <?php if($sql2['country']=="India") echo "selected"; ?>>USA</option>
        <option <?php if($sql2['country']=="USA") echo "selected"; ?>>CANADA</option>
        <option <?php if($sql2['country']=="UK") echo "selected"; ?>>INDIA</option>
    </select><br><br>
                     <div class="card-footer">
                      
                      <!-- <button type="submit" class="btn btn-warning"  name="submit" value="register">register</button>  -->
                      <!-- <button type="submit" class="btn float-end">Cancel</button> -->
                           <input type="submit" name="update" class="btn btn-warning" value="Update">

                    </div>
                    <!--end::Footer-->
                  </form>
                 </div>

    <!-- <input type="submit" name="update" value="Update"> -->

 
<?php include_once('includes/footer.php'); ?>
