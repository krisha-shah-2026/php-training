<?php include 'database.php';
 
if (isset($_POST['submit'])) {
    $fname   = $_POST['first_name'];
    $lname   = $_POST['last_name'];
    $email   = $_POST['email'];
    $pass    = $_POST['password'];
    $cpass   = $_POST['confirm_password'];
    $address = $_POST['address'];
    $phone   = $_POST['phone'];
    $gender  = $_POST['gender'] ?? null;
    $hobby   = !empty($_POST["hobby"]) ? implode(",", $_POST['hobby']) : null;
    $country = $_POST['country'];
   
// echo $fname . "<br>";
 
    if ($pass !== $cpass) {
        die("Password do not match!");
    }
    $password = password_hash($pass, PASSWORD_DEFAULT);
 
    $img_name = $_FILES['profile_image']['name'];
    $tmp_name = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($tmp_name, "uploads/" . $img_name);

    // echo $img_name;
 
    $sql = "INSERT INTO user_table (first_name,last_name,email,password,confirm_password,profile_image,address,phone_no,gender,hobby,country) 
    VALUES ('$fname','$lname','$email','$pass','$cpass',$img_name','$address','$phone','$gender','$hobby','$country')";

// echo $sql;
    if (mysqli_query($conn, $sql)){
        echo "inserted succesfully";
    }else{echo "not inserted";}

 
    header("Location: process_form.php");}