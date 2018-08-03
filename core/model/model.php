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
 * Operaciónes relacionadas con el registro de un nuevo jugador
 */

function registrarJugador($dbConnect, $playerName) {
    $nombreValido = comprobarNombre($dbConnect, $playerName);
    $insertName = "INSERT INTO " . PLAYERSTABLE . " (" . PLAYERID . ", " . PLAYERNAME . ") "
            . "VALUES (DEFAULT, " . "'" . $playerName . "');";
    if ($nombreValido) {
        $queryInsert = mysqli_query($dbConnect, $insertName);
        if ($queryInsert) {
            echo 'NOMBRE METIDO ';
            return true;
        } else {
            echo 'NO METE NOMBRE ';
            return false;
        }
    } else {
        echo 'NO VALIDA NOMBRE ';
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
