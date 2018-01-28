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
            texto: $('#cuerpo_debate').val(),
            etiquetas: $('#etiquetas_debate').val()
        }
    }).done(function (msg) {
        console.log(msg);
        $('#myModal').modal('hide');
    });
    return false;
}
function loginProponle(datos){

   $.ajax({
        method: "POST",
        url: "php/login.php",
        data: { idUsr: datos.id, nombreUsr: datos.name }
    })
        .done(function() {
        location.reload();
    });

}

$(function() {
	var app_id = '2092021814159167';
	var scopes = 'email, user_friends';
	//var btn_login = ' <a id="login"><div class="facebook_btn"><span style="color:#3d5a96; font-size: 22px;"><i class="fa fa-facebook-square" aria-hidden="true"></i></span>&nbsp;&nbsp;Facebook</div></a>';
	//var div_session = "<div id='facebook-session'>"+
					  "<strong></strong>"+
					  "<img>"+
					  "<a href='#' id='logout' class='btn btn-danger'>Cerrar sesión</a>"+
					  "</div>";

	window.fbAsyncInit = function() {

	  	FB.init({
	    	appId      : app_id,
	    	status     : true,
	    	cookie     : true,
	    	xfbml      : true,
	    	version    : 'v2.1'
	  	});


	  	FB.getLoginStatus(function(response) {
	    	statusChangeCallback(response, function() {});
	  	});
  	};

  	var statusChangeCallback = function(response, callback) {
  		console.log(response);

    	if (response.status === 'connected') {
      		getFacebookData();
    	} else {
     		callback(false);
    	}
  	}

  	var checkLoginState = function(callback) {
    	FB.getLoginStatus(function(response) {
				console.log('DATOS USUARIO', response);
      		callback(response);
    	});
  	}

  	var getFacebookData =  function() {
  		FB.api('/me', function(response) {
				console.log('DATOS USUARIO', response);
                loginProponle(response);

	  	});
  	}

  	var facebookLogin = function() {
  		checkLoginState(function(data) {
  			if (data.status !== 'connected') {
  				FB.login(function(response) {
  					if (response.status === 'connected')
  						getFacebookData();
  				}, {scope: scopes});
  			}
  		})
  	}

  	var facebookLogout = function() {
  		checkLoginState(function(data) {
  			if (data.status === 'connected') {
				FB.logout(function(response) {
					//$('#facebook-session').before(btn_login);
					//$('#facebook-session').remove();
				})
			}
  		})

  	}

  	$(document).on('click', '#login', function(e) {
  		e.preventDefault();
  		facebookLogin();
  	})



  	$(document).on('click', '#logout', function(e) {
  		e.preventDefault();

  		if (confirm("¿Está seguro?"))
  			facebookLogout();
  		else
  			return false;
  	})




});

function logout(){
     $.ajax({
        method: "POST",
        url: "php/logout.php",
    })
        .done(function() {
        location.reload();
    });

}
