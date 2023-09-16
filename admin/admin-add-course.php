
<?php
  session_start();
  if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    header("Location: ../login.php");
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
    Add Course | SPMS 
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
          SPMS v2.0
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
            <a class="navbar-brand" href="#">Add New Course</a>
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

              <div class="alert alert-primary" <?php if(isset($_GET['response']) && $_GET['response'] == 200){}else{echo "hidden";} ?>>
                <button type="button" aria-hidden="true" class="close">
                  <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
                <span><b> Course Added Successfully.</span>
              </div>

              <div class="alert alert-danger" <?php if(isset($_GET['response']) && $_GET['response'] == 501){}else{echo "hidden";} ?>>
                <button type="button" aria-hidden="true" class="close">
                  <i class="now-ui-icons ui-1_simple-remove"></i>
                </button>
                <span><b> Failed to add course.</span>
              </div>
              <div class="card-header">
                <h4 class="card-title">New Couese</h4>
              </div>
              <div class="card-body">
              <form action="../php/add-course.php" method="POST" id="course-form">
                  <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>Program Id</label>
                        <input type="text" class="form-control"  placeholder="Ex. 194545645" name="programId">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Course Id</label>
                        <input type="text" class="form-control"  placeholder="Ex. 194545645" name="courseId">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-7 pr-1">
                      <div class="form-group">
                        <label>Course Title</label>
                        <input type="text" class="form-control"  placeholder="Ex. 194545645" name="title">
                      </div>
                    </div>
                    <div class="col-md-5 pl-1">
                      <div class="form-group">
                        <label>Credit</label>
                        <input type="text" class="form-control"  placeholder="Ex. 194545645" name="credit">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>PLO Index</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="plo1" value="1">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO1</label>
                        <input type="checkbox" class="form-control" value="1" name="plo1-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO2</label>
                        <input type="checkbox" class="form-control" value="2" name="plo1-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO3</label>
                        <input type="checkbox" class="form-control" value="3" name="plo1-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO4</label>
                        <input type="checkbox" class="form-control" value="4" name="plo1-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO5</label>
                        <input type="checkbox" class="form-control" value="5" name="plo1-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO6</label>
                        <input type="checkbox" class="form-control" value="6" name="plo1-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO7</label>
                        <input type="checkbox" class="form-control" value="7" name="plo1-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO8</label>
                        <input type="checkbox" class="form-control" value="8" name="plo1-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO9</label>
                        <input type="checkbox" class="form-control" value="8" name="plo1-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO10</label>
                        <input type="checkbox" class="form-control" value="9" name="plo1-co[]">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>PLO Index</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="plo2" value="2">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO1</label>
                        <input type="checkbox" class="form-control" value="1" name="plo2-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO2</label>
                        <input type="checkbox" class="form-control" value="2" name="plo2-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO3</label>
                        <input type="checkbox" class="form-control" value="3" name="plo2-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO4</label>
                        <input type="checkbox" class="form-control" value="4" name="plo2-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO5</label>
                        <input type="checkbox" class="form-control" value="5" name="plo2-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO6</label>
                        <input type="checkbox" class="form-control" value="6" name="plo2-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO7</label>
                        <input type="checkbox" class="form-control" value="7" name="plo2-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO8</label>
                        <input type="checkbox" class="form-control" value="8" name="plo2-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO9</label>
                        <input type="checkbox" class="form-control" value="8" name="plo2-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO10</label>
                        <input type="checkbox" class="form-control" value="9" name="plo2-co[]">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>PLO Index</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="plo3" value="3">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO1</label>
                        <input type="checkbox" class="form-control" value="1" name="plo3-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO2</label>
                        <input type="checkbox" class="form-control" value="2" name="plo3-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO3</label>
                        <input type="checkbox" class="form-control" value="3" name="plo3-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO4</label>
                        <input type="checkbox" class="form-control" value="4" name="plo3-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO5</label>
                        <input type="checkbox" class="form-control" value="5" name="plo3-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO6</label>
                        <input type="checkbox" class="form-control" value="6" name="plo3-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO7</label>
                        <input type="checkbox" class="form-control" value="7" name="plo3-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO8</label>
                        <input type="checkbox" class="form-control" value="8" name="plo3-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO9</label>
                        <input type="checkbox" class="form-control" value="8" name="plo3-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO10</label>
                        <input type="checkbox" class="form-control" value="9" name="plo3-co[]">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>PLO Index</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="plo4" value="4">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO1</label>
                        <input type="checkbox" class="form-control" value="1" name="plo4-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO2</label>
                        <input type="checkbox" class="form-control" value="2" name="plo4-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO3</label>
                        <input type="checkbox" class="form-control" value="3" name="plo4-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO4</label>
                        <input type="checkbox" class="form-control" value="4" name="plo4-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO5</label>
                        <input type="checkbox" class="form-control" value="5" name="plo4-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO6</label>
                        <input type="checkbox" class="form-control" value="6" name="plo4-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO7</label>
                        <input type="checkbox" class="form-control" value="7" name="plo4-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO8</label>
                        <input type="checkbox" class="form-control" value="8" name="plo4-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO9</label>
                        <input type="checkbox" class="form-control" value="8" name="plo4-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO10</label>
                        <input type="checkbox" class="form-control" value="9" name="plo4-co[]">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>PLO Index</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="plo5" value="5">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO1</label>
                        <input type="checkbox" class="form-control" value="1" name="plo5-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO2</label>
                        <input type="checkbox" class="form-control" value="2" name="plo5-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO3</label>
                        <input type="checkbox" class="form-control" value="3" name="plo5-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO4</label>
                        <input type="checkbox" class="form-control" value="4" name="plo5-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO5</label>
                        <input type="checkbox" class="form-control" value="5" name="plo5-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO6</label>
                        <input type="checkbox" class="form-control" value="6" name="plo5-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO7</label>
                        <input type="checkbox" class="form-control" value="7" name="plo5-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO8</label>
                        <input type="checkbox" class="form-control" value="8" name="plo5-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO9</label>
                        <input type="checkbox" class="form-control" value="8" name="plo5-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO10</label>
                        <input type="checkbox" class="form-control" value="9" name="plo5-co[]">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>PLO Index</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="plo6" value="6">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO1</label>
                        <input type="checkbox" class="form-control" value="1" name="plo6-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO2</label>
                        <input type="checkbox" class="form-control" value="2" name="plo6-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO3</label>
                        <input type="checkbox" class="form-control" value="3" name="plo6-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO4</label>
                        <input type="checkbox" class="form-control" value="4" name="plo6-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO5</label>
                        <input type="checkbox" class="form-control" value="5" name="plo6-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO6</label>
                        <input type="checkbox" class="form-control" value="6" name="plo6-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO7</label>
                        <input type="checkbox" class="form-control" value="7" name="plo6-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO8</label>
                        <input type="checkbox" class="form-control" value="8" name="plo6-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO9</label>
                        <input type="checkbox" class="form-control" value="8" name="plo6-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO10</label>
                        <input type="checkbox" class="form-control" value="9" name="plo6-co[]">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>PLO Index</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="plo7" value="7">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO1</label>
                        <input type="checkbox" class="form-control" value="1" name="plo7-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO2</label>
                        <input type="checkbox" class="form-control" value="2" name="plo7-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO3</label>
                        <input type="checkbox" class="form-control" value="3" name="plo7-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO4</label>
                        <input type="checkbox" class="form-control" value="4" name="plo7-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO5</label>
                        <input type="checkbox" class="form-control" value="5" name="plo7-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO6</label>
                        <input type="checkbox" class="form-control" value="6" name="plo7-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO7</label>
                        <input type="checkbox" class="form-control" value="7" name="plo7-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO8</label>
                        <input type="checkbox" class="form-control" value="8" name="plo7-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO9</label>
                        <input type="checkbox" class="form-control" value="8" name="plo7-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO10</label>
                        <input type="checkbox" class="form-control" value="9" name="plo7-co[]">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>PLO Index</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="plo8" value="8">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO1</label>
                        <input type="checkbox" class="form-control" value="1" name="plo8-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO2</label>
                        <input type="checkbox" class="form-control" value="2" name="plo8-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO3</label>
                        <input type="checkbox" class="form-control" value="3" name="plo8-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO4</label>
                        <input type="checkbox" class="form-control" value="4" name="plo8-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO5</label>
                        <input type="checkbox" class="form-control" value="5" name="plo8-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO6</label>
                        <input type="checkbox" class="form-control" value="6" name="plo8-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO7</label>
                        <input type="checkbox" class="form-control" value="7" name="plo8-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO8</label>
                        <input type="checkbox" class="form-control" value="8" name="plo8-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO9</label>
                        <input type="checkbox" class="form-control" value="8" name="plo8-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO10</label>
                        <input type="checkbox" class="form-control" value="9" name="plo8-co[]">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>PLO Index</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="plo9" value="9">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO1</label>
                        <input type="checkbox" class="form-control" value="1" name="plo9-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO2</label>
                        <input type="checkbox" class="form-control" value="2" name="plo9-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO3</label>
                        <input type="checkbox" class="form-control" value="3" name="plo9-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO4</label>
                        <input type="checkbox" class="form-control" value="4" name="plo9-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO5</label>
                        <input type="checkbox" class="form-control" value="5" name="plo9-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO6</label>
                        <input type="checkbox" class="form-control" value="6" name="plo9-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO7</label>
                        <input type="checkbox" class="form-control" value="7" name="plo9-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO8</label>
                        <input type="checkbox" class="form-control" value="8" name="plo9-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO9</label>
                        <input type="checkbox" class="form-control" value="8" name="plo9-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO10</label>
                        <input type="checkbox" class="form-control" value="9" name="plo9-co[]">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>PLO Index</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="plo10" value="10">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO1</label>
                        <input type="checkbox" class="form-control" value="1" name="plo10-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO2</label>
                        <input type="checkbox" class="form-control" value="2" name="plo10-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO3</label>
                        <input type="checkbox" class="form-control" value="3" name="plo10-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO4</label>
                        <input type="checkbox" class="form-control" value="4" name="plo10-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO5</label>
                        <input type="checkbox" class="form-control" value="5" name="plo10-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO6</label>
                        <input type="checkbox" class="form-control" value="6" name="plo10-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO7</label>
                        <input type="checkbox" class="form-control" value="7" name="plo10-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO8</label>
                        <input type="checkbox" class="form-control" value="8" name="plo10-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO9</label>
                        <input type="checkbox" class="form-control" value="8" name="plo10-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO10</label>
                        <input type="checkbox" class="form-control" value="9" name="plo10-co[]">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>PLO Index</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="plo11" value="11">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO1</label>
                        <input type="checkbox" class="form-control" value="1" name="plo11-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO2</label>
                        <input type="checkbox" class="form-control" value="2" name="plo11-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO3</label>
                        <input type="checkbox" class="form-control" value="3" name="plo11-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO4</label>
                        <input type="checkbox" class="form-control" value="4" name="plo11-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO5</label>
                        <input type="checkbox" class="form-control" value="5" name="plo11-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO6</label>
                        <input type="checkbox" class="form-control" value="6" name="plo11-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO7</label>
                        <input type="checkbox" class="form-control" value="7" name="plo11-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO8</label>
                        <input type="checkbox" class="form-control" value="8" name="plo11-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO9</label>
                        <input type="checkbox" class="form-control" value="8" name="plo11-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO10</label>
                        <input type="checkbox" class="form-control" value="9" name="plo11-co[]">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>PLO Index</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="plo12" value="12">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO1</label>
                        <input type="checkbox" class="form-control" value="1" name="plo12-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO2</label>
                        <input type="checkbox" class="form-control" value="2" name="plo12-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO3</label>
                        <input type="checkbox" class="form-control" value="3" name="plo12-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO4</label>
                        <input type="checkbox" class="form-control" value="4" name="plo12-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO5</label>
                        <input type="checkbox" class="form-control" value="5" name="plo12-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO6</label>
                        <input type="checkbox" class="form-control" value="6" name="plo12-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO7</label>
                        <input type="checkbox" class="form-control" value="7" name="plo12-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO8</label>
                        <input type="checkbox" class="form-control" value="8" name="plo12-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO9</label>
                        <input type="checkbox" class="form-control" value="8" name="plo12-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO10</label>
                        <input type="checkbox" class="form-control" value="9" name="plo12-co[]">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>PLO Index</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="plo13" value="13">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO1</label>
                        <input type="checkbox" class="form-control" value="1" name="plo13-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO2</label>
                        <input type="checkbox" class="form-control" value="2" name="plo13-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO3</label>
                        <input type="checkbox" class="form-control" value="3" name="plo13-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO4</label>
                        <input type="checkbox" class="form-control" value="4" name="plo13-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO5</label>
                        <input type="checkbox" class="form-control" value="5" name="plo13-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO6</label>
                        <input type="checkbox" class="form-control" value="6" name="plo13-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO7</label>
                        <input type="checkbox" class="form-control" value="7" name="plo13-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO8</label>
                        <input type="checkbox" class="form-control" value="8" name="plo13-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO9</label>
                        <input type="checkbox" class="form-control" value="8" name="plo13-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO10</label>
                        <input type="checkbox" class="form-control" value="9" name="plo13-co[]">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-2 pr-1">
                      <div class="form-group">
                        <label>PLO Index</label>
                        <input type="text" class="form-control" placeholder="Ex. Smith" name="plo14" value="14">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO1</label>
                        <input type="checkbox" class="form-control" value="1" name="plo14-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO2</label>
                        <input type="checkbox" class="form-control" value="2" name="plo14-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO3</label>
                        <input type="checkbox" class="form-control" value="3" name="plo14-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO4</label>
                        <input type="checkbox" class="form-control" value="4" name="plo14-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO5</label>
                        <input type="checkbox" class="form-control" value="5" name="plo14-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO6</label>
                        <input type="checkbox" class="form-control" value="6" name="plo14-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO7</label>
                        <input type="checkbox" class="form-control" value="7" name="plo14-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO8</label>
                        <input type="checkbox" class="form-control" value="8" name="plo14-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO9</label>
                        <input type="checkbox" class="form-control" value="8" name="plo14-co[]">
                      </div>
                    </div>
                    <div class="col-md-1 pl-1" align="center">
                      <div class="form-group">
                        <label>CO10</label>
                        <input type="checkbox" class="form-control" value="9" name="plo14-co[]">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-footer" align="center">
                <button type="button" class="btn submit-button">Add Course</button>
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
    
    $(".submit-button").click(function(){
      $("#course-form").submit();
    });

    $(".close").click(function(){
      $(".alert").hide();
    })
  </script>
</body>

</html>
