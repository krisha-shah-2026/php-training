<?php
// session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
 
require_once ('conectivityoops.php');
$updatedata = new DB_con();
 

 
if (isset($_POST['update'])) {
    if (empty($_POST['id'])) {
        die("User ID missing");
    }
 
    $userid = intval($_POST['id']);
 
   
    $first_name        = trim($_POST['first_name']);
    $last_name         = trim($_POST['last_name']);
    $email             = trim($_POST['email']);
    $password          = $_POST['password'];
    $confirm_password  = $_POST['confirm_password'];
    $address           = trim($_POST['address']);
    $phone_no          = trim($_POST['phone_no']);
    $gender            = $_POST['gender'] ?? '';
    $country           = $_POST['country'] ?? '';
    $old_image         = $_POST['old_image'] ?? '';
 
    // Hobbies
    $hobbies = $_POST['hobbies'] ?? [];
    $hobby   = implode(",", $hobbies);
 

 
    $profile_image = $old_image;
    $upload_dir = __DIR__ . "/uploads/";
 
    if (!empty($_FILES['profile_image']['name'])) {
 
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
 
        $ext = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
        $new_filename = time() . "_" . uniqid() . "." . $ext;
 
        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_dir . $new_filename)) {
 
            if (!empty($old_image) && file_exists($upload_dir . $old_image)) {
                unlink($upload_dir . $old_image);
            }
 
            $profile_image = $new_filename;
        }
    }
 

    $errors = [];
    if (empty($first_name)) {
        $errors['first_name'] = "Please enter your first name!";
    }
 
    if (empty($last_name)) {
        $errors['last_name'] = "Please enter your last name!";
    }
 
    if (empty($email)) {
        $errors['email'] = "Please enter your email!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format!";
    }
 
    if (empty($password)) {
        $errors['password'] = "Please enter your password!";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters!";
    }
 
    if (empty($confirm_password)) {
        $errors['confirm_password'] = "Please confirm your password!";
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match!";
    }
 
    if (empty($profile_image)) {
        $errors['profile_image'] = "Please select an image!";
    }
 
    if (empty($address)) {
        $errors['address'] = "Please enter your address!";
    }
 
    if (empty($phone_no)) {
        $errors['phone_no'] = "Please enter phone number!";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone_no)) {
        $errors['phone_no'] = "Phone number must be 10 digits!";
    }
 
    if (empty($gender)) {
        $errors['gender'] = "Please select gender!";
    }
 
    if (empty($hobby)) {
        $errors['hobby'] = "Please select at least one hobby!";
    }
 
    if (empty($country)) {
        $errors['country'] = "Please select country!";
    }
 
    if (!empty($errors)) {
        $_SESSION['registration_error'] = $errors;
       header("Location: editoops.php?id=" . $userid);
        exit;
    }
//  if (!empty($errors)) {
//     $_SESSION['registration_error'] = $errors;
//     $_SESSION['old_values'] = $_POST;   
 
//     header("Location: editoops.php?id=" . $userid);
//     exit;
// }
   


// $stmt = $conn->prepare("SELECT user_id FROM users WHERE email = ? AND user_id != ?");
// $stmt->bind_param("si", $email, $id);
// $stmt->execute();
// $result = $stmt->get_result();

 
    $result = $updatedata->update(
        $userid,
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
 
    if ($result) {
        // echo "<script>alert('Record Updated Successfully');</script>";
        echo "<script>window.location.href='listingoops.php'</script>";
    } else {
        echo "<script>alert('Update Failed');</script>";
    }
}
?>
 

 
    
 
   
 