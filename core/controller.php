<?php

include 'model/model.php';

define("ERROR", "ERROR");
define("PLAYER", "playerName");
define("SESS_USER", "user");
define("RESET", "reset");
define("REFRESH", "refresh");
define("TIRAR", "tirar");

$dbConnect = conectarBD();

/*
 * REGISTRO DEL JUGADOR
 */
if (!isset($_SESSION[SESS_USER])) {
    if (isset($_POST[PLAYER])) {
        if ($_POST[PLAYER] == '') {
            //$error = true;
            echo 'EL NOMBRE NO PUEDE ESTAR VACÍO';
        } else {
            $playerName = $_POST[PLAYER];
            if ($dbConnect) {
                $registered = registrarJugador($dbConnect, $playerName);
                if ($registered) {
                    $_SESSION[SESS_USER] = $playerName;
                    echo 'REGISTRADO ' . $_SESSION[SESS_USER];
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

if (isset($_POST[REFRESH])) {
    if (isset($_SESSION[SESS_USER])) {
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

if (isset($_POST[RESET])) {
    if (isset($_SESSION[SESS_USER])) {
        $resetPlayer = resetPlayer($dbConnect, $_SESSION[SESS_USER]);
        if ($resetPlayer) {
            session_destroy();
        }
        unset($_POST[RESET]);
    } else {
        echo 'AÚN NO HA EMPEZADO... ';
        unset($_POST[RESET]);
    }
}

/*
 * CONTROL DE JUEGO
 */
if (isset($_POST[TIRAR])) {
    if (isset($_SESSION[SESS_USER])) {
        if (isset($_POST["A1"])) {
            //
        }
        unset($_POST[TIRAR]);
    } else {
        echo 'PRIMERO, DEBE REGISTRARSE ';
        unset($_POST[TIRAR]);
    }
}

/*
 * MENSAJE DE ERROR
 */

function imprimirError() {
    print(ERROR);
}
