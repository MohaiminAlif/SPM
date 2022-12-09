<?php
    include  'conn.php';

    if(isset($_GET['id'])){
        $studentId = $_GET['id'];
        $query = "SELECT * FROM marks WHERE studentId = $studentId";
        $result = $conn->query($query);

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
            $query = "SELECT * FROM co WHERE ploId = .$ploId[$i]";
            $coList = $conn->query($query)->fetch_assoc();
            if($coList==null){
                $ploFinal[$i] = 0;
                continue;
            }
            $mark = 0; $max = 0;
            for($j=1; $j<=10; $j++){
                if($coList['co'.$j]==1){
                    $mark += $coMark[$j];
                    $max += $coMax[$j];
                }
            }
            $ploFinal [$i] =  round((($mark * 100) / $max), 2);
        }

    
        $courseFinal = array();
        foreach($course as $id => $m){
            for($i=1; $i<=count($ploId); $i++){
                $query = "SELECT * FROM co WHERE ploId = $ploId[$i] AND courseId = '$id'";
                $coList = $conn->query($query)->fetch_assoc();
                if($coList==null){
                    $courseFinal[$id][$i] = -1;
                    continue;
                }
                $mark = 1; $max = 1;
                for($j=1; $j<=10; $j++){
                    if($coList['co'.$j]==1){
                        $mark += $course[$id][$j];
                        $max += $courseM[$id][$j];
                    }

                }
                $courseFinal[$id][$i] = round((($mark * 100) / $max), 2);
            }
        }

        $ploCo = array();
        for($i=1; $i<=count($ploId); $i++){
            $query = "SELECT * FROM co WHERE ploId = ".$ploId[$i];
            $coList = $conn->query($query)->fetch_assoc();
            if($coList==null){
                for($j=1; $j<=10; $j++){
                    if(!isset($ploCo[$i][$j])){
                        $ploCo[$i][$j] = 0;
                    }
                }
                continue;
            }

            for($j=1; $j<=10; $j++){
                if($coList['co'.$j]==1){
                    if(!isset($ploCo[$i][$j])){
                        //$ploCo[$i][$j] = $coMark[$j];
                    }else{
                        $ploCo[$i][$j] += $coMark[$j];
                    }
                }else{
                    if(!isset($ploCo[$i][$j])){
                        $ploCo[$i][$j] = 0;
                    }
                }
                
            }
        }
        $ploCoFinal = array();
        for($i=1; $i<=10; $i++){
            for($j=1; $j<=count($ploId); $j++){
                //$ploCoFinal[$i][$j] = $ploCo[$j][$i];
            }
        }

    }else{
        $studentId = 0;
    }  
    
?>