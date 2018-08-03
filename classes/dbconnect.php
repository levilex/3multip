<?php

function conecta() {
    $servername = "localhost";
    $database = "3multi";
    $username = "root";
    $password = "";

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";

    return $conn;
}


