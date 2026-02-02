$user_id = $_SESSION['user_id'];
//    $sql = "UPDATE users SET profile_image='$profile_image' WHERE id=".$_SESSION['user_id'];
//     mysqli_query($conn, $sql);
 
   
    // $_SESSION['profile_image'] = $profile_image;
 
//      header("Location: process_form1.php");
//      exit();/ $user_id = $_SESSION['user_id'];
    //header("Location: process_form1.php");
    : <?php
include 'db.php'; // mysqli connection
 
if (isset($_POST['submit'])) {
 
    $fname     = trim($_POST['fname']);
    $lname     = trim($_POST['lname']);
    $email     = trim($_POST['email']);
    $password  = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $gender    = $_POST['gender'] ?? '';
    $country   = $_POST['country'];
    $address   = trim($_POST['address']);
 
    // hobby array → string
    $hobby = isset($_POST['hobby']) ? implode(',', $_POST['hobby']) : '';
 
    $errors = [];
 
    // First name
    if (empty($fname)) {
        $errors[] = "First name is required";
    }
 
    // Last name
    if (empty($lname)) {
        $errors[] = "Last name is required";
    }
 
    // Email
    if (empty($email)) {
        $errors[] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }
 
    // Password
    if (empty($password)) {
        $errors[] = "Password is required";
    } elseif (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }
 
    // Confirm password
    if ($password !== $cpassword) {
        $errors[] = "Password and Confirm Password do not match";
    }
 
    // Gender
    if (empty($gender)) {
        $errors[] = "Gender is required";
    }
 
    // Country
    if (empty($country)) {
        $errors[] = "Country is required";
    }
 
    // Address
    if (empty($address)) {
        $errors[] = "Address is required";
    }
 
    // Show errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {
 
        // Hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
 
        // Insert query
        $sql = "INSERT INTO users 
        (first_name, last_name, email, password, gender, hobby, country, address)
        VALUES 
        ('$fname', '$lname', '$email', '$hashedPassword', '$gender', '$hobby', '$country', '$address')";
 
        if (mysqli_query($conn, $sql)) {
            echo "<p style='color:green;'>Data inserted successfully</p>";
        } else {
            echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
}
?>
// Hobby
if (empty($_POST['hobby'])) {
    $errors[] = "Please select at least one hobby";
} else {
    $hobby = implode(',', $_POST['hobby']);
  // Country
if (empty($country)) {
    $errors[] = "Country is required";
}
 $phone = trim($_POST['phone'] ?? '');
 
// Phone number
if (empty($phone)) {
    $errors[] = "Phone number is required";
} elseif (!preg_match('/^[0-9]{10}$/', $phone)) {
    $errors[] = "Phone number must be 10 digits";
}
 // --- Firstname ---
if (isset($_SESSION['firstname_error'])) {
    echo '<p style="color:red;">' . $_SESSION['firstname_error'] . '</p>';
    unset($_SESSION['firstname_error']);
}

// --- Lastname ---
if (isset($_SESSION['lastname_error'])) {
    echo '<p style="color:red;">' . $_SESSION['lastname_error'] . '</p>';
    unset($_SESSION['lastname_error']);
}

// --- Phone ---
if (isset($_SESSION['phone_error'])) {
    echo '<p style="color:red;">' . $_SESSION['phone_error'] . '</p>';
    unset($_SESSION['phone_error']);
}

// --- Username (assuming 'ne' = username) ---
if (isset($_SESSION['username_error'])) {
    echo '<p style="color:red;">' . $_SESSION['username_error'] . '</p>';
    unset($_SESSION['username_error']);
}
session_start();
 
$errors = [];
 
$first_name = trim($_POST['first_name'] ?? '');
$last_name  = trim($_POST['last_name'] ?? '');
$email      = trim($_POST['email'] ?? '');
$password   = $_POST['password'] ?? '';
$gender     = $_POST['gender'] ?? '';
$country    = $_POST['country'] ?? '';
$address    = trim($_POST['address'] ?? '');
 
// Save old values
$_SESSION['old'] = $_POST;
 
// First name
if ($first_name === '') {
    $errors[] = "First name is required";
}
 
// Last name
if ($last_name === '') {
    $errors[] = "Last name is required";
}
 
// Email
if ($email === '') {
    $errors[] = "Email is required";
}
 
// Password
if ($password === '') {
    $errors[] = "Password is required";
} elseif (strlen($password) < 8) {
    $errors[] = "Password must be at least 8 characters";
}
 
// Gender
if ($gender === '') {
    $errors[] = "Gender is required";
}
 
// Country
if ($country === '') {
    $errors[] = "Country is required";
}
 
// Address
if ($address === '') {
    $errors[] = "Address is required";
}
 
//  If errors exist → redirect back
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: registraionpageadmin.php");
    exit;
}
 
//  Success
$_SESSION['success'] = "Registration successful!";
header("Location: registraionpageadmin.php");
exit;
 
<?php if (!empty($_SESSION['errors'])): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php unset($_SESSION['errors']); endif; ?>
 
<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['success'] ?>
    </div>
<?php unset($_SESSION['success']); endif; ?>
 
 <?php if (!empty($_SESSION['errors'])): ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($_SESSION['errors'] as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php unset($_SESSION['errors']); endif; ?>
 if (empty($first_name)) {
//     // If it's empty, set an error session variable and redirect
//     $_SESSION['firstname_error'] = "name cannot be empty";
//     header("Location: registraionpageadmin.php");
//     exit;
// }

// if (empty($email)) {
//     // If it's empty, set an error session variable and redirect
//     $_SESSION['email_error'] = "Email cannot be empty";
//     header("Location: registraionpageadmin.php");
//     exit;
// }