<?php ini_set('display_errors', 1);
error_reporting(E_ALL);
 require_once 'conectivityoops.php';
  
$insertdata = new DB_con();

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $address    = $_POST['address'];
    $phone_no   = $_POST['phone_no'];
    $gender     = $_POST['gender'] ?? null;
    $hobby      = !empty($_POST['hobbies']) ? implode(",", $_POST['hobbies']) : null;
    $country    = $_POST['country'] ?? null;


// if (!empty($_FILES['profile_image']['name'])) {

//     $img_name = time() . '_' . $_FILES['profile_image']['name'];
//     $tmp_name = $_FILES['profile_image']['tmp_name'];

//     move_uploaded_file($tmp_name, "uploads/" . $img_name); 

//     $profile_image = $img_name;
// }
    // $img_name = $_FILES['profile_image']['name'];
    // $tmp_name = $_FILES['profile_image']['tmp_name'];
    // move_uploaded_file($tmp_name, "uploads/" . $img_name);

$profile_image = ""; 
//echo $_FILES['profile_image']['name'];exit();
if (!empty($_FILES['profile_image']['name'])) {
    // echo $upload_dir; exit();

    $upload_dir = __DIR__ . "/uploads/";
// echo $upload_dir; exit();
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $ext = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
    // echo $ext; exit();

    $new_filename = time() . "_" . uniqid() . "." . $ext;

    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_dir . $new_filename)) {
        $profile_image = $new_filename;
    }
} 
// function emailExists($email) {
//     global $conn;

//     $stmt = $conn->prepare("SELECT user_id FROM users1 WHERE email = ?");
//     $stmt->bind_param("s", $email);
//     $stmt->execute();
//     $stmt->store_result();

//     return $stmt->num_rows > 0;

// }    
       
 if (empty($first_name)) {
    $errors['first_name'] = "Enter your first name!";
}

if (empty($last_name)) {
    $errors['last_name'] = "Enter your last name!";
}

if (empty($email)) {
    $errors['email'] = "Enter your email!";}
// // } elseif (emailExists($email)) {
// //     $errors['email'] = "Email already registered!";
// // }

if (empty($password)) {
    $errors['password'] = "Enter your password!";
     } elseif (strlen($password) < 8) {
             $errors['password'] = "Password must be at least 8 characters"; }

// if (empty($confirm_password)) {
//     $errors['confirm_password'] = "Enter confirm password!";
// } elseif ($password !== $confirm_password) {
//     $errors['confirm_password'] = "Passwords do not match";
// }

// if (empty($profile_image)) {
//     $errors['image'] = "Please select image file!";
// }

// if (empty($address)) {
//     $errors['address'] = "Enter your address!";
// }

// if (empty($phone_no)) {
//     $errors['phone_no'] = "Enter phone number!";
// } elseif (strlen($phone_no) != 10) {
//     $errors['phone_no'] = "Phone number must be 10 digits";
// }

// if (empty($gender)) {
//     $errors['gender'] = "Select gender!";
// }

// if (empty($hobby)) {
//     $errors['hobby'] = "Enter hobby!";
// }

// if (empty($country)) {
//     $errors['country'] = "Select country!";
// }


 if (!empty($errors)) {
      $_SESSION['registration_error'] = $errors;
    header("Location: registeroops.php");
   exit;
 }





$sql = $insertdata->insert($first_name, $last_name, $email, $password, $confirm_password, $profile_image, $address, $phone_no, $gender, $hobby, $country);

    if ($sql) {
        echo "<script>alert('Record inserted successfully');</script>";
         echo "<script>window.location.href='listingoops.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='insert.php'</script>";
    }
}







    

?>


