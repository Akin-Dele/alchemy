<?php

session_start();

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

if(isset($_POST['application'])){

 $firstName = $_POST['firstName'];
 $lastName = $_POST['lastName'];
 $stuPhone1 =$_POST['stuPhone1'];
 $stuPhone2 = $_POST['stuPhone2'];
 $stuEmail = $_POST['stuEmail'];
 $stuAdd1 = $_POST['stuAdd1'];
 $stuAdd2 = $_POST['stuAdd2'];
 $stuState =$_POST['stuState'];
 $stuLGA =$_POST['stuLGA'];
 $stuImage =$_FILES["stuImage"]['name'];
 $date = $_POST['date'];
 $stuBlood = $_POST['stuBlood'];
 $sex = $_POST['sex'];
 $parFirstName =$_POST['parFirstName'];
 $parlastName = $_POST['parlastName'];
 $parPhone1 = $_POST['parPhone1'];
 $parPhone2 = $_POST['parPhone2'];
 $parEmail =$_POST['parEmail'];
 $parAdd1 = $_POST['parAdd1'];
 $parAdd2 = $_POST['parAdd2'];
 $parState =$_POST['parState'];
 $parLGA = $_POST['parLGA'];
 $occupation = $_POST['occupation'];
 $parBlood =$_POST['parBlood'];
 $school = $_POST['school'];
 $class = $_POST['class'];
 $statement = $_POST['statement'];
 $isStudent = $_POST['isStudent'];
 $religion = $_POST['religion'];
 $bank = $_POST['bank'];

if(file_exists("upload/".$stuImage = $_FILES["stuImage"]['name'])){
  $store= $_FILES["stuImage"]['name'];
  $_SESSION['status']= "Image already Exists '.$store.'";
  header('Location: admission.php');
}else{
      $query = "UPDATE student SET stu_phone2='$stuPhone2',stu_email='$stuEmail',stu_add1='$stuAdd1',stu_add2='$stuAdd2',stu_state='$stuState',stu_locgov='$LGA', stu_image='$stuImage',stu_DOB='$date',stu_BG='$stuBlood',stu_sex='$sex',par_firstName='$parFirstName',par_lastName='$parlastName',par_phone1='$parPhone1',par_phone2='$parPhone2',par_email='$parEmail',par_add1='$parAdd1',par_add2='$parAdd2',par_state='$parState',par_locgov='$parLGA',occupation='$occupation',par_BG='$parBlood',school='$school',class='$class',section='$section',statement='$statement',is_student='$admit',reg_date=now(),stu_department='$department',religion='$religion' WHERE bank='$bank'";

    $query_run = mysqli_query($con, $query);
    if($query_run){
    move_uploaded_file($_FILES["stuImage"]['tmp_name'], "upload/".$_FILES["stuImage"]['name']);
     $_SESSION['success'] = 'Admission Request Submitted';
     header('Location: admission.php');
    }else{
     $_SESSION['status']= 'Admission Request NOT Submitted';
     header('Location: admission.php');
    }
  }
}
?>
