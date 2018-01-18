USE 'proponleZac';
DELIMITER $$
CREATE PROCEDURE debatesList (IN b INT, IN e INT)
BEGIN
SELECT

	d.id_debate,
	d.titulo_debate,
    (select count(*) FROM comentariosDebate WHERE id_debate = d.id_debate) as comentarios,
	u.nombre,
	d.fecha_post,
	d.contenido,
	d.votos_favor,
	d.votos_contra
	FROM  debates d
	inner join usuarios u on (d.id_usuario_auth = u.idUsuario)
    where d.validado = 1
    LIMIT b,e;

END $$
DELIMITER ;
