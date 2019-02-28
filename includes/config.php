<?php
    $username = "root";
    $passsword = "";
    $host = "localhost";
    $database = "Blog";

    $connection =  mysqli_connect($host, $username, $passsword, $database);    

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }     
?>