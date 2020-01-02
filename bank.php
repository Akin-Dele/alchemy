<?php 

session_start();

include('inc/header.php');
include('inc/navbar.php');
?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
  <i class="fas fa-student"></i> Buy Student Admission Form
  </div>
    <form action="bankcode.php" method="POST">
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
       <div class="card shadow mb-4">
          <div class="card-body">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="firstname">First name</label>
                  <input type="text" class="form-control" id="firstname" name="firstname">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="lastname">Last name</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter Last Name">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="phone"> Phone Number</label>
                  <input type="number" class="form-control" id="phone" placeholder="01223454569" name="phone">
                </div>
                <div class="col-md-6 mb-3">
                 <label for="bank">Bank Code</label>
                 <input type="number" class="form-control" id="bank" placeholder="01223454569" name="bank">
               </div>
               <input type="hidden" name="isStudent" value=0 />
        <button type="submit" class="btn btn-outline-primary" name="send">Send Info</button>
      </div>
    </div>
   </form>

</div>

<?php 
include('inc/script.php');
include('inc/footer.php');
 ?>