<?php
session_start();
echo 'GPG sign test';
include 'core/controller.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>3multip</title>
        <link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
    </head>
    <body>
        <h1>3multip</h1>
        <fieldset>
            <form id="play" method="post" action="index.php">
                <legend>Player name</legend>
                <input name="playerName" type="text">
                <hr>
                <input name="start" type="submit" value="Start">                        
            </form>
            <hr>
            <form method="post" action="index.php">
                <input type="submit" name="reset" value="Reset">
            </form>
        </fieldset>
        <br>
        <div id="tablero">
            <form id="tirar" method="post" action="index.php">
                <table>
                    <tr>
                        <td id="A1" class="celda">A1<input id="A1" name="A1" type="text" size="1" maxlenght="1"></td>
                        <td id="A2" class="celda">A2<input id="A2" name="A2" type="text" size="1" maxlenght="1"></td>
                        <td id="A3" class="celda">A3<input id="A3" name="A3" type="text" size="1" maxlenght="1"></td>
                    </tr>
                    <tr>
                        <td id="B1" class="celda">B1<input id="B1" name="B1" type="text" size="1" maxlenght="1"></td>
                        <td id="B2" class="celda">B2<input id="B2" name="B2" type="text" size="1" maxlenght="1"></td>
                        <td id="B3" class="celda">B3<input id="B3" name="B3" type="text" size="1" maxlenght="1"></td>
                    </tr>
                    <tr>
                        <td id="C1" class="celda">C1<input id="C1" name="C1" type="text" size="1" maxlenght="1"></td>
                        <td id="C2" class="celda">C2<input id="C2" name="C2" type="text" size="1" maxlenght="1"></td>
                        <td id="C3" class="celda">C3<input id="C3" name="C3" type="text" size="1" maxlenght="1"></td>
                    </tr>
                </table>
                <hr>
                <input name="tirar" type="submit" value="Tirar">
            </form>
        </div>
        <br><br>
        <fieldset>
            <hr>
            <form id="refresh" method="post" action="index.php">
                <input name="refresh" type="submit" value="Actualizar">
            </form>
        </fieldset>
    </body>
</html>
