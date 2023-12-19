<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js"> </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css">
    <title>Directional Buttons</title>
    <style>
        .container {
            text-align: center;
            margin-top: 80px;
        }
        .button {
            font-size: 16px;
            padding: 10px 20px;
            margin: 50px;
        }
    </style>
</head>
<body>
<h1>ROBOT CONTROLLER</h1>
<div class="container">
    <button class="button" onclick="move('up')">Up</button><br>
    <button class="button" onclick="move('left')">Left</button>
    <button class="button" onclick="move('right')">Right</button><br>
    <button class="button" onclick="move('down')">Down</button>
</div>

<script>
    function move(direction) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET","robot_controler.php?q="+direction,true);
        xmlhttp.send();
    }
</script>

</body>
</html>
<?php
    include("connect2server.php");
    $q = $_REQUEST["q"];
    echo $q;
    // $q = "down";
    $sql = "select * from robot01";
    $result_rb = $conn->query($sql);
    $data_rb = array();

    foreach($result_rb as $row_rb){
        $data_rb[]=$row_rb;
        $robot_coordinate = "$row_rb[robot_coordinate]";
    }
    $x_rb = strpos($robot_coordinate, " ");
    $col_rb = substr($robot_coordinate,0,$x_rb);
    $row_rb = substr($robot_coordinate,$x_rb);
    if ($q == "right") {
        $col_rb += 1; 
    }
    elseif ($q == "left") {
        $col_rb -= 1;
    }
    elseif ($q == "up") {
        $row_rb -= 1;
    }
    elseif ($q == "down") {
        $row_rb += 1;
    }
    // echo $row_rb." ".$col_rb."\n";

    $sql = "UPDATE robot01 SET robot_coordinate='$col_rb $row_rb'";
    // echo $sql."\n";
    $conn->query($sql);
?>