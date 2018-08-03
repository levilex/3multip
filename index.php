<?php
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
        <div id="tablero">
            <table>
                <tr>
                    <td id="A1" class="celda">A1</td>
                    <td id="A2" class="celda">A2</td>
                    <td id="A3" class="celda">A3</td>
                </tr>
                <tr>
                    <td id="B1" class="celda">B1</td>
                    <td id="B2" class="celda">B2</td>
                    <td id="B3" class="celda">B3</td>
                </tr>
                <tr>
                    <td id="C1" class="celda">C1</td>
                    <td id="C2" class="celda">C2</td>
                    <td id="C3" class="celda">C3</td>
                </tr>
            </table> 
        </div>
        <form id="play" method="post" action="index.php">
            <fieldset>
                <legend>Player name</legend>
                <input name="playerName" type="text">
                <hr>
                <input name="start" type="submit" value="Start">
            </fieldset>
        </form>
    </body>
</html>
