<?php include('php/seguridad.php');
if(
       $_SESSION['active'] == true AND
       $_SESSION['active_key'] == md5(sha1('ajdhakdjhakjshdkwdkahqwrñ43p9tw{uwaERT#$%VWAWEFWAwE#!$C"QX}'))){
        header("Location:index.php");
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
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="css/proponle.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="row">
        <div class="col-md-4" style="border-top: solid 12px #3e3f54; text-align: center;">
            <br><br>
            <img src="img/logo2.png" class="img-responsive" style="margin: 0 auto;">
             <hr>
            <h4>Proponle a Zacatecas</h4>
        </div>

        <div class="col-md-8" style="padding:2% 10% 5% 10%">
        <h2>Registrarse</h2>
            <p>Puedes regístrarte con:</p>
            <br>
            <div class="row">
                <div class="col-md-3">
                   <a id="login"><div class="facebook_btn"><span style="color:#3d5a96; font-size: 22px;"><i class="fa fa-facebook-square" aria-hidden="true"></i></span>&nbsp;&nbsp;Facebook</div></a>
                </div>
                <div class="col-md-3">
                <a><div class="twitter_btn"><span style="color:#4bb1e1; font-size: 22px;"><i class="fa fa-twitter-square" aria-hidden="true"></i></span>&nbsp;&nbsp;Twitter</div></a>
                </div>
                <div class="col-md-3">
                <a><div class="google_btn"><span style="color:#e54250; font-size: 22px;"><i class="fa fa-google-plus-square" aria-hidden="true"></i></span>&nbsp;&nbsp;Google +</div></a>
                </div>
            </div>
            <br><hr>
           <strong>O puedes registrarte como Organización o Colectivo:</strong>
            <br><br>
            <pre>
                <?php print_r($_SESSION); ?>
            </pre>
            <div id="reg_colectivo">
            <form class="form-horizontal" onsubmit="return valida_form();">
                <div class="form-group">
                    <label class="col-sm-3 control-label"><strong>Nombre de la Organización</strong></label>
                    <div class="col-sm-9"><input type="text" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><strong>Nombre del Responsable</strong></label>
                    <div class="col-sm-9"><input type="text" class="form-control" placeholder="Nombre y apellidos de la persona responsable de la organización"></div>
                </div>
                <div class="hr-line-dashed"></div>
                            <div class="form-group">
                    <label class="col-sm-3 control-label"><strong>Correo Electrónico</strong></label>
                    <div class="col-sm-9"><input type="text" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                            <div class="form-group">
                    <label class="col-sm-3 control-label"><strong>Teléfono</strong></label>
                    <div class="col-sm-9"><input type="text" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                            <div class="form-group">
                    <label class="col-sm-3 control-label"><strong>Contraseña</strong></label>
                    <div class="col-sm-9"><input type="text" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                            <div class="form-group">
                    <label class="col-sm-3 control-label"><strong>Repetir Contraseña</strong></label>
                    <div class="col-sm-9"><input type="text" class="form-control"></div>
                </div>
                <div class="hr-line-dashed"></div>
                <div class="row" style="padding: 1px 1px 1px 1px;">
                    <div class="col-md-3"><input type="checkbox">&nbsp;Acepto las condiciones de uso </div>
                    <div class="col-md-4"><button type="submit" class="btn btn-outline btn-success btn-lg">&nbsp;Registrarme&nbsp;</button> </div>
                </div>
            </form>
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
                    <li>Politica de Privacidad</li>
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


<script>


  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));



</script>


    </body>
</html>
