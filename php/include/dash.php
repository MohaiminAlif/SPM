<?php
    include  'conn.php';

    $query = "SELECT COUNT(*) FROM course";
    $totalCourse = $conn->query($query)->fetch_row()[0];

    $query = "SELECT COUNT(*) FROM student";
    $totalStudent = $conn->query($query)->fetch_row()[0];

    $query = "SELECT COUNT(*) FROM faculty";
    $totalFaculty = $conn->query($query)->fetch_row()[0];

    $query = "SELECT COUNT(*) FROM plo";
    $totalPLO = $conn->query($query)->fetch_row()[0];
    
    // print_r($totalPLO);
?>