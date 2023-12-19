<?php
    header('Content-Type: application/json');
    include ("connect2server.php");

    $sql = "select * from robot01";
    $result_rb = $conn->query($sql);
    $data_rb = array();

    foreach($result_rb as $row_rb){
        $data_rb[]=$row_rb;
    }
    
    $conn->close();
    echo json_encode($data_rb);
?>