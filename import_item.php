<?php
    include("connect2server.php");
    /**
     * Import item to database
     */
    $Order_name = $_POST["order_name"];
    $Order_code = $_POST["order_code"];
    $Coordinate = $_POST["location"];
    $sql = "insert into orders (order_name, order_code, coordinate)
            values ('$Order_name', '$Order_code', '$Coordinate')";
    $conn->query($sql);
    $conn->close();
?>