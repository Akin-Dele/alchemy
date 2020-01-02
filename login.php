<?php
session_start();

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'adminpanel');

include('inc/header.php');


?>

<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

  <div class="col-xl-6 col-lg-6 col-md-6">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
  
            <div class="p-5">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="card-avatar mb-2 align-items-center">
                        <a href="#pablo">
                          <img class="img img-profile rounded-circle mx-auto d-block shadow" name="" src="img/loggo.png" width="150px," height="150px," alt="image"/>
                        </a>
                      </div>
                </div>
                <div class="col-md-1"></div>
              </div>
              <div class="text-center">
                <h1 class="h4 text-success mb-4">Login Here</h1>
              </div>
               
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
              <form action="code2.php" method="POST" class="user">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="username" placeholder="Enter username Address...">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-user" name="password" placeholder="Password">
                </div>
                <button type="submit" name="login_btn" class="btn btn-outline-success btn-user btn-block">
                  Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


<?php 
include('inc/script.php');
 ?>