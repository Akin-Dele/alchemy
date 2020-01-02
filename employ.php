<?php

session_start();

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

if(isset($_POST['employ'])){
 
 $title = $_POST['title'];
 $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
 $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
 $phone1 = $_POST['phone1'];
 $phone2 =$_POST['phone2'];
 $email = mysqli_real_escape_string($con, $_POST['email']);
 $address1 = mysqli_real_escape_string($con, $_POST['address1']);
 $address2 = mysqli_real_escape_string($con, $_POST['address2']);
 $image = $_FILES["image"]['name'];
 $certificate1 = $_FILES["certificate1"]['name'];
 $certificate2 = $_FILES["certificate2"]['name'];
 $subject = $_POST['subject'];
 $school = $_POST['school'];
 $class = $_POST['class'];
 $isactive = $_POST['isactive'];

 if(file_exists("upload/".$image = $_FILES["image"]['name']) || file_exists("certificate1/".$certificate1 = $_FILES["certificate1"]['name']) || file_exists("certificate2/".$certificat2 = $_FILES["certificate2"]['name'])){
  $store= $_FILES["image"]['name'];
  $_SESSION['status']= "Files already Exists '.$store.'";
  header('Location: teach.php');
}else{

 $query= "INSERT INTO teacher(title,first_name,last_name,phone1,phone2,email,address,address_two,image,certificate_one,certificate_two,sub_id,school,level,active) VALUES ('$title', '$firstname','$lastname', '$phone1','$phone2', '$email', '$address1', '$address2', '$image', '$certificate1', '$certificate2', '$subject', '$school', '$level', '$isactive')";

 $query_run = mysqli_query($con, $query);
 if($query_run){
  move_uploaded_file($_FILES["image"]['tmp_name'], "upload/".$_FILES["image"]['name']);
  move_uploaded_file($_FILES["certificate1"]['tmp_name'], "certificate1/".$_FILES["certificate1"]['name']);
  move_uploaded_file($_FILES["certificate2"]['tmp_name'], "certificate2/".$_FILES["certificate2"]['name']);
   $_SESSION['success'] ='Teacher added';
   header('Location: teach.php');
  }else{
   $_SESSION['status']='Teacher NOT added';
   header('Location: teach.php');
  }
 }
}
?>