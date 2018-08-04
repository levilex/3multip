<?php

include 'dbconfig.php';
include 'dbfunctions.php';

define("HOST", $host);
define("USER", $user);
define("PASSWORD", $password);
define("DATABASE", $database);

define("PLAYERSTABLE", $namesTable);
define("PLAYERID", $idAttr);
define("PLAYERNAME", $nameAttr);

define("MOVETABLE", $moveTable);
define("MOVE", $moveAttr);

/*
 * Conexión a la base de datos. Devuelve el objeto conexión
 */

function conectarBD() {
    $databaseConnect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    if ($databaseConnect) {
        mysqli_query($databaseConnect, "SET NAMES 'utf8'");
        return $databaseConnect;
    } else {
        return false;
    }
}

/*
 * Pues eso... un reset
 */

function resetPlayer($conexion, $nombre) {
    $deleteName = "DELETE FROM " . PLAYERSTABLE . " WHERE " . PLAYERNAME . " = " . "'" . $nombre . "';";
    $queryDelete = mysqli_query($conexion, $deleteName);
    if ($queryDelete) {        
        echo 'DELETED ';
        return true;
    } else {
        return false;
    }
}

/*
 * Operaciones relacionadas con el registro de un nuevo jugador
 */

function registrarJugador($dbConnect, $playerName) {
    $nombreValido = comprobarNombre($dbConnect, $playerName);
    $insertName = "INSERT INTO " . PLAYERSTABLE . " (" . PLAYERID . ", " . PLAYERNAME . ") "
            . "VALUES (DEFAULT, " . "'" . $playerName . "');";
    $playerCount = 0;
    $maxPlayers = 2;
    if ($nombreValido) {
        $playerCount = comprobarJugadoresCantidad($dbConnect);
        if ($playerCount == $maxPlayers) {
            echo 'MAX PLAYERS REACHED ';
        } else {
            $queryInsert = mysqli_query($dbConnect, $insertName);
            if ($queryInsert) {
                //echo 'NOMBRE METIDO ';
                return true;
            } else {
                //echo 'NO METE NOMBRE ';
                return false;
            }
        }
    } else {
        //echo 'NO VALIDA NOMBRE ';
        return false;
    }
}

/*
 * Comprueba si ya hay un nombre igual al proporcionado por el usuario
 */

function comprobarNombre($conexion, $nombre) {
    $query = "SELECT COUNT(" . PLAYERNAME . ") FROM " . PLAYERSTABLE
            . " WHERE " . PLAYERNAME . " LIKE " . "'" . $nombre . "';";
    $queryResult = mysqli_query($conexion, $query);
    if ($queryResult) {
        $queryFetched = extraerCount($queryResult);
        if ($queryFetched == 0) {
            return true;
        } else {
            echo 'YA EXISTE JUGADOR ';
            return false;
        }
    } else {
        echo 'QUERY CAGADA ';
        return false;
    }
}

/*
 * Comprueba cuántos jugadores hay ya registrados
 */

function comprobarJugadoresCantidad($conexion) {
    $query = "SELECT COUNT(*) FROM " . PLAYERSTABLE . ";";
    $queryResult = mysqli_query($conexion, $query);
    $maxPlayers = 2;
    if ($queryResult) {
        $queryFetched = extraerCount($queryResult);
        if ($queryFetched == $maxPlayers) {
            //echo 'ENEMIGO AVISTADO ';
            return true;
        } else {
            //echo 'ESTÁS SOLA ';
            return false;
        }
    } else {
        echo 'QUERY ENEMIGOS CAGADA ';
        return false;
    }
}

function cargarJugada($conexion, $jugador, $jugada) {
    $query = "INSERT INTO " . MOVETABLE . " VALUES (DEFAULT," . "'" .$jugador . "'"  . "," . "'" . $jugada . "');";
    $queryDone = mysqli_query($conexion, $query);
    if ($queryDone) {
        return true;
    } else {
        return false;
    }
}
