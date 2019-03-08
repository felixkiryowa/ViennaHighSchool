<?php 
    include_once("constants.php");
    $connection = new mysqli(HOST, USER, PASS, DB);
    
    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
?>