<?php
    include 'include/conn.php';

    $semester   = $_POST['semester'];
    $section    = $_POST['section'];
    $examName   = $_POST['exam']; 
    $courseId   = $_POST['courseId'];
    $studentId   = $_POST['studentId'];
    
    $query = "SELECT serial FROM exam WHERE semester = '$semester' AND courseId = '$courseId' AND examName = '$examName' AND section = '$section'";
    $res = $conn->query($query)->fetch_row();

    if($res == null){

        $query = "INSERT INTO exam (semester, section, examName, courseId) 
                    VALUES ('$semester', '$section', '$examName', '$courseId')";
        $conn->query($query);
        $res = $conn->insert_id;

        if ( $_FILES["file"]['size'] != 0 )  {
            $file = fopen($_FILES['file']['tmp_name'], "r");
            fgetcsv($file, 1000);
            $data = fgetcsv($file, 1000);
            for($i= 1; $i<count($data); $i++){
                $max = $data[$i];
                $query = "UPDATE exam SET q".$i."Max='$max' WHERE serial=$res";
                $conn->query($query);
            }
        }else{
            for($i=1; $i<=8; $i++){
                if(isset($_POST["qt".$i])){
                    $max = $_POST["qt".$i];
                    $query = "UPDATE exam SET q".$i."Max='$max' WHERE serial=$res";
                    $conn->query($query);
                }else{
                    continue;
                }
            }
        }
    }else{
        $res = $res[0];
    }

    if ($_FILES["file"]['size'] != 0) {

        $file = fopen($_FILES['file']['tmp_name'], "r");
        $coList = fgetcsv($file, 1000);
        $cos = array();
        $i = 0;
        foreach($coList as $co){
            $cos[$i] = $co;
            $i++;
        }
        fgetcsv($file, 1000);

        while (($data = fgetcsv($file, 1000, ",")) !== FALSE){   
            $studentId = $data[0];
            $query = "INSERT INTO marks (examId, studentId) VALUES($res, $studentId)";
            $conn->query($query);
            for($i=1; $i<count($data); $i++){
                $mark = $data[$i];
                $co = $cos[$i];
                $query = "UPDATE marks SET mark".$i."='$mark', mark".$i."Co ='$co' WHERE examId=$res AND studentId=$studentId";
                $conn->query($query);
            }
        }
         header("Location: ../faculty/faculty-marks-entry.php?response=200");
    }
    

 
    $query = "INSERT INTO marks (examId, studentId) VALUES($res, $studentId)";
    $conn->query($query);

    for($i=1; $i<=8; $i++){
        if(isset($_POST["q".$i])){
            $mark = $_POST["q".$i];
            $co = $_POST["q".$i."co"];
            $query = "UPDATE marks SET mark".$i."='$mark', mark".$i."Co ='$co' WHERE examId=$res AND studentId=$studentId";
            $conn->query($query);
        }else{
            continue;
        }
    }
    header("Location: ../faculty/faculty-marks-entry.php?response=200");
    
?>

 