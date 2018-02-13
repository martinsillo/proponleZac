<?php
date_default_timezone_set('America/Mexico_City');
require_once('php/seguridad.php');
require_once('php/conexion.php');
require_once('php/debates.php');
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
    <link rel="stylesheet" href="css/proponle.css?v=1.0.2">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.css">
</head>
    <body>
        <div class="barra_top">
           &nbsp;
        </div>
         <div class="contenido" style="padding-left: 1%; padding-right: 1%; width:100%;">
            <div class="row" style="padding: 1px 1px 1px 1px;">
                <div class="col-sm-8">
                     <img src="img/Proponle_A_Zacatecas.png" width="150">
                </div>
                <div class="col-md-4" style="text-align:right; ">
                  <a id="login" class="btn btn-outline btn-info"><i class="fa fa-facebook-square" aria-hidden="true"></i>&nbsp;Iniciar Sesión con Facebook </a>
<!-- loginform -->
                </div>
            </div>
<!-- Barra de Navegación -->
            <br>
            </div>
<div class="topnav" id="myTopnav">
  <a href="index.php" >Inicio</a>
  <a href="#" class="active">Debates</a>
  <a href="propuestas.php">Propuestas</a>

  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
    <div class="titulo_pagina">
        <h3>Debates Ciudadanos</h3>
    </div>
    <div style="padding-top: 15px; padding-left: 10%; padding-right: 10%; padding-bottom:1%;">

        <div class="row">
            <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-8"><h4><a href="<?php

                               echo "?cerrados=0"; ?>"> Debates Actuales</a> | <a href="<?php

                               echo "?cerrados=1"; ?>"> Debates Cerrados</a></h4> </div>
        <div class="col-md-4">Buscar</div>

        </div>
                <hr>
                <?php
                    $debates = new debates();
                    if(isset($_GET['pagina'])){$rango =$_GET['pagina']; } else {$pagina=1;}

                    if(isset($_GET['cerrados'])){ $cerrado = $_GET['cerrados']; } else { $cerrado = 0; }

                    if(isset($_GET['texto'])){$texto =$_GET['texto']; } else {$texto='null';}
                    if(isset($_GET['fecha1'])){$fecha1 =$_GET['fecha1']; } else {$fecha1 = 'null';}
                    if(isset($_GET['fecha2'])){$fecha2 =$_GET['fecha2']; } else {$fecha2 = 'null';}


                    $info = $debates->listar($pagina,$cerrado,$texto,$fecha1,$fecha2,$session_active);
                    print($info);
                ?>
                <br>
                  <?php
                       $registrosDeb = $debates->contarDebates();

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

               <?php if($session_active) {?> <button type="button" class="btn btn-primary btn-outline" onclick="nuevo_debate();">Empieza un debate</button><br><?php } ?>
                <br>
                <button type="button" class="btn btn-info btn-outline">Ayuda sobre debates</button>
                <hr>
                <strong>Tendencias</strong><br>
                <?php echo $debates->etiqeutasMasVisitadas(); ?>
                <hr>
            </div>
        </div>



    </div>
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


    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">

</div>



    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/proponle.js?v=1.1.2"></script>
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

        function nuevo_debate(){
            $.ajax({
                url: "views/nuevoDebate.html",
                context: document.body
                }).done(function(msg) {
                document.getElementById("myModal").innerHTML = msg;
                modal();
            });
        }


        function modal(){
            $("#myModal").modal();
        }

        function votar(d,v){
               $.ajax({
                method: "POST",
                url: "php/debates.php",
                data: { accion: 'votar', debate: d, voto: v  }
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
