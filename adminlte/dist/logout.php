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
>>>>>>> 07d84f53fadea864880f2cac57f5fd2a4869f4f7
