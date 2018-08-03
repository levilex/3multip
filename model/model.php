<?php

require_once 'dbconnect.php';

if (isset($_POST["ficha"])) {
    $ficha = $_POST["ficha"];
    $id = $_POST["id"];
    $conn = conecta();
    $sql = "INSERT INTO tablero (id, ficha) VALUES ('" . $id . "','" . $ficha . "');";
    mysqli_query($conn, $sql);
}