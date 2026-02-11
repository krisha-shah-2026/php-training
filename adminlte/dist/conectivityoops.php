<?php
session_start();

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'admin123');
define('DB_NAME', 'employee'); 

class DB_con
{
    public $dbh;

    public function __construct()
    {
        $this->dbh = mysqli_connect(
            DB_SERVER,
            DB_USER,
            DB_PASS,
            DB_NAME
        );

        // Check connection
        if (!$this->dbh) {
            die("Database connection failed: " . mysqli_connect_error());
        }
    }

    public function insert($first_name, $last_name, $email, $password, $confirm_password, $profile_image, $address, $phone_no, $gender, $hobby, $country) {
        $sql = "INSERT INTO users1
            (first_name, last_name, email, password, confirm_password, profile_image, address, phone_no, gender, hobby, country)
            VALUES
            ('$first_name', '$last_name', '$email', '$password', '$confirm_password', '$profile_image', '$address', '$phone_no', '$gender', '$hobby', '$country')";
        return mysqli_query($this->dbh, $sql);
    }
        public function fetchdata() {
        $sql = "SELECT * FROM users1 ORDER BY user_id";
        return mysqli_query($this->dbh, $sql);

    }
// public function fetchonerecord($id)
// 	{
// 	$oneresult=mysqli_query($this->dbh,"select * from users1 where user_id=$id");
// 	return $oneresult;
// 	}

    public function fetchonerecord($id) {
        $id = intval($id);  

        $sql = "SELECT * FROM users1 WHERE user_id = $id";
        return mysqli_query($this->dbh, $sql);
    }
// public function update($first_name,$last_name,$email,$password,$confirm_password,$profile_image,$address,$phone_no,$gender,$hobby,$country)
	// {
// 	$sql= "UPDATE  users1 set    
//      first_name = '$first_name', 
//     last_name = '$last_name', 
//     email = '$email', 
//     password = '$password', 
//     confirm_password = '$confirm_password', 
//     address = '$address', 
//     phone_no = '$phone_no', 
//     gender = '$gender', 
//     profile_image = '$profile_image',
//     hobby = '$hobby', 
//     country = '$country'
//   where user_id='$userid' ";
//     return mysqli_query($this->dbh, $sql);
// 	}class DB_con {

    public function update(
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
    ) {

        $conn = $this->dbh;

        if ($password !== null) {
            $sql = "UPDATE users1 SET
                        first_name='$first_name',
                        last_name='$last_name',
                        email='$email',
                        password='$password',
                        profile_image='$profile_image',
                        address='$address',
                        phone_no='$phone_no',
                        gender='$gender',
                        hobby='$hobby',
                        country='$country'
                    WHERE user_id='$userid'";
        } else {
            $sql = "UPDATE users1 SET
                        first_name='$first_name',
                        last_name='$last_name',
                        email='$email',
                        profile_image='$profile_image',
                        address='$address',
                        phone_no='$phone_no',
                        gender='$gender',
                        hobby='$hobby',
                        country='$country'
                    WHERE user_id='$userid'";
        }

        return mysqli_query($conn, $sql);
    }




    public function delete($user_id) {
        $user_id = intval($user_id); 
        $sql = "DELETE FROM users1 WHERE user_id = $user_id";
        return mysqli_query($this->dbh, $sql);
    }


}











