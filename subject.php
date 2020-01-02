<?php

session_start();

include('inc/header.php');
include('inc/navbar.php');

?>

<div class="container-fluid">
 
<form action="add.php" method="POST">
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
               <h6 class="m-0 font-weight-bold text-primary">Add Subjects</h6>
              </div>

           <div class="card-body">
                   <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="subcode">Subject Code</label>
                          <input type="text" class="form-control" id="subcode" name="subcode" required>
                      </div>
                    </div>
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="subname">Subject Name</label>
                            <input type="subname" class="form-control" name="subname" id="subname" required>
                          </div>
                      </div>
                  </div>
                </div>
                    <input type="submit" class="btn btn-outline-primary" name="create" />
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