<?php

/* Database conection data */
$database_host = "";
$database_user = "";
$database_password = "";
$database_name = "";
$database_port = "";

//$database_socket = "";
//
// Create connection
function conecta() {
    $errorMessage = "";
    $conn = mysqli_connect($database_host, $database_user, $database_password, $database_database, $database_port);
    if ($conn) {
        //echo "Connected successfully";
        return $conn;
    } else {
        $errorMessage = die("Connection failed: " . mysqli_connect_error());
        return $errorMessage;
    }
}
