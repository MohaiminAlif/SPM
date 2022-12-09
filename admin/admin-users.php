
<?php
  session_start();
  if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: login.php");
  }

  include '../php/include/conn.php';

  if(isset($_GET['q']) && $_GET['q'] == 'faculty'){
    $query = "SELECT * FROM faculty";
    $user = $conn->query($query);
    $role = 'Faculty';
  }else if(isset($_GET['q']) && $_GET['q'] == 'admin'){
    $query = "SELECT * FROM admin";
    $user = $conn->query($query);
    $role = 'Admin';
  }else if(isset($_GET['q']) && $_GET['q'] == 'hm'){
    $query = "SELECT * FROM highermanagement";
    $user = $conn->query($query);
    $role = 'HM';
  }else if(isset($_GET['q']) && $_GET['q'] == 'ugc'){
    $query = "SELECT * FROM ugc";
    $user = $conn->query($query);
    $role = 'UGC';
  }else{
    $query = "SELECT * FROM student";
    $user = $conn->query($query);
    $role = "Student";
  }

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
      background-color:darkseagreen;
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
          <li class="active ">
            <a href="../admin/admin-users.php">
              <i class="now-ui-icons design_app"></i>
              <p>User Management</p>
            </a>
          </li>
          <li>
            <a href="../admin/admin-marksheets.php">
              <i class="now-ui-icons education_atom"></i>
              <p>Marksheets</p>
            </a>
          </li>
          <li>
            <a href="../admin/admin-programs.php">
              <i class="now-ui-icons education_atom"></i>
              <p>Program Management</p>
            </a>
          </li>
          <li>
            <a href="admin-courses.php">
              <i class="now-ui-icons education_atom"></i>
              <p>Course Management</p>
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
            <a class="navbar-brand" href="admin-users.php">User List</a>
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
                  <a class="dropdown-item" href="#">ADMIN</a>
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
                <h4 class="card-title">User List</h4>
                <div class="dropdown">
                  <button type="button" class="btn btn-round btn-outline-default dropdown-toggle btn-simple btn-icon no-caret" data-toggle="dropdown">
                    <i class="now-ui-icons loader_gear"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="admin-users.php?q=student">Students</a>
                    <a class="dropdown-item" href="admin-users.php?q=faculty">Faculties</a>
                    <a class="dropdown-item" href="admin-users.php?q=admin">Admin</a>
                    <a class="dropdown-item" href="admin-users.php?q=hm">Higher Management</a>
                    <a class="dropdown-item" href="admin-users.php?q=ugc">UGC Officers</a>
                    <a class="dropdown-item user-add-btn" href="admin-add-user.php">Add User</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table" id="datatable">
                    <thead class=" text-primary">
                    <th>
                      ID
                    </th>
                    <th>
                      Full Name
                    </th>
                    <?php 
                      if(!(isset($_GET['q']) && $_GET['q']!='student')){
                        echo "<th>
                              Department
                            </th>";
                      }
                    ?>
                    <th>
                      Email
                    </th>
                    <th>
                      Role
                    </th>   
                    <th>
                      University
                    </th>                    
                    </thead>
                    <tbody>
                      <?php
                        foreach($user as $u){

                          if($role=="HM")
                          {
                            echo"<tr>
                            <td>
                              ".$u['id']."
                            </td>
                            <td>
                              ".$u['firstName']." ".$u['lastName']."
                            </td>";
                            if($role=="Student"){
                              echo"<td>
                                  ".$u['programId']."
                                  </td>";
                            }
                            echo"<td>
                            ".$u['email']."
                            </td>
                            <td>
  
                              ".$role."
                            </td>
  
                            <td>
                            N/A
                          </td>
                          </tr>";
                          }
                          
                          if($role=='Admin')
                          {
                            echo"<tr>
                            <td>
                              ".$u['id']."
                            </td>
                            <td>
                              ".$u['firstName']." ".$u['lastName']."
                            </td>";
                            if($role=="Student"){
                              echo"<td>
                                  ".$u['programId']."
                                  </td>";
                            }
                            echo"<td>
                            ".$u['email']."
                            </td>
                            <td>
  
                              ".$role."
                            </td>
  
                            <td>
                            N/A
                          </td>
                          </tr>";
                          }

                          if($role=='UGC')
                          {
                            echo"<tr>
                            <td>
                              ".$u['id']."
                            </td>
                            <td>
                              ".$u['firstName']." ".$u['lastName']."
                            </td>";
                            if($role=="Student"){
                              echo"<td>
                                  ".$u['programId']."
                                  </td>";
                            }
                            echo"<td>
                            ".$u['email']."
                            </td>
                            <td>
  
                              ".$role."
                            </td>
  
                            <td>
                            N/A
                          </td>
                          </tr>";
                          }
                          
                          if($role=='Student')
                          {
                            echo"<tr>
                            <td>
                              ".$u['id']."
                            </td>
                            <td>
                              ".$u['firstName']." ".$u['lastName']."
                            </td>";
                            if($role=="Student"){
                              echo"<td>
                                  ".$u['programId']."
                                  </td>";
                            }
                            echo"<td>
                            ".$u['email']."
                            </td>
                            <td>
  
                              ".$role."
                            </td>
  
                            <td>
                            ".$u['uName']."
                          </td>
                          </tr>";
                          }

                          if($role=='Faculty')
                          {
                            echo"<tr>
                            <td>
                              ".$u['id']."
                            </td>
                            <td>
                              ".$u['firstName']." ".$u['lastName']."
                            </td>";
                            if($role=="Student"){
                              echo"<td>
                                  ".$u['programId']."
                                  </td>";
                            }
                            echo"<td>
                            ".$u['email']."
                            </td>
                            <td>
  
                              ".$role."
                            </td>
  
                            <td>
                            ".$u['uName']."
                          </td>
                          </tr>";
                          }
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
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
            </script>, Designed by Group-4. Coded by Group-4</a>.
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
  <script>
   
  </script>
</body>

</html>