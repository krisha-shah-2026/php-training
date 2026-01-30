<?php 
session_start();
include 'auth.php';
include 'db.php';
include_once('includes/header.php'); 
include_once('includes/sidebar.php'); ?>
 <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">Employee Table</h3></div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table class="table table-bordered" role="table">
                      <thead>
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
    $sql1 = "SELECT * FROM users";
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
        echo "<a href='edit.php?id=" . htmlspecialchars($row['user_id']) . "' class='button'>Edit</a> ";
        echo "<a href='delete1.php?id=" . htmlspecialchars($row['user_id']) . "' class='button'>Delete1</a>";
        echo "</td>";
        // ----------------------------------------
       
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

<?php include_once('includes/footer.php'); ?>

