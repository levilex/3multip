<?php

include 'model/model.php';

define("DBCONNECT", "dbConnect");
define("ERROR", "ERROR");
define("PLAYER", "playerName");
define("SESS_USER", "user");
define("RESET", "reset");
define("REFRESH", "refresh");
define("TIRAR", "tirar");
define("ENEMIGO", "enemigo");
define("TURNO", "turno");
define("TURNO_ENEMIGO", "turnoEnemigo");
define("PRIMERO", "primero");

$dbConnect = conectarBD();

$_SESSION[DBCONNECT] = conectarBD();

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
            if ($_SESSION[DBCONNECT]) {
                $registered = registrarJugador($_SESSION[DBCONNECT], $playerName);
                if ($registered) {
                    $_SESSION[SESS_USER] = $playerName;
                    echo 'REGISTRADO ' . $_SESSION[SESS_USER];
                    $buscarEnemigos = comprobarJugadoresCantidad($_SESSION[DBCONNECT]); //
                    if ($buscarEnemigos) {
                        $_SESSION[ENEMIGO] = true;
                        if (!isset($_SESSION[TURNO])) {
                            $turnos = gestionarTurnos($_SESSION[DBCONNECT], $playerName);
                        }
                    }
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
    echo 'USTED YA SE REGISTRÓ: ' . $_SESSION[SESS_USER];
}

if (isset($_POST[RESET])) {
    if (isset($_SESSION[SESS_USER])) {
        $resetPlayer = resetPlayer($_SESSION[DBCONNECT], $_SESSION[SESS_USER]);
        echo 'DELETED: ' . $_SESSION[SESS_USER];
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
 * CONTROL DE JUEGO (FALTA TODO EL JS)
 */

if (isset($_POST[REFRESH])) {
    if (isset($_SESSION[SESS_USER])) {
        if (!isset($_SESSION[ENEMIGO])) {
            $buscarEnemigos = comprobarJugadoresCantidad($_SESSION[DBCONNECT]);
            if ($buscarEnemigos) {
                $_SESSION[ENEMIGO] = true;
                $turnos = gestionarTurnos($_SESSION[DBCONNECT], $_SESSION[SESS_USER]);
                echo 'ENEMIGO AVISTADO ';
            } else {
                echo 'ESTÁS SOLA';
            }
        } else {
            accionEnemiga();
        }
    } else {
        echo 'DEBE REGISTRARSE PRIMERO ';
    }
}

if (isset($_POST[TIRAR])) {
    if (isset($_SESSION[SESS_USER])) {
        if (isset($_SESSION[ENEMIGO])) {
            if (!isset($_SESSION[TURNO])) {
                $turnos = gestionarTurnos($_SESSION[DBCONNECT], $_SESSION[SESS_USER]);
            } else {
                if ($_SESSION[TURNO] == 1) {
                    if ($_SESSION[PRIMERO]) {
                        if (isset($_POST["A1"])) {
                            $cargaJugada = cargarJugada($_SESSION[DBCONNECT], $_SESSION[SESS_USER], $_POST["A1"], $_SESSION[TURNO]);
                            if ($cargaJugada) {
                                echo ' CARGADA ';
                                $_SESSION[TURNO] ++;
                            } else {
                                echo 'FALLÓ LA CARGA ';
                            }
                        }
                    } else {
                        accionEnemiga();
                    }
                } else {
                    //
                }
            }
        } else {
            echo 'TODAVIA NO TIENES ENEMIGO ';
        }
    } else {
        echo 'PRIMERO, DEBE REGISTRARSE ';
    }
    unset($_POST[TIRAR]);
}

/*
 * Comprueba si el enemigo ha tirado, y qué ha tirado
 */

function accionEnemiga() {
    $tiradaEnemiga = comprobarTiradaEnemiga($_SESSION[DBCONNECT], $_SESSION[SESS_USER], $_SESSION[TURNO]);
    if ($tiradaEnemiga) {
        echo 'EL ENEMIGO HA TIRADO: ' . $tiradaEnemiga;
    } else {
        echo 'EL ENEMIGO TODAVÍA NO HA TIRADO...';
    }
}

/*
 * Gestión de turnos
 */

function gestionarTurnos($dbConnect, $playerName) {
    $lastPlayer = buscarUltimo($dbConnect, $playerName);
    if ($lastPlayer) {
        $_SESSION[PRIMERO] = false;
        echo 'EMPIEZA EL OTRO ';
    } else {
        $_SESSION[PRIMERO] = true;
        echo 'EMPIEZAS TU ';
    }
    $_SESSION[TURNO] = 1;
}

/*
 * MENSAJE DE ERROR
 */

function imprimirError() {
    print(ERROR);
}
