<?php
// login usign facebook app
// revisamos la sesion por seguridad para ver que si sea el mismo equipo y que se este llamando desde la misma pagina
session_start();

if( $_SESSION['key'] != md5(sha1("LaborVincitOmnia-%SCDWEF)WET=AWFEUJF)R)WUF)PEFUDP)RTUSERIji")) ) { die (); }
if( $_SESSION['userAgent'] != $_SERVER['HTTP_USER_AGENT'] ) { die (); }


// si todo esta en orden se pasa a ejecutar la consulta de acceso y posteriormente a registrar al usuario si este no esta registrado


function registrar($i){
    $conn = $i->conectar(2);
    $password = md5($_POST['idUsr']);
    $conn->query("Call registroUsuario('".$_POST['idUsr']."','".$password."','".$_POST['nombreUsr']."',2)") or die ($conn->error);
    $conn->close();
    variablesSesion($i);
    return 0;
}

function variablesSesion($e){
    $conn = $e->conectar(3);
    $ExQuery = $conn->query("Call infoUsuario('".$_POST['idUsr']."')") or die ($conn->error);
    $Result = $ExQuery->fetch_array();
    $ExQuery->free_result();
    $_SESSION['user_id'] = $Result[0];
    $_SESSION['facebook_id'] = $Result[1];
    $_SESSION['full_name'] = $Result[2];
    $fullname = explode(" ",$Result[2]);
    $_SESSION['nombre_corto'] = $fullname[0];
    $_SESSION['active'] = true;
    $_SESSION['active_key'] = md5(sha1('ajdhakdjhakjshdkwdkahqwrñ43p9tw{uwaERT#$%VWAWEFWAwE#!$C"QX}'));
    $conn->close();
    return 0;

}


 include('conexion.php');
 $c = new conexion();
 $conexion = $c->conectar(3);
 $Query = "CALL usuarios('".$_POST['idUsr']."')";
 $ExQuery = $conexion->query($Query) or die ($conexion->error);
 $Resultado = $ExQuery->fetch_array();
 $ExQuery->free_result();
 $conexion->close();
 if($Resultado[0] == 0){
     registrar($c);
 }else{
     variablesSesion($c);
 }
 unset($conexion);
 unset($c);
 print('success');
