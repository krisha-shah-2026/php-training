<?php
require_once 'conectivityoops.php';
  include 'auth.php';
include_once('../header.php'); 
include_once('../sidebar.php'); ?>
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
                         
                          <th scope="col">Profile Image</th>
                          <th scope="col">Address</th>
                          <th scope="col">Phone No</th>
                          <th scope="col">Gender</th>
                          <th scope="col">Hobby</th>
                          <th scope="col">Country</th>
                        
                        </tr>

<?php
$fetchdata = new DB_con();
$sql = $fetchdata->fetchdata();

while ($row = mysqli_fetch_array($sql)) {
?>
<tr>
    <td><?php echo htmlentities($row['user_id']); ?></td>
    <td><?php echo htmlentities($row['first_name']); ?></td>
    <td><?php echo htmlentities($row['last_name']); ?></td>
    <td><?php echo htmlentities($row['email']); ?></td>
  

    <td>     <?php
if (!empty($row['profile_image']) && file_exists("uploads/" . $row['profile_image'])) {
    $image_src = "uploads/" . $row['profile_image'];
} else {
    $image_src = "uploads/default.png";
}
?>

    <img src="<?php echo $image_src; ?>"
         width="50"
         height="50"
         style="object-fit:cover; border-radius:5px;">
</td>



    <td><?php echo htmlentities($row['address']); ?></td>
    <td><?php echo htmlentities($row['phone_no']); ?></td>
    <td><?php echo htmlentities($row['gender']); ?></td>
    <td><?php echo htmlentities($row['hobby']); ?></td>
    <td><?php echo htmlentities($row['country']); ?></td>



    <td>
        <a href="editoops.php?id=<?php echo htmlentities($row['user_id']); ?>">
            <button class="btn btn-primary btn-xs">Edit</button>
        </a>
    </td>

    <td>
        <a href="deleteoops.php?id=<?php echo htmlentities($row['user_id']); ?>"
           onclick="return confirm('Do you really want to delete?');">
            <button class="btn btn-danger btn-xs">Delete</button>
        </a>
    </td>
</tr>
<?php } ?>






                      </thead>
  </tbody>
                      </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

<?php include_once('../footer.php'); ?>
