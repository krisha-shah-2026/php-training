<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once("conectivityoops.php");
$updatedata = new DB_con();

if (isset($_POST['update'])) {

    if (empty($_POST['id'])) {
        die("User ID missing");
    }

    $userid = intval($_POST['id']);

    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $address    = $_POST['address'];
    $phone_no   = $_POST['phone_no'];
    $gender     = $_POST['gender'] ?? '';
    $country    = $_POST['country'];
    // $old_image  = $_POST['old_image'];

    //  HOBBIES
    $hobbies = $_POST['hobbies'] ?? [];
    $hobby   = implode(",", $hobbies);
    $old_image  = $_POST['old_image'];


    $profile_image = $old_image;

    if (!empty($_FILES['profile_image']['name'])) {

        $upload_dir = __DIR__ . "/uploads/";

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $ext = pathinfo($_FILES['profile_image']['name'], PATHINFO_EXTENSION);
        $new_filename = time() . "_" . uniqid() . "." . $ext;

        if (move_uploaded_file($_FILES['profile_image']['tmp_name'], $upload_dir . $new_filename)) {

            if (!empty($old_image) && file_exists($upload_dir . $old_image)) {
                unlink($upload_dir . $old_image);
            }

            $profile_image = $new_filename;
        }
    }


    //  UPDATE CALL (NO confirm_password)
    $result = $updatedata->update(
        $userid,
        $first_name,
        $last_name,
        $email,
        $password,
        $profile_image,
        $address,
        $phone_no,
        $gender,
        $hobby,
        $country
    );

    if ($result) {
        echo "<script>alert('Record Updated Successfully');</script>";
         echo "<script>window.location.href='listingoops.php'</script>";
    } else {
        echo "<script>alert('Update Failed');</script>";
    }
}
?>
