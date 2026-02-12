<?php 
session_start();
include 'auth.php';
include '../db.php';
include_once('../header.php'); 
include_once('../sidebar.php'); ?>
 
 <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Employee Table</h3></div>
<div class="card-body">
  <div id="msgBox" style="display:none; padding:10px; margin-bottom:10px; border-radius:5px;"></div>
                    <table class="table table-bordered" role="table">
 <button id="openPopup" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#userModal">
    Add User
</button>
 
<!-- The Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
  
 
 
 
<form id="myForm" enctype="multipart/form-data">
 
<div class="row mb-3">
  <div class="col">
 <input type="hidden" id="user_id" name="user_id">
  <label for="first_name">First Name:</label>
    <input type="text" id="firstName" name="first_name" class="form-control" placeholder="First Name">
    <small class="text-danger error" id="firstNameError"></small>
  </div>
 
  <div class="col">
     <label for="last_name">last  Name:</label>
    <input type="text" id="lastName" name="last_name" class="form-control" placeholder="Last Name">
    <small class="text-danger error" id="lastNameError"></small>
  </div>
</div>
 
<div class="mb-3">
   <label for="email">Email</label>
  <input type="text" id="email" name="email" class="form-control" placeholder="email">
  <small class="text-danger error" id="emailError"></small>
</div>
 
<div class="row mb-3">
  <div class="col">
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
    <small class="text-danger error" id="passwordError"></small>
  </div>
 
  <div class="col">
     <label for="confirm_password">Confirm Password:</label>
   
    <input type="password" id="confirmPassword" name="confirm_password" class="form-control" placeholder="Confirm Password">
    <small class="text-danger error" id="confirmPasswordError"></small>
  </div>
</div>
 
<div class="mb-3">
   <label for="address">Address:</label><br>  
  <input type="text" id="address" name="address" class="form-control" placeholder="Address">
  <small class="text-danger error" id="addressError"></small>
</div>
 
<div class="mb-3"><label for="phone_no">phone no</label><br>  
  <input type="text" id="phone" name="phone_no" class="form-control" placeholder="Phone Number">
  <small class="text-danger error" id="phoneNumberError"></small>
</div>
 
<div class="mb-3">
  <label>Profile Image</label>
      <input type="file" id="profile_image" name="profile_image" class="form-control"  accept=" uploads/*"><br><br>
      <!-- <img id="oldImagePreview" src="" width="80" style="margin-top:10px; display:none;"> -->
       <!-- <input type="hidden" name="old_image" id="oldImage"> -->
  <small class="text-danger error" id="imageError"></small>
 
</div>
<div class="mb-3">
  <label>Gender</label><br>
  <input type="radio" name="gender" value="male"> Male
  <input type="radio" name="gender" value="female"> Female
  <input type="radio" name="gender" value="other"> Other
  <br><small class="text-danger error" id="genderError"></small>
</div>
 
<div class="mb-3">
  <label>Hobbies</label><br>
  <input type="checkbox" class="hobby" name="hobbies[]" value="reading"> Reading
  <input type="checkbox" class="hobby" name="hobbies[]" value="gaming"> Gaming
  <input type="checkbox" class="hobby" name="hobbies[]" value="coding"> Coding
  <br><small class="text-danger error" id="hobbyError"></small>
</div>
 
<div class="mb-3">
  <select id="country" name="country" class="form-control">
    <option value="">Select Country</option>
    <option value="india">India</option>
    <option value="usa">USA</option>
    <option value="uk">UK</option>
  </select>
  <small class="text-danger error" id="countryError"></small>
</div>
 
 
 
  <button type="submit" class="btn btn-primary w-100">Add User</button>
</form>
</div>
    </div>
    <table id="userTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
               
                <th>Image</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Hobby</th>
                <th>Country</th>
            </tr>
        </thead>
     
    <tbody id="userTable">
    </tbody>
    </tabel>
 

 
 
              
                <!-- /.card -->
                 <!-- Popup Background
 
 <?php include_once('../footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="script.js"></script>
 
</body>
</html>
  


 

 

