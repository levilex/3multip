<?php
include "model.php";
include "controlador.php";
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="style/estilo.css" media="screen" />
        <script type="text/javascript" src="libs/jquery.js"></script>
        <script>
            $(document).ready(function () {
                //funcion primer turno
                var player = 0;
                
                if (player == 0){
                    var login = prompt("Enter player name");                    
                    player = 1;
                    
                    var i;
                    for (i = 0; i < 3; i++) {
                        var casilla1 = $("#A" + i).text();
                        var casilla2 = $("#B" + i).text();
                        var casilla3 = $("#C" + i).text();
                        alert(casilla1);
                        alert(casilla2);
                        alert(casilla3);
                    }
                    
                }
                
             





                $(".celda").click(function () {
                    var id = $(this).attr('id');

                });
                /*
                 var ficha = 'X';
                 function turno() {
                 if (ficha == 'X') {
                 ficha = 'O';
                 } else {
                 ficha = 'X';
                 }
                 return  ficha;
                 }
                 /*
                 $(".celda").click(function () {
                 var id = $(this).attr('id');
                 ficha = turno();
                 $("#" + id).append(ficha);
                 enviarFicha(id, ficha);
                 });
                 
                 function enviarFicha(id, ficha) {
                 $.ajax({
                 method: "POST",
                 url: "index.php",
                 data: {id: id, ficha: ficha}
                 })
                 }
                 */
            });
        </script>
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
