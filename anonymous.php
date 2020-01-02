<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="css/admiss.css">
 <link rel="shortcut icon" href="css/favcon/loggo.ico">
 <title>Anonymous Message</title>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
          <a class="navbar-brand" href="landing_page.html"> <img src="img/logogo.png"></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="landing_page.html">Home </a>
              </li>
             
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  About Us
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">The Governor</a>
                  <a class="dropdown-item" href="#"> The Commissioner</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="school.html"> Schools </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admiss.html"> Admissions </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="checkresult.html"> Check Result </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html"> Contact Us <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Sign In
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="signin.html">Ministry Admin</a>
                  <a class="dropdown-item" href="signin.html"> School Admin</a>
                  <a class="dropdown-item" href="signin.html"> Students </a>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        
  <form class="needs-validation" method="post" action="us.php">
    <div class="row">
      <div class="col-md-6 mb-3">
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
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" placeholder="Enter Issue Title" name="title" required>
       </div>
     </div>
    <div class="form-group">
        <textarea name="tip" class="form-control" placeholder="Your anonymous tip" style="width: 100%; height: 150px;" required></textarea>
    </div>
    <input type="hidden" class="form-control" id="attended" name="attended" value="0">
    <button type="submit" name="secret" class="btn btn-outline-success btn-user btn-block">Submit Anonymously
    </button>
  </form>


 <footer id="footer"> 
  <p> &copy;2019 | Lagos State Ministry of Education </p> 
 </footer>
</div>

  

</body>
<script src="css/jquery-3.4.1.min.js"></script>
<script src="css/bootstrap.min.js"></script>
</html>