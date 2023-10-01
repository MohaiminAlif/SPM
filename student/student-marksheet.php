

<?php
  session_start();
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
    
  </style>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="yellow">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          STUDENT Info
        </a>
        <a href="#" class="simple-text logo-normal">
          SPMS
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="student-marksheet.php">
              <i class="now-ui-icons design_app"></i>
              <p>Results</p>
            </a>
          </li>

          <li class="">
            <a href="student-plo-marksheet.php">
              <i class="now-ui-icons design_app"></i>
              <p>PLO Results</p>
            </a>
          </li>

          <li class="">
            <a href="course-wise.php">
              <i class="now-ui-icons design_app"></i>
              <p>Course Wise Compares</p>
            </a>
          </li>

          <li>
          <li class="active-pro">
            <div class="col-1">
            </div>
            <div>
            <div class="col-11">
            <p id="student-name"><?php echo $_SESSION['name']; ?></p>
            <p id="student-name"><?php echo $_SESSION['email']; ?></p>
            <p id="student-name"><?php echo $_SESSION['department']; ?></p>
            <p id="student-name"><?php echo "ID: ". $_SESSION['user_id']; ?></p>
             
            </div>
            
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
            <a class="navbar-brand" href="#pablo">RESULT</a>
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
                  <a class="dropdown-item" href="#">STUDENT</a>
                  <a class="dropdown-item" href="../php/logout.php">LogOut</a>
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
            <div class="card card-chart">
              <div class="card-header">
                <!-- <h5 class="card-category">Summer 2021</h5> -->
                <h4 class="card-title">Result</h4>
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <?php
                      foreach($courseFinal as $v){
                        foreach($v as $i => $j){
                          echo "<a class='dropdown-item' onclick='activeV(".$i.")'>PLO".$i."</a>";
                        }
                        break;
                      }
                    ?>
                  </div>
                </div>
              </div>
              <div class="card-body">

                <?php
                  foreach($courseFinal as $v){
                    foreach($v as $i => $j){
                      echo "<canvas class='view' id='view".$i."'></canvas>";
                    }
                    break;
                  }
                ?>
              </div>
              <div class="card-footer">
                
              </div>
            </div>
          </div>
        </div>
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
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>

  
  <script>

    $(".view").css("display", "none");

    function activeV($i){
      $(".view").css("display", "none");
      $("#view"+$i).css("display", "block");
    }

    <?php
      foreach($courseFinal as $v){
        foreach($v as $i => $j){
          echo "var ctx = document.getElementById('view".$i."').getContext('2d');
            var chart = new Chart(ctx, {
              type: 'pie',// The data for our dataset
              data: {
                  labels: [";
                    foreach($courseFinal as $c => $v){
                      echo "'".$c."', ";
                    }
                  echo "],
                  datasets: [{
                      label: 'PLO".$i." Data',
                      backgroundColor: [";
                      foreach($courseFinal as $c => $v){
                        echo "'#".substr(md5(rand()), 0, 6)."', ";
                      }
                      echo "],
                      data: [";
                      foreach($courseFinal as $c => $v){
                        if($v[$i] == -1){
                          continue;
                        }
                        echo $v[$i].", ";
                      }              
                      echo"]
                  }]
              },
              // Configuration options go here
              options: {}
          });";
        }
        break;
      }
    ?>
    
    // var ctx = document.getElementById('view1').getContext('2d');
    //   var chart = new Chart(ctx, {
    //       // The type of chart we want to create
    //       type: 'pie',

    //       // The data for our dataset
    //       data: {
    //           labels: [
    //             <?php
    //               foreach($courseFinal as $c => $v){
    //                 echo "'".$c."', ";
    //               }
    //             ?>
    //           ],
    //           datasets: [{
    //               label: 'PLO Data',
    //               backgroundColor: [
    //                 <?php
    //                   foreach($courseFinal as $c => $v){
    //                     echo "'#".substr(md5(rand()), 0, 6)."', ";
    //                   }
    //                 ?>
    //               ],
    //               data: [
    //                 <?php
    //                   foreach($courseFinal as $c => $v){
    //                     echo $v[2].", ";
    //                   }
    //                 ?>
    //               ]
    //           }]
    //       },
    //       // Configuration options go here
    //       options: {}
    //   });
  </script>
</body>

</html>
