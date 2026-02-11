
<?php 
session_start();
include 'db.php';

// Display all errors on screen for debugging a specific script
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//  echo 'h'; exit();



$old = $_SESSION['old'] ?? [];
$errors = [];   

if (isset($_POST['submit']))
    //   echo $_POST['submit']; exit();
     {  $id = $_POST['id']; 
    $first_name   = $_POST['first_name'];
    // // echo '$first_name'; exit();
    $last_name   = $_POST['last_name'];
    // $email  = $_POST['email'];
    // $password   = $_POST['password'];
    // $confirm_password  = $_POST['confirm_password'];
    // $first_name = $_POST['first_name'] ?? '';
    // $last_name = $_POST['last_name'] ?? '';
     $email   = $_POST['email'];
     $password = $_POST['password']; // Get the plain-text password from the registration form
$confirm_password = $_POST['confirm_password'] ?? '';

        $phone_no = $_POST['phone_no'] ?? '';
        $_SESSION['old'] = [
        'first_name' => $first_name,
        'last_name'  => $last_name,
        'email'      => $email,
        'phone_no'   => $phone_no,
    ];
function emailExists($email) {
    global $conn;

    $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    return $stmt->num_rows > 0;

}    

// if(empty($first_name))
//  {
//   $error = "enter your first name !";

//  } else if(empty($last_name))
//  {
//   $error = "enter your last name !";
 
//  } else if(empty($email))
//  {
//   $error = "enter your email !";
 
// } elseif (emailExists($email)) {
//    $error = "Email already registered!";}
// elseif (empty($password)) {
//     $error = "Enter your password!";
    
    
// }else if (empty($img_name)) {

//     $error = "Please select image file !";
// } 
//   else if (empty($address)) {
//   $error = "enter your address !";
//  }   else if (empty($phone_no)) {
//     $error = "Enter your phone no.";
// } elseif (strlen($phone_no) != 10) {
//     $error = "Phone no. must be 10 digits";
// } 


//  else if (empty($gender)) {
//   $error = "enter your gender !";
//  }  else if (empty($hobby)) {
//   $error = "enter your hobby !";
//  } else  if (empty($country)) {
//   $error = "enter your country !";
  
//  }     
 
//  if (!empty($error)) {
//         $_SESSION['registration_error'] = $error;
//       header('Location: registraionpageadmin.php');
//      exit();
// }

if (empty($first_name)) {
    $errors['first_name'] = "Enter your first name!";
}

if (empty($last_name)) {
    $errors['last_name'] = "Enter your last name!";
}

if (empty($email)) {
    $errors['email'] = "Enter your email!";
}  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Enter a valid email address!";
}
elseif (emailExists($email)) {
    $errors['email'] = "Email already registered!";
}

if (empty($password)) {
    $errors['password'] = "Enter your password!";
} elseif (strlen($password) < 8) {
    $errors['password'] = "Password must be at least 8 characters";
}

if (empty($confirm_password)) {
    $errors['confirm_password'] = "Enter confirm password!";
} elseif ($password !== $confirm_password) {
    $errors['confirm_password'] = "Passwords do not match";
}




 if (!empty($errors)) {
     $_SESSION['registration_error'] = $errors;
    header("Location: register.php");
    exit;
 }
// $success = $_SESSION['registration_success'] ?? '';



//     $sql = "SELECT email FROM users WHERE email = ?";
// $stmt = mysqli_prepare($conn, $sql);
// mysqli_stmt_bind_param($stmt, "s", $email);
// mysqli_stmt_execute($stmt);
// mysqli_stmt_store_result($stmt);

// if (mysqli_stmt_num_rows($stmt) > 0) {
//     $_SESSION['email_error'] = "Email already exists";
//     header("Location: register.php");
//     exit;
// }
     
 
    

// $password = $_POST['password']; // Get the plain-text password from the registration form

// Hash the password securely
// $hashed_password = password_hash($password, PASSWORD_DEFAULT);



// echo "User registered successfully!";

// $confirm_password = $_POST['confirm_password'] ?? '';
     }
    
    // $address = $_POST['address'];
    // $phone   = $_POST['phone_no'];
    // $gender  = $_POST['gender'] ?? null;
   
    // $hobby   = !empty($_POST["hobbies"]) ? implode(",", $_POST['hobbies']) : null;
    // $country = $_POST['country'] ?? null;

//  $image = $_FILES['image']['name'] ?? null;
//  $imageTmp = $_FILES['image']['tmp_name'] ?? null;
//   $image_src = '' . htmlspecialchars($row['profile_image']);
// echo "<td><img src='" . $image_src . "' alt='Profile Image' width='50' height='50'></td>";

// Define the default image path
// $defaultImage = 'screenshot/Screenshot from 2025-12-29 12-55-30.png';

// // Check if image exists in database and is not empty
// $image_src = (!empty($row['profile_image'])) ? $row['profile_image'] : $defaultImage;

// // Sanitize the final path
// $image_src = htmlspecialchars($image_src);

// echo "<td><img src='" . $image_src . "' alt='Profile Image' width='50' height='50'></td>";
    // $img_name = $_FILES['profile_image']['name'];
    // $tmp_name = $_FILES['profile_image']['tmp_name'];
    // move_uploaded_file($tmp_name, "uploads/" . $img_name);
// // INSERT INTO `user_table`(`user_id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`, `profile_image`, `address`, `phone_no`, `gender`, `hobby`, `Country`) VALUES 
   
     $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `confirm_password`) VALUES 
 ('$first_name','$last_name','$email','$password','$confirm_password')";
if (mysqli_query($conn, $sql)) {   
     $_SESSION['registration_success'] = "Registration successful! Please login.";
//  echo "<script>alert('" . addslashes($_SESSION['registration_success']) . "');</script>";
//  unset($_SESSION['registration_success']);
    unset($_SESSION['old']);
    unset($_SESSION['registration_error']);

    header("Location: login.php");
    exit;


    // $_SESSION['registration_success'] = "Registration successful! You can now login.";
    // unset($_SESSION['old']); // clear old input
    // header("Location: login.php");
    // exit;
} else {
    // Insert failed
    $_SESSION['registration_error'] = ["db" => "Something went wrong. Please try again."];
    header("Location: register.php");
    exit;
}

//     if (mysqli_query($conn, $sql)){
//       echo "inserted succesfully";}
//      else{echo "not inserted";
//       header("Location: listing.php");

//      }
           unset($_SESSION['old']);

    header("Location: login.php");
    exit;



    
//     unset($_SESSION['old']);

//     header("Location: register.php");
//     exit;
    
// }
//  header("Location: process_form2.php");