<?php

session_start();

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

     if(isset($_POST['form'])){

      $firstname=mysqli_real_escape_string($con, $_POST['firstname']);
      $pass=mysqli_real_escape_string($con, $_POST['pass']);
      $lastname=mysqli_real_escape_string($con, $_POST['lastname']);
      $phone=mysqli_real_escape_string($con, $_POST['phone']);
  
      $query= "SELECT * FROM student WHERE stu_firstname='$firstname' AND stu_lastname='$lastname' AND stu_phone1='$phone' AND bank='$pass' LIMIT 1";
  
      $query_run= mysqli_query($con, $query);
      
      if(mysqli_fetch_array($query_run)){
          $_SESSION['stu_firstname']= $firstname;
          $_SESSION['stu_lastname']= $lastname;
          $_SESSION['stu_phone1']= $phone;
          $_SESSION['bank']= $pass;
          header('Location: admission.php');
      }else{
          $_SESSION['status']= '<h6 class="text-danger">Name or Bank Code is incorrect</h6>';
          header('Location: signin.php');
              }
      }

?>