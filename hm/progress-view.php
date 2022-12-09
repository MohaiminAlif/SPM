
<?php
  session_start();
  if(!isset($_SESSION['role']) || $_SESSION['role'] != 'higherManagement'){
    header("Location: ../login.php");
  }

  include '../php/include/prog.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Progress Views | SPMS 
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
      background-color:blue;
    }
  </style>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
 
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
          HM
        </a>
        <a href="#" class="simple-text logo-normal">
          SPMS
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
        <li class="">
            <a href="index.php">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="">
            <a href="plo-achievement.php">
              <i class="now-ui-icons design_app"></i>
              <p>PLO Achievement</p>
            </a>
          </li>
          <li class="">
            <a href="faculty-wise-plo-view.php">
              <i class="now-ui-icons design_app"></i>
              <p>Faculty Wise PLO Achivement</p>
            </a>
          </li>
          <li class="active ">
            <a href="progress-view.php">
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
            <a class="navbar-brand" href="#pablo">Progress Views</a>
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
                <form action="progress-view.php" method="GET" id="id-form">
                  <div class="row">
                    <div class="col-md-1 pl-1">
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Student ID</label>
                        <input type="text" class="form-control"  placeholder="Ex. 194545645" name="id" id="studentId" required>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Semester</label>
                        <input type="text" class="form-control"  placeholder="Ex. Summer-2020" name="semester" id="semester" required>
                      </div>
                    </div>
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>View</label>
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round btn-block" id="view-picker" title="Role Select">
                            <option disabled selected>Select a View</option>
                            <option value="1">Student View</option>
                            <option value="2">Semester View</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div align="center">
                    <button type="submit" class="btn submit-button">Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 view-card view1" style="display: none;">
            <div class="card view1">
              <div class="card-body">
                <canvas id="view1"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-12 view-card view2" style="display: none;">
            <div class="card view1">
              <div class="card-header">
                <h5>Number of Students: <?php echo $numS; ?></h5>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="datatable">
                    <thead class=" text-primary">
                      <th>
                        CO/PLO
                      </th>
                      <th>
                        Successfully Achieved
                      </th>
                      <th>
                      Successfully Achieved(%)
                      </th>
                      <th>
                        Failed To Achieve
                      </th>
                      <th>
                      Failed To Achieve(%)
                      </th>
                    </thead>
                    <tbody class=" text-basic">
                      <?php
                        foreach($finalC as $c => $co){
                          echo "<tr>";
                          echo "<td>CO$c</td>";
                          echo "<td>$co</td>";
                          echo "<td>".round(($co*100/$numS), 2)."%</td>";
                          echo "<td>".($numS-$co)."</td>";
                          echo "<td>".(100-round(($co*100/$numS), 2))."</td>";
                          echo "<tr>";
                        }
                      ?>
                      <?php
                        foreach($finalP as $p => $po){
                          echo "<tr>";
                          echo "<td>PLO$p</td>";
                          echo "<td>$po</td>";
                          echo "<td>".round(($po*100/$numS), 2)."</td>";
                          echo "<td>".($numS-$po)."</td>";
                          echo "<td>".(100-round(($po*100/$numS), 2))."</td>";
                          echo "<tr>";
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
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

  <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>

  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
 
  <script src="../assets/js/core/jquery.min.js"></script>

  <script>

    $(".view-card").css("display", "none");

    if(<?php echo $studentId; ?>){
      $("#studentId").val(<?php echo $studentId; ?>);
    }
    if('<?php echo $semester; ?>'.length){
      $("#semester").val("<?php echo $semester; ?>");
    }
      
    $("#view-picker").change(function(){
      $(".view-card").css("display", "none");
      $(".view"+$("#view-picker").val()).css("display", "block");
    });

    var ctx = document.getElementById('view1').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: [
              <?php
                foreach($sems as $s => $v){
                  echo "'". $s."', ";
                }
              ?>
            ],
            datasets: [
              <?php
                
                  echo "{
                    label: 'Expected',
                    backgroundColor: '"."#".substr(md5(rand()), 0, 6)."',
                    data: [";
                    foreach($sems as $t){
                      echo $t.", ";
                    }
                    echo "]
                  },";

                  echo "{
                    label: 'Achieved',
                    backgroundColor: '"."#".substr(md5(rand()), 0, 6)."',
                    data: [";
                    foreach($ploF as $t){
                      echo $t.", ";
                    }
                    echo "]
                  },";

              ?>
            ]
        },
        // Configuration options go here
        options: {}
    });

  </script>
</body>

</html>