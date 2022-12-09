<?php
    //require '../php/middleware.php';
    require 'result-helper.php';
 
  //session_start();
  if(!isset($_SESSION['role']) || $_SESSION['role'] != 'student'){
    header("Location: ../login.php");
  }
  if(!(isset($_GET['id']))){
    $l = "?id=".$_SESSION['user_id']."";
    header("Location: ".$l);
  }

  include '../php/include/plo.php'; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Student | SPMS 
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
          <li class="active">
            <a href="student-result.php">
              <i class="now-ui-icons design_app"></i>
              <p>Home</p>
            </a>
          </li>

          <li class="">
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
                  <a class="dropdown-item" href="#">Home</a>
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
            <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Dash</h1><br>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Student Information</h6>
                                </div>
                                <div class="card-body">
                                <h4>Name: <?php echo $uInfo['firstName'] . " ". $uInfo['lastName'];?></h4>
                                <h5>ID: <?php echo $uInfo['id'];?></h5>
                                <h5>Department: <?php echo $uInfo['programId'];?></h5>
                                <h5>Email: <?php echo $uInfo['email'];?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card shadow mb-4">
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">PLO Charts</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Choose View:</div>
                                            <?php
                                                for($i=1; $i<=$totalPlo; $i++){
                                                    echo "<a class='dropdown-item' onclick='showView(".$i.");'>PLO-".$i."</a>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <?php
                                        foreach($pMarks as $v){
                                            foreach($v as $i => $j){
                                                echo "<div class='chart' id='chart".$i."'>
                                                        <canvas id='view".$i."'></canvas>
                                                    </div>";
                                            }
                                            break;
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

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
$(".chart").css("display", "none");

function showView($i){
    $(".chart").css("display", "none");
    $("#chart"+$i).css("display", "block");
}

<?php
foreach($pMarks as $v){
    foreach($v as $i => $j){
        echo "var ctx = document.getElementById('view".$i."').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'pie',
        
            // The data for our dataset
            data: {
                labels: [";
        foreach($pMarks as $c => $v){
            echo "'".$c."', ";
        }         
        echo"],
                datasets: [{
                    backgroundColor: [";
        $clr = 1;
        foreach($pMarks as $c => $v){
            echo "'".$color[$clr%10]."', ";
            $clr++;
        }
        echo"],
                    data: [";
        foreach($pMarks as $c => $v){
            echo $v[$i].", ";
        }   

        echo "]
                }]
            },
        
            // Configuration options go here
            options: {}
        });";
    }
    break;
}
?>

var ctx = document.getElementById('view2').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: [
            
        ],
        datasets: [{
            label: 'PLO Percentage',
            backgroundColor: '#375DCD',
            data: [
                
            ]
        }]
    },

    // Configuration options go here
    options: {}
});


</script>

</body>

</html>