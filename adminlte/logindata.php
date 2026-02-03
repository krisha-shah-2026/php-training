<?php
session_start();
include 'db.php';
if (isset($_POST['submit'])) {

$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
    $_SESSION['old'] = [
        'email' => $email
    ];




if ($email === '') {
    $_SESSION['login_error'] = "Please fill this email";
    header("Location: login.php");
    exit;
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['login_error'] = "Invalid email format";
    header("Location: login.php");
    exit;
}



$sql = "SELECT user_id, email, password FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if ($result->num_rows === 0) {
    // email not found
    $_SESSION['login_error'] = "Email not registered";
    header("Location: login.php");
    exit;
}
$user = $result->fetch_assoc();
if ($password === '') {
    $_SESSION['login_error'] = "Please enter password";
    header("Location: login.php");
    exit;
}



// if (!$user) {
//     $_SESSION['login_error'] = "Email not registered";
//     header("Location: login.php");
//     exit;
// }

if ($password !== $user['password']) {
    $_SESSION['login_error'] = "Incorrect password";
    header("Location: login.php");
    exit;
}

//  SUCCESS
$_SESSION['user_id'] = $user['user_id'];
$_SESSION['user_email'] = $user['email'];
  unset($_SESSION['old']);
    unset($_SESSION['login_error']);

header("Location: ./simplecrud/samplepage.php"); 
exit;
}
    // if (empty($errors)) {

    //     $sql = "SELECT user_id, email, password FROM users WHERE email = ?";
    //     $stmt = mysqli_prepare($conn, $sql);
    //     mysqli_stmt_bind_param($stmt, "s", $email);
    //     mysqli_stmt_execute($stmt);
    //     $result = mysqli_stmt_get_result($stmt);
    //     $user = mysqli_fetch_assoc($result);

    //     if (!$user) {
    //         $errors['email'] = "Email not registered";
    //     } elseif ($password !== $user['password']) {
    //         $errors['password'] = "Incorrect password";
    //     } else {
    //         //  LOGIN SUCCESS (NO REDIRECT)
    //         $_SESSION['user_id'] = $user['user_id'];
    //         $_SESSION['user_email'] = $user['email'];
    //  header("Location: samplepage.php");
    //  exit;        }
    // }

?>
