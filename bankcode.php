<?php
session_start();

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

if(isset($_POST['send'])){
 
 $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
 $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
 $isStudent = $_POST['isStudent'];
 $phone = $_POST['phone'];
 $bank =$_POST['bank'];

 $query= "INSERT INTO student (stu_firstname, stu_lastname, stu_phone1, stu_phone2, stu_email, stu_add1, stu_add2, stu_state, stu_locgov, stu_image, stu_dob, stu_bg, stu_sex, par_firstname, par_lastname, par_phone1, par_phone2, par_email, par_add1, par_add2, par_state, par_locgov, occupation, par_bg, school, class, section, statement, is_student, reg_date, stu_department, religion, bank) VALUES ('$firstname','$lastname',$phone,'','','','','','','','','','','','','','','','','','','','','','','','','', $isStudent,now(),'','',$bank)";

 $query_run = mysqli_query($con, $query);

 if($query_run){
   $_SESSION['success'] ='Student Information Sent';
   header('Location: bank.php');
  }else{
   $_SESSION['status']='Student Information NOT Sent';
   header('Location: bank.php');
  }
 }

?>