
<?php
  session_start();
  if(!isset($_SESSION['role']) || $_SESSION['role'] != 'faculty'){
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

</body>

</html>