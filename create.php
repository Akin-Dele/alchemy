<?php 

session_start();

include('inc/header.php');
include('inc/navbar.php');
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  <i class="fas fa-user-edit"></i>  Create Users Profile
  </div>
  <h6 class="text-success"><?php
    if(isset($_SESSION['success']) && $_SESSION['success'] !=''){
     echo $_SESSION['success'];
     unset($_SESSION['success']);
    }
    ?></h6>
        <h6 class="text-danger"><?php
    if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
     echo $_SESSION['status'];
     unset($_SESSION['status']);
    }
    ?></h6>
     <form action="createcode.php" method="POST" enctype="multipart/form-data">
      <div class="card-body">
       <div class="row">
        <div class="col-md-6 mb-4">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name">
          </div>
        </div>
          <div class="col-md-6 mb-4">
          <div class="form-group">
           <label for="lastname">Last Name</label>
           <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name">
         </div>
          </div>
        </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
          </div>
          <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
          </div>
          <div class="form-group">
           <label class="my-1 mr-2">User Type</label>
            <select class="custom-select my-1 mr-sm-2" name="usertype">
              <option selected>Choose...</option>
              <option value="minadmin">Ministry Admin</option>
              <option value="schadmin">School Admin</option>
              <option value="teacher">Admin</option>
            </select>
          </div>
          <div class="form-group">
            <label for="images">Upload Image</label>
            <input type="file" class="form-control" name="images" id="images" placeholder="My profile Image Update" value="">
          </div>
          </div>
          <div class="card-footer">
        <button type="submit" class="btn btn-outline-primary" name="create">Create</button>
      </div>
   </form>

</div>




<?php 
include('inc/script.php');
include('inc/footer.php');
 ?>