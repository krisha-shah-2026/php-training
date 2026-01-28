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
 <div class="card card-warning card-outline mb-4">
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