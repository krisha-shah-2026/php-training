<?php include 'database.php';?>

   <table>
  <thead>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Password</th>
      <th>Confirm Password</th>
      <th>Profile</th>
      <th>address</th>
      <th>Phone No</th>
      <th>Gender</th>
      <th>hobby</th>
      <th>country</th>
      <th>Action</th> 
    </tr>
  </thead>
  <tbody>
    <?php
   
    $sql1 = "SELECT * FROM user_table";
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
        echo "<td>" . htmlspecialchars($row['Country']) . "</td>";
        // echo 'd';
        // --- MODIFIED CODE FOR ACTION BUTTONS ---
        echo "<td>";
        // Pass the user ID to the edit and delete pages using a GET parameter 'id'
        echo "<a href='edit.php?id=" . htmlspecialchars($row['user_id']) . "' class='button'>Edit</a> ";
        echo "<a href='delete.php?id=" . htmlspecialchars($row['user_id']) . "' class='button'>Delete</a>";
        
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