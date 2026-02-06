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
    }public function emailExists($email)
    {
        $stmt = $this->dbh->prepare("SELECT user_id FROM users1 WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
 
        return $stmt->num_rows > 0;
    }
    public function insert(
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
) {
    $stmt = $this->dbh->prepare(
        "INSERT INTO users1
        (first_name, last_name, email, password, confirm_password, profile_image, address, phone_no, gender, hobby, country)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?)"
    );
 
    $stmt->bind_param(
        "sssssssssss",
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
 
    return $stmt->execute();}


        public function fetchdata() {
        $sql = "SELECT * FROM users1 ORDER BY user_id";
        return mysqli_query($this->dbh, $sql);

    }
    public function update( $user_id, $first_name, $last_name, $email, $password, $confirm_password, $profile_image, $address, $phone_no, $gender, $hobby, $country ) {
  
    $sql = "UPDATE users1 SET first_name = ?, last_name = ?, email = ?, password = ?, confirm_password = ?, profile_image = ?, address = ?, phone_no = ?, gender = ?, hobby = ?, country = ? WHERE user_id = ?";
    
    $stmt = $this->dbh->prepare($sql);
    
    if (!$stmt) {
        return false;
    }

    
    $stmt->bind_param("sssssssssssi", $first_name, $last_name, $email, $password, $confirm_password, $profile_image, $address, $phone_no, $gender, $hobby, $country, $user_id);

    $result = $stmt->execute();
    $stmt->close();
    
    return $result;
}
 public function isEmailTaken($email, $currentUserId) {
        $stmt = $this->db->prepare("SELECT user_id FROM users WHERE email = ? AND user_id != ?");
        $stmt->bind_param("si", $email, $currentUserId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        return $result->num_rows > 0;
    }
    
   

    public function fetchonerecord($id) {
        $id = intval($id);  

        $sql = "SELECT * FROM users1 WHERE user_id = $id";
        return mysqli_query($this->dbh, $sql);
    }



    public function delete($user_id) {
        $user_id = intval($user_id); 
        $sql = "DELETE FROM users1 WHERE user_id = $user_id";
        return mysqli_query($this->dbh, $sql);
    }


}











