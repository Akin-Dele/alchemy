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
                <h1 class="h4 text-success mb-4">Check Reasult</h1>
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
              <form action="result.php" method="POST" class="user">
              <div class="row">
              <div class="col-md-6 mb-3">
                  <input type="text" class="form-control form-control-user" name="admiss" placeholder="Enter Admission Number ...">
                </div>
                <div class="col-md-6 mb-3">
                        <input type="password" class="form-control form-control-user" name="password" placeholder="Enter Bank Code">
                    </div>
              </div>
                <div class="row">
                   <div class="col-md-6 mb-3">
                  <select class="custom-select d-block w-100" value="" name="term" id="term">
                            <option value="1">1st Term</option>
                            <option value="2">2nd term</option>
                            <option value="3">3rd Term</option>
                        </select>
                  </div>
                  <div class="col-md-6 mb-3">
                  <select class="custom-select d-block w-100" value="" name="term" id="term">
                            <option value="2019">2019-2020</option>
                            <option value="2020">2020-2021</option>
                            <option value="2021">2021-2022</option>
                        </select>
                  </div>
                </div>
                <button type="submit" name="check" class="btn btn-outline-success btn-user btn-block">
                  Get Result</button>
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