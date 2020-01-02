
<?php

session_start();

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

  if(isset($_POST['create'])){

    $firstname =mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $email =mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $images = $_FILES["images"]['name'];
    $usertype = mysqli_real_escape_string($con, $_POST['usertype']);
   
   }
   
   if(file_exists("users/".$images = $_FILES["images"]['name'])){
     $store= $_FILES["images"]['name'];
     $_SESSION['status']= "Image already Exists '.$store.'";
     header('Location: create.php');
   }else{
         $query = "INSERT INTO users(first_name, last_name, email, password, image, usertype, date) VALUES ('$firstname', '$lastname', '$email', md5('$password'), '$images', '$usertype', now())";
   
       $query_run = mysqli_query($con, $query);
   
       if($query_run){
       move_uploaded_file($_FILES["images"]['tmp_name'], "users/".$_FILES["images"]['name']);
        $_SESSION['success'] = 'User created';
        header('Location: create.php');
       }else{
        $_SESSION['status']= 'User NOT created';
        header('Location: create.php');
       }
     }
?>
