<?php
$servername = "localhost";
  $username = "admin";
  $password = "123456";
  $dbname = "auto_store";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 
?>