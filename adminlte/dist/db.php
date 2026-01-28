<?php
$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "employee";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// echo $conn; exit();
// Check connection
if ($conn->connect_error) {
    

  die("Connection failed: " . $conn->connect_error);
 }//if ($conn) {
//     echo "Connected successfully";
// }

?>