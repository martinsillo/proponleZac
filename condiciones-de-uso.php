<?php
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
    <meta name="description" content="Proponle a Zacatecas">
    <meta name="keywords" content="Zacatecas, Propuestas, Avanzamos, Avanzemos, Debate">
    <meta name="author" content="Gobierno del Estado de Zacatecas">
    <title>Proponle a Zacatecas</title>
    <!-- Hojas de Estilo -->
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300" rel="stylesheet">
    <link rel="stylesheet" href="css/proponle.css?v1.1.2">
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
  <a href="#" class="activo"><span style="color:#f00;">Inicio</span></a>
  <a href="debates.php">Debates</a>
  <a href="propuestas.php">Propuestas</a>
   <a href="http://avanzamostodos.zacagtecas.gob.mx" target="_blank">Presupuesto Participativo</a>

  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>
    </div>
    </div>
</div>
    <div style="text-align: justify; padding-top: 25px; padding-left: 10%; padding-right: 10%;" >

        <h3>Condiciones de uso</h3>
<strong>AVISO LEGAL SOBRE LAS CONDICIONES DE USO, PRIVACIDAD Y PROTECCIÓN DE DATOS PERSONALES DEL PORTAL DE AVANCEMOS TODOS ZACATECAS.</strong>
<hr>
        <b>1. Ámbito de aplicación de las condiciones de uso.</b><br>
La participación (entendiéndola como participación activa más allá de la lectura del contenido presente) en el Portal de Avancemos Todos Zacatecas el cual ahora en adelante se nombrara como “El portal”,  se regula por las presentes condiciones de uso que vinculan a todas las personas que participen en este sitio web. Por ello, cualquier persona que desee participar deberá registrarse, a cuyo fin se solicitará la aceptación de estas condiciones de uso.<br>
El Gobierno del Estado de Zacatecas se reserva la facultad de modificar las presentes condiciones de uso para la participación en el Portal, cuya última versión se publicará en este sitio web.<br>
La participación en el Portal se regula por las presentes condiciones de uso que vinculan a todas las personas que participen en este sitio web. Cualquier persona que desee participar deberá registrarse, a cuyo fin se solicitará la aceptación de estas condiciones de uso.<br><br>
        <b>2. Objetivo de la iniciativa</b><br>
A través del Portal se quiere fomentar la participación de los ciudadanos en la gestión de la ciudad, implicándoles en la generación de ideas y propuestas novedosas y viables, con el objeto de mejorar su calidad de vida. Es una apuesta decidida por una gestión más cercana a los ciudadanos que permitirá recibir sus propuestas y además, crear canales directos de comunicación con el gobierno municipal, contribuyendo a tomar las decisiones más acertadas para el interés general.<br><br>
<b>3. Cuestiones generales sobre la participación en el Portal</b><br>
Podrá participar cualquier persona física a partir de los 18 años que se haya registrado previamente en el Portal. No existe limitación en cuanto al número de debates, comentarios o propuestas a presentar por los participantes.<br>
Al introducir el título de las propuestas, se recomienda escribir una descripción breve y precisa con un máximo de 2000 caracteres.<br><br>
        <b>4. Obligaciones de los usuarios del Portal de Gobierno Abierto.</b>
<br>Al ser este portal un punto de encuentro cuyo objetivo es debatir, y compartir y valorar propuestas relacionadas con la mejora de la comunidad, los usuarios están obligados a hacer un uso diligente y acorde a dicho objetivo.<br>
El Gobierno del Estado de Zacatecas no es responsable del uso incorrecto del Portal por parte de los usuarios o de los contenidos localizados en el mismo, siendo cada usuario responsable de su uso correcto y de la legalidad de los contenidos y opiniones que haya compartido.<br>
El Ayuntamiento de Madrid se reserva, por lo tanto, el derecho a limitar el acceso al Portal de opiniones, informaciones, comentarios o documentos que los usuarios quieran incorporar, pudiendo instalar filtros a tal efecto. Todo ello se realizará únicamente mientras tenga el fin de preservar el objetivo fundamental del Portal.
De acuerdo a la normativa legal vigente queda prohibida la utilización del Portal con fines distintos a los de debatir, compartir y valorar propuestas, y específicamente:
Compartir cualquier contenido que pueda ser considerado como una vulneración en cualquier forma de los derechos fundamentales al honor, imagen e intimidad personal y familiar de terceros o contra la dignidad de las personas.<br>
Compartir imágenes o fotografías que recojan imágenes o datos personales de terceros sin haber obtenido el oportuno consentimiento de sus titulares.
Compartir cualquier contenido que vulnere el secreto en las comunicaciones, la infracción de derechos de propiedad industrial e intelectual o de las normas reguladoras de la protección de datos de carácter personal.<br>
Reproducir, distribuir, compartir contenidos, informaciones o imágenes que hayan sido puestas a disposición por otros usuarios sin la autorización expresa de estos.
Su utilización con fines de publicidad.<br>
La realización de cualquiera de los anteriores comportamientos permitirá suspender temporalmente la actividad de un participante, inhabilitar su cuenta o borrar su contenido, sin perjuicio de otras responsabilidades que puedan ser reclamadas.
En caso de que el contenido introducido por los usuarios incorpore un enlace a otro sitio web, el  Gobierno del Estado no será responsable por los daños o perjuicios derivados del acceso al enlace o a sus contenidos.<br>
En caso de litigio de cualquier clase o por cualquier motivo entre los participantes en el sitio web y/o un tercero, el  Gobierno del Estado quedará exento de cualquier responsabilidad por reclamaciones, demandas o daños de cualquier naturaleza relacionados o derivados del litigio.<br><br>
        <b>5. Uso del Portal Avancemos Todos Zacatecas </b><br>
