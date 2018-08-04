<?php

include 'model/model.php';

define("ERROR", "ERROR");

$dbConnect;
$playerName = "";
$registered = false;
$error = false;
$enemigos = false;

/*
 * REGISTRO DEL JUGADOR
 */
if (isset($_POST["playerName"])) {
    if ($_POST["playerName"] === '') {
        //$error = true;
        echo 'EL NOMBRE NO PUEDE ESTAR VACÍO';
    } else {
        $playerName = $_POST["playerName"];
        $dbConnect = conectarBD();
        if ($dbConnect) {
            $registered = registrarJugador($dbConnect, $playerName);
            if ($registered) {
                echo 'REGISTRADO ';
                //$enemigos = comprobarJugadores($dbConnect);
            } else {
                //$error = true;
                //echo 'NO REGISTRA JUGADOR ';
            }
        } else {
            //$error = true;
            echo 'NO CONECTA BASE ';
        }
    }
}

if (isset($_POST["refresh"])) {
    $dbConnect = conectarBD();
    $enemigos = comprobarJugadoresCantidad($dbConnect);
    if ($enemigos) {
        echo 'ENEMIGO AVISTADO ';
    } else {
        echo 'ESTÁS SOLA';
    }
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
