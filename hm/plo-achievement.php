 <?php
  session_start();
  if(!isset($_SESSION['role']) || $_SESSION['role'] != 'higherManagement'){
    header("Location: ../login.php");
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
      background-color:blue;
    }
  </style>

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="blue">
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
            <a href="index.php">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="active ">
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

          <li class="">
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
                <form action="plo-achievement.php" method="GET" id="id-form">
                  <div class="row">
                    <div class="col-md-2 pl-1">
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Student ID</label>
                        <input type="text" class="form-control"  placeholder="Ex. 194545645" name="id" id="studentId" required>
                      </div>
                    </div>
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>View</label>
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round btn-block" id="view-picker" title="Role Select">
                            <option disabled selected>Select a View</option>
                            <option value="1">Individual</option>
                            <option value="2">Among Class Students</option>
                            <option value="3">Among Department Students</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <input id="current_id" value="<?php echo $studentId; ?>" hidden>
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
              <div class="card-body">
                <canvas id="view2"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-12 view-card view3" style="display: none;">
            <div class="card view1">
              <div class="card-body">
              <div class="table-responsive">
                  <table class="table" id="datatable">
                    <thead class=" text-primary">
                      <th>
                        Course
                      </th>
                      <th>
                        PLO 1
                      </th>
                      <th>
                        PLO 2
                      </th>
                      <th>
                        PLO 3
                      </th>
                      <th>
                        PLO 4
                      </th>
                      <th>
                        PLO 5
                      </th>
                      <th>
                        PLO 6
                      </th>
                      <th>
                        PLO 7
                      </th>
                      <th>
                        PLO 8
                      </th>
                      <th>
                        PLO 9
                      </th>
                      <th>
                        PLO 10
                      </th>
                      <th>
                        PLO 11
                      </th>
                      <th>
                        PLO 12
                      </th>
                      <th>
                        PLO 13
                      </th>
                    </thead>
                    <tbody class=" text-basic">
                      <?php
                        foreach($courseFinal as $id => $m){
                          echo '<tr>';
                            echo'<td>'.$id.'</td>';
                            foreach($m as $i){
                              if($i == -1){
                                echo'<td>N/A</td>';
                              }else{
                                if($i<40.00){
                                  echo'<td style="color: red;">'.$i.'</td>';
                                }else{
                                  echo'<td style="color: lime;">'.$i.'</td>';
                                }
                              }
                            }
                          echo '</tr>';
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

      var ctx = document.getElementById('view1').getContext('2d');
      var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'bar',

          // The data for our dataset
          data: {
              labels: [
                <?php
                  for($i=1; $i<=count($ploFinal); $i++){
                    echo "'PLO ". $i."', ";
                  }
                ?>
              ],
              datasets: [{
                  label: 'PLO Data',
                  backgroundColor: '#F96332',
                  borderColor: '#F96332',
                  data: [
                    <?php
                      for($i=1; $i<=count($ploFinal); $i++){
                        echo  $ploFinal[$i].", ";
                      }
                    ?>
                  ]
              }]
          },
          // Configuration options go here
          options: {}
      });

      var view2Data = {
			labels: [
        <?php
          for($i=1; $i<=count($ploId); $i++){
            echo "'PLO ". $i."', ";
          }  
        ?>
      ],
			datasets: [
        <?php
          for($i=1; $i<=10; $i++){
            echo "{
              label: 'CO".$i."',
              backgroundColor: '"."#".substr(md5(rand()), 0, 6)."',
              data: [";
              
            for($j=1; $j<count($ploId); $j++){
              echo $ploCoFinal[$i][$j].", ";
            }
            
              echo "]
            },";
          }
        ?>
        ]

		};

      var ctx2 = document.getElementById('view2').getContext('2d');
      var chart = new Chart(ctx2, {
          // The type of chart we want to create
          type: 'bar',

          // The data for our dataset
          data: view2Data,
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

      
    
    $("#view-picker").change(function(){
      $(".view-card").css("display", "none");
      $(".view"+$("#view-picker").val()).css("display", "block");
    });

  </script>
</body>

</html>