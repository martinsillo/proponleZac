/*global
alert, confirm, console, prompt, $, FB, statusChangeCallback
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
            introduccion: $('#introduccion_debate').val(),
            texto: $('#cuerpo_debate').val(),
            etiquetas: $('#etiquetas_debate').val()
        }
    }).done(function (msg) {
        alert('Su propuesta de debate ha sido enviada para su validacion, muchas gracias.');
        $('#myModal').modal('hide');
    });
    return false;
}
function loginProponle(datos) {
    'use strict';
    $.ajax({
        method: "POST",
        url: "php/login.php",
        data: { idUsr: datos.id, nombreUsr: datos.name }
    })
        .done(function () {
            location.reload();
        });

}
