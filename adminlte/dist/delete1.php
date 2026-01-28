<<<<<<< HEAD
<?php include 'db.php';
// $servername = "localhost";
// $username = "root";
// $password = "admin123";
// $dbname = "guest";

// Create connection
// $conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }


$id = $_GET['id'];
 
mysqli_query($conn, "DELETE FROM users WHERE user_id=$id");
header("Location: process_form1.php");
?>
=======
<?php include 'db.php';
// $servername = "localhost";
// $username = "root";
// $password = "admin123";
// $dbname = "guest";

// Create connection
// $conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
// if ($conn->connect_error) {
//   die("Connection failed: " . $conn->connect_error);
// }


$id = $_GET['id'];
 
mysqli_query($conn, "DELETE FROM users WHERE user_id=$id");
header("Location: process_form1.php");
?>
>>>>>>> 07d84f53fadea864880f2cac57f5fd2a4869f4f7
