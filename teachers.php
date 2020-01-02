<?php

session_start();

include('inc/header.php');
include('inc/navbar.php');

?>

<div class="container-fluid">
 
<form action="employ.php" method="POST" enctype="multipart/form-data">
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
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Teachers Directory</h6>
              </div>

           <div class="card-body">
                   <div class="row">
                    <div class="col-md-2">
                      <div class="form-group">
                              <label for="title">Title</label>
                              <select class="form-control" id="title" name="title">
                                <option>... Select Teachers' Title</option>
                                <option>Mr</option>
                                <option>Mrs</option>
                                <option>Ms</option>
                                <option>Dr</option>
                                <option>Prof.</option>
                                <option>Dame</option>
                                <option>Sir</option>
                              </select>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                          <label for="first_name">First Name</label>
                          <input type="text" class="form-control" id="firstname" name="firstname" required>
                      </div>
                      </div>
                        <div class="col-md-5">
                            <div class="form-group">
                              <label for="subname">Last Name</label>
                              <input type="lastname" class="form-control" name="lastname" id="lastname" required>
                            </div>
                        </div>
                      </div>
                   <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="phone1">Phone Number</label>
                          <input type="text" class="form-control" id="phone1" name="phone1" required>
                      </div>
                      </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="phone2">Alternative Phone Number</label>
                              <input type="number" class="form-control" name="phone2" id="phone2" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                  </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                    <div class="form-group">
                      <label for="address1">Address</label>
                      <input type="text" class="form-control" name="address1" placeholder="1234 Oyingbo St">
                      <div class="invalid-feedback">
                        Please enter your Home address.
                      </div>
                    </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                          <input type="text" class="form-control"  name="address2" placeholder="Alternate Address">
                      </div>
                    </div>
                   </div>
          </div>
                <br>
                  <div class="card shadow mb-4">
                   <div class="card-header py-3">
                     <h3> File Uploads </h3>
                   </div>
               <div class="card-body">
                       <div class="row">
                       <div class="col-md-4 mb-3">
                          <div class="form-group">
                              <label for="image">Upload Passport</label>
                              <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                          </div>
                       <div class="col-md-4 mb-3">
                          <div class="form-group">
                              <label for="certificate1">First Certificate</label>
                              <input type="file" class="form-control-file" id="certificate1" name="certificate1">
                            </div>
                          </div>
                          <div class="col-md-4 mb-3">
                              <div class="form-group">
                                  <label for="certificate2">Second Certificate</label>
                                  <input type="file" class="form-control-file" id="certificate2" name="certificate2">
                                </div>
                              </div>
                         </div>
                        </div>
                  </div>
                  <br>
                  <div class="card shadow mb-4">
                   <div class="card-header py-3">
                     <h3> School Details </h3>
                   </div>
                   <div class="card-body">
                       <div class="row">
                       <div class="col-md-4 mb-3">
                       <div class="form-group">
                         <label for="school"> Select School</label>
                         <select class="form-control" name="school">
                           <option>... Select School</option>
                           <option>Alimosho High</option>
                           <option>Okoko Higher College</option>
                           <option>3</option>
                           <option>4</option>
                           <option>5</option>
                         </select>
                       </div>
                       </div>
                       <div class="col-md-4 mb-3">
                         <div class="form-group">
                           <label for="level"> Select Level</label>
                           <select class="form-control" name="level">
                               <option>... Select Level </option>
                             <option>9</option>
                             <option>10</option>
                             <option>15</option>
                           </select>
                         </div>
                         </div>
                         <div class="col-md-4 mb-3">
                            <div class="form-group">
                              <label for="subject"> Subject</label>
                              <select class="form-control" name="subject">
                                  <option>... Select Subject </option>
                                <option>9</option>
                                <option>Level 10</option>
                                <option>Level 15</option>
                              </select>
                            </div>
                            </div>
                     </div>
                     
                <input type="hidden" name="isactive" value=1 />
               <input type="submit" class="btn btn-outline-primary" name="employ" />
 
                  </div>
      </form>
    </div>

<script type="text/javascript" src="inc/vendor/datatables/DataTables-1.10.20/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="inc/vendor/datatables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){
  $('#datatable').DataTables();
})
</script>
<?php 
include('inc/script.php');
include('inc/footer.php');
 ?>