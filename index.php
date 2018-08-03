<?php
require "classes/model.php";
require "classes/controlador.php";
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/scripts.js"></script>
    </head>
    <body>
        <div id="tablero">
            <table>
                <tr>
                    <td id="A1" class='celda'></td>
                    <td id="A2" class='celda'>testa2</td>
                    <td id="A3" class='celda'></td>
                </tr>
                <tr>
                    <td id="B1" class='celda'>testb1</td>
                    <td id="B2" class='celda'></td>
                    <td id="B3" class='celda'></td>
                </tr>
                <tr>
                    <td id="C1" class='celda'></td>
                    <td id="C2" class='celda'></td>
                    <td id="C3" class='celda'>testc3</td>
                </tr>
            </table> 
        </div>
    </body>
</html>
