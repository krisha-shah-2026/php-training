<<<<<<< HEAD
<?php
session_start();
session_destroy();
header("Location: login.php");
exit();
=======
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
session_start();


session_destroy();


 header("Location: login.php");
exit();
>>>>>>> e0c0eabdd462d0ee8c033be476cec7cc9246aa5a
