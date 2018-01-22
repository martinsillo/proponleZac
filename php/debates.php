<?php
require_once('seguridad.php');
require_once('conexion.php');
$conexion = new conexion();

function addDebate($conn){
    $connexion = $conn->conectar(3);
    $fecha = date('Y-m-d H:i:s');
    $Consulta = 'CALL insertarDebate("'.$_POST['titulo'].'",'.$_SESSION['user_id'].',"'.$fecha.'","'.$_POST['texto'].'")';
    $ExConsulta = $conexion->query($Consulta);


}


switch($_POST['accion']){
    case 'agregar':
    $resultado = addDebate($conexion);
    break;
}

echo $resultado;
