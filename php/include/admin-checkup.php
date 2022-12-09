<?php
    include 'conn.php';

    if(isset($_GET['a'])){
        $id = $_GET['a'];
        $query = "UPDATE exam SET status = 1 WHERE serial = $id";
        $conn->query($query);
    }

    if(isset($_GET['d'])){
        $id = $_GET['d'];
        $query = "UPDATE exam SET status = -1 WHERE serial = $id";
        $conn->query($query);
    }

    header("Location: ../admin/admin-marksheets.php?response=200");

?>