<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>






<?php 
session_start();
include 'db.php';


//  echo 'h'; exit();
if (isset($_POST['submit']))
    //  echo $_POST; exit();
    {
    $first_name   = $_POST['first_name']?? '';
    
    $last_name   = $_POST['last_name']?? '';
    $email   = $_POST['email']?? '';
    $phone_no = $_POST['phone_no'] ?? '';
    $gender  = $_POST['gender'] ?? null;
    $country = $_POST['country'] ?? null;
    $hobby = $_POST['hobbies'] ?? []; 

        $_SESSION['old'] = [
        'first_name' => $first_name,
        'last_name'  => $last_name,
        'email'      => $email,
        'phone_no'   => $phone_no,
        'gender'     => $gender,
        'hobby'      => $hobby,
        'country'    => $country
];

    // $email   = $_POST['email'];
$sql = "SELECT email FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    $_SESSION['email_error'] = "Email already exists";
    header("Location: registraionpageadmin.php");
    exit;
}

 $password    = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
$confirm_password = $_POST['confirm_password'] ?? '';
    if ($_POST['password'] !== $_POST['confirm_password']) {
    $_SESSION['error'] = "Passwords do not match";
     header("Location: registraionpageadmin.php");
    exit;
   }

    $address = $_POST['address']?? '';
//  $phone_no = $_POST['phone_no'] ?? '';

if (!preg_match('/^[0-9]{10}$/', $phone_no)) {
    $_SESSION['phone_error'] = "Phone number must be 10 digits";
    header("Location: registraionpageadmin.php");
    exit;
}

 
    $img_name = $_FILES['profile_image']['name'];
    $tmp_name = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($tmp_name, "uploads/" . $img_name);
// INSERT INTO `user_table`(`user_id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`, `profile_image`, `address`, `phone_no`, `gender`, `hobby`, `Country`) VALUES 
       $hobby   = !empty($_POST["hobbies"]) ? implode(",", $_POST['hobbies']) : null;

    $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `confirm_password`, `profile_image`, `address`, `phone_no`, `gender`, `hobby`, `country`) VALUES 
('$first_name','$last_name','$email','$password','$confirm_password','$img_name','$address','$phone','$gender','$hobby','$country')";

    if (mysqli_query($conn, $sql)){
        echo "inserted succesfully";
    }else{echo "not inserted";}
   header("Location: process_form1.php");

}
 
 unset($_SESSION['old']);

    header("Location: process_form1.php");
    exit;