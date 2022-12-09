<?php
  include 'login-helper.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    LOGIN | SPMS  
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- CSS Files -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />

  <style>
      .card-footer{
        padding-top: 0;    
      }
    .submit-button{
      vertical-align: middle;
      color: #fff;
      background-color:brown;
      border-radius: 25px;
      width: 150px;
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
    .da-card{
        margin:auto;
        margin-top: -50px;
    }
    .footer{
        position: absolute;
        bottom: 0;
        right: 0;
    }
  </style>

</head>

<body class="bg-secondary">
    <div class="login-body">
        <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute">
            <div class="container-fluid">
              <div class="navbar-wrapper">
                <a class="navbar-brand" href="#">SPMS</a>
              </div>
            </div>
          </nav>
        <div class="panel-header panel-header-sm">
        </div>
        <div class="content">
        
            <div class="col-lg-6 da-card">
                <div class="card card-chart">
                  <div class="card-header">
                    <h4 class="card-title">LOGIN</h4>
                    
                  </div>
                  <div class="card-body">
 
                    <form action="php\login.php" method="POST" id="login-form">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email"  placeholder="email@gmail.com">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" >
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Group</label>
                              <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round btn-block" name ="role" title="Select Role">
                                <option disabled selected>Select your group</option>
                                <option value="student">Student</option>
                                <option value="faculty">Faculty</option>
                                <option value="admin">Admin</option>
                                <option value="higherManagement">Higher Management</option>
                                <option value="ugc">UGC</option>
                            </select>
                          </div>
                      </div>
                    </form>
                  </div>
                        <div class="card-footer" align="center">
                          <button type="button" class="btn submit-button">LOGIN</button>
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
  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>


  <script>
    $(".submit-button").click(function(){
      $("#login-form").submit();
    });
  </script>


</body>

</html>