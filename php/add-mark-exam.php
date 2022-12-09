<?php
    include 'include/conn.php';

    $semester   = $_POST['semester'];
    $section    = $_POST['section'];
    $examName   = $_POST['exam']; 
    $courseId   = $_POST['courseId'];
    $studentId   = $_POST['studentId'];

    $q1   = $_POST['q1'];
    $qt1   = $_POST['qt1'];
    $q1co   = $_POST['q1co'];

    $q2   = $_POST['q2'];
    $qt2   = $_POST['qt2'];
    $q2co   = $_POST['q2co'];

    $q3   = $_POST['q3'];
    $qt3   = $_POST['qt3'];
    $q3co   = $_POST['q3co'];

    $q4   = $_POST['q4'];
    $qt4   = $_POST['qt4'];
    $q4co   = $_POST['q4co'];

    $q5  = $_POST['q5'];
    $qt5   = $_POST['qt5'];
    $q5co   = $_POST['q5co'];

    $q6   = $_POST['q6'];
    $qt6   = $_POST['qt6'];
    $q6co   = $_POST['q6co'];

    $q7   = $_POST['q7'];
    $qt7   = $_POST['qt7'];
    $q7co   = $_POST['q7co'];

    $q8   = $_POST['q8'];
    $qt8   = $_POST['qt8'];
    $q8co   = $_POST['q8co'];


    $query = "INSERT INTO marks_exam (student_id, course_id, exam_name, semester, section, 
                                    q1_mark, q1_co, q1_max, 
                                    q2_mark, q2_co, q2_max, 
                                    q3_mark, q3_co, q3_max, 
                                    q4_mark, q4_co, q4_max, 
                                    q5_mark, q5_co, q5_max, 
                                    q6_mark, q6_co, q6_max, 
                                    q7_mark, q7_co, q7_max, 
                                    q8_mark, q8_co, q8_max) 
                    VALUES ('$studentId', '$courseId', '$examName ', 
                        '$semester', '$section', 
                        '$q1', '$q1co', '$qt1', 
                        '$q2', '$q2co', '$qt2', 
                        '$q3', '$q3co', '$qt3', 
                        '$q4', '$q4co', '$qt4', 
                        '$q5', '$q5co', '$qt5', 
                        '$q6', '$q6co', '$qt6', 
                        '$q7', '$q7co', '$qt7', 
                        '$q8', '$q8co', '$qt8')";

   if($conn->query($query) == FALSE){
        header("Location: ../faculty/faculty-marks-entry.php?response=500");
    }


    header("Location: ../faculty/faculty-marks-entry.php?response=200");
        