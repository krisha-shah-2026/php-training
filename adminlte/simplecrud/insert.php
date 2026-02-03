
<?php
 //session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include '../db.php';

$old = $_SESSION['old'] ?? [];

$errors = [];   
if (isset($_POST['submit']))
{   $first_name   = $_POST['first_name']?? '';
    $last_name   = $_POST['last_name']?? '';
    $email   = $_POST['email']?? '';
    $password = $_POST['password']?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
     $address = $_POST['address']?? '';
    $phone_no = $_POST['phone_no'] ?? '';
    $gender  = $_POST['gender'] ?? null;
    $country = $_POST['country'] ?? null;
    $hobby = $_POST['hobbies'] ?? [];
    if (!empty($_FILES['profile_image']['name'])) {

        $img_name = $_FILES['profile_image']['name'];
    $tmp_name = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($tmp_name, "uploads/" . $img_name);
// // Image upload
} else {
    $img_name = $_SESSION['old']['profile_image'] ?? '';
}


$_SESSION['old'] = [
        'first_name' => $first_name,
        'last_name'  => $last_name,
        'email'      => $email,
 'profile_image' => $img_name,
        'address'    => $address,

        'phone_no'   => $phone_no,
        'gender'     => $gender,
    'hobbies'    => $hobby,   
        'country'    => $country
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
} elseif (emailExists($email)) {
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

if (empty($img_name)) {
    $errors['image'] = "Please select image file!";
}

if (empty($address)) {
    $errors['address'] = "Enter your address!";
}

if (empty($phone_no)) {
    $errors['phone_no'] = "Enter phone number!";
} elseif (strlen($phone_no) != 10) {
    $errors['phone_no'] = "Phone number must be 10 digits";
}

if (empty($gender)) {
    $errors['gender'] = "Select gender!";
}

if (empty($hobby)) {
    $errors['hobby'] = "Enter hobby!";
}

if (empty($country)) {
    $errors['country'] = "Select country!";
}


 if (!empty($errors)) {
     $_SESSION['registration_error'] = $errors;
    header("Location: registraionpageadmin.php");
    exit;
 }




// $sql = "SELECT email FROM users WHERE email = ?";
// $stmt = mysqli_prepare($conn, $sql);

// if ($stmt) {
//     mysqli_stmt_bind_param($stmt, "s", $email);
//     mysqli_stmt_execute($stmt);
//     mysqli_stmt_store_result($stmt);

//     if (mysqli_stmt_num_rows($stmt) > 0) {
//         $_SESSION['email_error'] = "Email already exists";
//         header("Location: registraionpageadmin.php");
//         exit;
//     }
// }


//     if ($_POST['password'] !== $_POST['confirm_password']) {
//     $_SESSION['error'] = "Passwords do not match";
//      header("Location: registraionpageadmin.php");
//     exit;
//    }


// if (!preg_match('/^[0-9]{10}$/', $phone_no)) {
//     $_SESSION['phone_error'] = "Phone number must be 10 digits";
//     header("Location: registraionpageadmin.php");
//     exit;
// }

 
    // $img_name = $_FILES['profile_image']['name'];
    // $tmp_name = $_FILES['profile_image']['tmp_name'];
    // move_uploaded_file($tmp_name, "uploads/" . $img_name);
// INSERT INTO `user_table`(`user_id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`, `profile_image`, `address`, `phone_no`, `gender`, `hobby`, `Country`) VALUES 
       $hobby   = !empty($_POST["hobbies"]) ? implode(",", $_POST['hobbies']) : null;

   $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `confirm_password`, `profile_image`, `address`, `phone_no`, `gender`, `hobby`, `country`) VALUES 
('$first_name','$last_name','$email','$password','$confirm_password','$img_name','$address','$phone_no','$gender','$hobby','$country')";

    if (mysqli_query($conn, $sql)){
     $_SESSION['profile_image'] = !empty($img_name) ? $img_name : 'default.jpg';

        echo "inserted succesfully";
    }else{echo "not inserted";}
   header("Location: listing.php");


    
  unset($_SESSION['old']);
     }
     header("Location: listing.php");
     exit;