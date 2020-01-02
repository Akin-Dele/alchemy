<?php

include('inc/header.php');

?>

  <body>
    <div class="container bg-white">
        <header class="text-center">
            <img src="img/loggo.png" class="img_logo" width="200px," height="200px," alt="image">
              <h3>Lagos State Ministry of Education</h3>
              <h6>Terminal Report Sheet</h6>
            </header>
             <div class="container">

              <?php 

$con = mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

if(isset($_POST['check'])){

  $admiss=mysqli_real_escape_string($con, $_POST['admiss']);

  $query= "SELECT * FROM student WHERE stu_firstname='$admiss'";

  $query_run= mysqli_query($con, $query);
  

              ?>
     <h5> Student Details </h5
     <?php
      if(mysqli_num_rows($query_run) > 0){
        while ($row = mysqli_fetch_array($query_run)){
         ?>
 
      <table border="1">
      <tr >
      <td colspan="2" align="center"><strong><?php echo $row['stu_firstname'].' '.$row['stu_lastname']; ?></strong></td>
      <tr>
      <td colspan="2" align="center"><strong><?php echo $row['stu_phone1']; ?></strong></td>
      </tr>
      </tr>
      <td colspan="2" align="center"><input type="submit" value="submit"></td>
      </tr>
      </table>
    
    <section>
        <h6>Edu Graphs</h6>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body row">
                  <div class="box">
                      <div class="chart" data-percent="97"><span class="counter">97</span><span>%</span></div>
                  </div>
                </div>
            </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-white">
                    <div class="card-body row">
                        <div class="box">
                            <div class="chart" data-percent="93"><span class="counter">93</span><span>%</span></div>
                        </div>
                </div>
            </div>
            </div>
          </div>
    </section>
    <br>

        <div class=" container text-center">
        <div class="table-responsive">
          <table class="display table table-striped table-bordered table-sm" id="datatable" width="100%" cellspacing="0">
            <thead class="bg-success text-white">
              <tr>
                <th>Code</th>
                <th>Subject</th>
                <th>CA 1</th>
                <th>CA 2</th>
                <th>CA 3</th>
                <th>Exam</th>
                <th>Total</th>
                <th>Grade</th>
                <th>Remarks</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>001</td>
                <td>Mathematics</td>
                <td>10</td>
                <td>10</td>
                <td>10</td>
                <td>67 </td>
                <td>97</td>
                <td>97</td>
                <td>Excellent</td>
        </tr>
            <?php
              }
             }else{
              echo '<h6 class="text-danger">No record found</h6>';
             }
            }
             ?>
            </tbody>
          </table>
        </div>
        <section>
          <h6>Edu Graphs</h6>
          <div class="row">
              <div class="col-md-6">
                  <div class="card">
                      <div class="card-header main-color-bg">
                        Session Performance Trend Line
                      </div>
                      <div class="card-body row">
                    <canvas id="myResultLine" style="max-width: 250px;"></canvas>
                  </div>
              </div>
              </div>
              <div class="col-md-6">
                  <div class="card bg-white">
                      <div class="card-header main-color-bg">
                        Bar Chart
                      </div>
                      <div class="card-body row">
                    <canvas id="myResultBar"></canvas>
                  </div>
              </div>
              </div>
            </div>
      </section>
       </div>

                     
      </div>

      <?php 
include('inc/script.php');
include('inc/footer.php');
 ?>
<script src="jquery.easypiechart.js"></script>
<script>
  $(function() {
      $('.chart').easyPieChart({
          size: 120,
          barColor: '#17d3e6',
          scaleColor: false,
          lineWidth: 6,
          lineCap: 'circle',
          animate: ({ duration: 4000, enabled: true })});
  });
</script>
<script src="jquery.counterup.min.js"></script>
<script src="jquery.waypoints.min.js"></script>
<script>
  $('.counter').counterUp({
  delay: 10,
  time: 2000
  });

</script>
