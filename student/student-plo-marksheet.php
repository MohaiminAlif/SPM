<?php
 
    require 'student-plo.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Result | SPMS 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />

  <style>
    .active-pro{
      text-align: center;
    }
    #student-name{
      font-size: 15px;
      color: #fff;
      font-weight: 600;
    }
    #student-info{
      font-size: 12px;
      color: white;
    }
    .final-result{
      color: #F56332;
      font-size: 18px;
      font-weight: 500;
    }

    .final-result{
      color: #F56332;
      font-size: 18px;
      font-weight: 500;
    }
  </style>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          
        </a>
        <a href="#" class="simple-text logo-normal">
          SPMS
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="">
            <a href="student-result.php">
              <i class="now-ui-icons design_app"></i>
              <p>Home</p>
            </a>
          </li>

          <li class="active">
            <a href="student-plo-marksheet.php">
              <i class="now-ui-icons design_app"></i>
              <p>PLO Result</p>
            </a>
          </li>

          <!-- <li class="">
            <a href="course-wise.php">
              <i class="now-ui-icons design_app"></i>
              <p>Course Wise Compare</p>
            </a>
          </li> -->

        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
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
                    <span class="d-lg-none d-md-block">profile</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="student-result.php">Home</a>
                  <a class="dropdown-item" href="../php/logout.php">LogOut</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Plo Achievement Result</h1>
                        
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Views</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Choose View:</div>
                                            <a class="dropdown-item" onclick="showView(1);">Individual PLO</a>
                                            <a class="dropdown-item" onclick="showView(2);">Course Wise PLO</a>
                                            <a class="dropdown-item" onclick="showView(3);">In Table Format</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart" id="chart1">
                                        <canvas id="view1"></canvas>
                                    </div>
                                    <div class="chart" id="chart2">
                                        <canvas id="view2"></canvas>
                                    </div>
                                    <div class="chart" id="chart3">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Course</th>
                                                    <?php
                                                        for($i=1; $i<=$ploNum; $i++){
                                                            echo "<th>PLO".$i."</th>";
                                                        }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                <th>Course</th>
                                                    <?php
                                                        for($i=1; $i<=$ploNum; $i++){
                                                            echo "<th>PLO".$i."</th>";
                                                        }
                                                    ?>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php
                                                    foreach($pMarks as $c => $m){
                                                        echo "<tr>
                                                                <td>".$c."</td>";
                                                        for($i=1; $i<=$ploNum; $i++){
                                                            if(isset($m[$i])){
                                                                $r = $m[$i] * 100 / $pTotal[$c][$i];
                                                                if($r>=40){
                                                                    echo "<td style='color: green;'>";
                                                                }else{
                                                                    echo "<td style='color: red;'>";
                                                                }
                                                                echo round($r, 2)."</td>";
                                                            }else{
                                                                echo "<td>N/A</td>";
                                                            }
                                                        }
                                                        echo "</tr>";
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Student Information</h6>
                                </div> -->
                                <!-- Card Body -->
                                <div class="card-body">
                                <form class="user" action="" id="id-form">
                                <div class="form-group row">
                                    <!-- <div class="col-sm-12 mb-4 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" name="id"
                                            placeholder="Student ID" required>
                                    </div> -->
                                </div>
                                <!-- <div align="center">
                                    <buttn type="button" class="btn btn-primary btn-user">Submit</buttn>
                                </div> -->
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <footer class="footer">
        <div class=" container-fluid d-flex align-items-center">
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by Group-30</a>.
          </div>
        </div>
      </footer>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

 

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/jquery/jquery.min.js"></script>
    <script src="../asstes/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../asstes/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

    <script src="../asstes/datatables/dataTables.bootstrap4.min.js"></script>


    <!-- Page level plugins -->
    <script src="../asstes/chart.js/Chart.min.js"></script>
    
    <!-- Page level custom scripts -->
    <script src="../assets/js/plo-achievement.js"></script>
      <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>


<script>

var ctx = document.getElementById('view1').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: [
            <?php
                for($i=1; $i<=$ploNum; $i++){
                    echo "'PLO".$i."', ";
                }
            ?>
        ],
        datasets: [{
            label: 'PLO Percentage',
            backgroundColor: '#375DCD',
            data: [
                <?php
                    for($i=1; $i<=$ploNum; $i++){
                        if(isset($pfMarks[$i])){
                            $c = $pfMarks[$i] * 100 / $pfTotal[$i];
                            echo round($c, 2).", ";
                        }else{
                            echo "0, ";
                        }
                    }
                    echo "100";
                ?>
            ]
        }]
    },

    // Configuration options go here
    options: {}
});

var ctx = document.getElementById('view2').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: [
            <?php
                for($i=1; $i<=$ploNum; $i++){
                    echo "'PLO".$i."', ";
                }
            ?>
        ],
        datasets: [
            <?php
                $i = 1;
                foreach($pMarks as $c => $m){
                    echo"{
                        label: '".$c."',
                        backgroundColor: '".$color[$i]."',
                        data: [";
                    for($i=1; $i<=$ploNum; $i++){
                        if(isset($m[$i])){
                            echo $m[$i].", ";
                        }else{
                            echo "0, ";
                        }
                    }      
                    echo"]
                    },"; 
                    $i++;
                }           
            ?>
        ]
    },

    // Configuration options go here
    options: {
        scales: {
			xAxes: [{
				stacked: true,
			}],
			yAxes: [{
				stacked: true
			}]
	    }
    }
});

</script>

</body>

</html>