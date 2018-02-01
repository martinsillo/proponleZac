<?php
 include('php/seguridad.php');
 $session_active = false;
if(isset($_SESSION['active']) AND isset($_SESSION['active_key'])) {
    if($_SESSION['active'] == true AND
        $_SESSION['active_key'] = md5(sha1('ajdhakdjhakjshdkwdkahqwrñ43p9tw{uwaERT#$%VWAWEFWAwE#!$C"QX}'))){
        $session_active = true;
    }
}
?>
<!Doctype HTML>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Proponle a Zacatecas">
    <meta name="keywords" content="Zacatecas, Propuestas, Avanzamos, Avanzemos, Debate">
    <meta name="author" content="Gobierno del Estado de Zacatecas">
    <title>Proponle a Zacatecas</title>
    <!-- Hojas de Estilo -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="css/proponle.css">
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/font-awesome.css">
</head>
    <body>
        <div class="barra_top">
            Transparencia &nbsp;|&nbsp; Datos Abiertos &nbsp;|&nbsp; Foros Locales &nbsp;|&nbsp; <i class="fa fa-facebook-square" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-twitter-square" aria-hidden="true"></i>&nbsp;
        </div>
        <div class="contenido" style="padding-left: 5%; padding-right: 5%;">
            <div class="row" style="padding: 1px 1px 1px 1px;">
                <div class="col-md-8">
                    <img src="img/logo2.png"  class="img-responsive" style="margin: 0 auto;">
                </div>
                <div class="col-md-4" style="text-align:right; padding-right: 20%">
                  <a id="login"><div class="facebook_btn"><span style="color:#3d5a96; font-size: 22px;"><i class="fa fa-facebook-square" aria-hidden="true"></i></span>&nbsp;&nbsp;Iniciar Sesión con Facebook </div></a>
<!-- loginform -->
                </div>
            </div>
<!-- Barra de Navegación -->
            <br>
            </div>
<div class="topnav" id="myTopnav">
  <a href="#" class="active">Inicio</a>
  <a href="debates.php">Debates</a>
  <a href="prpuestas.php">Propuestas</a>
  <a href="sondeos.php">Sondeos/Votaciones</a>
  <a href="documentos.php">Documentos</a>
  <a href="informacion.php">Más Información</a>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
    <div style="text-align: center; padding-top: 25px; padding-left: 10%; padding-right: 10%;">
        <br>
        <button type="button" class="btn btn-danger2">Haz tu Propuesta Ciudadana</button>
        <br>
        <h2>¿TIENES UNA IDEA PARA CAMBIAR ZACATECAS?</h2>
        <h4>El Gobierno del Estado llevará a cabo tu propuesta si consigues que pase a votación ciudadana. Lorem Ipsum Dolor Est.</h4>
        <br>
        <button type="button" class="btn btn-outline btn-primary btn-lg" >Crea una Propuesta</button>
    </div>
<hr>
<br>
        <br><br>
     <?php if($session_active){echo "sesion activa"; }else{ echo "Sesion inactiva 0 ";} ?>

   <div class="pie_pag">
      <div class="container">
        <div class="row" style="padding: 9px 1px 5px 1px;">
            <div class="col-md-3"><img src="img/logo_zacatecas.png" class="img-responsive"></div>
            <div class="col-md-3">
            <h4><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Información</h4>
                <ul>
                    <li><a href="politica_privacidad.html">Politica de Privacidad</a></li>
                    <li>Condiciones de uso</li>
                    <li>Soporte Técnico</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h4><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Contacto</h4>
Coordinación Estatal de Planeación<br>
Circuito Cerro del Gato s/n<br>
Colonia Ciudad Gobierno<br>
Edificio H | Segundo Piso<br>
C.P. 98160<br>
Zacatecas, Zac.<br>
            </div>
            <div class="col-md-3">

                <h4><i class="fa fa-phone-square" aria-hidden="true"></i>&nbsp;Teléfonos</h4>
                <ul>
                    <li>922 3005 Cruz Roja Mexicana</li>
                    <li>922 5350 Bomberos</li>
                    <li>922 0180 Policía Estatal Preventiva</li>
                    <li>924 5320 Tránsito del Estado</li>
                    <li>491 5000 Ciudad Gobierno</li>
                    <li>911 Emergencias</li>
                    <li>089 Denuncia Anónima</li>
                </ul>
            </div>
        </div>
      </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/proponle.js?v=1.0.1"></script>
    <script src="js/login.js.php" defer></script>
      <script>
	// Load the SDK asynchronously
	(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "https://connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
	 </script>

    </body>
</html>
