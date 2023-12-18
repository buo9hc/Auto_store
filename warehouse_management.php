<?php
    include("connect2server.php");

    for ($row=1; $row <= 15 ; $row++) { 
        for($col=1; $col<= 20; $col++) {
            $sql = "UPDATE warehouse_block SET x$col = NULL WHERE No=$row";
            // echo $sql."\n";
            $conn->query($sql);
        }
    }

    $sql = "select coordinate from orders";
    $result = $conn->query($sql);
    $read_coordinate = array();
    foreach ($result as $read) {
        $read_coordinate[] = "$read[coordinate]";
    }
    // echo $read_coordinate[0];
    for ($i=0; $i < count($read_coordinate); $i++) { 
        $x = strpos($read_coordinate[$i], " ");
        $col = substr($read_coordinate[$i],0,$x);
        $row = substr($read_coordinate[$i],$x);
        // echo $row." ".$col."\n";

        $sql = "UPDATE warehouse_block SET x$col = 1 WHERE No=$row";
        // echo $sql."\n";
        $conn->query($sql);
    }


    $conn->close();
?>