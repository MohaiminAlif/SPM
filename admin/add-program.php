<?php
    include '../php/include/conn.php';

    $id     = $_POST['id'];
    $title  = $_POST['title'];
    $school = $_POST['school'];
       
    $query = "INSERT INTO program (id, title, school) VALUES ('$id', '$title', '$school')";
    if($conn->query($query) == FALSE){
        header("Location: admin-add-program.php?response=500");
    }

    for($i=1; $i<=16; $i++){
        $title = $_POST['ploTitle'.$i];
        $des = $_POST['ploDes'.$i];
        if($title == '' || $title == null){
            continue;
        }
        $query = "INSERT INTO plo (programId, indx, title, description) VALUES 
                ('$id', $i, '$title', '$des')";

        $conn->query($query);
    }

    header("Location: admin-add-program.php?response=200");

?>