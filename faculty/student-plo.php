
<?php
    require '../php/include/check-conn.php';
    include '../php/include/plo.php';

    if(isset($_GET['id'])){     
        $id = $_GET['id'];
        $sql = "SELECT * FROM marks WHERE studentId = $id";
        $sMarks = $mysql->query($sql);

        //course based total co marks
        $cMarks = array();
        $cTotal = array();
        foreach($sMarks as $marks){
            $course = $marks['course_id'];
            for($i=1; $i<=10; $i++){
                if(isset($marks["q".$i."_co"]) && $marks["q".$i."_co"]!=0){
                    $co = $marks["q".$i."_co"];
                    if(isset($cMarks[$course][$co])){
                        $cMarks[$course][$co] += $marks["q".$i."_mark"];
                        $cTotal[$course][$co] += $marks["q".$i."_max"];
                    }else{
                        $cMarks[$course][$co] = $marks["q".$i."_mark"];
                        $cTotal[$course][$co] = $marks["q".$i."_max"];
                    }
                }
            }
        }

        $pMarks = array();
        $pTotal = array();
        foreach($cMarks as $c => $v){

            $sql = "SELECT * FROM co WHERE course_id = '$c'";
            $plos = $mysql->query($sql);
            foreach($plos as $plo){
                $pId = $plo['plo_id'];
                for($i=1; $i<=10; $i++){
                    if(isset($plo["co".$i]) && $plo["co".$i]==1){
                        if(isset($pMakrs[$c][$pId])){
                            $pMarks[$c][$pId] += $cMarks[$c][$i];
                            $pTotal[$c][$pId] += $cTotal[$c][$i];
                        }else{
                            $pMarks[$c][$pId] = $cMarks[$c][$i];
                            $pTotal[$c][$pId] = $cTotal[$c][$i];
                        }
                    }
                }
            }
        }

        //total marks in plo
        $pfMarks = array();
        $pfTotal = array();
        foreach($pMarks as $c => $v){
            foreach($v as $i => $j){
                if(isset($pfMarks[$i])){
                    $pfMarks[$i] += $j;
                    $pfTotal[$i] += $pTotal[$c][$i];
                }else{
                    $pfMarks[$i] = $j;
                    $pfTotal[$i] = $pTotal[$c][$i];
                }
            }
        }
        
        //student info
        //$sql = "SELECT * FROM user WHERE id = $id";
        $sql = "SELECT * FROM user WHERE id = 1416455";
        $student = $mysql->query($sql)->fetch_assoc();
        //total plo 
        $sql = "SELECT * FROM plo WHERE programId = '".$student['programId']."'";
        $ploNum = $mysql->query($sql)->num_rows;

        $color = ["", "#1FE7C4", "#E45C17", "#06B97B", "#8CE026", "#E1CCFF", "#5BA2CC", "#0A2E82", "#957107", "#80CF18"];
    }  
?>