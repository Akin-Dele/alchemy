<?php

include('security.php');

include('inc/header.php');
include('inc/navbar.php');



?>

<div class="container-fluid">

<!-- Data tablesExamples -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Admission Requests</h6>
     </div>

  <div class="card-body">
    <div class="table-responsive">
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
    <?php 

    $con = mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

    $query= "SELECT * FROM student WHERE is_student=0 ORDER BY id DESC ";
    
    $query_run= mysqli_query($con, $query);
    ?>
    
    <table class="display table table-striped table-bordered" id="datatable" width="100%" cellspacing="0">
      <thead class="bg-success text-white">
         <tr>
            <th>Id</th>
            <th>Student Name</th>
            <th>School of Choice</th>
            <th>Class</th>
            <th>Gender</th>
            <th>Parent Name</th>
            <th>Parent Occupation</th>
            <th>view</th>
         </tr>
      </thead>
      <tbody>
      <?php
      if(mysqli_num_rows($query_run) > 0){
       while ($row = mysqli_fetch_array($query_run)){
        ?>

         <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['stu_firstname'].' '.$row['stu_lastname']; ?></td>
            <td><?php echo $row['school']; ?></td>
            <td><?php echo $row['class']; ?></td>
            <td><?php echo $row['stu_sex']; ?></td>
            <td><?php echo $row['par_firstname'].' '.$row['par_lastname']; ?></td>
            <td><?php echo $row['occupation']; ?></td>
            <td>
              <form action="profile.php" method="POST">
                <input type="hidden" name="profile_id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="profile_btn" class="btn btn-success btn-sm"><i class="fas fa-user-edit fa-sm"></i></button>
              </form>
            </td>
         </tr>
         <?php
       }
      }else{
       echo '<h6 class="text-danger">No prospective Student</h6>';
      }

      ?>
      </tbody>
      
    </table>

    </div>
  </div>
</div>

<?php 
include('inc/script.php');
include('inc/footer.php');
 ?>
<script type="text/javascript" src="inc/vendor/datatables/DataTables-1.10.20/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="inc/vendor/datatables/DataTables-1.10.20/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){
  $('#datatable').DataTables({
     "ajax" : "applicatiobs.php"
  });
})
</script>
