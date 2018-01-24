<?php
date_default_timezone_set('America/Mexico_City');
require_once('seguridad.php');

class debates{
    function listar($p){
        require_once('conexion.php');
        $c = new conexion();
        $conexion = $c->conectar(3);
        $fin = $p*10;
        $inicio = $fin -10;
        $Consulta = 'call debatesList('.$inicio.','.$fin.')';
        $exQuery = $conexion->query($Consulta) or die ($conexion->error);

        // utilizar un while;
        $resultado = $exQuery->fetch_array('MYSQLI_NUM');


        $exQuery->free();
        $conexion->close();
        unset($conexion);
        unset($c);
        return $resultado;



    }



    function crear(){
        return false;
    }
    function editar(){
        return false;
    }
    function eliminar(){
        return false;
    }
    function comentar(){
        return false;
    }
    function etiquetar(){
        return false;
    }
}









function addDebate($conn){
    $conexion = $conn->conectar(2);
    $fecha = date('Y-m-d H:i:s');
    $Consulta = 'CALL insertarDebate("'.$_POST['titulo'].'",'.$_SESSION['user_id'].',"'.$fecha.'","'.$_POST['texto'].'")';
    $ExConsulta = $conexion->query($Consulta) or die($conexion->error);
    $res = $ExConsulta->fetch_array();
    $conexion->close();
    unset($conexion);
    $etiquetas = explode(",",$_POST['etiquetas']);
    foreach($etiquetas as $val){
        $conexion = $conn->conectar(2);
        $query = "CALL insertarEtiquetas('".$val."',".$res[0].")";
        $conexion->query($query) or die ($conexion->error);
        $conexion->close();
        unset($conexion);

    }

     return "successful";
}
