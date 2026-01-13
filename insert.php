<?php include 'database.php';
// Display all errors on screen for debugging a specific script
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 
if (isset($_POST['submit'])) {
    $first_name   = $_POST['first_name'];
    $last_name   = $_POST['last_name'];
    $email   = $_POST['email'];
    $password    = $_POST['password'];
    $confirm_password   = $_POST['confirm_password'];
    $address = $_POST['address'];
    $phone   = $_POST['phone_no'];
    $gender  = $_POST['gender'] ?? null;
    // $hobby = $_POST['hobby'] ?? [];
    $hobby   = !empty($_POST["hobbies"]) ? implode(",", $_POST['hobbies']) : null;
    // $hobby = $_POST['hobby'] ?? null;
    // // echo $hobby;exit; 
    // // $hobby_raw = $_POST['hobby'] ?? null;

    // // // Convert the hobby array into a comma-separated string
    // // // If $hobby_raw is null or empty, $hobby will be null
    // // if (!empty($hobby_raw) && is_array($hobby_raw)) {
    // //     $hobby = implode(",", $hobby_raw);
    // // } else {
    // //     $hobby = null;
    //     $hobby   = !empty($_POST["hobby"]) ? implode(",", $_POST['hobby']) : null;

// Convert the hobby array into a comma-separated string
// If $hobby_raw is null or empty, $hobby will be null
// if (!empty($hobby_raw) && is_array($hobby_raw)) {
//     $hobby = implode(",", $hobby_raw);
//     // $hobby will be something like "reading,hiking,coding"
//     echo "Hobbies saved: " . htmlspecialchars($hobby);
// } else {
//     $hobby = null;
//     echo "No hobbies selected or data was not an array.";
// }

    

// $hobby = !empty($hobby_raw) ? implode(",", $hobby_raw) : null;

// Use ?? to provide a default null if country isn't selected
$country = $_POST['country'] ?? null;
// echo $fname . "<br>";
 
//     if ($password !== $confirm_password) {
//         die("Password do not match!");
//     }
//     $password = password_hash($password, PASSWORD_DEFAULT);
//     $target_dir = "php-training/uploads/"; // Specify your upload directory here
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// // Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }

// // Check file size (e.g., limit to 5MB)
// if ($_FILES["fileToUpload"]["size"] > 5000000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
 
    $img_name = $_FILES['profile_image']['name'];
    $tmp_name = $_FILES['profile_image']['tmp_name'];
    move_uploaded_file($tmp_name, "uploads/" . $img_name);
// INSERT INTO `user_table`(`user_id`, `first_name`, `last_name`, `email`, `password`, `confirm_password`, `profile_image`, `address`, `phone_no`, `gender`, `hobby`, `Country`) VALUES 
   
    $sql = "INSERT INTO `user_table`(`first_name`, `last_name`, `email`, `password`, `confirm_password`, `profile_image`, `address`, `phone_no`, `gender`, `hobby`, `Country`) VALUES 
('$first_name','$last_name','$email','$password','$confirm_password','$img_name','$address','$phone','$gender','$hobby ','$country')";

    if (mysqli_query($conn, $sql)){
        echo "inserted succesfully";
    }else{echo "not inserted";}

}
header("Location: process_form.php");