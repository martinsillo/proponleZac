<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

date_default_timezone_set('America/Mexico_City');
require_once('php/seguridad.php');
require_once('php/conexion.php');
require_once('php/propuestas.php');
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
    <meta name="description" content="Proponle a Zacatecas, espacio de debates y propuestas ciudadanas">
    <meta name="keywords" content="Zacatecas, Propuestas, Avanzamos, Avanzemos, Debate">
    <meta name="author" content="Gobierno del Estado de Zacatecas">
    <title>Proponle a Zacatecas</title>
    <!-- Hojas de Estilo -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="css/proponle.css?v1.1.1">
    <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/font-awesome.css">
</head>
<body>
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
  <a href="index.php">Inicio</a>
  <a href="debates.php">Debates</a>
    <a href="#" class="activo"><span style="color:#f00;">Propuestas</span></a>
   <a href="http://avanzamostodos.zacagtecas.gob.mx" target="_blank">Presupuesto Participativo</a>

  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
    </div>
    </div>
</div>
    <div class="titulo_pagina">
        <h3>Propuestas Ciudadanas</h3>
    </div>
    <div style="padding-top: 15px; padding-left: 10%; padding-right: 10%; padding-bottom:1%;">

        <div class="row">
            <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-8"><h5><a href="<?php

                               echo "?cerrados=0"; ?>"> Propuestas Actuales</a> | <a href="<?php

                               echo "?cerrados=1"; ?>"> Propuestas Finalizadas</a></h5> </div>
        <div class="col-md-4">&nbsp;</div>
        </div>
                <hr>
                <?php
                    $propuestas = new propuestas();
                    if(isset($_GET['pagina'])){$rango =$_GET['pagina']; } else {$pagina=1;}

                    if(isset($_GET['cerrados'])){ $cerrado = $_GET['cerrados']; } else { $cerrado = 0; }

                    if(isset($_GET['texto'])){$texto =$_GET['texto']; } else {$texto='null';}
                    if(isset($_GET['fecha1'])){$fecha1 =$_GET['fecha1']; } else {$fecha1 = 'null';}
                    if(isset($_GET['fecha2'])){$fecha2 =$_GET['fecha2']; } else {$fecha2 = 'null';}


                    $info = $propuestas->listar($pagina,$cerrado,$texto,$fecha1,$fecha2,$session_active);
                    print($info);
                ?>
                <br>
                  <?php
                       $registrosDeb = $propuestas->contarPropuestas();

                        if($registrosDeb < 11 ){
                            $loop = 1;
                        }else{
                            $div = intdiv($registrosDeb,10);
                            $mod = $registrosDeb % 10;
                            if($mod != 0){ $mod = 1; }else{$mod = 0;}
                            $loop = $div + $mod;
                        }
                     ?>
                <div class="btn-group">
                    <button type="button" class="btn btn-default" href="#1"><i class="fa fa-chevron-left"></i></button>
                    <?php
                      for($x = 0; $x<$loop; $x++){
                         echo '<button class="btn btn-default">'.($x+1).'</button>';
                          //  <button class="btn btn-default  active">2</button>
                      }
                    ?>
                    <button type="button" class="btn btn-default" href="#<?php echo $loop;?>"><i class="fa fa-chevron-right"></i></button>
                </div>

            </div>
            <div class="col-md-4" style="border-left:solid 1px #dfe2e2;">

               <?php if($session_active) {?> <button type="button" class="btn btn-danger btn-outline" onclick="nueva_propuesta();">Genera tu propuesta</button><br><?php } ?>
                <br>
                <button type="button" class="btn btn-info btn-outline">Ayuda sobre las propuestas</button>
                <hr>
                
            </div>
        </div>



    </div>
   <div class="pie_pag">
      <div class="container">
        <div class="row" style="padding: 9px 1px 5px 1px;">
            <div class="col-md-3"><img src="img/logo_zacatecas.png" class="img-responsive" alt="Gobierno del Estado de Zacatecas"></div>
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


    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">

</div>



    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/proponle.js?v=1.1.6"></script>
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



    <?php if($session_active){ ?>
    <script>

        function nueva_propuesta(){
            $.ajax({
                url: "views/nuevaPropuesta.html",
                context: document.body
                }).done(function(msg) {
                document.getElementById("myModal").innerHTML = msg;
                modal();
            });
        }


        function modal(){
            $("#myModal").modal();
        }


        function votar(p){
               $.ajax({
                method: "POST",
                url: "php/propuestas.php",
                data: { accion: 'votar', propuesta: p }
                }).done(function(msg) {
                   console.log(msg);
                    if(msg === 'success'){
                        location.reload();
                    }
            });
        }



    </script>
    <?php } ?>
    </body>
</html>
