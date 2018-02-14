<?php
setlocale(LC_TIME, 'es_MX');
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

$conn = new conexion();
$conexion = $conn->conectar(3);
$queryInfo = "SELECT
d.titulo_debate,
u.nombre,
d.fecha_post,
d.introduccion,
d.contenido
FROM debates d
INNER JOIN usuarios u on (d.id_usuario_auth = u.idUsuario)
WHERE d.id_debate = ".$_GET['debateId'];
$ExQueryInfo = $conexion->query($queryInfo) or die ($conexion->error);
$Res = $ExQueryInfo->fetch_Array(MYSQLI_NUM);
$ExQueryInfo->free_result();
unset($ExQueryInfo);
$conexion->close();
unset($conexion);
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
    <img src="img/Proponle_A_Zacatecas.png" width="150">
   </div>
<div class="col-sm-10" style="padding-top:20px;">
  <div class="topnav" id="myTopnav">
  <a href="index.php">Inicio</a>
  <a href="debates.php" class="activo"><span style="color:#f00;">Debates</span></a>
  <a href="propuestas.php">Propuestas</a>
   <a href="http://avanzamostodos.zacagtecas.gob.mx" target="_blank">Presupuesto Participativo</a>

  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
    </div>
    </div>
</div>
    <div class="titulo_pagina">
        <h4>Debates Ciudadanos - <small>Informaci&oacute;n del Debate</small></h4>
    </div>
    <div style="padding-top: 15px; padding-left: 10%; padding-right: 10%; padding-bottom:1%;">

        <div class="row">
            <div class="col-md-8">

<small><a href="debates.php"><i class="fa fa-chevron-left" aria-hidden="true"></i> Volver</a></small>
                <h3><?php echo $Res[0]; ?></h3>
                <span class="L-circle">L</span> <?php echo $Res[1]; ?> • <?php $fecha = date_create($Res[2]); echo date_format($fecha, 'd-m-Y'); ?>
                <hr>
                <h4>Introducci&oacute;n</h4>
                <p><?php echo $Res[3]; ?></p>
                <h4>Contenido</h4>
                <p><?php echo $Res[4]; ?></p>
                <hr>




            </div>
            <div class="col-md-4" style="border-left:solid 1px #dfe2e2;">
nfo estadisitca debate
            </div>
        </div>
