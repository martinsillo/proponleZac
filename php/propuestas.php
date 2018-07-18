<?php



class propuestas{

    function listar($p,$a,$t,$f1,$f2,$s){
        $c = new conexion();
        $conexion = $c->conectar(3);
        $ConsultaRegistros = "call registrosPropuestas()";
        $ExRegistros = $conexion->query($ConsultaRegistros) or die('error');
        $registros = $ExRegistros->fetch_Array();
        $ExRegistros->free_result();
        $conexion->close();
        unset($ExRegistros);
        unset($conexion);

        if($registros[0] == 0){
            $contenido = '<div class="twitter_btn"><i class="fa fa-info-circle" aria-hidden="true"></i> Aún no se tienen propuestas registradass, te inviatamos a participar generando una propuesta.</div>';
        }else{
            $contenido ='';
            $conexion = $c->conectar(3);
            $fin = $p * 10;
            $inicio = $fin -10;
            $array_chars = array("%20","%21");
            $array_reference = array(" ","!");
            if($t != 'null'){$t = '"'.str_replace($array_chars,$array_reference,$t).'"'; }
            $ConsultaDebates = 'call propuestasList('.$inicio.','.$fin.','.$a.','.$t.','.$f1.','.$f2.')';
            $exQuery = $conexion->query($ConsultaDebates) or die ($conexion->error);
            $conexion->close();

            while($res = $exQuery->fetch_array()){

            $fecha =  substr($res[4],0,10);
            $etiquetas = $this->etiquetar($res[0]);
            $nombre = explode(" ",$res[3]);
            $apoyos_necesarios = number_format ( $res[6], 0 , "." ,  "," );
            $apoyos_recibidos =  number_format ( $res[7], 0 , "." ,  "," );
            $porcentaje_total = ($apoyos_recibidos/$apoyos_necesarios) * 100;
            $avance_barra = round($porcentaje_total);
            $porcentaje_total = number_format($porcentaje_total,2,".", ",");

            if($avance_barra > 90){$color_barra =  "progress-bar-success";}
            if($avance_barra > 40 && $avance_barra < 90 ){$color_barra =  "progress-bar-warning";}
            if($avance_barra >= 0 && $avance_barra < 40 ){$color_barra =  "progress-bar-danger";}

            $conexion = $c->conectar(3);
            $votoUsuarioSql = "SELECT COUNT(*) FROM votosPropuestas WHERE  idPropuesta = ".$res[0];
            $ExQueryVotos = $conexion->query($votoUsuarioSql) or die ($conexion->error);
            $resVotos = $ExQueryVotos->fetch_array();
            $votoUsr = $resVotos[0];
            $ExQueryVotos -> free_result();
            $conexion->close();
            unset($ExQueryVotos);
            unset($resVotos);

            if($votoUsr == 0){
                $btn_votar = '<button class="btn btn-sm btn-outline btn-warning" onclick="votar('.$res[0].')">&nbsp;&nbsp;Apoyar&nbsp;&nbsp;</button>';
            }else{
                $btn_votar = '<button class="btn btn-sm btn-disabled">&nbsp;&nbsp;Ya has votado&nbsp;&nbsp;</button>';
            }


            $contenido .= '<div class="box_debate">
                            <div class="row">
                            <div class="col-md-9">
                            <h3 style="color:#333;"> <a href="propuestas_info.php?propuestaId='.$res[0].'"><strong>'.$res[1].'</strong></a> </h3>
                            <p>
                            <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp; '.$fecha.' &nbsp;•&nbsp;&nbsp;<i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;'. $nombre[0]." ".$nombre[1].'<p>'. $res[5].' </p>'.$etiquetas.'</div><div class="col-md-3" style="border-left: solid 1px #dfe2e2;">
                              <div class="m">
                    <div class="progress m-t-xs full progress-striped active">
                        <div style="width: '.$avance_barra.'%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="'.$avance_barra.'" role="progressbar" class=" progress-bar '.$color_barra.'">
                            '.$porcentaje_total.'%
                        </div>
                    </div>
                </div>
                <strong> '.$apoyos_recibidos.' Apoyo(s) </strong><br>'.
                $apoyos_necesarios.' apoyos necesarios<br><br>
                        <div style="text-align:center">
                           '.$btn_votar.'</div>
                            </div></div></div>';

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
        $Consulta = "CALL insertarPropuesta('".$titulo."',".$_SESSION['user_id'].",'".$fecha."','".$texto."','".$intro."')";
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
    function contarPropuestas(){
        $c = new conexion();
        $conexion = $c->conectar(3);
        $ConsultaRegistros = "call registrosPropuestas()";
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
    function votarPropuesta($d){
        session_start();
        $session_active = false;
        if(isset($_SESSION['active']) AND isset($_SESSION['active_key'])) {
        if($_SESSION['active'] == true AND
            $_SESSION['active_key'] == md5(sha1('ajdhakdjhakjshdkwdkahqwrñ43p9tw{uwaERT#$%VWAWEFWAwE#!$C"QX}'))){
            $session_active = true;
        }
        }
        if($session_active == false){ die('error en sesion');}
        require_once('conexion.php');
        $c = new conexion();
        $conexion = $c->conectar(2);
        $conexion->query("CALL votoPropuesta(".$d['propuesta'].",".$_SESSION['user_id'].")") or die ($conexion->error);
        $conexion->close();
        return "success";
    }

}

if(isset($_POST['accion'])){
    $d = new propuestas();
 switch($_POST['accion']) {
     case "agregar":
        echo $d->crear($_POST);
    break;
    case "votar":
        echo $d->votarPropuesta($_POST);
    break;
 }
}
