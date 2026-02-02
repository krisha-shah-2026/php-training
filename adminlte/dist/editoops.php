<?php 

require_once'conectivityoops.php';

include_once('includes/header.php'); 

 include_once('includes/sidebar.php'); ?>

<?php
$userid = intval($_GET['id']);
$onerecord = new DB_con();
$sql = $onerecord->fetchonerecord($userid);

if ($row = mysqli_fetch_assoc($sql)) {
?>

                 <div class="card card-warning card-outline mb-4">
                  <!--begin::Header-->
                  <div class="card-header"><div class="card-title">Employee edit Form</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                <body>


<form action="updateoops.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
    First Name: <input type="text" name="first_name" value="<?php echo $row['first_name']; ?>" class="form-control"><br><br>
    Last Name: <input type="text" name="last_name" value="<?php echo $row['last_name']; ?>" class="form-control"><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control"><br><br>
    Password: <input type="password" name="password" value="<?php echo $row['password']; ?>"  class="form-control"><br><br>
    Confirm Password: <input type="confirm_password" name="confirm_password" value="<?php echo $row['confirm_password']; ?>" class="form-control"><br><br>
 
    Address: <textarea name="address" class="form-control"><?php echo $row['address']; ?></textarea><br><br>
    Phone: <input type="number" name="phone_no" value="<?php echo $row['phone_no']; ?>"  class="form-control" ><br><br>
 
    Gender:
    <input type="radio" name="gender" value="male" <?php if($row['gender']=="male") echo "checked"; ?>>Male
    <input type="radio" name="gender" value="female" <?php if($row['gender']=="female") echo "checked"; ?>>Female<br><br>
     <input type="radio" name="gender" value="other" <?php if($row['gender']=="other") echo "checked"; ?>>other<br><br>
   
   
     <label for="profile_picture">Profile Picture:</label>
    <?php $profileImage = $row['profile_image'] ?? '';

if (!empty($profileImage)) {
    echo "<img src='uploads/".htmlspecialchars($profileImage)."' width='50'>";
}?>

   <!-- <?php $image_path = "/php-training/uploads/" . $row['profile_image'];
   $image_src = 'uploads/'. htmlspecialchars($row['profile_image']);//<?php echo $sql2['profile_image'];
     echo "<td><img src='" . $image_src . "' alt='Profile Image' width='50' height='50'></td>";?> -->

 <input type="hidden" name="old_image" value="<?= $row['profile_image'] ?>">
 <input type="file" name="profile_image"><br></br>
   Hobby:
    <?php
        // $hobby = explode(",",$sql2['hobby']);
        $hobby = !empty($row['hobby']) ? explode(',', $row['hobby']) : [];

    ?>
    <input type="checkbox" name="hobbies[]" value="reading" <?php if(in_array("reading",$hobby)) echo "checked"; ?>>Reading
    <input type="checkbox" name="hobbies[]" value="gaming" <?php if(in_array("gaming",$hobby)) echo "checked"; ?>>Gaming
    <input type="checkbox" name="hobbies[]" value="coding" <?php if(in_array("coding",$hobby)) echo "checked"; ?>>Coding<br><br> 
    Country:
    <select name="country">
        <option <?php if($row['country']=="India") echo "selected"; ?>>INDIA</option>
        <option <?php if($row['country']=="USA") echo "selected"; ?>>usa</option>
        <option <?php if($row['country']=="UK") echo "selected"; ?>>UK</option>
    </select><br><br><?php } ?>

                     <div class="card-footer">

                           <input type="submit" name="update" class="btn btn-warning" value="update">

                    </div>
                    <!--end::Footer-->
                  </form>
                 </div>

<?php include_once('includes/footer.php'); ?>
