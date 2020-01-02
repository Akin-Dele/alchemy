<?php

session_start();

include('inc/header.php');
include('inc/navbar.php');


?>

<div class="container-fluid">

<!-- Data tablesExamples -->
<div class="card shadow mb-4">
   <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Inactive Teachers</h6>
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

    $query= 'SELECT * FROM teacher WHERE active=0 ORDER BY id DESC';
    
    $query_run= mysqli_query($con, $query);
    ?>
    
    <table class="table table-striped table-bordered" id="datatable" width="100%" cellspacing="0">
      <thead class="bg-success text-white">
         <tr>
            <th>Id</th>
            <th>Teacher's Name</th>
            <th>Phone No</th>
            <th>School</th>
            <th>Subject</th>
            <th>Level</th>
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
            <td><?php echo $row['title'].' '.$row['first_name'].' '.$row['last_name']; ?></td>
            <td><?php echo $row['phone1']; ?></td>
            <td><?php echo $row['school']; ?></td>
            <td><?php echo $row['sub_id']; ?></td>
            <td><?php echo $row['level']?></td>
            <td>
              <form action="teacherprofile.php" method="POST">
                <input type="hidden" name="teacher_id" value="<?php echo $row['id']; ?>">
                <button type="submit" name="teacher_btn" class="btn btn-success btn-sm"><i class="fas fa-user-edit fa-sm"></i></button>
              </form>
            </td>
         </tr>
         <?php
       }
      }else{
       echo '<h6 class="text-danger">No Teachers found</h6>';
      }

      ?>
      </tbody>
    </table>

    </div>
  </div>
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