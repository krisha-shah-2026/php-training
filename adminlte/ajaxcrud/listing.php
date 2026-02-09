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

<!-- The Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add New User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="userForm" action="insert.php" method="POST" enctype="multipart/form-data">
          <div class="row mb-3">
            <div class="col"><input type="text" class="form-control" placeholder="First Name"></div>
            <div class="col"><input type="text" class="form-control" placeholder="Last Name"></div>
          </div>
          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email Address">
          </div>
          <div class="row mb-3">
            <div class="col"><input type="password" class="form-control" placeholder="Password"></div>
            <div class="col"><input type="password" class="form-control" placeholder="Confirm Password"></div>
          </div>
          <div class="mb-3">
            <label class="form-label">Profile Image</label>
            <input type="file" class="form-control" accept="image/*">
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
          </div>
          <button type="submit" class="btn btn-primary w-100" value="submit"> Add User</button>
        </form>
      </div>
    </div>
  </div>
</div><div id="editModal" style="display:none; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background:white; padding:20px; border:1px solid #ccc; z-index:1000;">
    <div id="modalContent"></div>
    <button onclick="closeModal()">Close</button>
</div><script>
function openEditModal(userId) {
    
    document.getElementById('editModal').style.display = 'block';
    
    fetch('edit.php?id=' + userId)
        .then(response => response.text())
        .then(data => {
            document.getElementById('modalContent').innerHTML = data;
        });
}

function closeModal() {
    document.getElementById('editModal').style.display = 'none';
}</script>
               
                    
                  <tr>
                          <th style="width: 10px" scope="col">id</th>
                          <th scope="col">First Name</th>
                          <th scope="col">Last Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Password</th>
                          <th scope="col">Confirm Password</th>
                          <th scope="col">Profile Image</th>
                          <th scope="col">Address</th>
                          <th scope="col">Phone No</th>
                          <th scope="col">Gender</th>
                          <th scope="col">Hobby</th>
                          <th scope="col">Country</th>
                        
                        </tr>
                      </thead>
  <?php
    $sql1 = "SELECT * FROM userajax";
    $result = $conn->query($sql1);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
      // Loop through each row of data
      while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['user_id']) . "</td>";
        
        echo "<td>" . htmlspecialchars($row['first_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['last_name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
        echo "<td>" . htmlspecialchars($row['password']) . "</td>";
        echo "<td>" . htmlspecialchars($row['confirm_password']) . "</td>";
        

        $image_path = "/php-training/uploads/" . $row['profile_image'];

     $image_src = '/php-training/uploads/' . htmlspecialchars($row['profile_image']);
        echo "<td><img src='" . $image_src . "' alt='Profile Image' width='50' height='50'></td>";
    

        echo "<td>" . htmlspecialchars($row['address']) . "</td>";
        echo "<td>" . htmlspecialchars($row['phone_no']) . "</td>";
      
         echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
        echo "<td>" . htmlspecialchars($row['hobby']) . "</td>";
        echo "<td>" . htmlspecialchars($row['country']) . "</td>";
        // echo 'd';
        // --- MODIFIED CODE FOR ACTION BUTTONS ---
        echo "<td>";
        // Pass the user ID to the edit and delete pages using a GET parameter 'id'

        echo '<button class="button" onclick="openEditModal(' . htmlspecialchars($row['user_id']) . ')">Edit</button>';
echo ' ';
      echo "<a href=\"delete.php?id=" . htmlspecialchars($row['user_id']) . "\" class=\"button\" onclick=\"return confirm('Do you really want to delete?');\">Delete</a>";
        echo "</td>";
       
       
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='10'>No users found</td></tr>";
    }
    
    ?>
  </tbody>
                      </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                 <!-- Popup Background

<?php include_once('../footer.php'); ?>


