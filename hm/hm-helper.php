

<?php
    include '../php/include/conn.php';

    if(isset($_POST['submit']))
    {
      $fName = $_POST["fName"];
      $view = $_POST["view"];
    }
    $fName = $_POST['fName'];
    $view = $_POST['view'];

    $query = "SELECT 
    SUM(mark1) as m1,
    SUM(mark2) as m2,
    SUM(mark3) as m3,
    SUM(mark4) as m4,
    SUM(mark5) as m5
    FROM marks";
    $result = $conn->query($query);

    while($row = mysqli_fetch_array($result))
    {

        $dataPoints = array( 
        array("label"=>"PLO-1", "symbol" => "PL0-1","y"=>$row["m1"]),
        array("label"=>"PLO-2", "symbol" => "PLO-2","y"=>$row["m2"]),
        array("label"=>"PLO-3", "symbol" => "PLO-3","y"=>$row["m3"]),
        array("label"=>"PLO-4", "symbol" => "PLO-4","y"=>$row["m4"]),
        array("label"=>"PLO-5", "symbol" => "PLO-5","y"=>$row["m5"]),
        );
    }


    
    if(isset($_POST['submit']))
    {
      $fName = $_POST["fName"];
      $view = $_POST["view"];
    }

    $fName = $_POST['fName'];
    $view = $_POST['view'];

    $query = "SELECT 
    SUM(mark1) as m1,
    SUM(mark2) as m2,
    SUM(mark3) as m3,
    SUM(mark4) as m4,
    SUM(mark5) as m5
    FROM marks";
    $result = $conn->query($query);

 

        $dataPoints1 = array(
 
            array("x" => 1, "y" => 10),
            array("x" => 2, "y" => 5),
            array("x" => 3, "y" => 6),
            array("x" => 4, "y" => 7),
            array("x" => 5, "y"=> 8)
         );

         $dataPoints2 = array(
 
            array("x"=> 1, "y" => 10.5),
            array("x"=> 2, "y" => 5.6),
            array("x"=> 3, "y" => 7.7),
            array("x"=> 4, "y" => 7.9),
            array("x"=> 5, "y" => 10)
         );
 
?>