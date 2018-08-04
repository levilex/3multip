<?php

/*
 * Database connection data 
 */
$host = "localhost";
$user = "root";
$password = "root"; /* ERASE BEFORE COMMIT */
$database = "3multip";
//$port = "";
//$socket = "";

/*
 * Database structure 
 */
/* Player names table */
$namesTable = "playernames";
$idAttr = "rowid";
$nameAttr = "name"; // VARCHAR 16

/* Move table */
$moveTable = "movements";
$idAttrMove = "rowid";
$playerMove = "player";
$moveAttr = "move";
