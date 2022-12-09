<?php
  session_start();
  if(!isset($_SESSION['role']) || $_SESSION['role'] != 'ugc'){
    header("Location: login.php");
  }

  include '../php/include/conn.php';

  $plo1=0;
  $plo2=0;
  $plo3=0;
  $plo4=0;
  $plo5=0;

  $universityName = $_POST["uni"];
  $course = $_POST["course"];

  $query ="SELECT id FROM student WHERE uName= .$universityName";
  $sid = $conn->query($query);

  // while($ro = mysqli_fetch_array($sid))
  // {
    //$query = "SELECT * FROM exam WHERE serial = ".$e['examId'];
    // $query = "SELECT * FROM marks WHERE studentId=".$ro['id'];
    $query = "SELECT * FROM marks";
    $result = $conn->query($query);
    while($row = mysqli_fetch_array($result))
    {
      for($i=1; $i<9; $i++)
      {
        if(($row['mark'.$i]/30)*100>40)
        {
           if($row['mark'.$i.'Co']==1)
           {
             $plo1++;
           }
           if($row['mark'.$i.'Co']==2)
           {
             $plo2++;
           }
           if($row['mark'.$i.'Co']==3)
           {
             $plo3++;
           }
           if($row['mark'.$i.'Co']==4)
           {
             $plo4++;
           }
           if($row['mark'.$i.'Co']==5)
           {
             $plo5++;
           }

        }
      }
    }

    $dataPoints = array( 
      array("y" => $plo1,"label" => "PLO-1" ),
      array("y" => $plo2,"label" => "PLO-2" ),
      array("y" => $plo3,"label" => "PLO-3" ),
      array("y" => $plo4,"label" => "PLO-4" ),
      array("y" => $plo5,"label" => "PLO-5" )
    );
     
 

?>

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "University wise PLO Achivement"
	},
	axisY: {
		title: "Number of Students",
		includeZero: true,
	},
	data: [{
		type: "bar",
		yValueFormatString: "#,##",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
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
    PLO Achievement| SPMS 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
 

  <style>
    .selectpicker{
      width: 100%;
      padding: 8px;
      border-radius: 20px;
      border-color: #E3E3E3;
    }
    .selectpicker:focus{
      outline: none;
      border-color: #F56332;
    }
    .text-primary{
      font-size: 13px;
    }
    .text-basic{
      font-size: 13px;
    }
    .submit-button{
      background-color: #F56332;
    }
  </style>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="green">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          IUB
        </a>
        <a href="#" class="simple-text logo-normal">
          SPMS
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
        <li class="">
            <a href="ugcHome.php">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active ">
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
            <a class="navbar-brand" href="#pablo">PLO Achievement Views</a>
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
                  <a class="dropdown-item" href="#">Higher Management</a>
                  <a class="dropdown-item" href="../php/logout.php">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <form action="ugc-plo-achievement.php" method="post">
                  <div class="row">
                    <div class="col-md-2 pl-1">
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                      <label>Select University</label>
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round btn-block" name="uni" id="view-picker" title="Role Select">
                            <option disabled selected>Select A University</option>
                            <option value="1">IUB</option>
                            <option value="2">NSU</option>
                            <option value="3">BRAC</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Select A Course</label>
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round btn-block" name="course" id="view-picker" title="Role Select">
                            <option disabled selected>Select A Course </option>
                            <option value="4">Database Management</option>
                            <option value="5">Introduction to Computer Science</option>
                            <option value="6">Algorithm</option>
                            <option value="6">Data Structure</option>
                            <option value="7">Web Application and Internet</option>
                            <option value="8">Mathematical Modeling</option>
                            <option value="9">Parallel Programming</option>
                            <option value="10">Data Mining</option>
                            
                        </select>
                      </div>
                    </div>
                  </div>
                  <input id="current_id" value="<?php echo $studentId; ?>" hidden>
                  <div align="center">
                    <button type="submit" class="btn submit-button">Submit</a> </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
      <footer class="footer">
        <div class=" container-fluid ">
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