<div class="row">
    <div class="col-md-12">
    <h4>Comentarios</h4>
                <?php
                  if($session_active == false){
                      echo '<div class="google_btn">Es necesario que inicies sesion para participar en los comentarios</div><br><br>';
                  }else{
                      echo '<button type="button" class="btn btn-sm btn-outline btn-primary" onclick=nuevo_comentario()><i class="fa fa-commenting" aria-hidden="true"></i> &nbsp;Haz tu Comentario</button><br><br>';
                  }

                  $contarQuery = "SELECT count(*) FROM comentarios WHERE id_debate = ".$_GET['debateId'];
                  $conexion = $conn->conectar(3);
                  $ExContar = $conexion->query($contarQuery) or die ($conexion->error);
                  $ResContar = $ExContar->fetch_array(MYSQLI_NUM);
                  $ExContar->free_result();
                  $conexion->close();
                unset($conexion);
                unset($ExContar);
                  if($ResContar[0] == 0){
                      echo '<div class="google_btn">El debate a&uacute;n no cuenta con respuestas.</div>';
                  }else{
                        $conexion = $conn->conectar(3);
                        $QueryComent = "call comentarios(".$_GET['debateId'].")";
                        $ExQueryComent = $conexion->query($QueryComent) or die ($conexion->error);

                        while($ResComent = $ExQueryComent->fetch_array(MYSQLI_NUM)){

                             $conexion = $conn->conectar(3);
                             $contarRespuestas = "SELECT count(*) FROM respuestasComentarios WHERE id_debate = ".$_GET['debateId']." and id_comentario = ".$ResComent[0]." and validado = 1";
                             $ExContarRes = $conexion->query($contarRespuestas) or die ($conexion->error);
                             $ResContarResp = $ExContarRes->fetch_array(MYSQLI_NUM);
                             $ExContarRes->free_result();
                             $conexion->close();

                            if($session_active == true){
                            $responder = $ResContarResp[0].' Respuestas  • <button type="button" class="btn btn-outline btn-primary2 btn-xs" onclick="responderComentario('.$ResComent[0].')"><i class="fa fa-comments-o" aria-hidden="true"></i>  Responder </button> ';
                        }else{
                            $responder = $ResContarResp[0].' Respuestas';
                        }



                         $fechaC = date_create($ResComent[2]);
                         $fechaC = date_format($fechaC, 'd/m/Y H:i:s');
                         $letter = strtoupper(substr($ResComent[1],0,1));
                         echo '<span class="'.$letter.'-circle">'.$letter.'</span> '.$ResComent[1].' • '.$fechaC.'<br><br>';
                         echo '<p>'.$ResComent[3].'</p>';
                         echo '<div class="row" style="padding:3px 3px 3px 3px; border-top:solid 1px #ccc; border-bottom:solid 1px #ccc; background-color:#e3e5e8;">';
                         echo '<div class="col-sm-8">'.$responder;
                         echo "<br><br>";
                          $queryRespuestas = "select u.nombre,r.fecha,r.respuesta from respuestasComentarios r inner join usuarios u on(u.idUsuario = r.id_usuario) WHERE r.id_comentario = ".$ResComent[0]." and r.id_debate = ".$_GET['debateId']." and r.validado = 1 order by fecha ASC ";
                          $conexion = $conn->conectar(3);
                          $ExRespuestas = $conexion->query($queryRespuestas) or die ($conexion->error);

                          while($ResRespuestas = $ExRespuestas->fetch_array(MYSQLI_NUM)){
                            echo "<div class='respuestas' style=' font-style: oblique; font-size:12px; padding-left:5%;'>";
                               $fechaR = date_create($ResRespuestas[1]);
                                $fechaR = date_format($fechaR, 'd/m/Y H:i:s');
                               $letter2 = strtoupper(substr($ResRespuestas[0],0,1));
                         echo '<span class="'.$letter2.'-circle">'.$letter2.'</span> '.$ResRespuestas[0].' • '.$fechaR.'<br>';
                               echo '<p style="padding-left:10%;">'.$ResRespuestas[2].'</p>';
                            echo '</div>';
                          }
                          $ExRespuestas->free_result();
                          $conexion->close();
                          /*$conexion = $conn->conectar(3);
                          $consultaVotos = "SELECT (SELECT count(*) FROM votosComentario WHERE voto=1 and idComentario = ".$ResComent[0]." ) as aFavor, (SELECT count(*) FROM votosComentario WHERE voto=2 and idComentario = ".$ResComent[0].") as enContra";
                          $ExQueryVotos  = $conexion->query($consultaVotos) or die ($conexion->error);
                          $ResVotos = $ExQueryVotos->fetch_array(MYSQLI_NUM);
                          $ExQueryVotos->free_result();
                          unset($ExQueryVotos);
                          $conexion->close();
                          $sumaVotos = $ResVotos[0] + $ResVotos[1];

                         echo '</div><div class="col-sm-4"><small>'.$sumaVotos.' Votos | <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '.$ResVotos[0].'  •  <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> '.$ResVotos[1].'</small></div></div><br><br>';*/
                            echo '</div><div class="col-sm-4"><small>&nbsp;</small></div></div><br> ';
                        }

                  }
                ?>
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
    <?php if($session_active == true){ ?>
    <script>

        function nuevo_comentario(){
            $.ajax({
                url: "views/nuevoComentario.html",
                context: document.body
                }).done(function(msg) {
                document.getElementById("myModal").innerHTML = msg;
                modal();
            });
        }

        function responderComentario(i){
            $.ajax({
                url: "views/responderComentario.php",
                context: document.body,
                method: "POST",
                data: {idComentario: i }
                }).done(function(msg) {
                document.getElementById("myModal").innerHTML = msg;
                modal();
            });
        }

        function guardarComentario(){
             $.ajax({
                url: "php/debates.php",
                 method: "POST",
                data: { accion: 'comentar', debate: '<?php echo $_GET['debateId'];?>', usuario: '<?php echo $_SESSION['user_id']; ?>', comentario: $('#comentario_txt').val() }
                }).done(function(msg) {
                 console.log(msg);
                alert('Su comentario ha sido envido para revisi&oacute;n, gracias por participar');
                $('#myModal').modal('hide');
            });

            return false;

        }

        function guardarRespuesta(){

                $.ajax({
                url: "php/debates.php",
                 method: "POST",
                data: { accion: 'respuesta', debate: '<?php echo $_GET['debateId'];?>', comentario: $('#idComentarioActual').val(),  usuario: '<?php echo $_SESSION['user_id']; ?>', respuesta: $('#respuesta_txt').val() }
                }).done(function(msg) {
                 console.log(msg);
                alert('Su respuesta ha sido envido para revisi&oacute;n, gracias por participar');
                $('#myModal').modal('hide');
            });
            return false;
        }


        function modal(){
            $("#myModal").modal();
        }



    </script>
    <?php } ?>
    </body>
</html>
