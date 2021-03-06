<?php
/*
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
}

*/
include('php/seguridad.php');
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
?>

<!Doctype HTML>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Proponle a Zacatecas, espacio de debates y propuestas ciudadanas">
    <meta name="keywords" content="Zacatecas, Propuestas, Avanzamos, Avanzemos, Debate">
    <meta name="author" content="Gobierno del Estado de Zacatecas">
    <title>Proponle a Zacatecas</title>
    <!-- Hojas de Estilo -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="css/proponle.css?v1.1.4">
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/font-awesome.css">
</head>
<body>
<!-- Analytics -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121850862-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121850862-1');
</script>


<!-- Analytics end -->
<div class="encabezado" width="100%">
   <?php if ($session_active == false) { ?>
    <span id='init_sesion'>Iniciar sesión:</span> <?php } ?><a id="login" class="btn btn-outline btn-primary btn-xs">
<i class="fa fa-facebook" aria-hidden="true"></i></a>
</div>
<div class="menu">
<div class="row" style="padding:1px 1px 1px 1px">
  <div class="col-sm-2">
    <img src="img/Proponle_A_Zacatecas.png" width="150" alt="Proponle a Zacatecas">
   </div>
<div class="col-sm-10" style="padding-top:20px;">
  <div class="topnav" id="myTopnav">
  <a href="#" class="activo"><span style="color:#f00;">Inicio</span></a>
  <a href="debates.php">Debates</a>
  <a href="propuestas.php">Propuestas</a>
   <a href="http://avanzamostodos.zacatecas.gob.mx" target="_blank">Presupuesto Participativo</a>

  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
    </div>
    </div>
</div>
    <div style="text-align: center; padding-top: 25px; padding-left: 10%; padding-right: 10%;" class="parallax_main">
     <video width="40%"  controls autoplay>
      <source src="video/proponle_w.mp4" type="video/mp4">
       Tu navegador no soporta reprodución de video.
      </video>


        <br>

        <br>
        <h2><span style="color:#fff;">¿TIENES UNA IDEA PARA CAMBIAR ZACATECAS?</span></h2>
        <h4><span style="color:#fff;">Inicia un debate para compartir puntos de vista con otras personas sobre los temas que te preocupan.<br>El espacio de debates ciudadanos está dirigido a que cualquier persona pueda exponer temas que le preocupan y sobre los que quiera compartir puntos de vista con otras personas, preferentemente relacionados con el Estado de Zacatecas.</span></h4>
        <br>
        <a  class="btn  btn-primary2 btn-lg" href="debates.php">Crea un Debate</a>
    </div>
<hr>
<br>


   <div class="pie_pag">
      <div class="container">
        <div class="row" style="padding: 9px 1px 5px 1px;">
            <div class="col-md-3"><a href="http://www.zacatecas.gob.mx" target="_blank"><img src="img/logo_zacatecas.png" class="img-responsive" alt="Gobierno del Estado de Zacatecas"></a>


            <hr>
                <div align="center">
                <a href="https://avancemostodos.zacatecas.gob.mx" target="_blank"> <img src="img/avancemos_xs.png" alt="Avancemos todos en Zacatecas"></a>
                    </div>



            </div>

            <div class="col-md-3">
            <h4><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Información</h4>
                <ul>
                    <li><a href="documentos/Aviso_de Privacidad_integral_COEPLA.pdf" target="_blank">Aviso de Privacidad</a></li>
                    <li><a href="condiciones-de-uso.php">Condiciones de uso</a></li>

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
    <script src="js/login.js.php"></script>
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
