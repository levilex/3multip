<?php

/*
 * Recibe el resultado del COUNT de una consulta y lo pasa a una variable normal
 */

function extraerCount($datos) {
    $result = mysqli_fetch_array($datos);
    //echo 'COUNT: ' . $result[0] . " ";
    return $result[0];
}

function extraerDato($datos) {
    $result = mysqli_fetch_row($datos);
    //echo 'DATO: ' . $result[0];
    return $result[0];
}