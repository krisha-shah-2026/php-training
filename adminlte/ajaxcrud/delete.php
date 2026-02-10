<?php
// 1. Establish database connection
$host = 'localhost';
$user = 'root';
$pass = 'admin123';
$db   = 'employee';

$conn = new mysqli($host, $user, $pass, $db);

// 2. Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 3. Get the ID and execute deletion
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM userajax WHERE user_id = ?");
    $stmt->bind_param("i", $id); // 

    if ($stmt->execute()) {
      
        header("Location: listing.php?msg=deleted");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    $stmt->close();
}

$conn->close();
?>