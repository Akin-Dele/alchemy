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

              if(isset($_POST['teacher_btn'])){
                $id = $_POST['teacher_id'];
              
                $query = "SELECT * FROM teacher WHERE id ='$id'";
                $query_run = mysqli_query($con, $query);

                foreach($query_run as $row){
            ?>
            <form action="employ.php" method="POST" enctype="multipart/form-data">
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
                              <div class="card card-profile mx-auto shadow mb-5 align-items-center">
                                <div class="card-avatar">
                                  <a href="#pablo">
                                    <img class="img img-profile rounded-circle shadow mb-5" name="edit_stuImage" src="upload/<?php echo $row['image']; ?>" width="150px," height="150px," alt="image"/>
                                  </a>
                                </div>
                            </div>
              
                         <div class="card-body">
                                 <div class="row">
                                  <div class="col-md-2">
                                    <div class="form-group">
                                            <label for="title">Title</label>
                                            <select class="form-control" id="title" name="title" value="<?php echo ['title']; ?>">
                                              <option>... Select Teachers' Title</option>
                                              <option>Mr</option>
                                              <option>Mrs</option>
                                              <option>Ms</option>
                                              <option>Dr</option>
                                              <option>Prof.</option>
                                              <option>Dame</option>
                                              <option>Sir</option>
                                            </select>
                                    </div>
                                  </div>
                                  <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $row['first_name']; ?>" required>
                                    </div>
                                    </div>
                                      <div class="col-md-5">
                                          <div class="form-group">
                                            <label for="subname">Last Name</label>
                                            <input type="lastname" class="form-control" name="lastname" value="<?php echo $row['last_name']; ?>" id="lastname" required>
                                          </div>
                                      </div>
                                    </div>
                                 <div class="row">
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone1">Phone Number</label>
                                        <input type="text" class="form-control" id="phone1" name="phone1" value="<?php echo $row['phone1']; ?>" required>
                                    </div>
                                    </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="phone2">Alternative Phone Number</label>
                                            <input type="number" class="form-control" name="phone2" value="<?php echo $row['phone2']; ?>" id="phone2" required>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>" id="email" required>
                                          </div>
                                      </div>
                                </div>
                              <div class="row">
                                  <div class="col-md-6 mb-3">
                                  <div class="form-group">
                                    <label for="address1">Address</label>
                                    <input type="text" class="form-control" name="address1" value="<?php echo $row['address']; ?>" placeholder="1234 Oyingbo St">
                                    <div class="invalid-feedback">
                                      Please enter your Home address.
                                    </div>
                                  </div>
                                  </div>
                                  <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                                        <input type="text" class="form-control"  name="address2" value="<?php echo $row['address_two']; ?>" placeholder="Alternate Address">
                                    </div>
                                  </div>
                                 </div>
                         </div>
                        </div>
                              <br>
                                <div class="card shadow mb-4">
                                 <div class="card-header py-3">
                                   <h3> File Uploads </h3>
                                 </div>
                             <div class="card-body">
                                     <div class="row">
                                     <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="image">Upload Passport</label>
                                            <input type="file" class="form-control-file" id="image" name="image">
                                          </div>
                                        </div>
                                     <div class="col-md-4 mb-3">
                                        <div class="form-group">
                                            <label for="certificate1">First Certificate</label>
                                            <input type="file" class="form-control-file" id="certificate1" name="certificate1" value="<?php echo $row['certificate_one']; ?>">
                                          </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="form-group">
                                                <label for="certificate2">Second Certificate</label>
                                                <input type="file" class="form-control-file" id="certificate2" name="certificate2" value="<?php echo $row['certificate_two']; ?>">
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
                                     <div class="col-md-3 mb-3">
                                     <div class="form-group">
                                       <label for="school"> Select School</label>
                                       <select class="form-control" name="school" value="<?php echo $row['school']; ?>">
                                         <option>... Select School</option>
                                         <option>Alimosho High</option>
                                         <option>Okoko Higher College</option>
                                         <option>3</option>
                                         <option>4</option>
                                         <option>5</option>
                                       </select>
                                     </div>
                                     </div>
                                     <div class="col-md-3 mb-3">
                                       <div class="form-group">
                                         <label for="level"> Select Level</label>
                                         <select class="form-control" name="level" value="<?php echo $row['level']; ?>">
                                             <option>... Select Level </option>
                                           <option>9</option>
                                           <option>10</option>
                                           <option>15</option>
                                         </select>
                                       </div>
                                       </div>
                                       <div class="col-md-3 mb-3">
                                          <div class="form-group">
                                            <label for="subject"> Subject</label>
                                            <select class="form-control" name="subject" value="<?php echo $row['sub_id']; ?>">
                                              <option>... Select Subject </option>
                                              <option>9</option>
                                              <option>Level 10</option>
                                              <option>Level 15</option>
                                            </select>
                                          </div>
                                          </div>
                                          <div class="col-md-3 mb-3">
                                              <div class="form-group">
                                                <label for="isactive"> Status</label>
                                                <select class="form-control" name="isactive">
                                                  <option value="1">Active</option>
                                                  <option value="0">Inactive</option>
                                                </select>
                                              </div>
                                              </div>
                </div>
                             <input type="submit" class="btn btn-outline-primary" name="employ" />
               
                                </div>
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
