<<<<<<< HEAD
<?php
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
=======
<?php
 session_start(); 
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
 

>>>>>>> e0c0eabdd462d0ee8c033be476cec7cc9246aa5a