Los participantes podrán acceder y navegar por el Portal de Gobierno Abierto libremente y de forma anónima. Sólo cuando quieran realizar alguna acción que implique la creación, apoyo o comentario de una propuesta, o a la participación en un debate, se le solicitará que introduzca sus credenciales, para cuya obtención será necesario registrarse. El registro que permitirá participar comentando en cualquiera de las secciones, creando debates o propuestas, se realizará introduciendo los siguientes datos:<br>
<ul>
    <li>Nombre de usuario</li>
    <li>Correo electrónico</li>
    <li>Aceptación de las condiciones de uso de el Portal de Gobierno Abierto</li>
    <li>Lugar de origen</li>
</ul>
El Portal de Gobierno Abierto permite la identificación mediante el usuario de Facebook. El usuario podrá interactuar con la herramienta interviniendo, al menos, de las siguientes formas:
        <br><br>
        <b><i>1. DEBATES</i></b><br>
En el apartado de debates el usuario podrá participar:<br>
<ul>
    <li>Creando un debate. Cada usuario podrá abrir uno o más debates. Los debates serán publicados después de una revisión por parte del moderador, para evitar debates  ofensivos.</li>
    <li>Votando de manera positiva o negativa a los debates creadas por los usuarios. Los debates aparecerán con los votos positivos y negativos recibidos. Cada usuario podrá exclusivamente votar o bien positivo o bien negativo, y una vez a un mismo debate.</li>
    <li>Comentando los debates del resto de usuarios. Cada debate podrá ser comentado por el resto de usuarios.</li>
</ul><br>
<b><i>2. PROPUESTAS</i></b><br>
En el apartado de propuestas ciudadanas el usuario podrá participar:
<ul>
    <li>Creando una propuesta. Cada usuario podrá dar de alta una o más propuestas. Las propuestas serán publicadas después de su aprobación por un moderador.</li>
    <li>Apoyando las propuestas creadas por los usuarios. Las propuestas aparecerán con el número de apoyos recibidos. Cada usuario podrá exclusivamente apoyar una vez a una misma propuesta. Cuando una propuesta reciba apoyos equivalente al 1% del padrón de personas con 18 años o más, la propuesta pasará a una fase posterior donde durante una semana se invitará a la ciudadanía a aceptarla o rechazarla como propuesta colectiva.</li>
    <li>Comentando las propuestas del resto de usuarios. Cada propuesta podrá ser comentada por el resto de usuarios, pudiendo argumentar las razones del apoyo o introducir mejoras a la misma.</li>
</ul><br><br>

        <b>6. Condiciones para el tratamiento de los contenidos proporcionados por los usuarios</b><br>
Las presentes condiciones regulan los términos aplicables al contenido remitido por los usuarios de esta plataforma a través del formulario correspondiente (en adelante, el contenido). Estas condiciones se aplican tanto al contenido inicialmente remitido al Portal de Gobierno Abierto como a cualquier contenido que se envíe con posterioridad o se manifieste al Gobierno del Estado de Zacatecas, debiendo significarse lo siguiente:<br>
<ul>
    <li>A. No Confidencialidad: Todo el contenido remitido por el usuario al Gobierno del estado deberá ser susceptible de ser conocido por el público en general. Por lo tanto, el citado contenido será tratado como información no confidencial.</li>
    <li>B. Procedimiento: En el caso de que el Gobierno del Estado esté interesado en el contenido remitido por el usuario, se pondrá en contacto con él para solicitarle información adicional. Dicha información tendrá asimismo carácter de no confidencial, sin perjuicio de que en el caso de que las partes consideren la necesidad de intercambiarse información de carácter confidencial se firme el correspondiente Acuerdo de Confidencialidad.<br>

