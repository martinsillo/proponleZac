/*global
alert, confirm, console, prompt, $
*/
function myFunction() {
    'use strict';
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

function guardarDebate() {
    'use strict';
    $.ajax({
        method: "POST",
        url: "php/debates.php",
        data: {
            accion: 'agregar',
            titulo: $('#titulo_debate').val(),
            texto: $('#cuerpo_debate').val(),
            etiquetas: $('#etiquetas_debate').val()
        }
    }).done(function (msg) {
        console.log(msg);
        $('#myModal').modal('hide');
    });
    return false;
}
