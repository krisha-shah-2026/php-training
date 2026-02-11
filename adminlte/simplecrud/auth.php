<?php 
session_start();
// echo $_SESSION['user_id'] ;exit();
if (!isset($_SESSION['user_id'])) {
     header("Location: ../login.php");
    exit();
}
