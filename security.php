<?php

session_start();

include('inc/db.php');

/*if($db){
 echo 'Database connected';
}else{
header('Location: inc/db.php');
}


if($_SESSION['usertype'] !='admin'){
 header('Location: login.php');
}
*/

if(!$_SESSION['first_name']){
 header('Location: login.php');
}

//var_dump($_SESSION);

