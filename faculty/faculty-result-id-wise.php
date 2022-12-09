
<?php
  session_start();
  if(!isset($_SESSION['role']) || $_SESSION['role'] != 'faculty'){
    header("Location: login.php");
  }

  include '../php/include/conn.php';

    $id=$_GET['q'];
    $query = "SELECT * FROM marks_exam Where sl = $id";
    $user = $conn->query($query);
    

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    User Management | SPMS 
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />

  <style>
    .final-result{
      color: #F56332;
      font-size: 18px;
      font-weight: 500;
    }
    .card-body{
      background-color:#d4d4d4;
    }
  </style>

</head>

<body class="">
  <div class="wrapper ">
  <div class="sidebar" data-color="orange">
      <div class="logo">
        <a href="#" class="simple-text logo-mini">
        
        </a>
        <a href="#" class="simple-text logo-normal">
          SPMS
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="faculty-marks-entry.php">
              <i class="now-ui-icons design_app"></i>
              <p>Marks Entry</p>
            </a>
          </li>


          <li class="active">
            <a href="faculty-results-show.php">
              <i class="now-ui-icons files_single-copy-04"></i>
              <p>Show Marks</p>
            </a>
          </li>

          <li>
            <a href="avg-plo-achivement.php">
              <i class="now-ui-icons design_app"></i>
              <p>PLO Achivement</p>
            </a>
          </li>

          <li>
            <a href="faculty-feedback.php">
              <i class="now-ui-icons education_atom"></i>
              <p>Admin Feedback</p>
            </a>
          </li>
          <li>
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
            <a class="navbar-brand" href="admin-users.php">MARKS</a>
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
                  <a class="dropdown-item" href="#">Faculty</a>
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
                <!-- <h5 class="card-category">Submitted Marksheets by Faculties</h5> -->
                <h4 class="card-title"></h4>

                <?php 
                foreach($user as $u){  
                echo "
                
                <h3>ID: ".$u['student_id']."</h3>
                <h4>Course: ".$u['course_id']."</h4>
                <h4>Section: ".$u['section']."</h4>
                <h4>Semester: ".$u['semester']."</h4>
                <h4>Category: ".$u['exam_name']."</h4>
                <h4></h4>

                
                
                ";
                }
                ?>

<table class="table" id="datatable">
                    <thead style="font-size: larger; color:blue">
                    <th>
                      Quesiton no.
                    </th>
                    <th>
                      Marks
                    </th>
                    
                    <th>
                      Total
                    </th>
                    <th>
                      CO
                    </th>   
                   
                    </thead>
                    <tbody>
                      <?php        
                        foreach($user as $u){  
                             
                            echo"
                            <tr>
                            <td>
                            1
                            </td>
                            <td>
                            ".$u['q1_mark']."
                            </td>
                            <td>
                            ".$u['q1_max']."
                            </td>
                            <td>
                            ".$u['q1_co']."
                            </td>
                            </tr>

                            <tr>
                            <td>
                            2
                            </td>
                            <td>
                            ".$u['q2_mark']."
                            </td>
                            <td>
                            ".$u['q2_max']."
                            </td>
                            <td>
                            ".$u['q2_co']."
                            </td>
                            </tr>

                            <tr>
                            <td>
                            3
                            </td>
                            <td>
                            ".$u['q3_mark']."
                            </td>
                            <td>
                            ".$u['q3_max']."
                            </td>
                            <td>
                            ".$u['q3_co']."
                            </td>
                            </tr>

                            <tr>
                            <td>
                            4
                            </td>
                            <td>
                            ".$u['q4_mark']."
                            </td>
                            <td>
                            ".$u['q4_max']."
                            </td>
                            <td>
                            ".$u['q4_co']."
                            </td>
                            </tr>

                            <tr>
                            <td>
                            5
                            </td>
                            <td>
                            ".$u['q5_mark']."
                            </td>
                            <td>
                            ".$u['q5_max']."
                            </td>
                            <td>
                            ".$u['q5_co']."
                            </td>
                            </tr>

                            <tr>
                            <td>
                            6
                            </td>
                            <td>
                            ".$u['q6_mark']."
                            </td>
                            <td>
                            ".$u['q6_max']."
                            </td>
                            <td>
                            ".$u['q6_co']."
                            </td>
                            </tr>

                            <tr>
                            <td>
                            7
                            </td>
                            <td>
                            ".$u['q7_mark']."
                            </td>
                            <td>
                            ".$u['q7_max']."
                            </td>
                            <td>
                            ".$u['q7_co']."
                            </td>
                            </tr>

                            <tr>
                            <td>
                            8
                            </td>
                            <td>
                            ".$u['q8_mark']."
                            </td>
                            <td>
                            ".$u['q8_max']."
                            </td>
                            <td>
                            ".$u['q8_co']."
                            </td>
                            </tr>

                            ";
                            
                        }
                      ?>
                    </tbody>
                  </table>

                


              </div>


              <div class="card-body">
                <div class="table-responsive">


                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

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
  <script>
   
  </script>
</body>

</html>