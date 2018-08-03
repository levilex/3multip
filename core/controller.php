<?php

include 'model/model.php';

define("ERROR", "ERROR");

$dbConnect;
$playerName = "";
$registered = false;
$error = false;

/*
 * REGISTRO DEL JUGADOR
 */
if (isset($_POST["playerName"]) && ($_POST["playerName"] != "")) {
    $playerName = $_POST["playerName"];
    $dbConnect = conectarBD();
    if ($dbConnect) {
        $registered = registrarJugador($dbConnect, $playerName);
        if ($registered) {
            echo 'REGISTRADO ';
        } else {
            $error = true;
            echo 'NO REGISTRA JUGADOR ';
        }
    } else {
        $error = true;
        echo 'NO CONECTA BASE ';
    }
} else {
    $error = true;
    echo 'UNSET NAME ';
}

/*
 * SEMÁFORO DE ERROR
 */
if ($error) {
    imprimirError();
}

/*
 * MENSAJE DE ERROR
 */

function imprimirError() {
    print(ERROR);
}
