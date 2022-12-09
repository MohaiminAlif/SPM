<?php
    include 'include/conn.php';

    $programId  = $_POST['programId'];
    $id         = $_POST['courseId'];
    $title      = $_POST['title'];
    $credit     = $_POST['credit']; 

    $query = "INSERT INTO course (id, programId, title, credit) VALUES ('$id', '$programId', '$title', '$credit')";

    if($conn->query($query) == FALSE){
        header("Location: ../admin/admin-add-course.php?response=500");
    }

    for($i=1; $i<=14; $i++){
        $ploIndx = $_POST['plo'.$i];
        if(isset($_POST['plo'.$i."-co"])){
            $ploId = "SELECT serial FROM plo WHERE programId = '$programId' AND indx = $ploIndx";
            $ploId = $conn->query($ploId)->fetch_row()[0];
            $query = "INSERT INTO co (courseId, ploId) VALUES ('$id', $ploId)";
            $conn->query($query);
            $mappings = $_POST['plo'.$i."-co"];
            foreach($mappings as $map){
                $query = "UPDATE co SET co".$map."=1 WHERE ploId = '$ploId'";
                $conn->query($query);
            }
        }
    }

    header("Location: ../admin/admin-add-course.php?response=200");

?>