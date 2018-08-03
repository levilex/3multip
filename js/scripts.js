$(document).ready(function () {
                //funcion primer turno
                var player = 0;
                
                /*if (player === 0){
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
                    
                }*/          

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
            