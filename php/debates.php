<?php



class debates{

    function listar($p,$a,$t,$f1,$f2,$s){
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
            $array_chars = array("%20","%21");
            $array_reference = array(" ","!");
            if($t != 'null'){$t = '"'.str_replace($array_chars,$array_reference,$t).'"'; }
            $ConsultaDebates = 'call debatesList('.$inicio.','.$fin.','.$a.','.$t.','.$f1.','.$f2.')';
            $exQuery = $conexion->query($ConsultaDebates) or die ($conexion->error);
            $conexion->close();

            while($res = $exQuery->fetch_array()){

            $fecha =  substr($res[4],0,10);
            $etiquetas = $this->etiquetar($res[0]);
            $nombre = explode(" ",$res[3]);
            $btns_votos = $this->botonesVotos( $res[6], $res[7],$s,$res[0]);
            $contenido .= '<div class="box_debate">
                            <div class="row">
                            <div class="col-md-9">
                            <h3 style="color:#333;"> <a href="debates_info.php?debateId='.$res[0].'"><strong>'.$res[1].'</strong></a> </h3>
                            <p>
                            <i class="fa fa-comments-o" aria-hidden="true"></i>&nbsp;'.$res[2].'&nbsp;Comentario(s) &nbsp;•&nbsp;&nbsp; <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; '.$fecha.' &nbsp;•&nbsp;&nbsp;<i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;'. $nombre[0]." ".$nombre[1].'<p>'. $res[5].' </p>'.$etiquetas.'</div><div class="col-md-3" style="border-left: solid 1px #dfe2e2;">'.$btns_votos;

                           ;
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
        $intro = str_replace("'","\'",$_POST['introduccion']);
        $Consulta = "CALL insertarDebate('".$titulo."',".$_SESSION['user_id'].",'".$fecha."','".$texto."','".$intro."')";
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
        return $tags_info;
    }
    function etiqeutasMasVisitadas(){
        $c = new conexion();
        $conn = $c->conectar(3);
        $queryTag = 'call etiquetasVisitadas()';
        $ExQueryTags = $conn->query($queryTag) or die ($conn->error);
        $tags_info = '';
        while($res = $ExQueryTags->fetch_array()){
            $tags_info .= "<a href='#' class='btn btn-primary2'>".$res[1]."</a>&nbsp;";
        }
        $conn->close();
        unset($conn);
        unset($c);
        return $tags_info;

    }
    function contarDebates(){
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
            $r = 1;
            return $r;
        }else{
            return $registros[0];
        }
    }
    function botonesVotos($v1,$v2,$s,$d){
        $total_votos = $v1 + $v2;
            $total_votos_reales = $v1 + $v2;
            if($total_votos == 0){ $total_votos = 1;}
                $r1 = ($v1/$total_votos)*100;
                $r1 = number_format($r1,2,'.','');
                $r2 = ($v2/$total_votos)*100;
                $r2 = number_format($r2,2,'.','');
                if($s){

                     $c = new conexion();
                     $conexion = $c->conectar(3);
                     $ExQuery1 = $conexion->query('call buscarVoto('.$_SESSION['user_id'].','.$d.')') or die ($conexion->error);
                     $ResQuery = $ExQuery1->fetch_array();
                     $ExQuery1->free_result();
                     $conexion->close();
                     if($ResQuery[0] == 0){
                           $resultado = ' <a class="btn btn-success btn-outline" href="javascript:votar('.$d.',1)"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> &nbsp;'.$r1.'%<br><br><a class="btn btn-danger btn-outline" href="javascript:votar('.$d.',2)"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> &nbsp; '.$r2.'%<br><br><strong>'.$total_votos_reales.'&nbsp;Votos</strong></div></div></div><br>';
                     }else{
                         if($ResQuery[0] == 1){$resultado = ' <a class="btn btn-success"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> &nbsp;'.$r1.'%<br><br><a class="btn btn-default"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> &nbsp; '.$r2.'%<br><br><strong>'.$total_votos_reales.'&nbsp;Votos</strong></div></div></div><br>';}

                         if($ResQuery[0] == 2){$resultado = ' <a class="btn btn-default "><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> &nbsp;'.$r1.'%<br><br><a class="btn btn-danger"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> &nbsp; '.$r2.'%<br><br><strong>'.$total_votos_reales.'&nbsp;Votos</strong></div></div></div><br>';}
                     }








                }else{
                                     $resultado = ' <a class="btn btn-default"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i></a> &nbsp;'.$r1.'%<br><br><a class="btn btn-default"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i></a> &nbsp; '.$r2.'%<br><br><strong>'.$total_votos_reales.'&nbsp;Votos</strong></div></div></div><br>';


                }



        return $resultado;


    }
    function votarDebate($d){
        session_start();
        $session_active = false;
        if(isset($_SESSION['active']) AND isset($_SESSION['active_key'])) {
        if($_SESSION['active'] == true AND
            $_SESSION['active_key'] = md5(sha1('ajdhakdjhakjshdkwdkahqwrñ43p9tw{uwaERT#$%VWAWEFWAwE#!$C"QX}'))){
            $session_active = true;
        }
        }
        if($session_active == false){ die('error en sesion');}
        require_once('conexion.php');
        $c = new conexion();
        $conexion = $c->conectar(2);
        $conexion->query("CALL registrarVoto(".$_SESSION['user_id'].",".$d['debate'].",".$d['voto'].")") or die ($conexion->error);
        $conexion->close();
        return "success";
    }
    function comentarDebate($d,$u,$coment){
        date_default_timezone_set('America/Mexico_City');
        session_start();
        require_once('conexion.php');
        $c = new conexion();
        $conexion = $c->conectar(2);
        $fecha = date('Y-m-d H:i:s');
        $tQuery = 'INSERT INTO comentarios (id_debate,id_usuario,fecha,comentario) VALUES ('.$d.','.$u.',"'.$fecha.'","'.$coment.'")';
        $conexion->query($tQuery);
        $conexion->close() or die ($conexion->error);
        unset($conexion);
        unset($c);
        return "success";
    }
    function responderComentario($d,$coment,$u,$r){
        date_default_timezone_set('America/Mexico_City');
        session_start();
        require_once('conexion.php');
        $c = new conexion();
        $conexion = $c->conectar(2);
        $fecha = date('Y-m-d H:i:s');
        $tQuery = 'INSERT INTO respuestasComentarios (id_debate,id_comentario,id_usuario,fecha,respuesta) VALUES ('.$d.','.$coment.','.$u.',"'.$fecha.'","'.$r.'")';
        $conexion->query($tQuery);
        $conexion->close() or die ($conexion->error);
        unset($conexion);
        unset($c);
        return "success";

    }
}

if(isset($_POST['accion'])){
    $d = new debates();
 switch($_POST['accion']) {
     case "agregar":
        echo $d->crear($_POST);
    break;
    case "votar":
        echo $d->votarDebate($_POST);
    break;
    case "comentar":
        echo $d->comentarDebate($_POST['debate'],$_POST['usuario'],$_POST['comentario']);
    break;
     case "respuesta":
         echo $d->responderComentario($_POST['debate'],$_POST['comentario'],$_POST['usuario'],$_POST['respuesta']);
    break;
 }
}
