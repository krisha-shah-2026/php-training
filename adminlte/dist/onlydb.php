<?php
$servername = "localhost";
$username = "root"; 
$password = "admin123";    
$dbname = "oopscrud";


$conn = new mysqli($servername, $username, $password,$dbname);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} public function insert($first_name, $last_name, $email, $password, $confirm_password, $profile_image, $address, $phone_no, $gender, $hobby, $country) {
        $sql = "INSERT INTO users1
            (first_name, last_name, email, password, confirm_password, profile_image, address, phone_no, gender, hobby, country)
            VALUES
            ('$first_name', '$last_name', '$email', '$password', '$confirm_password', '$profile_image', '$address', '$phone_no', '$gender', '$hobby', '$country')";
        return mysqli_query($this->dbh, $sql);
    }


    <?php 
// echo"h";exit();


ini_set('display_errors', 1);
error_reporting(E_ALL);
 require_once 'conectivityoops.php';
  
$insertdata = new DB_con();
$old = $_SESSION['old'] ?? [];

$errors = []; 
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
if (empty($first_name)) {
    $errors['first_name'] = "Enter your first name!";
}

if (empty($last_name)) {
    $errors['last_name'] = "Enter your last name!";
}

if (empty($email)) {
    $errors['email'] = "Enter your email!";}
elseif (emailExists($email)) {
    $errors['email'] = "Email already registered!";
}

if (empty($password)) {
    $errors['password'] = "Enter your password!";
     } elseif (strlen($password) < 8) {
             $errors['password'] = "Password must be at least 8 characters"; }

if (empty($confirm_password)) {
    $errors['confirm_password'] = "Enter confirm password!";
} elseif ($password !== $confirm_password) {
    $errors['confirm_password'] = "Passwords do not match";
}

if (empty($profile_image)) {
    $errors['profile_image'] = "Please select image file!";
}

if (empty($address)) {
    $errors['address'] = "Enter your address!";
}

if (empty($phone_no)) {
    $errors['phone_no'] = "Enter phone number!";
} elseif (strlen($phone_no) != 10) {
    $errors['phone_no'] = "Phone number must be 10 digits";
}

if (empty($gender)) {
    $errors['gender'] = "Select gender!";
}

if (empty($hobby)) {
    $errors['hobby'] = "Enter hobby!";
}

if (empty($country)) {
    $errors['country'] = "Select country!";
}


 if (!empty($errors)) {
      $_SESSION['registration_error'] = $errors;
    header("Location: registeroops.php");
   exit;
 }





$sql = $insertdata->insert($first_name, $last_name, $email, $password, $confirm_password, $profile_image, $address, $phone_no, $gender, $hobby, $country);

    if ($sql) {
        echo "<script>alert('Record inserted successfully');</script>";
         echo "<script>window.location.href='listingoops.php'</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
        echo "<script>window.location.href='insert.php'</script>";
    }

     unset($_SESSION['old']);


}<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once ('conectivityoops.php');
$updatedata = new DB_con();
$errors = [];
if (isset($_POST['update'])) {

    if (empty($_POST['id'])) {
        die("User ID missing");
    }

    $userid = intval($_POST['id']);
        // $id = $_POST['id']; 
    $first_name = $_POST['first_name'];
    $last_name  = $_POST['last_name'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
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

   
 
    if (empty($first_name)) {
        $errors['first_name'] = "Please enter your first name!";
    }

    if (empty($last_name)) {
        $errors['last_name'] = "Please enter your last name!";
    }

    if (empty($email)) {
        $errors['email'] = "Please enter your email!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format!";
    }

    if (empty($password)) {
        $errors['password'] = "Please enter your password!";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters";
    }

    if (empty($confirm_password)) {
        $errors['confirm_password'] = "Please confirm your password!";
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = "Passwords do not match";
    }

    if (empty($new_image) && empty($old_image)) {
        $errors['profile_image'] = "Please select an image!";
    }

    if (empty($address)) {
        $errors['address'] = "Please enter your address!";
    }

    if (empty($phone_no)) {
        $errors['phone_no'] = "Please enter phone number!";
    } elseif (!preg_match('/^[0-9]{10}$/', $phone_no)) {
        $errors['phone_no'] = "Phone number must be 10 digits";
    }

    if (empty($gender)) {
        $errors['gender'] = "Please select gender!";
    }

    if (empty($hobby)) {
        $errors['hobby'] = "Please select at least one hobby!";
    }

    if (empty($country)) {
        $errors['country'] = "Please select country!";
    }


    if (!empty($errors)) {
        $_SESSION['registration_error'] = $errors;
        // $_SESSION['old_values'] = $_POST; // to keep previous values
        header("Location: editoops.php");
        exit;
    }

    //  
    $result = $updatedata->update(
        $userid,
        $first_name,
        $last_name,
        $email,
        $password,
        $confirm_password,
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
