<?php
date_default_timezone_set('America/Mexico_City');
require_once('php/seguridad.php');
require_once('php/conexion.php');
require_once('php/debates.php');
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
    <link rel="stylesheet" href="css/proponle.css?v=1.2.1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/font-awesome.css">
</head>
    <body>
        <div class="barra_top">
            Transparencia &nbsp;|&nbsp; Datos Abiertos &nbsp;|&nbsp; Foros Locales &nbsp;|&nbsp; <i class="fa fa-facebook-square" aria-hidden="true"></i>&nbsp;&nbsp;<i class="fa fa-twitter-square" aria-hidden="true"></i>&nbsp;
        </div>
        <div class="contenido" style="padding-left: 10%; padding-right: 10%;">
            <div class="row" style="padding: 1px 1px 1px 1px;">
                <div class="col-md-6">
                    <img src="img/logo2.png"  class="img-responsive" style="margin: 0 auto;">
                </div>
                <div class="col-md-6" style="text-align:right; padding-right: 20%">
                  <br><br>
                     <button type="button" class="btn btn-outline btn-default">Entrar</button>
                   <a type="button" class="btn btn-outline btn-primary" href="registro.html">Registrarse</a>
                </div>
            </div>
            <br>
            </div>
<div class="topnav" id="myTopnav">
  <a href="index.php" >Inicio</a>
  <a href="#" class="active">Debates</a>
  <a href="propuestas.php">Propuestas</a>
  <a href="sondeos.php">Sondeos/Votaciones</a>
  <a href="documentos.php">Documentos</a>
  <a href="informacion.php">Más Información</a>
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


                    $info = $debates->listar($pagina,$cerrado,$texto,$fecha1,$fecha2);
                    print($info);
                ?>
                <br>
                <div class="btn-group">
                    <?php

                    ?>
                    <button type="button" class="btn btn-default"><i class="fa fa-chevron-left"></i></button>
                    <button class="btn btn-default">1</button>
                    <button class="btn btn-default  active">2</button>
                    <button class="btn btn-default">3</button>
                    <button class="btn btn-default">4</button>
                    <button class="btn btn-default">5</button>
                    <button class="btn btn-default">6</button>
                    <button class="btn btn-default">7</button>
                    <button class="btn btn-default">8</button>
                    <button type="button" class="btn btn-default"><i class="fa fa-chevron-right"></i></button>
                </div>

            </div>
            <div class="col-md-4" style="border-left:solid 1px #dfe2e2;">
                <button type="button" class="btn btn-primary btn-outline" onclick="nuevo_debate();">Empieza un debate</button><br>
                <br>
                <button type="button" class="btn btn-info btn-outline">Ayuda sobre debates</button>
                <hr>
                <strong>Tendencias</strong><br>
                <?php echo $debates->etiqeutasMasVisitadas(); ?>
                <hr>
                <strong>Destacados</strong>
                <p>Algunos Tags</p>
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
    <script src="js/proponle.js?v=1.1.0"></script>
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

    </script>
    </body>
</html>
