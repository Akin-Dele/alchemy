<?php

session_start();

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');


?>


<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link href="inc/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
 <link href="css/sb-admin-2.min.css" rel="stylesheet">
 <link rel="stylesheet" href="css/admiss.css">
 <link rel="shortcut icon" href="css/favcon/loggo.ico">
 <title>Admission Form</title>
</head>

<body>

    <header class="text-center">
        <h1 class="m-0 font-weight-bold text-success">The Lagos State</h1>
        <h4 class="m-0 font-weight-bold text-center text-success">Ministry of Education</h4>
        <p> The Citadel of Knowledge </p>
        </header>

        <div class="container">

            <div class="py-3 text-center">
                <h4 class="m-0 font-weight-bold text-success">Admission Form</h4>
            </div>

     <form method="POST" action="code.php" enctype="multipart/form-data" class="needs-validation" >

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
      <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h3> Student Details </h3>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="firstName">First name</label>
                  <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $_SESSION['stu_firstname']; ?>" disabled>
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="lastName">Last name</label>
                  <input type="text" class="form-control" id="lastName" value="<?php echo $_SESSION['stu_lastname']; ?>" name="lastName" placeholder="Enter Last Name" disabled>
                  <div class="invalid-feedback">
                    Valid last name is required.
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="stuphone1"> Phone Number <span class="text-muted">(Required)</span></label>
                  <input type="number" class="form-control" id="stuphone1" placeholder="01223454569" value="<?php echo $_SESSION['stu_phone1']; ?>" name="stuPhone1" disabled>
                  <div class="invalid-feedback">
                    Please enter a valid primary phone number.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="stuphone2"> Phone Number <span class="text-muted">(Optional)</span></label>
                  <input type="number" class="form-control" id="stuphone2" placeholder="01223454569" name="stuPhone2">
                  <div class="invalid-feedback">
                    Please enter a valid secondary phone number.
                  </div>
                </div>
              </div>
              <div class="row">
              <div class="col-md-6 mb-3">
                <label for="stuEmail">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" name="stuEmail" id="stuEmail" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Please enter a valid email address.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                  <label for="religion">Religion</label>
                  <select class="custom-select d-block w-100" value="" name="religion" id="religion">
                            <option>Choose Religion</option>
                            <option>Christian</option>
                            <option>Muslim</option>
                            <option>Traditional</option>
                        </select>
                </div>
              </div>

              <div class="mb-3">
                <label for="stuAdd1">Address</label>
                <input type="text" class="form-control" name="stuAdd1" id="stuAdd1" placeholder="1234 Main St">
                <div class="invalid-feedback">
                  Please enter your Home address.
                </div>
              </div>

              <div class="mb-3">
                <label for="stuAdd2">Address 2 <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control" name="stuAdd2" id="stuAdd2" placeholder="Alternate Address">
              </div>

              <div class="row">
                <div class="col-md-5 mb-3">
                  <label for="stuState">State </label>
                  <select class="custom-select d-block w-100" id="stuState" name="stuState" required>
                    <option value="Lagos">Lagos</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid state.
                  </div>
                </div>
                <div class="col-md-4 mb-3">
                  <label for="stuLGA">Local Government</label>
                  <select class="custom-select d-block w-100" id="stuLGA" name="stuLGA">
                    <option value="">Choose...</option>
                    <option>Ikeja</option>
                    <option> Dopemu </option>
                    <option> Alimosho </option>
                    <option> Lekki </option>
                    <option> Epe </option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                  <div class="form-group">
                    <label for="stuImage">Upload Passport</label>
                    <input type="file" class="form-control-file" id="stuImage" name="stuImage">
                  </div>
                </div>
              </div>
              <hr class="mb-4">
              <div class="row">
                  <div class="mb-3 col-md-4">
                      <label for="date">Date Of Birth <span class="text-muted">(Mandatory)</span></label>
                      <input type="date" class="form-control" id="date" name="date" placeholder="DD/MM/YY">
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                          <label for="stuBlood"> Blood Group </label>
                          <select class="form-control" id="stuBlood" name="stuBlood">
                            <option>... Select Blood Group</option>
                            <option>O+</option>
                            <option>O-</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4 mb-3">
                          <div class="form-group">
                            <label for="sex"> Sex </label>
                            <select class="form-control" id="sex" name="sex">
                              <option>... Select Sex</option>
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
      </div>
      <br>
      <div class="card shadow mb-4">
         <div class="card-header py-3">
            <h3> Parent Details </h3>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="parFirstName">First name</label>
                  <input type="text" class="form-control" placeholder="" name="parFirstName">
                  <div class="invalid-feedback">
                    Valid first name is required.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="parlastName">Last name</label>
                  <input type="text" class="form-control" name="parlastName" placeholder="" value="">
                  <div class="invalid-feedback">
                    Valid last name is required.
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="parPhone1"> Phone Number <span class="text-muted">(Required)</span></label>
                  <input type="number" class="form-control" name="parPhone1" placeholder="01223454569" value="">
                  <div class="invalid-feedback">
                    Please enter a valid primary phone number.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="parPhone2"> Phone Number <span class="text-muted">(Optional)</span></label>
                  <input type="number" class="form-control" name="parPhone2" placeholder="01223454569">
                  <div class="invalid-feedback">
                    Please enter a valid secondary phone number.
                  </div>
                </div>
                </div>
             <div class="col-md-6 mb-3 form-group">
                <label for="parEmail">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" name="parEmail" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Please enter a valid email address.
                </div>
              </div>

              <div class="mb-3">
                <label for="parAdd1">Address</label>
                <input type="text" class="form-control" name="parAdd1" placeholder="1234 Oyingbo St">
                <div class="invalid-feedback">
                  Please enter your Home address.
                </div>
              </div>

              <div class="mb-3">
                <label for="parAdd2">Address 2 <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control"  name="parAdd2" placeholder="Alternate Address">
              </div>

              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="parState">State </label>
                  <select class="custom-select d-block w-100" name="parState">
                    <option value="">Choose...</option>
                    <option> Lagos </option>
                    
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid state.
                  </div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="parLGA">Local Government</label>
                  <select class="custom-select d-block w-100" name="parLGA">
                    <option value="">Choose...</option>
                    <option>Ikeja</option>
                    <option> Dopemu </option>
                    <option> Alimosho </option>
                    <option> Lekki </option>
                    <option> Epe </option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid state.
                  </div>
                </div>
              </div>
              <div class="row">
                  <div class="mb-3 col-md-6">
                      <label for="occupation"> Occupation </label>
                      <select class="custom-select d-block w-100" name="occupation" id="occupation">
                          <option value="">Choose Occuparion</option>
                          <option>Teacher</option>
                          <option> Doctor </option>
                          <option> Artisan </option>
                          <option> Trader </option>
                          <option> Banker </option>
                          <option> Servicemen </option>
                      </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                          <label for="parBlood"> Blood Group </label>
                          <select class="form-control" id="parBlood" name="parBlood">
                            <option>... Select Blood Group</option>
                            <option>O+</option>
                            <option>O-</option>
                            <option>A+</option>
                            <option>A-</option>
                            <option>B+</option>
                            <option>B-</option>
                            <option>AB+</option>
                            <option>AB-</option>
                          </select>
                        </div>
                      </div>
                    </div>
                 </div>
              </div>
            <br>
           <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h3> School Details </h3>
            </div>
            <div class="card-body">
                <div class="row">
                <div class="col-md-6 mb-3">
                <div class="form-group">
                  <label for="school"> Select School</label>
                  <select class="form-control" name="school">
                    <option>... Select School</option>
                    <option>Alimosho High</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                </div>

                <div class="col-md-6 mb-3">
                  <div class="form-group">
                    <label for="class"> Select Class</label>
                    <select class="form-control" name="class">
                        <option>... Select Class </option>
                      <option> Basic One</option>
                      <option>Basic Seven</option>
                      <option>Senior Secondary one</option>
                      <option>Senior Secondary Two</option>
                    </select>
                  </div>
                  </div>
              </div>

                <div class="form-group">
                  <label for="statement">Breifly state Why the State should grant my Admission Request <span class="text-danger">(Not more than 250 words)</span></label>
                  <textarea class="form-control" id="statement" name="statement" rows="3"></textarea>
                </div>

                <input type="hidden" name="isStudent" value=0 />
                <input type="hidden" name="bank" value="<?php echo $_SESSION['bank']; ?>" />

              <input class="btn btn-outline-success btn-block" name="application" type="submit">
            </div>
         </form>
        </div>


<footer id="footer" class="text-center"> 
    <p> &copy;2019 | Lagos State Ministry of Education </p> 
   </footer>
</div>

  <script src="css/jquery-3.4.1.min.js"></script>
  <script src="css/bootstrap.min.js"></script>
</body>
</html>