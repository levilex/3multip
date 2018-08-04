<?php

include 'model/model.php';

define("ERROR", "ERROR");

$dbConnect = null;
$playerName = null;
$registered = null;
$error = null;
$enemigos = null;
$resetPlayer = null;

/*
 * REGISTRO DEL JUGADOR
 */
if (!isset($_SESSION["user"])) {
    if (isset($_POST["playerName"])) {
        if ($_POST["playerName"] == '') {
            //$error = true;
            echo 'EL NOMBRE NO PUEDE ESTAR VACÍO';
        } else {
            $playerName = $_POST["playerName"];
            $dbConnect = conectarBD();
            if ($dbConnect) {
                $registered = registrarJugador($dbConnect, $playerName);
                if ($registered) {
                    $_SESSION['user'] = $playerName;
                    echo 'REGISTRADO ' . $_SESSION["user"];
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
} else {
    echo 'USTED YA SE REGISTRÓ ';
}

if (isset($_POST["refresh"])) {
    if (isset($_SESSION["user"])) {
        $dbConnect = conectarBD();
        $enemigos = comprobarJugadoresCantidad($dbConnect);
        if ($enemigos) {
            echo 'ENEMIGO AVISTADO ';
        } else {
            echo 'ESTÁS SOLA';
        }
    } else {
        echo 'DEBE REGISTRARSE PRIMERO ';
    }
}

if (isset($_POST["reset"])) {
    if (isset($_SESSION["user"])) {
        $dbConnect = conectarBD();
        $resetPlayer = resetPlayer($dbConnect, $_SESSION["user"]);
        if ($resetPlayer) {
            session_destroy();
        }
        unset($_POST["reset"]);
    } else {
        echo 'AÚN NO HA EMPEZADO... ';
        unset($_POST["reset"]);
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
