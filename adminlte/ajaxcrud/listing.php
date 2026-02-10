<?php 
session_start();
include 'auth.php';
include '../db.php';
include_once('../header.php'); 
include_once('../sidebar.php'); ?>


 <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Employee Table</h3></div>
<div class="card-body">
                    <table class="table table-bordered" role="table">
 <button id="openPopup" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#userModal">
    Add User
</button>
 <script src="script.js"></script>
<!-- The Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="myForm" action="ajaxAddUser.php"  method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col"><input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name"></div>
            <div class="col"><input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name"></div>
          </div>
          <div class="mb-3">
            <input type="email" id="email" name="email"class="form-control" placeholder="Email Address">
          </div>
          <div class="row mb-3">
            <div class="col"><input type="password" id="password" name="password" class="form-control" placeholder="Password"></div>
            <div class="col"><input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="Confirm Password"></div>
          </div>
          <div class="mb-3">
            <label class="form-label">Profile Image</label>
            <input type="file" id="profile_image" name="profile_image"  class="form-control" accept="image/*">
          </div>
          <div class="row mb-3">
            <label>Address</label>
  <textarea name="address" class="form-control" placeholder="Enter Address"></textarea>
</div>
 
<!-- Phone Number -->
  <div class="row mb-3">
  <label>Phone Number</label>
  <input type="text" id="phone_no" name="phone_no" class="form-control" placeholder="Enter Phone Number">
</div>
          <div class="mb-3">
           <label>Gender:</label><br>
    <input type="radio" id="male" name="gender"  value="male" <?= (($_SESSION['old']['gender'] ?? '') === 'male') ? 'checked' : '' ?>>
     <label for="male">Male</label><br>

    <input type="radio" id="female" name="gender" value="female" <?= (($_SESSION['old']['gender'] ?? '') === 'female') ? 'checked' : '' ?>>
     <label for="female">Female</label><br>

    <input type="radio" id="other" name="gender" value="other" <?= (($_SESSION['old']['gender'] ?? '') === 'other') ? 'checked' : '' ?>>
    <label for="other">Other</label><br><br>

            </div>
         
          <div class="mb-3">
           <label>Hobbies:</label><br>
    <input type="checkbox" id="hobby1" name="hobbies[]" value="reading" <?= in_array('reading', $_SESSION['old']['hobby'] ?? []) ? 'checked' : '' ?>>

    <label for="hobby1"> Reading</label><br>
    <input type="checkbox" id="hobby2" name="hobbies[]" value="gaming" <?= in_array('gaming', $_SESSION['old']['hobby'] ?? []) ? 'checked' : '' ?>>

    <label for="hobby2"> Gaming</label><br>
    <input type="checkbox" id="hobby3" name="hobbies[]" value="coding" <?= in_array('coding', $_SESSION['old']['hobby'] ?? []) ? 'checked' : '' ?>>

    <label for="hobby3"> Coding</label><br><br>

          </div>
          <div class="mb-3">
           <label for="country">Country:</label>
    <select id="country" name="country">
        <option value="">Select a country</option>
        <option value="india"<?= ($_SESSION['old']['country'] ?? '') == 'india' ? 'selected' : '' ?>>India</option>
        <option value="usa"<?= ($_SESSION['old']['country'] ?? '') == 'usa' ? 'selected' : '' ?>>Canada</option>
        <option value="uk"<?= ($_SESSION['old']['country'] ?? '') == 'uk' ? 'selected' : '' ?>>India</option>
 
    </select><br><br>
         
          <button type="submit" class="btn btn-primary w-100" value="submit"> Add User</button>
           </div>  
        </form>
       
       
      <table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Confirm Password</th>
            <th>Image</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Hobby</th>
            <th>Country</th>
        </tr>
    </thead>
 
    <!-- AJAX will load data here -->
    <tbody id="userTable">
    <?php
     $sql = "SELECT * FROM userajax ORDER BY user_id DESC";
$result = $conn->query($sql);
 
if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
$id = $row['user_id'];

if (!empty($row['profile_image']) && file_exists("uploads/" . $row['profile_image'])) {
    $image_src = "uploads/" . $row['profile_image'];
} else {
    $image_src = "uploads/default.png";
}
echo "<tr>
    <td>{$row['user_id']}</td>
    <td>{$row['first_name']}</td>
    <td>{$row['last_name']}</td>
    <td>{$row['email']}</td>
    <td>{$row['password']}</td>
    <td>{$row['confirm_password']}</td>
    <td><img src='$image_src' width='50' height='50'></td>
    <td>{$row['address']}</td>
    <td>{$row['phone_no']}</td>
    <td>{$row['gender']}</td>
    <td>{$row['hobby']}</td>
    <td>{$row['country']}</td>
    <td>
        <button id='openEditPopup' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#editUserModal' data-id='" . $row['user_id'] . "'>Edit User</button>
        
        <button class='btn btn-danger btn-sm' onclick=\"if(confirm('Do you really want to delete this user?')) deleteUser(" . $row['user_id'] . ");\">Delete</button>
    </td>

</tr>";
 
      
    }
}else{
    echo "<tr><td colspan='12'>No data found</td></tr>";
}
?>
</tbody>
</tabel>
                  </div>
  
                  </div>
                  <!-- /.card-body -->
</div>
                <!-- /.card -->
                 <!-- Popup Background

<?php include_once('../footer.php'); ?>


