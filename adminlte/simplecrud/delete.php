<?php
session_start();
include '../db.php';
 
if (!isset($_GET['id'])) {
    die("User id missing");
}
 
$id = intval($_GET['id']); 
 

$loggedInUserId = $_SESSION['user_id'] ?? null;
 

mysqli_query($conn, "DELETE FROM users WHERE user_id = $id");
 

if ($loggedInUserId == $id) {
 
  
    session_unset();
    session_destroy();
 
    header("Location: ../login.php");
    exit();
}
 

header("Location: listing.php");
exit();
?>