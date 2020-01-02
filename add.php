<?php

session_start();

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

if(isset($_POST['create'])){
 
 $subname = mysqli_real_escape_string($con, $_POST['subname']);
 $subcode = mysqli_real_escape_string($con, $_POST['subcode']);

 $query= "INSERT INTO subject(sub_code,sub_name) VALUES('$subcode', '$subname')";

 $query_run = mysqli_query($con, $query);

 if($query_run){
  $_SESSION['success'] = 'Subject added';
  header('Location: subject.php');
 }else{
  $_SESSION['status']= 'Subject NOT added';
  header('Location: subject.php');
 }
}