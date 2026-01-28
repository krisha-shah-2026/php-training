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
 

>>>>>>> 07d84f53fadea864880f2cac57f5fd2a4869f4f7
