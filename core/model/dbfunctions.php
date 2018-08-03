<?php

/*
 * Recibe el resultado del COUNT de una consulta y lo pasa a una variable normal
 */

function extraerCount($datos) {
    $result = mysqli_fetch_array($datos);
    return $result[0];
}
