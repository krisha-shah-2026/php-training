<?php

$servername = "localhost";
$username = "root";
$password = "admin123";
$dbname = "employee";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$email = $_POST['email'] ?? '';

if (!empty($email)) {
   
    $email = $conn->real_escape_string($email);

    
    $sql = "SELECT email FROM userajax WHERE email = '$email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
       
        echo "exists";
    }
}


$conn->close();
?>
