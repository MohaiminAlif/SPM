
<?php
  session_start();
  if(!isset($_SESSION['role']) || $_SESSION['role'] != 'ugc'){
    header("Location: ../login.php");
  }

  include '../php/include/dash.php';
  include '../php/include/conn.php';

  $iub=0;
  $brac=0;
  $nsu=0;
  $aiub=0;
  $buet=0;
  $kuet=0;
  $du=0;
  $sql = "SELECT * FROM student";
  $result = $conn->query($sql);

  while($row = mysqli_fetch_array($result))
  {
    if($row["uName"]=='BRAC')
    {
      $brac++;
    }
    if($row["uName"]=='NSU')
    {
      $nsu++;
    }
    if($row["uName"]=='AIUB')
    {
      $aiub++;
    }
    if($row["uName"]=='BUET')
    {
      $buet++;
    }
    if($row["uName"]=='DU')
    {
      $du++;
    }
    if($row["uName"]=='IUB')
    {
      $iub++;
    }
  }

  $fiub=0;
  $fbrac=0;
  $fnsu=0;
  $faiub=0;
  $fbuet=0;
  $fkuet=0;
  $fdu=0;
  $fsql = "SELECT * FROM faculty";
  $fresult = $conn->query($fsql);

  while($row = mysqli_fetch_array($fresult))
  {
    if($row["uName"]=='BRAC')
    {
      $fbrac++;
    }
    if($row["uName"]=='NSU')
    {
      $fnsu++;
    }
    if($row["uName"]=='AIUB')
    {
      $faiub++;
    }
    if($row["uName"]=='BUET')
    {
      $fbuet++;
    }
    if($row["uName"]=='DU')
    {
      $fdu++;
    }
    if($row["uName"]=='IUB')
    {
      $fiub++;
    }
  }
 

  $dataPoints = array( 
    array("y" => $iub, "label" => "IUB" ),
    array("y" => $brac, "label" => "BRAC" ),
    array("y" => $nsu, "label" => "NSU" ),
    array("y" => $buet, "label" => "BUET" ),
    array("y" => $du, "label" => "DU" ),
    array("y" => $kuet, "label" => "KUET" ),
    array("y" => $aiub, "label" => "AIUB" )
  );

  $facultyDataPoints = array( 
    array("label"=>"IUB", "y"=>$fiub),
    array("label"=>"BRAC", "y"=>$fbrac),
    array("label"=>"NSU", "y"=>$fnsu),
    array("label"=>"BUET", "y"=>$fbuet),
    array("label"=>"DU", "y"=>$fdu),
    array("label"=>"KUET", "y"=>$fkuet),
    array("label"=>"AIUB", "y"=>$faiub)
  );
  

?>

<script>
window.onload = function() {
 
 var chart = new CanvasJS.Chart("chartContainer", {
   animationEnabled: true,
   theme: "light2",
   title:{
     text: "Number of Students"
   },
   axisY: {
     title: "Students (In Number)"
   },
   data: [{
     type: "column",
     yValueFormatString: "#,##0.##",
     dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
   }]
 });

 
 
 var fchart = new CanvasJS.Chart("fchartContainer", {
   theme: "light2",
   animationEnabled: true,
   title: {
     text: "Number of Faculty"
   },
   data: [{
     type: "pie",
     indexLabel: "{y}",
     yValueFormatString: "#,##0.00\"\"",
     indexLabelPlacement: "inside",
     indexLabelFontColor: "#36454F",
     indexLabelFontSize: 18,
     indexLabelFontWeight: "bolder",
     showInLegend: true,
     legendText: "{label}",
     dataPoints: <?php echo json_encode($facultyDataPoints, JSON_NUMERIC_CHECK); ?>
   }]
 });
 fchart.render();
 chart.render();
 
}
</script>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dashboard | SPMS
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="green">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
          UGC
        </a>
        <a href="#" class="simple-text logo-normal">
          SPMS
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="#">
              <i class="now-ui-icons design_app"></i>
              <p >Dashboard</p>
            </a>
          </li>
          <li class="">
            <a href="ugc-plo-achievement.php">
              <i class="now-ui-icons design_app"></i>
              <p>PLO Achievement</p>
            </a>
          </li>
          <li class="">
            <a href="ugc-progress-view.php">
              <i class="now-ui-icons design_app"></i>
              <p>Progress Views</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
 
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
            <button type="button" class="navbar-toggler">
              
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                     profile
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">UGC Officer</a>
                  <a class="dropdown-item" href="../php/logout.php">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                <!-- <h4 class="card-title">Number of University : <?php echo $totalCourse; ?></h4> -->
              </div>
              <div class="card-body">
                
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-chart">
              <div class="card-header">
                <div id="fchartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
              </div>
              <div class="card-body">
                
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title">Number of Faculty : <?php echo $totalFaculty; ?></h4>
              </div>
              <div class="card-body">
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons arrows-1_refresh-69"></i> Just Updated
                </div>
              </div>
            </div>
          </div> -->
          <!-- <div class="col-lg-3 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h4 class="card-title">Number of PLO : <?php echo $totalPLO; ?></h4>
              </div>
              <div class="card-body">
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="now-ui-icons ui-2_time-alarm"></i> Last 7 days
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by Group-30</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>

  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
 
 
</body>

</html>