<?php
  session_start();
  if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: login.php");
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
    Add User | SPMS v2.0
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
 

  <style>
    .submit-button{
      vertical-align: middle;
      color: #fff;
      background-color: #F56332;
      border-radius: 25px;
      width:140px;
      
    }
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
    .card-footer{
      padding-bottom: 30px;
    }
    .footer > .col-md-12{
      text-align: center;
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
            <a href="admin-users.php">
              <i class="now-ui-icons design_app"></i>
              <p>User Management</p>
            </a>
          </li>
          <li>
            <a href="admin-marksheets.php">
              <i class="now-ui-icons education_atom"></i>
              <p>Marksheets</p>
            </a>
          </li>
          <li>
            <a href="admin-programs.php">
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
            <a class="navbar-brand" href="#">Add New User</a>
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
                  <a class="dropdown-item" href="php/logout.php">LogOut</a>
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

              <div class="alert alert-success" <?php if(isset($_GET['response']) && $_GET['response'] == 200){}else{echo "hidden";} ?>>
                <button type="button" aria-hidden="true" class="close">
                  <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
                <span><b> User Added Successfully.</span>
              </div>

              <div class="alert alert-danger" <?php if(isset($_GET['response']) && $_GET['response'] == 501){}else{echo "hidden";} ?>>
                <button type="button" aria-hidden="true" class="close">
                  <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
                <span><b> Failed to add user.</span>
              </div>
              <div class="card-header">
                <h4 class="card-title">New User</h4>
              </div>

              
              <div class="card-body">
                <form action="../php/add-user.php" method="POST" id="user-form">
                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>ID</label>
                        <input type="text" class="form-control"  placeholder="Ex. 194545645" name="id">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Department ID</label>
                        <input type="text" class="form-control"  placeholder="Ex. CSE, EEE" name="programId" >
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Role</label>
                        <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round btn-block" id="role-picker" title="RoleSelect" name="role">
                            <option disabled selected>Select a Role</option>
                            <option value="student">Student</option>
                            <option value="faculty">Faculty</option>
                            <option value="admin">Admin</option>
                            <option value="higherManagement">Higher Management</option>
                            <option value="ugc">UGC Officer</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="Ex. John" name="firstName">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="lastName">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" placeholder="Ex. johns@mail.com" name="email">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" placeholder="Password" name="password">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>University Name</label>
                        <input type="text" class="form-control" placeholder="Ex. IUB" name="university">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer" align="center">
                <button type="button" class="btn submit-button">Add User</button>
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
            </script>, Designed by Group-30</a>
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
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
 

  
  <script>
    
    $(".submit-button").click(function(){
      $("#user-form").submit();
    });

    $(".close").click(function(){
      $(".alert").hide();
    })

    $("#role-picker").change(function(){
      if($("#role-picker").val() == "student"){
        $("#program_id").prop("disabled", false);
      }else{
        $("#program_id").prop("disabled", true);
      }
    });
  </script>
</body>

</html>
