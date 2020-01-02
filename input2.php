<?php

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'adminpanel');

if(isset($_POST['import'])){
 if($_FILES['file']['name']){
  $filename=explode(".", $_FILES['file']['name']);
  if($filename[1]== 'csv'){
   $handle=fopen($_FILES['file']['tmp_name'], "r");
   while($data = fgetcsv($handle)){
    $item1=mysqli_real_escape_string($con, $data[0]);
    $item2=mysqli_real_escape_string($con, $data[2]);
    $sql = "INSERT into subject (sub_code,sub_name) values('$item1','$item2')";
            mysqli_query($con, $sql);
   }
   fclose($handle);
   print "Import Done";
  }
 }
}