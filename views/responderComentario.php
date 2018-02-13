<div class="modal-dialog modal-lg">
<form onsubmit="return guardarRespuesta();">
    <div class="modal-content">
        <div class="modal-header" id="modal_header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Responder Comentario</h4>
        </div>
        <div class="modal-body">
            <div class="row" style="padding 1px 1px 1px 1px;">
                <div class="col-sm-8">

                        <div class="form-group">
                            <strong>Respuesta</strong><br>
                            <textarea rows="7" cols="50" class="form-control" id="respuesta_txt" required></textarea>
                            <input type="hidden" id="idComentarioActual" value="<?php echo $_POST['idComentario']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="acepto" required>&nbsp;Acepto la Política de privacidad y las Condiciones de uso
                        </div>

                </div>
                <div class="col-sm-4">
                    <h4>Recomendaciones para Comentarios</h4>

                    <p>Cualquier comentario que implique una acción ilegal será eliminado, también los que tengan la intención de sabotear los espacios de debate, todo lo demás está permitido.</p>
                    <p>Las críticas despiadadas son muy bienvenidas. Este es un espacio de pensamiento. Pero te recomendamos conservar la elegancia y la inteligencia. El mundo es mejor con ellas presentes.</p>

                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Comentar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </form>
</div>