El Gobierno del Estado  se reserva el derecho de no contactar con los usuarios que le hubieran remitido el contenido. Todo ello sin perjuicio de lo establecido en el apartado relativo a "Derechos de Propiedad Intelectual e industrial".<br>

        En el supuesto que el Gobierno del Estado, a su entera discreción, decidiera contactar con determinados usuarios, éstos conocen y aceptan que por ello el Gobierno del Estado  no adquiere compromiso alguno.</li>
    <li>C. Publicidad o difusión de los contenidos presentados: Los participantes en el declaran conocer y aceptar el hecho de que la información aportada podrá ser publicada en la web avancemostodos.zacatecas.gob.mx, así como a través de otros medios que la organización considere oportunos para dar a conocer esta iniciativa.</li>
    <li>D. No devolución material: El Gobierno del Estado carece de obligación alguna de devolver el Contenido remitido por los usuarios.</li>
    <li>E. Procedimiento de aviso y retirada: El Gobierno del Estado procesará las peticiones de eliminación o retirada de contenidos que incumplan las condiciones de uso que hayan añadido los participantes. Asimismo, cualquier persona, con motivos razonados si existe incumplimiento de las presentes condiciones de uso, podrá solicitar la retirada de contenidos al Gobierno del Estado. El Gobierno del Estado se reserva el derecho de hacer las comprobaciones o verificaciones oportunas con carácter previo a la retirada de cualquier contenido.</li>
        </ul><br><br>

<b>7. Política de privacidad y protección de datos</b>
<ul><li>A. Titularidad de los derechos de propiedad intelectual e industrial: El usuario que aporta el Contenido declara, con la aceptación de las presentes Condiciones, ser titular de los derechos de propiedad intelectual y/o industrial u ostentar derechos suficientes sobre dicho contenido y que además lo remite al portal de forma voluntaria para su divulgación.<br>

La titularidad de todos y cada uno de los Contenidos presentados que se encuentren protegidos o sean susceptibles de encontrarse protegidos, por el Derecho de la Propiedad Industrial e Intelectual, corresponde a los autores y/o titulares de los mencionados Contenidos.<br>

El Gobierno del Estado no asume responsabilidad alguna, ya sea directa o indirecta, respecto de cualquier tipo de controversia, disputa y/o litigio que pudiera derivarse de la publicación, divulgación y/o difusión de los contenidos aportados sin el preceptivo consentimiento de sus legítimos titulares.<br>

El Gobierno del Estado respetará todos los Derechos de Propiedad Intelectual o Industrial sobre el contenido remitido por los usuarios. Cualquier vulneración de los Derechos de Propiedad Intelectual o Industrial será responsabilidad de la persona que aporte el contenido.<br>

    El Gobierno del Estado, por la mera recepción del contenido, no recibe del usuario licencia alguna de propiedad intelectual o industrial, por lo que no hará uso del contenido salvo aceptación expresa de su titular.</li>
    <li>B. Protección de datos: Los datos personales aportados por los usuarios que se registren en el Porta, serán incorporados y tratados en el fichero Gestión de Procesos Participativos, cuya finalidad es gestionar los procesos participativos para el control de la habilitación de las personas que participan en los mismos y recuento meramente numérico y estadístico de los resultados derivados de los procesos de participación ciudadana.</li></ul><br><br>

<b>8. Revisión de las condiciones de uso</b><br>
El Gobierno del Estado se reserva el derecho de revisar las presentes condiciones de uso y la política de privacidad en cualquier momento y por cualquier razón. En dicho caso, los usuarios registrados serán avisados a través de este espacio en línea y, si continúan utilizando el Portal, se entenderán aceptadas las modificaciones introducidas.





    </div>
<hr>
<br>


   <div class="pie_pag">
      <div class="container">
        <div class="row" style="padding: 9px 1px 5px 1px;">
            <div class="col-md-3"><img src="img/logo_zacatecas.png" class="img-responsive"></div>
            <div class="col-md-3">
            <h4><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp;Información</h4>
                <ul>
                    <li><a href="http://coepla.zacatecas.gob.mx/wp-content/uploads/2017/02/Aviso%20de%20Privacidad%20integral%20COEPLA.pdf" target="_blank">Aviso de Privacidad</a></li>
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
