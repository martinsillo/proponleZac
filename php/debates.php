<?php



class debates{

    function listar($p){
        $c = new conexion();
        $conexion = $c->conectar(3);
        $ConsultaRegistros = "call registrosDebates()";
        $ExRegistros = $conexion->query($ConsultaRegistros) or die('error');
        $registros = $ExRegistros->fetch_Array();
        $ExRegistros->free_result();
        $conexion->close();
        unset($ExRegistros);
        unset($conexion);

        if($registros[0] == 0){
            $contenido = '<div class="twitter_btn"><i class="fa fa-info-circle" aria-hidden="true"></i> Aún no se tienen Debates registrados, te inviatamos a participar creando un debate.</div>';
        }else{
            $contenido ='';
            $conexion = $c->conectar(3);
            $fin = $p * 10;
            $inicio = $fin -10;
            $ConsultaDebates = 'call debatesList('.$inicio.','.$fin.')';
            $exQuery = $conexion->query($ConsultaDebates) or die ($data->error);
            $conexion->close();

            while($res = $exQuery->fetch_array()){

            $fecha =  substr($res[4],0,10);
            $etiquetas = $this->etiquetar($res[0]);
            $total_votos = $res[6] + $res[7];
            $total_votos_reales = $res[6] + $res[7];
            if($total_votos == 0){ $total_votos = 1;}
                $r1 = ($res[6]/$total_votos)*100;
                $r1 = number_format($r1,2,'.','');
                $r2 = ($res[7]/$total_votos)*100;
                $r2 = number_format($r2,2,'.','');
            $contenido .= '<div class="box_debate">
                            <div class="row">
                            <div class="col-md-9">
                            <h3 style="color:#333;"> <a href="#"><strong>'.$res[1].'</strong></a> </h3>
                            <p>
                            <i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;'.$res[2].'&nbsp;Comentario(s) &nbsp;•&nbsp;&nbsp; <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; '.$fecha.' &nbsp;•&nbsp;&nbsp;<i class="fa fa-user-circle-o" aria-hidden="true"></i>'. $res[3].'<p>'. $res[5].' </p>'.$etiquetas.'</div><div class="col-md-3" style="border-left: solid 1px #dfe2e2;"><a class="btn btn-default"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> &nbsp;'.$r1.'%<br><br><a class="btn btn-default"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> &nbsp; '.$r2.'%<br><br><strong>'.$total_votos_reales.'&nbsp;Votos</strong></div></div></div><br>';
            }
        }
        return $contenido;
    }
    function crear(){
        date_default_timezone_set('America/Mexico_City');
        session_start();
        require_once('conexion.php');
        $c = new conexion();
        $conexion = $c->conectar(2);
        $fecha = date('Y-m-d H:i:s');
        $titulo = str_replace("'","\'",$_POST['titulo']);
        $texto = str_replace("'","\'",$_POST['texto']);
        $Consulta = "CALL insertarDebate('".$titulo."',".$_SESSION['user_id'].",'".$fecha."','".$texto."')";
        $ExConsulta = $conexion->query($Consulta) or die($conexion->error);
        $res = $ExConsulta->fetch_array();
        $conexion->close();
        unset($conexion);
        $etiquetas = explode(",",$_POST['etiquetas']);
        foreach($etiquetas as $val){
            $conexion = $c->conectar(2);
            $query = "CALL insertarEtiquetas('".$val."',".$res[0].")";
            $conexion->query($query) or die ($conexion->error);
            $conexion->close();
        unset($conexion);

}

     return "successful";


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

    function etiquetar($i){
        $c = new conexion();
        $conn = $c->conectar(3);
        $queryTag = 'call tagsDebate('.$i.')';
        $ExQueryTags = $conn->query($queryTag) or die ($conn->error);
        $tags_info = '';
        while($res = $ExQueryTags->fetch_array()){
            $tags_info .= "<a href='#' class='btn btn-primary2'>".$res[0]."</a>&nbsp;";
        }
        $conn->close();
        unset($conn);
        unset($c);
        return 1;
    }
}


if(isset($_POST['accion'])){
    $d = new debates();
 switch($_POST['accion']) {
     case "agregar":
        echo $d->crear($_POST);
    break;
 }
}






/*


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

*/
