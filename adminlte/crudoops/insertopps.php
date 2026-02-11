<?php
session_start();
require_once 'conectivityoops.php';
 
$insertdata = new DB_con();
 
if (isset($_POST['submit'])) {
 
 
    $first_name = trim($_POST['first_name']);
    $last_name  = trim($_POST['last_name']);
    $email      = trim($_POST['email']);
    $password   = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $address    = trim($_POST['address']);
    $phone_no   = trim($_POST['phone_no']);
    $gender     = $_POST['gender'] ?? '';
    $hobby      = !empty($_POST['hobbies']) ? implode(",", $_POST['hobbies']) : '';
    $country    = $_POST['country'] ?? '';
 
 
    $profile_image = "";
 
    if (!empty($_FILES['profile_image']['name'])) {
 
        $upload_dir = __DIR__ . "/uploads/";
 
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
 
        $ext = strtolower(pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg','jpeg','png','webp'];
 
        if (!in_array($ext, $allowed)) {
            $errors['profile_image'] = "Only JPG, PNG, WEBP allowed!";
        } else {
            $new_filename = time() . "_" . uniqid() . "." . $ext;
            move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_dir . $new_filename);
            $profile_image = $new_filename;
        }
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
 
  
    $errors = [];
 
    if ($first_name === '') {
        $errors['first_name'] = "Enter your first name!";
    }
 
    if ($last_name === '') {
        $errors['last_name'] = "Enter your last name!";
    }
 
    if ($email === '') {
        $errors['email'] = "Enter your email!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format!";
    } elseif ($insertdata->emailExists($email)) {
        $errors['email'] = "Email already registered!";
    }
 
    if ($password === '') {
        $errors['password'] = "Enter your password!";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters!";
    }
 
    if ($confirm_password === '') {
        $errors['confirm_password'] = "Confirm your password!";
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match!";
    }
 
    if ($profile_image === '') {
        $errors['profile_image'] = "Please select profile image!";
    }
 
    if ($address === '') {
        $errors['address'] = "Enter your address!";
    }
 
    if ($phone_no === '') {
        $errors['phone_no'] = "Enter phone number!";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone_no)) {
        $errors['phone_no'] = "Phone number must be 10 digits!";
    }
 
    if ($gender === '') {
        $errors['gender'] = "Select gender!";
    }
 
    if ($hobby === '') {
        $errors['hobby'] = "Select at least one hobby!";
    }
 
    if ($country === '') {
        $errors['country'] = "Select country!";
    }
 
 
    if (!empty($errors)) {
        $_SESSION['registration_error'] = $errors;
        header("Location: registeroops.php");
        exit;
    }
 
 
    $sql = $insertdata->insert(
        $first_name,
        $last_name,
        $email,
        $password,         
        $confirm_password,
        $profile_image,
        $address,
        $phone_no,
        $gender,
        $hobby,
        $country
    );
 
    if ($sql) {
        $_SESSION['profile_image'] = !empty($img_name) ? $img_name : 'default.jpg';
        // echo "<script>alert('Record inserted successfully');</script>";
        echo "<script>window.location.href='../crudoops/listingoops.php'</script>";
    } else {
        // echo "<script>alert('Something went wrong. Please try again');</script>";
        // echo "<script>window.location.href='insert.php'</script>";
    }unset($_SESSION['old']);
}















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

    $upload_dir = __DIR__ . "./uploads/";
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

//     return $stmt->num_rows > 0;}

//      $_SESSION['old'] = [
//         'first_name' => $first_name,
//         'last_name'  => $last_name,
//         'email'      => $email,
//         'profile_image' => $profile_image,
//         'address'    => $address,

//         'phone_no'   => $phone_no,
//         'gender'     => $gender,
//         'hobbies'    => $hobby,   
//         'country'    => $country
// ]; 
    
 



    

?>


