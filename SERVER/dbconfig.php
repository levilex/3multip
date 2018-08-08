<?php

/*
 * Database connection data 
 */
$host = "sql205.unaux.com";
$user = "unaux_22506538";
$password = "password"; /* ERASE BEFORE COMMIT */
$database = "unaux_22506538_3multip";
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
$turnAttr = "turn";
