<?php

include('inc/header.php');
include('inc/script.php');

?>
 <link rel="stylesheet" type="text/css" href="inc/js/Result.css">

  <body>
    <div class="container bg-white">
        <header class="text-center">
            <img src="img/loggo.png"  width="150px," height="150px," alt="image" class="img_logo mb-3">
              <h3>Lagos State Ministry of Education</h3>
              <h6>Terminal Report Sheet</h6>
            </header>
             <div class="card">
             <?php 

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

             if(isset($_POST['check'])){

                  $admiss=mysqli_real_escape_string($con, $_POST['admiss']);

                  $query= "SELECT * FROM student WHERE id='$admiss'";

                  $query_run= mysqli_query($con, $query);
                  foreach($query_run as $row){
                ?>
              <h5> Student Details </h5>
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
              <div class="row">
              <div class="card-avatar">
                <a href="#pablo">
                  <img class="img img-profile rounded-circle shadow mb-5" name="edit_stuImage" src="upload/<?php echo $row['stu_image']; ?>" width="150px," height="150px," alt="image"/>
                </a>
              </div>
              <div class="col-md-9 mb-3">
                  <div class="row">
                      <div class="col-md-4 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" value="<?php echo $row['stu_firstname']; ?>" disabled>
                        <div class="invalid-feedback">
                          Valid first name is required.
                        </div>
                      </div>
              <div class="col-md-4 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" class="form-control" id="lastName" value="<?php echo $row['stu_lastname']; ?>" disabled>
                <div class="invalid-feedback">
                  Valid last name is required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                  <label for="email"> Phone Number </label>
                  <input type="number" class="form-control" id="phonenumber" value="<?php echo $row['stu_phone1']; ?>" disabled>
                  <div class="invalid-feedback">
                    Please enter a valid primary phone number.
                  </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" value="<?php echo $row['stu_email']; ?>" disabled>
                  </div>
                  <div class="col-md-5 mb-3">
                    <label for="school">School</label>
                    <input type="school" class="form-control" id="school" value="<?php echo $row['school']; ?>" disabled>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="class">Class/Section</label>
                    <input type="class" class="form-control" id="class" value="<?php echo $row['class'].' '.$row['section']; ?>" disabled>
                  </div>
            </div>
            <h6 class="text-success"></h6>
      </div>
    </div>
    <?php
                    }
                }
                ?>

                <div class="container text-center">
                  <div class="table-responsive">
                  <?php 
                    if(isset($_POST['check'])){
          
                      $admiss=mysqli_real_escape_string($con, $_POST['admiss']);
              
          
                    $con = mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');
          
                    $sql= "SELECT result.contAss1, result.contAss2, result.contAss3, result.exam, result.total, result.grade, result.remarks, subject.sub_code, subject.sub_name FROM result INNER JOIN subject ON subject.id = result.sub_id WHERE result.stu_id='$admiss' ORDER BY subject.id";
          
                    $sql_run= mysqli_query($con, $sql);
                  ?>
          
                    <table class="display table table-striped table-bordered table-sm" id="datatable" width="100%" cellspacing="0">
                      <thead class="bg-success text-white">
                        <tr>
                          <th>Subject Code</th>
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
                      <?php
                if(mysqli_num_rows($sql_run) > 0){
                 while ($row = mysqli_fetch_array($sql_run)){
                  ?>
          
                     <tr>
                      <td><?php echo $row['sub_code']; ?></td>
                      <td><?php echo $row['sub_name']; ?></td>
                      <td><?php echo $row['contAss1']; ?></td>
                      <td><?php echo $row['contAss2']; ?></td>
                      <td><?php echo $row['contAss3']; ?></td>
                      <td><?php echo $row['exam']; ?></td>
                      <td><?php echo $row['total']; ?></td>
                      <td><?php echo $row['grade']; ?></td>
                      <td><?php echo $row['remarks']; ?></td>
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
      <?php
      
$con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

if(isset($_POST['check'])){

     $admiss=mysqli_real_escape_string($con, $_POST['admiss']);

     $tot= "SELECT stu_id, SUM(total), SUM(obtainable), ROUND (SUM(total) * 100 / SUM(obtainable), 1) AS Percentage FROM result WHERE stu_id='$admiss' GROUP BY stu_id";

     $tot_run= mysqli_query($con, $tot);
     foreach($tot_run as $row){
   ?>
  
        <div class="row">
            <div class="col-md-3">
                <h6 class="text-success">Percentage</h6>
                <div class="card">
                    <div class="card-body row">
                  <div class="box">
                      <div class="chart" data-percent="<?php echo $row['Percentage']; ?>"><span class="counter"><?php echo $row['Percentage']; ?></span><span>%</span></div>
                  </div>
                </div>
            </div>
            <?php
          }
      }
      ?>
     
      <?php
      
      $con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');
      
      if(isset($_POST['check'])){
      
           $admiss=mysqli_real_escape_string($con, $_POST['admiss']);
      
           $tot= "SELECT stu_id, sum(total), SUM(obtainable) FROM result WHERE stu_id='$admiss' GROUP BY stu_id";
      
           $tot_run= mysqli_query($con, $tot);
           foreach($tot_run as $row){
         ?>
            <p class="text-success">Total : <?php echo $row['sum(total)']; ?><p>
         
            <p class="text-success">Obtainable : <?php echo $row['SUM(obtainable)']; ?><p>

                <?php
              }
          }
          ?>
            </div>
            <div class="col-md-9">
                <?php
                $con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');
                  
                  if(isset($_POST['check'])){
                  
                  $admiss=mysqli_real_escape_string($con, $_POST['admiss']);
                  
                    $skill= "SELECT handwriting,games,fluency,tools,workshop_performance,drawing_painting,crafts,music FROM psycho WHERE stu_id='$admiss'";
                
                    $skill_run= mysqli_query($con, $skill);
                    foreach($skill_run as $row){
                      ?>
                <h6 class="text-success">Psychomotor Skills</h6>
              <div class="card bg-white">
                  <div class="card-body row">
                <canvas id="myRadar" style="max-width: 700px; max-height: 600;"></canvas>
              </div>
          </div>

          <script>
            // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
Chart.defaults.global.animation.duration= 2000;
          // Radar Chart Example

var ctx = document.getElementById("myRadar").getContext("2d");;
var myRadar = new Chart(ctx, {
    type: 'radar',
    data: {
      labels: ["Handwriting","Games","Fluency","Tools Handling","Workshop Performance","Drawing/Painting","Crafts","Music"],
      datasets: [
        {
          label: "Skills",
          fill: true,
          backgroundColor: "rgba(179,181,198,0.2)",
          borderColor: "rgba(179,181,198,1)",
          pointBorderColor: "#fff",
          pointBackgroundColor: "rgba(179,181,198,1)",
          data: [<?php echo $row['handwriting']; ?>,<?php echo $row['games']; ?>,<?php echo $row['fluency']; ?>,<?php echo $row['tools']; ?>,<?php echo $row['workshop_performance']; ?>,<?php echo $row['drawing_painting']; ?>,<?php echo $row['crafts']; ?>,<?php echo $row['music']; ?>]
        }
      ]
    },
    options: {
      title: {
        display: false,
        text: ''
      }
    }
});
</script>
<?php
              }
          }
          ?>
          </div>
          </div>

    </section>
    <br>

       
        <section>
          <h6>Edu Graphs</h6>
          <div class="row">
            <?php
            $con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');
              
              if(isset($_POST['check'])){
              
              $admiss=mysqli_real_escape_string($con, $_POST['admiss']);
              
                $query= "SELECT term, sum(total) total FROM result WHERE stu_id='$admiss' GROUP BY term";
            
                $query_run= mysqli_query($con, $query);
                $json1=[];
                $json2=[];
                while($row = mysqli_fetch_array($query_run)){
                  extract($row);
                 $json1[]=$term;
                  $json2[]=(int)$total;
                          }
                }
                ?>

          <div class="col-md-12">
          <div class="card">
            <div class="card-header main-color-bg">Session Performance Trend Line </div>
          <div class="card-body">
                <canvas id="myLineChart" style="max-width: 700px; max-height: 400;"></canvas>
              </div>
          </div>
          </div>

            </div>
      </section>
       </div>
      </div> 
      <div class="text-center">
          <button type="button" onclick="window.print();" value="print" class="footer btn btn-outline-success btn-user mb-3">
              Print</button>
      </div>     
      </div>

   

<script src="inc/js/jquery.easypiechart.js"></script>
<script>
  $(function() {
      $('.chart').easyPieChart({
          size: 120,
          barColor: '#17d3e6',
          scaleColor: false,
          lineWidth: 8,
          lineCap: 'circle',
          animate: ({ duration: 3000, enabled: true })});
  });
</script>
<script src="inc/js/jquery.counterup.min.js"></script>
<script src="inc/js/jquery.waypoints.min.js"></script>
<script>
  $('.counter').counterUp({
  delay: 10,
  time: 2000
  });

</script>
 <script>
// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';
Chart.defaults.global.animation.duration= 2000;

// Pie Chart Example
var ctx = document.getElementById("myLineChart").getContext("2d");;
var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($json1); ?>,
        datasets: [{
            label: 'Total Score Per Term',
            data: <?php echo json_encode($json2); ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
      maintainAspectRatio: false,
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>
</body>
</html>
