
<?php 
session_start();
include 'db.php';

// Display all errors on screen for debugging a specific script
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//  echo 'h'; exit();
if (isset($_POST['submit']))
    //   echo $_POST['submit']; exit();
     { // $id = $_POST['id']; 
    $first_name   = $_POST['first_name'];
    // // echo '$first_name'; exit();
    $last_name   = $_POST['last_name'];
    // $email  = $_POST['email'];
    // $password   = $_POST['password'];
    // $confirm_password  = $_POST['confirm_password'];
    // $first_name = $_POST['first_name'] ?? '';
    // $last_name = $_POST['last_name'] ?? '';
     $email   = $_POST['email'];
        $phone_no = $_POST['phone_no'] ?? '';
        $_SESSION['old'] = [
        'first_name' => $first_name,
        'last_name'  => $last_name,
        'email'      => $email,
        'phone_no'   => $phone_no,
    ];

    $sql = "SELECT email FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    $_SESSION['email_error'] = "Email already exists";
    header("Location: register.php");
    exit;
}
     
 
      


    // Check if an error message exists in the session
    // if (isset($_SESSION['error_message'])) {
    //     // Display the error message
    //     echo '<p style="color: red;">' . htmlspecialchars($_SESSION['error_message']) . '</p>';
    //     // Unset the session variable so it doesn't show up on a fresh visit
    //     unset($_SESSION['error_message']);
    // }
    // // You can also check for a success message if needed
    // if (isset($_SESSION['success_message'])) {
    //     echo '<p style="color: green;">' . htmlspecialchars($_SESSION['success_message']) . '</p>';
    //     unset($_SESSION['success_message']);
    // }
// $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
// if (mysqli_num_rows($sql) > 0) {
//     echo "This email is already registered.";
// } else {
//     // Proceed with insertion
// }

// User registration script (e.g., register.php)

$password = $_POST['password']; // Get the plain-text password from the registration form

// Hash the password securely
$hashed_password = password_hash($password, PASSWORD_DEFAULT);



// echo "User registered successfully!";

$confirm_password = $_POST['confirm_password'] ?? '';
     }
    
    // $address = $_POST['address'];
    // $phone   = $_POST['phone_no'];
    // $gender  = $_POST['gender'] ?? null;
   
    // $hobby   = !empty($_POST["hobbies"]) ? implode(",", $_POST['hobbies']) : null;
    // $country = $_POST['country'] ?? null;

 
    // $img_name = $_FILES['profile_image']['name'];
    // $tmp_name = $_FILES['profile_image']['tmp_name'];
    // move_uploaded_file($tmp_name, "uploads/" . $img_name);
// // INSERT INTO `user_table`(`user_id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`, `profile_image`, `address`, `phone_no`, `gender`, `hobby`, `Country`) VALUES 
   
    $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `confirm_password`) VALUES 
('$first_name','$last_name','$email','$password','$confirm_password')";

    if (mysqli_query($conn, $sql)){
    //     echo "inserted succesfully";}
    // else{echo "not inserted";
            
         unset($_SESSION['old']);
        $_SESSION['success'] = "Registration successful!";
        header("Location: process_form2.php");
        exit;
    } else {
        $_SESSION['error'] = "Registration failed!";
        header("Location: register.php");
        exit;
    }



    
//     unset($_SESSION['old']);

//     header("Location: register.php");
//     exit;
    
// }
//  header("Location: process_form2.php");