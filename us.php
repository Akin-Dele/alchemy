<?php

session_start();

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

if(isset($_POST['secret'])){
 
 $title = mysqli_real_escape_string($con, $_POST['title']);
 $tip = mysqli_real_escape_string($con, $_POST['tip']);
 $attended = mysqli_real_escape_string($con, $_POST['attended']);

 $query= "INSERT INTO anonymous(title,issue, attended) VALUES ('$title', '$tip', '$attended')";

 $query_run = mysqli_query($con, $query);

 if($query_run){
  $_SESSION['success'] = 'Message Submitted';
  header('Location: anonymous.php');
 }else{
  $_SESSION['status']= 'Message NOT Submitted';
  header('Location: anonymous.php');
 }
}

if(isset($_POST['close'])){
 
 $id_view = mysqli_real_escape_string($con, $_POST['id_view']);
 $title_view = mysqli_real_escape_string($con, $_POST['title_view']);
 $issue_view = mysqli_real_escape_string($con, $_POST['issue_view']);
 $attended = mysqli_real_escape_string($con, $_POST['attended']);

 $sql= "UPDATE anonymous SET title='$title_view',issue='$issue_view',attended='$attended' WHERE id='$id_view'";

 $sql_run = mysqli_query($con, $sql);

 if($sql_run){
  $_SESSION['success'] = 'Issue Updated';
  header('Location: anonymous.php');
 }else{
  $_SESSION['status']= 'Issue NOT Updated';
  header('Location: anonymous.php');
 }
}