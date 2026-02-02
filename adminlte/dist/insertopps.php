<?php require_once'conectivityoops.php';
$insertdata = new DB_con();

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $address    = $_POST['address'];
    $phone_no   = $_POST['phone_no'];
    $gender     = $_POST['gender'] ?? null;
    $hobby      = !empty($_POST['hobbies']) ? implode(",", $_POST['hobbies']) : null;
    $country    = $_POST['country'] ?? null;


// if (!empty($_FILES['profile_image']['name'])) {

//     $img_name = time() . '_' . $_FILES['profile_image']['name'];
//     $tmp_name = $_FILES['profile_image']['tmp_name'];

//     move_uploaded_file($tmp_name, "uploads/" . $img_name); 

//     $profile_image = $img_name;
// }
    // $img_name = $_FILES['profile_image']['name'];
    // $tmp_name = $_FILES['profile_image']['tmp_name'];
    // move_uploaded_file($tmp_name, "uploads/" . $img_name);

$profile_image = ""; 

if (!empty($_FILES['profile_image']['name'])) {

    $upload_dir = __DIR__ . "/uploads/";

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $ext = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
    $new_filename = time() . "_" . uniqid() . "." . $ext;

    if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_dir . $new_filename)) {
        $profile_image = $new_filename;
    }
}

    $sql = $insertdata->insert($first_name, $last_name, $email, $password, $confirm_password, $profile_image, $address, $phone_no, $gender, $hobby, $country);

    if ($sql) {
        echo "<script>alert('Record inserted successfully');</script>";
         echo "<script>window.location.href='listingoops.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='insert.php'</script>";
    }
}
?>


