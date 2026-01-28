<<<<<<< HEAD
<?php
include 'db.php';

$email = $_POST['email'] ?? '';

$sql = "SELECT id FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    echo "exists";
} else {
    echo "available";
}
=======
<?php
include 'db.php';

$email = $_POST['email'] ?? '';

$sql = "SELECT id FROM users WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);

if (mysqli_stmt_num_rows($stmt) > 0) {
    echo "exists";
} else {
    echo "available";
}
>>>>>>> 07d84f53fadea864880f2cac57f5fd2a4869f4f7
