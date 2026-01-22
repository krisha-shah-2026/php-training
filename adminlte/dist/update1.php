<?php include 'db.php';?>




<?php



 
$id = $_GET['id'];
          // $id = $_GET['id'] ?? null;
 //$sql2 = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM users WHERE user_id=$id"));
  // echo "ghghgh"; die ();
if (isset($_POST['update']))
  //  echo$_POST['update']; exit();
   {//echo"h"; exit();
  
        
    $first_name   = $_POST['first_name'];
    // echo $_POST['first_name']; exit();
    $last_name   = $_POST['last_name'];
//  echo $last_name; exit();
    $email = $_POST['email'];
    //  echo $email; exit();
    $password = $_POST['password'];
    // echo $password; exit();
    $confirm_password = $_POST['confirm_password'];
      // echo $confirm_password; exit();
    $address = $_POST['address'];
// echo $address; exit();
    $phone = $_POST['phone_no'];
    //  echo $_POST['phone_no'] ; exit();
    $gender = $_POST['gender'] ?? '';
      // echo $_POST['gender']; exit();
    $profile_image = $_POST['profile_image']; 
  // echo $profile_image; exit();
    $country = $_POST['country'];
// echo $country; exit();
    // $hobbies = $_POST['hobbies'] ?? [];
    //  $hobby=implode(',', $hobbies);
    // // echo" h"; exit();
 mysqli_query($conn, "UPDATE users SET 
    `first_name` = '$first_name', 
    `last_name` = '$last_name', 
    `email` = '$email', 
    `password` = '$password', 
    `confirm_password` = '$confirm_password', 
    `address` = '$address', 
    `phone_no` = '$phone', 
    `gender` = '$gender', 
    `profile_image` = '$profile_image',
    `hobby` = '$hobby', 
    `country` = '$country'
    WHERE user_id = '$id'");

    //header("Location: process_form1.php");
      
}
?><script>
  window.location.href = 'http://localhost/php-training/process_form1.php';
</script>