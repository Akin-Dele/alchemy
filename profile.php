<?php


include('security.php');
include('inc/header.php');
include('inc/navbar.php');
?>

<body class="">
  <div class="wrapper ">

    <div class="main-panel">

      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" href="#description" role="tab" aria-controls="description" aria-selected="true">Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="#history" role="tab" aria-controls="history" aria-selected="false">Academics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#deals" role="tab" aria-controls="deals" aria-selected="false">Affective Domain</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
           <div class="tab-content mt-3">
            <div class="tab-pane active" id="description" role="tabpanel">
            <?php

          $con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

              if(isset($_POST['profile_btn'])){
                $id = $_POST['profile_id'];
              
                $query = "SELECT * FROM student WHERE id ='$id'";
                $query_run = mysqli_query($con, $query);

                foreach($query_run as $row){
            ?>
          <form method="POST" action="code2.php" enctype="multipart/form-data">
          <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
          <div class="col-md-12">
              <div class="card card-profile mx-auto shadow mb-5 align-items-center">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img img-profile rounded-circle shadow mb-5" name="edit_stuImage" src="upload/<?php echo $row['stu_image']; ?>" width="150px," height="150px," alt="image"/>
                  </a>
                </div>
                <div class="card-body py-3 align-items-center justify-content-between">
                 <h6 class="card-category text-gray"></h6>
                  <h4 class="card-title"></h4>
                </div>
              </div>
            </div>
            <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h3> Student Details </h3>
                  </div>
                  <div class="card-body">
                      <div class="row">
                        <div class="col-md-4 mb-3">
                          <label for="firstName">First name</label>
                          <input type="text" class="form-control" id="firstName" name="edit_firstName" placeholder="Enter First Name" value="<?php echo $row['stu_firstname']; ?>" required>
                          <div class="invalid-feedback">
                            Valid first name is required.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="middleName">Middle name</label>
                          <input type="text" class="form-control" id="middleName" name="edit_middleName" placeholder="Enter Middle Name" value="" >
                          <div class="invalid-feedback">
                            Valid first name is required.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="lastName">Last name</label>
                          <input type="text" class="form-control" id="lastName" name="edit_lastName" placeholder="Enter Last Name" value="<?php echo $row['stu_lastname']; ?>">
                          <div class="invalid-feedback">
                            Valid last name is required.
                          </div>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="email"> Phone Number <span class="text-muted">(Required)</span></label>
                          <input type="number" class="form-control" id="phonenumber" placeholder="01223454569" value="<?php echo $row['stu_phone1']; ?>" name="edit_stuPhone1">
                          <div class="invalid-feedback">
                            Please enter a valid primary phone number.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="email"> Phone Number <span class="text-muted">(Optional)</span></label>
                          <input type="number" class="form-control" id="phonenumber" placeholder="01223454569" name="edit_stuPhone2" value="<?php echo $row['stu_phone2']; ?>">
                          <div class="invalid-feedback">
                            Please enter a valid secondary phone number.
                          </div>
                        </div>
                      </div>
                      <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="stuEmail">Email</label>
                        <input type="email" class="form-control" name="edit_stuEmail" id="stuEmail" placeholder="you@example.com" value="<?php echo $row['stu_email']; ?>">
                        <div class="invalid-feedback">
                          Please enter a valid email address.
                        </div>
                      </div>
                        <div class="col-md-6 mb-3">
                          <label for="religion">Religion</label>
                          <input type="text" class="form-control" value="<?php echo $row['religion']; ?>" name="edit_religion" id="religion">
                        </div>
                      </div>
        
                      <div class="mb-3">
                        <label for="stuAdd1">Address</label>
                        <input type="text" class="form-control" name="edit_stuAdd1" id="stuAdd1" placeholder="1234 Main St" value="<?php echo $row['stu_add1']; ?>">
                        <div class="invalid-feedback">
                          Please enter your Home address.
                        </div>
                      </div>
        
                      <div class="mb-3">
                        <label for="stuAd2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" name="edit_stuAd2" value="<?php echo $row['stu_add2']; ?>"id="stuAd2" placeholder="Alternate Address">
                      </div>
        
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="stuState">State</label>
                          <select class="custom-select d-block w-100" id="stuState" value="<?php echo $row['stu_state']; ?>"name="edit_stuState" required>
                            <option value="Lagos">Lagos</option>
                          </select>
                          <div class="invalid-feedback">
                            Please select a valid state.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="stuLGA">Local Government</label>
                          <input value="<?php echo $row['stu_locgov']; ?>" type="text" class="form-control" id="stuLGA" name="edit_stuLGA">
                          <div class="invalid-feedback">
                            Please provide a valid state.
                          </div>
                        </div>
                      </div>
                      <hr class="mb-4">
                      <div class="row">
                          <div class="mb-3 col-md-4">
                              <label for="date">Date Of Birth <span class="text-muted">(Mandatory)</span></label>
                              <input type="text" class="form-control" id="date" name="edit_date" value="<?php echo $row['stu_dob']; ?>">
                            </div>
                            <div class="col-md-4 mb-3">
                                <div class="form-group">
                                  <label for="stuBlood"> Blood Group </label>
                                  <input type="text" class="form-control" id="stuBlood" value="<?php echo $row['stu_bg']; ?>" name="edit_stuBlood">
                                </div>
                              </div>
                              <div class="col-md-4 mb-3">
                                  <div class="form-group">
                                    <label for="sex">Gender </label>
                                    <input type="text" class="form-control" value="<?php echo $row['stu_sex']; ?>" id="sex" name="edit_sex">
                                    </select>
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
                        <div class="col-md-4 mb-3">
                          <label for="firstName">First name</label>
                          <input type="text" class="form-control" placeholder="" value="<?php echo $row['par_firstname']; ?>"name="edit_parFirstName">
                          <div class="invalid-feedback">
                            Valid first name is required.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="firstName">Middle name</label>
                          <input type="text" class="form-control" placeholder="" value="" name="parMiddleName">
                          <div class="invalid-feedback">
                            Valid first name is required.
                          </div>
                        </div>
                        <div class="col-md-4 mb-3">
                          <label for="lastname">Last name</label>
                          <input type="text" class="form-control" name="edit_parlastName" placeholder="" value="<?php echo $row['par_lastname']; ?>">
                          <div class="invalid-feedback">
                            Valid last name is required.
                          </div>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="parPhone1"> Phone Number <span class="text-muted">(Required)</span></label>
                          <input type="number" class="form-control" name="edit_parPhone1" placeholder="01223454569" value="<?php echo $row['par_phone1']; ?>">
                          <div class="invalid-feedback">
                            Please enter a valid primary phone number.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="parPhone2"> Phone Number <span class="text-muted">(Optional)</span></label>
                          <input type="number" class="form-control" name="edit_parPhone2" value="<?php echo $row['par_phone2']; ?>" placeholder="01223454569">
                          <div class="invalid-feedback">
                            Please enter a valid secondary phone number.
                          </div>
                        </div>
                        </div>
                     <div class="col-md-6 mb-3 form-group">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input type="email" class="form-control" name="edit_parEmail" placeholder="you@example.com" value="<?php echo $row['par_email']; ?>">
                        <div class="invalid-feedback">
                          Please enter a valid email address.
                        </div>
                      </div>
        
                      <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="edit_parAdd1" placeholder="1234 Main St" value="<?php echo $row['par_add1']; ?>">
                        <div class="invalid-feedback">
                          Please enter your Home address.
                        </div>
                      </div>
        
                      <div class="mb-3">
                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control"  name="edit_parAdd2" placeholder="Alternate Address" value="<?php echo $row['par_add2']; ?>">
                      </div>
        
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <label for="country">State </label>
                          <select class="custom-select d-block w-100" value="<?php echo $row['par_state']; ?>"name="edit_parState">
                            <option> Lagos </option>
                           </select>
                          <div class="invalid-feedback">
                            Please select a valid state.
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="state">Local Government</label>
                          <input type="text" class="form-control" name="edit_parLGA" value="<?php echo $row['par_locgov']; ?>">
                          <div class="invalid-feedback">
                            Please provide a valid state.
                          </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="mb-3 col-md-6">
                              <label for="occupation"> Occupation </label>
                              <input type="text" class="form-control" value="<?php echo $row['occupation']; ?>" name="edit_occupation" id="occupation">
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                  <label for="bloodGroup"> Blood Group </label>
                                  <input type="text" class="form-control" id="bloodGroup" value="<?php echo $row['par_bg']; ?>" name="edit_parBlood">
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
                          <label for="school"> Set School</label>
                          <input type="text" class="form-control" value="<?php echo $row['school']; ?>" name="edit_school">
                        </div>
                        </div>
        
                        <div class="col-md-6 mb-3">
                          <div class="form-group">
                            <label for="exampleFormControlSelect1"> Set Class</label>
                            <input class="form-control" value="<?php echo $row['class']; ?>" name="edit_class">
                          </div>
                          </div>
                      </div>
        
                        <div class="form-group">
                          <label for="statement">Breifly state Why the State should grant my Admission Request</label>
                          <textarea class="form-control" id="statement" value="" name="edit_statement" rows="2"><?php echo $row['statement']; ?></textarea>
                        </div>
                        <div class="row">
                          <div class="col-md-4 mb-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Department</label>
                            <select class="custom-select" name="edit_department" value="<?php echo $row['stu_department']; ?>">
                              <option selected>Choose...</option>
                              <option value="orimary">Primary</option>
                              <option value="Art">Art</option>
                              <option value="Commercial">Commercial</option>
                              <option value="Science">Science</option>
                            </select>
                          </div>
                          </div>
                          <div class="col-md-4 mb-3">
                              <div class="form-group">
                                <label class="bmd-label-floating">Section</label>
                                  <select class="custom-select" value="<?php echo $row['section']; ?>" name="edit_section">
                                    <option selected>Choose...</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                  </select>
                                </div>
                                </div>
                          <div class="col-md-4 mb-3">
                              <div class="form-group">
                                <label class="bmd-label-floating">Admission</label>
                                  <select class="custom-select" value="<?php echo $row['is_studentt']; ?>" name="edit_admit">
                                    <option selected>Choose...</option>
                                    <option value=1>Grant</option>
                                    <option value=0>Deny</option>
                                  </select>
                                </div>
                                </div>
                      </div>
                      <button type="submit" name="update_btn" class="btn btn-outline-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
               </form>
               <?php
                    }
                }
                ?>
                </div>

                    <div class="tab-pane" id="history" role="tabpanel" aria-labelledby="history-tab">
                    </div>
                    <div class="tab-pane" id="deals" role="tabpanel" aria-labelledby="deals-tab">
                      </div>
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
include('inc/footer.php');
 ?>
