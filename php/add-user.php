<?php
    include 'include/conn.php';

    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $universityName = $_POST['university'];
    $role = $_POST['role'];
    

    $query = "";

    if($role == "student"){
        $progId = $_POST['programId'];
        $query = "INSERT INTO $role (id, firstName, lastName, email, programId, password,uName)
              VALUES ($id, '$firstName', '$lastName', '$email', '$progId', '$password', '$universityName')";
    }else{
        $query = "INSERT INTO $role (id, firstName, lastName, email, password, uName)
              VALUES ('$id', '$firstName', '$lastName', '$email', '$password', '$universityName')";
    }

    if($conn->query($query) == TRUE){
        header("Location: ../admin/admin-add-user.php?response=200");
    }else{
        //echo $conn->error;
        header("Location: ../admin/admin-add-user.php?response=501");
    }

?>

 