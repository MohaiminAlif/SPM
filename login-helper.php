

<?php
  session_start();
  if(isset($_SESSION['role']) &&($_SESSION['email']!="notFound")){
    if($_SESSION['role'] == 'ugc'){
      header("Location: ugc/ugcHome.php");
    }else if($_SESSION['role'] == 'student'){
      header("Location: student/student-result.php");
    }else if($_SESSION['role'] == 'faculty'){
      header("Location: faculty/faculty-marks-entry.php");
    }else if($_SESSION['role'] == 'admin'){
      header("Location: admin/admin-users.php");
    }else if($_SESSION['role'] == 'higherManagement'){
      header("Location: hm/index.php");
    }
  }
  // else{
  //   echo "<script type='text/javascript'>alert('Email or Password is Incorrect')</script>";
  // }
?>