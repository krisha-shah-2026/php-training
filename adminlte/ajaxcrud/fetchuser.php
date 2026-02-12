<?php
include '../db.php';
 
$sql = "SELECT * FROM userajax ORDER BY user_id DESC";
$result = mysqli_query($conn,$sql);
 
while($row = mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?= $row['user_id'] ?></td>
    <td><?= $row['first_name'] ?></td>
    <td><?= $row['last_name'] ?></td>
    <td><?= $row['email'] ?></td>
   
    <td><img src="uploads/<?= $row['profile_image'] ?>" width="50"></td>
    <td><?= $row['address'] ?></td>
    <td><?= $row['phone_no'] ?></td>
    <td><?= $row['gender'] ?></td>
    <td><?= $row['hobby'] ?></td>
    <td><?= $row['country'] ?></td>
    <td>
<button id="openPopup" class="edit-btn btn btn-primary" data-id="<?= $row['user_id'] ?>" data-bs-toggle="modal" data-bs-target="#userModal">
    edit User
    
</button>
  
      <button class="delete-btn btn btn-danger" data-id="<?= $row['user_id'] ?>">Delete</button>
    </td>
</tr>
<?php } ?>
