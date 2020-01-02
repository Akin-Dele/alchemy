<?php

session_start();

include('inc/header.php');
include('inc/navbar.php');


?>
<div class="container">
<?php
    $con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

    if(isset($_POST['issue'])){
      $id = $_POST['issue_id'];
    
      $query = "SELECT * FROM anonymous WHERE id ='$id'";
      $query_run = mysqli_query($con, $query);

      foreach($query_run as $row){
  ?>
  <form class="needs-validation" method="post" action="us.php">
  <input type="hidden" name="id_view" value="<?php echo $row['id']; ?>">
      <div class="card-body shadow mb-4 py-3">
    <div class="row">
      <div class="col-md-6 mb-3">
          <label for="title">Title</label>
          <input type="text" class="form-control" value="<?php echo $row['title']; ?>" name="title_view" >
       </div>
     </div>
    <div class="form-group">
        <textarea name="issue_view" class="form-control" placeholder="Your anonymous tip" style="width: 100%; height: 150px;" value="<?php echo $row['issue']; ?>"></textarea>
    </div>
    <div class="col-md-6 mb-3">
                <div class="form-group">
                  <label for="school"> Select School</label>
                  <select class="form-control" name="attended" value="<?php echo $row['attended']; ?>">
                    <option value="0">Unattended</option>
                    <option value="1">Attended</option>
                  </select>
                </div>
                </div>
    <button type="submit" name="close" class="btn btn-outline-success btn-user btn-block">Submit Anonymously
    </button>
  </div>
  </form>
  <?php
      }
      }
      ?>
</div>
</div>

  
<?php 
include('inc/script.php');
include('inc/footer.php');
 ?>
