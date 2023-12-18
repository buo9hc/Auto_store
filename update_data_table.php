<?php
    header('Content-Type: application/json');
    include ("connect2server.php");

    $sql = "select * from warehouse_block";
    $result = $conn->query($sql);
    $data = array();

    foreach($result as $row){
        $data[]=$row;
    }
    
    $conn->close();
    echo json_encode($data);
?>