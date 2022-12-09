<?php
    include 'conn.php';

    if(isset($_GET['id'])){
        $studentId = $_GET['id'];

        $query = "SELECT * FROM marks WHERE studentId = $studentId";
        $m = $conn->query($query);
        $marks = array();
        $marksM = array();

        $sems = array();

        foreach($m as $v){
            $examId = $v['examId'];
            $query = "SELECT * FROM exam WHERE serial = $examId";
            $exam = $conn->query($query)->fetch_assoc();
            $sem = $exam['semester'];
            for($i=1; $i<=8; $i++){
                if(isset($v['mark'.$i.'Co']) && $v['mark'.$i.'Co']){
                    $c = $v['mark'.$i.'Co'];
                    if(isset($marks[$sem][$c])){
                        $marks[$sem][$c] += $v['mark'.$i];
                    }else{
                        $marks[$sem][$c] = $v['mark'.$i];
                    }

                    if(isset($marksM[$sem][$c])){
                        $marksM[$sem][$c] += $exam['q'.$i.'Max'];
                    }else{
                        $marksM[$sem][$c] = $exam['q'.$i.'Max'];
                    }
                }
            }
            $crs = $exam['courseId'];
            $query = "SELECT * FROM co WHERE courseId = '$crs'";
            $sems[$sem] = $conn->query($query)->num_rows;

            
        }

        $query = "SELECT programId FROM student WHERE id = $studentId";
        $programId = $conn -> query($query)->fetch_row()[0];

        $query = "SELECT serial FROM plo WHERE programId = '$programId' ORDER BY indx";
        $ploR = $conn -> query($query);
        $ploId = array();
        $i = 1;
        foreach($ploR as $p){
            $ploId[$i] = $p['serial'];
            $i++;
        }

        $ploF = array();
        foreach($marks as $s => $m){
            for($i=1; $i<=count($ploId); $i++){
                $query = "SELECT * FROM co WHERE ploId = ".$ploId[$i];
                $coList = $conn->query($query)->fetch_assoc();
                if($coList==null){
                    continue;
                }
                $mark = 0; $max = 0;
                for($j=1; $j<=10; $j++){
                    if($coList['co'.$j]==1){
                        $mark += $marks[$s][$j];
                        $max += $marksM[$s][$j];
                    }
                }
                if(round((($mark * 100) / $max), 2) > 40){
                    if(isset($ploF[$s])){
                        $ploF[$s]++;
                    }else{
                        $ploF[$s]=1;
                    }
                }
            }
        }

    }else{
        $studentId = 0;
    }

    if(isset($_GET['semester'])){
        $semester = $_GET['semester'];
        $query = "SELECT * FROM student";
        $stuList = $conn->query($query);
        $numS = $stuList->num_rows;
        $i = 1;
        $finalC = array();
        $finalp = array();
        foreach($stuList as $stu){
            $i++;
            $sId = $stu['id'];
            $query = "SELECT * FROM marks WHERE studentId = $sId";
            $result = $conn->query($query);

            $programId = $stu['programId'];

            $query = "SELECT serial FROM plo WHERE programId = '$programId' ORDER BY indx";
            $ploR = $conn -> query($query);
            $ploId = array();
            $i = 1;
            foreach($ploR as $p){
                $ploId[$i] = $p['serial'];
                $i++;
            }

            $coMark = array();
            $coMax = array();
            $course = array();
            $courseM = array();


            
            foreach($result as $e){
                $i = 1;
                $query = "SELECT * FROM exam WHERE serial = ".$e['examId'];
                $max = $conn->query($query)->fetch_assoc();

                //while($e['mark'.$i.'Co'] && $i<9){
                    while($i<9){
                        $co = $e['mark'.$i.'Co'];
                        if(isset($coMark [$co])){
                            $coMark [$co] = $coMark [$co] + $e['mark'.$i];
                        }else{
                            $coMark [$co] = $e['mark'.$i];
                        }

                        if(isset($coMax [$co])){
                            $coMax [$co] = $coMax [$co] + $max['q'.$i.'Max'];
                        }else{
                            $coMax [$co] = $max['q'.$i.'Max'];
                        }

                        $courseId = $max['courseId'];

                        if(isset($course[$courseId][$co])){
                            $course[$courseId][$co] = $course[$courseId][$co] + $e['mark'.$i];
                        }else{
                            $course[$courseId][$co]  = 0 + $e['mark'.$i];
                        }

                        if(isset($courseM[$courseId][$co])){
                            $courseM[$courseId][$co] = $courseM[$courseId][$co] + $max['q'.$i.'Max'];
                        }else{
                            $courseM[$courseId][$co]  = 0 + $max['q'.$i.'Max'];
                        }
                        $i++;
                    } 

            }



            $ploFinal = array();
            for($i=1; $i<=count($ploId); $i++){
                $query = "SELECT * FROM co WHERE ploId = ".$ploId[$i];
                $coList = $conn->query($query)->fetch_assoc();
                if($coList==null){
                    $ploFinal[$i] = -1;
                    continue;
                }
                $mark = 1; $max = 1;
                for($j=1; $j<=10; $j++){
                    if($coList['co'.$j]==1){
                        $mark += $coMark[$j];
                        $max += $coMax[$j];
                    }
                }
                $ploFinal [$i] =  round((($mark * 100) / $max), 2);
            }

            foreach($coMark as $i => $mark){
                if($mark *100 /$coMax[$i] >= 40){
                    if(isset($finalC[$i])){
                        $finalC[$i]++;
                    }else{
                        $finalC[$i]=1;
                    }
                }
            }

            foreach($ploFinal as $i => $f){
                if($f==-1){
                    continue;
                }
                if($f>=40.0){
                    if(isset($finalP[$i])){
                        $finalP[$i]++;
                    }else{
                        $finalP[$i]=1;
                    }
                }
            }

            
        }

        ksort($finalC);
        ksort($finalP);

    }else{
        $semester = null;
    }


?>
