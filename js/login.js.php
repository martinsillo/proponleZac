<?php
session_start();
if(!isset($_SESSION['facebook_id'])){$fb_id =0;}else{$fb_id =$_SESSION['facebook_id']; }
if(!isset($_SESSION['full_name'])){$fb_name ="guy";}else{$fb_name =$_SESSION['full_name']; }


if(isset($_SESSION['active']) AND isset($_SESSION['active_key'])) {
    if($_SESSION['active'] == true AND
        $_SESSION['active_key'] = md5(sha1('ajdhakdjhakjshdkwdkahqwrñ43p9tw{uwaERT#$%VWAWEFWAwE#!$C"QX}'))){
        $session_active = true;
    }else{
        $session_active = false;
    }
}else{
    $session_active = false;
}

if($session_active == false){
    echo 'function loginProponle(datos){
     if(datos.id === undefined){return false;}
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
	var scopes = 'public_profile,user_hometown,email';
	var btn_login = ' <span id="init_sesion">Iniciar sesión:</span> <a id="login" class="btn btn-outline btn-primary btn-xs"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
    var div_session = "<div id='facebook-session' style='padding: 1px 1px 1px 1px;'>"+
					 "<img id='img_usr' src='https://graph.facebook.com/<?php echo $fb_id; ?>/picture?type=large' class='img-circle' width='35'>&nbsp;"+
                             "<?php echo $fb_name; ?>&nbsp;<a type='button'  class='btn btn-outline btn-danger btn-xs' href='#' id='logout'>Cerrar Sesi&oacute;n</a></div>";


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
            <?php if($session_active == false) { ?>
                   loginProponle(response);
            <?php } ?>
	  		$('#login').after(div_session);
	  		$('#login').remove();
	  		//$('#facebook-session strong').text("Bienvenido: "+response.name);
	  		//$('#facebook-session img').attr('src','https://graph.facebook.com/'+response.id+'/picture?type=large');
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
