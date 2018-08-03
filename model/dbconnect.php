<?php

/* Database conection data */
$database_host = "localhost";
$database_user = "root";
$database_password = "root"; /* ERASE BEFORE COMMIT */
$database_name = "3multip";

//$database_port = "";
//$database_socket = "";
//
// Create connection
function databaseConnect() {
    $errorMessage = "";
    $conn = mysqli_connect($database_host, $database_user, $database_password, $database_database);
    if ($conn) {
        //echo "Connected successfully";
        return $conn;
    } else {
        $errorMessage = die("Connection failed: " . mysqli_connect_error());
        return $errorMessage;
    }
}
