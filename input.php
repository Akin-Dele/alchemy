<?php 

include('security.php');
include('inc/header.php');
include('inc/navbar.php');


$con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

if(isset($_POST['submit'])){
 if($_FILES['file']['name']){
  $filename=explode(".", $_FILES['file']['name']);
  if($filename[1]== 'csv'){
   $handle=fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle)){
    $item1=mysqli_real_escape_string($con, $data[0]);
    $item2=mysqli_real_escape_string($con, $data[1]);
    $sql = "INSERT into subject (sub_code,sub_name) values('$item1','$item2')";
            mysqli_query($con, $sql);
   }
   fclose($handle);
   print "Import Done";
  }
 }
}


if(isset($_POST['exam'])){
  if($_FILES['examfile']['name']){
   $filename=explode(".", $_FILES['examfile']['name']);
   if($filename[1]== 'csv'){
    $hand=fopen($_FILES['examfile']['tmp_name'], "r");
    while($emapData = fgetcsv($hand)){
     $item1=mysqli_real_escape_string($con, $emapData[0]);
     $item2=mysqli_real_escape_string($con, $emapData[1]);
     $item3=mysqli_real_escape_string($con, $emapData[2]);
     $item4=mysqli_real_escape_string($con, $emapData[3]);
     $item5=mysqli_real_escape_string($con, $emapData[4]);
     $item6=mysqli_real_escape_string($con, $emapData[5]);
     $item7=mysqli_real_escape_string($con, $emapData[6]);
     $item8=mysqli_real_escape_string($con, $emapData[7]);
     $item9=mysqli_real_escape_string($con, $emapData[8]);
     $item10=mysqli_real_escape_string($con, $emapData[9]);
     $item11=mysqli_real_escape_string($con, $emapData[10]);
     $item12=mysqli_real_escape_string($con, $emapData[11]);

     $sql = "INSERT INTO result(stu_id, sub_id, contass1, contass2, contass3, exam, total, obtainable, grade, remarks, term, session) VALUES ('$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8','$item9','$item10','$item11','$item12')";
             mysqli_query($con, $sql);
    }
    fclose($hand);
    print "Import Done";
   }
  }
 }



?>
<div class="row">
<div class="col-md-6 card shadow mb-4">
            <div class="card-header py-3">
              <h3> Subject Upload</h3>
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
            <div class="card-body">
            <form enctype="multipart/form-data" method="post" action="">
               <div class="col-md-12 mb-3">
                 <div class="form-group">
                   <label for="csvfile">Import CSV file</label>
                   <input type="file" class="form-control-file" id="file" name="file">
                 </div>
               </div>
              <input class="btn round btn-outline-success btn-block" value="Upload" name="submit" type="submit">
             </form>
            </div>
        </div>
        <div class="col-md-6">
          <div class="col-md-12 card shadow mb-4">
            <div class="card-header py-3">
              <h3> Exam Scores Upload</h3>
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
            <div class="card-body">
            <form enctype="multipart/form-data" method="post" action="">
               <div class="col-md-12 mb-3">
                 <div class="form-group">
                   <label for="csvfile">Import CSV file</label>
                   <input type="file" class="form-control-file" id="examfile" name="examfile">
                 </div>
               </div>
              <input class="btn round btn-outline-success btn-block" value="Upload" name="exam" type="submit">
             </form>
            </div>
        </div>
        </div>
       </div>

<?php 
include('inc/script.php');
include('inc/footer.php');
 ?>