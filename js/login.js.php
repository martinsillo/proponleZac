
<?php if(!$session_active){
    echo 'function loginProponle(datos){

   $.ajax({
        method: "POST",
        url: "php/login.php",
        data: { idUsr: datos.id, nombreUsr: datos.name }
    })
        .done(function() {
        location.reload();
    });

}';

}

?>


function cerrarSession(){
   console.log("cerro sesion");
   $.ajax({
        method: "POST",
        url: "php/logout.php",
    })
        .done(function() {
        return true;
    });
}


$(function() {

	var app_id = '2092021814159167';
	var scopes = 'email';
	var btn_login = ' <a id="login"><div class="facebook_btn"><span style="color:#3d5a96; font-size: 22px;"><i class="fa fa-facebook-square" aria-hidden="true"></i></span>&nbsp;&nbsp;Iniciar Sesión con Facebook </div></a>';
	var div_session = "<div id='facebook-session' class='row' style='padding: 1px 1px 1px 1px;'>"+
					 "<div class='col-md-8'><img id='img_usr' src='http://graph.facebook.com/<?php echo $_SESSION['facebook_id'] ?>/picture?type=large' class='img-circle' width='50'> &nbsp; </div>"+
                             "<div class='col-md-4'><?php echo $_SESSION['full_name'] ?><br><a type='button'  class='btn btn-outline btn-danger btn-xs' href='#' id='logout'>Cerrar Sesi&oacute;n</a></div>"+
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
    	if (response.status === 'connected') {
      		getFacebookData();
    	} else {
     		callback(false);
    	}
  	}

  	var checkLoginState = function(callback) {
    	FB.getLoginStatus(function(response) {
      		callback(response);
    	});
  	}

  	var getFacebookData =  function() {
  		FB.api('/me', function(response) {
	  		$('#login').after(div_session);
	  		$('#login').remove();
	  		$('#facebook-session strong').text("Bienvenido: "+response.name);
	  		$('#facebook-session img').attr('src','http://graph.facebook.com/'+response.id+'/picture?type=large');
	  	});
  	}

  	var facebookLogin = function() {
  		checkLoginState(function(data) {
  			if (data.status !== 'connected') {
  				FB.login(function(response) {
                   <?php if(!$session_active) { ?>
                   loginProponle(response);
                    <? } ?>
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
                    console.log("ha salido");
                    cerrarSession();
					$('#facebook-session').before(btn_login);
					$('#facebook-session').remove();
                    location.reload();
				})
			}
  		})

  	}



  	$(document).on('click', '#login', function(e) {
  		e.preventDefault();
  		facebookLogin();
  	});

  	$(document).on('click', '#logout', function(e) {
  		e.preventDefault();
  		facebookLogout();

  	});

})
