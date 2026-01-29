<?php
session_start();
// $_SESSION = array();
// var_dump($_SESSION);
// session_start();
// $_SESSION = array();
// var_dump($_SESSION);
//  $_SESSION['user_id'] = $user['user_id'];

session_unset();
session_destroy();
// if (!isset($_SESSION['user_id'])) {
//     header("Location: login.php");
//     exit();
// }
// var_dump($_SESSION);
header("Location: login.php");
exit();


