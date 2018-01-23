<?php

function tags($i){
    $conexion_tags = new conexion();
    $conn = $conexion_tags->conectar(3);
    $queryTag = 'call tagsDebate('.$i.')';
    $ExQueryTags = $conn->query($queryTag) or die ($conn->error);
    $tags_info = '';

    while($res = $ExQueryTags->fetch_array()){
        $tags_info .= "<a href='#' class='btn btn-primary2'>".$res[0]."</a>&nbsp;";
    }
    $conn->close();
    return $tags_info;
}


if(isset($_GET['pag'])){
    $pag = $_GET['pag'];
    $pag = $_GET['pag'] * 10;
} else {
        $pag = 10;
}

$data = $conexion->conectar(3);
$p = $pag - 10;
$query = 'call debatesList('.$p.','.$pag.')';
$exQuery = $data->query($query) or die ($data->error);
while($res = $exQuery->fetch_array()){
?>
<div class="box_debate">
<div class="row">
<div class="col-md-9">
<h3 style="color:#333;"> <a href="#"><strong><?php echo $res[1]; ?></strong></a> </h3>
<p>
<i class="fa fa-comments-o" aria-hidden="true"></i> <?php echo $res[2]; ?> Comentario(s) &nbsp;•&nbsp;&nbsp; <i class="fa fa-calendar" aria-hidden="true"></i>&nbsp;<?php print(substr($res[4],0,10)); ?> &nbsp;•&nbsp;&nbsp;<i class="fa fa-user-circle-o" aria-hidden="true"></i> <?php echo $res[3]; ?>
<p><?php echo $res[5]; ?> </p>
<?php echo tags($res[0]); ?>
</div>
<div class="col-md-3" style="border-left: solid 1px #dfe2e2;">
<?php
$total_votos = $res[6] + $res[7];
if($total_votos == 0){ $total_votos = 1;}
?>
<a class="btn btn-default">
<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
</a> &nbsp;
<?php
$res1 = ($res[6]/$total_votos)*100;
print(number_format($res1,2,'.',''));
 ?>%<br><br>
<a class="btn btn-default">
<i class="fa fa-thumbs-o-down" aria-hidden="true"></i>
</a> &nbsp; <?php
$res1 = ($res[7]/$total_votos)*100;
print(number_format($res1,2,'.',''));
?>%<br><br>
<strong><?php print($res[6] + $res[7]); ?>&nbsp; Votos</strong>
</div></div>
</div><br>
<?php } ?>
