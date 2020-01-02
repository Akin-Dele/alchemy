<?php 

session_start();

include('inc/header.php');
include('inc/navbar.php');
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  <i class="fas fa-user-edit"></i>  Edit Admin Profile
  </div>

       <?php

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'adminpanel');

       if(isset($_POST['edit_btn'])){
        $id = $_POST['edit_id'];
       
        $query = "SELECT * FROM register WHERE id ='$id'";
        $query_run = mysqli_query($con, $query);

        foreach($query_run as $row){
         ?>
           <form action="code2.php" method="POST" enctype="multipart/form-data">
           <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
      <div class="card-body">
        <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" class="form-control" id="username" name="edit_username" placeholder="Enter Username" value="<?php echo $row['username']; ?>">
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="edit_email" id="email" placeholder="name@example.com" value="<?php echo $row['email']; ?>">
          </div>
          <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="edit_password" id="password" placeholder="Enter Password" value="<?php echo $row['password']; ?>">
          </div>
          <div class="form-group">
           <label class="my-1 mr-2">User Type</label>
            <select class="custom-select my-1 mr-sm-2" name="edit_usertype">
              <option selected>Choose...</option>
              <option value="minadmin">Ministry Admin</option>
              <option value="schadmin">School Admin</option>
              <option value="teacher">Teacher</option>
              <option value="student">Student</option>
            </select>
          </div>
          <div class="form-group">
            <label for="images">Upload Image</label>
            <input type="file" class="form-control" name="images" id="images" placeholder="My profile Image Update" value="<?php echo $row['images']; ?>">
          </div>
          </div>
          <div class="card-footer">
        <a href="register.php" class="btn btn-outline-danger">Close</a>
        <button type="submit" class="btn btn-outline-primary" name="update">Update</button>
      </div>
   </form>
      <?php
        }
    }
    ?>

</div>




<?php 
include('inc/script.php');
include('inc/footer.php');
 ?>