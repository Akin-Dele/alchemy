<?php 

session_start();

include('inc/db.php');
//include('security.php');
include('inc/header.php');
include('inc/navbar.php');

$query= "SELECT stu_sex, COUNT(*) number FROM student GROUP BY stu_sex";
    
$query_run= mysqli_query($con, $query);
$json=[];
$json2=[];
while($row = mysqli_fetch_array($query_run)){
  extract($row);
  $json[]=$stu_sex;
  $json2[]=(int)$number;
}

$active= "SELECT active, COUNT(*) num FROM teacher GROUP BY active";
    
$active_run= mysqli_query($con, $active);
$json=[];
$json2=[];
while($row = mysqli_fetch_array($active_run)){
  extract($row);
  $json3[]=$active;
  $json4[]=(int)$num;
}

$query= "SELECT stu_sex, COUNT(*) number FROM student GROUP BY stu_sex";
    
$query_run= mysqli_query($con, $query);
$json=[];
$json2=[];
while($row = mysqli_fetch_array($query_run)){
  extract($row);
  $json[]=$stu_sex;
  $json2[]=(int)$number;
}

?>



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

 <div class="row">
          <!-- Area Chart -->
    <div class="col-xl-12 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Students Admitted</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Dropdown Header:</div>
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </div>
        </div>
                 <!-- Card Body -->
     <div class="card-body">
        <div class="chart-area">
          <canvas id="myAreaChart"></canvas>
        </div>
      </div>
      </div>
    </div>
    </div>
 
  
          <!-- Content Row -->
          <div class="row">

            <!-- All Users -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">All Users</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php

                        $con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

                        $query = 'SELECT id FROM student ORDER BY id';
                        $query_run = mysqli_query($con, $query);
                        $row = mysqli_num_rows($query_run);
                         
                         echo $row;
                         ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Ministry Administrators-->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ministry Administrators</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                             $con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');
                              $query = "SELECT * FROM teacher ORDER BY id";
                              $query_run = mysqli_query($con, $query);
                              $usertype = mysqli_num_rows($query_run);
                              
                              echo $usertype;
                      ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- School Administratpr Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">School Administratpr</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                          <?php
                             $con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');
                              $query = "SELECT usertype FROM users WHERE usertype='schadmin'";
                              $query_run = mysqli_query($con, $query);
                              $usertype = mysqli_num_rows($query_run);
                              
                              echo $usertype;
                      ?>
                          </div>
                        </div>
                        <div class="col">
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Number of Teachers< Card -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Number of Teachers</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php
                             $con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');
                              $query = "SELECT * FROM teacher";
                              $query_run = mysqli_query($con, $query);
                              $usertype = mysqli_num_rows($query_run);
                              
                              echo $usertype;
                      ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

                   <!-- Content Row -->
                   <div class="row">

<!-- Students Card -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Students</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">
      <?php
                 $con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');
                  $query = "SELECT * FROM student WHERE is_student='0'";
                  $query_run = mysqli_query($con, $query);
                  $student = mysqli_num_rows($query_run);
                  
                  echo $student;
          ?>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- School Building Card -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">School Building</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">1,680
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-school fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- admission Card  -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Admission Requests</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">5,432
              </div>
            </div>
            <div class="col">
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Any Other item Card -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-warning shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Any Other item </div>
          <div class="h5 mb-0 font-weight-bold text-gray-800">
          <?php
                 $con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');
                  $query = "SELECT * FROM teacher";
                  $query_run = mysqli_query($con, $query);
                  $usertype = mysqli_num_rows($query_run);
                  
                  echo $usertype;
          ?>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-chart-pie fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<div class="row">

<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
  <div class="card shadow mb-4">
    <!-- Card Header - Dropdown -->
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
      <h6 class="m-0 font-weight-bold text-primary"> <i class="fas fa-user-graduate"></i> Student Population hy Gender</h6>
      <div class="dropdown no-arrow">
        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
          <div class="dropdown-header">Dropdown Header:</div>
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </div>
    </div>
    <!-- Card Body -->
    <div class="card-body">
      <div class="chart-pie pt-4 pb-2">
        <canvas id="myPieChart"></canvas>
      </div>
      <div class="mt-4 text-center small">
      <span class="mr-2">
          <i class="fas fa-circle text-success"></i> Male.
        </span>
        <span class="mr-2">
          <i class="fas fa-circle text-primary"></i> Female.
        </span>
      </div>
    </div>
  </div>
</div>
<!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"><span class="fas fa-chalkboard-teacher fw"></span> Teachers</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4 pb-2">
          <canvas id="myPieChartteach"></canvas>
        </div>
        <div class="mt-4 text-center small">
        <span class="mr-2">
            <i class="fas fa-circle text-success"></i> Active.
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-danger"></i> Inactive.
          </span>
        </div>
      </div>
    </div>
  </div>
  <!-- Pie Chart -->
<div class="col-xl-4 col-lg-5">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Student Population hy Gender</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
            <div class="dropdown-header">Dropdown Header:</div>
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-pie pt-4 pb-2">
          <canvas id="myPieChart"></canvas>
        </div>
        <div class="mt-4 text-center small">
        <span class="mr-2">
            <i class="fas fa-circle text-success"></i> Male.
          </span>
          <span class="mr-2">
            <i class="fas fa-circle text-primary"></i> Female.
          </span>
        </div>
      </div>
    </div>
  </div>
</div>





<?php 
include('inc/script.php');
include('inc/footer.php');
 ?>
 <script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: <?php echo json_encode($json); ?>,
    datasets: [{
      data: <?php echo json_encode($json2); ?>,
      backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 50,
  },
});


// Pie Chart Teachers
var ctx = document.getElementById("myPieChartteach");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: <?php echo json_encode($json3); ?>,
    datasets: [{
      data: <?php echo json_encode($json4); ?>,
      backgroundColor: ['red', '#1cc88a', '#36b9cc'],
      hoverBackgroundColor: ['#2c9faf', '#17a673', '#2c9faf'],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 50,
  },
});
</script>