USE proponleZac;
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

DELIMITER $$
CREATE PROCEDURE insertarDebate(IN t VARCHAR(64) , IN u INT, IN f DATETIME, IN c TEXT )
BEGIN
    INSERT INTO debates(titulo_debate,id_usuario_auth,fecha_post,contenido) values (t,u,f,c);
    SELECT id_debate FROM debates WHERE titulo_debate = t AND id_usuario_auth = u and fecha_post = f;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE tagsDebate (in i INT)
BEGIN
	SELECT e.etiqueta FROM etiquetas e
    INNER JOIN etiquetadebate d on (d.id_etiqueta = e.id_etiqueta)
    WHERE d.idDebate = i;
END $$
DELIMITER ;


DELIMITER $$
CREATE PROCEDURE insertarEtiquetas(in e varchar(32), in d int )
BEGIN
	INSERT IGNORE INTO etiquetas(etiqueta) VALUES (e);
    SET @idEtiqueta =(select id_etiqueta FROM etiquetas WHERE etiqueta = e);
    INSERT INTO etiquetaDebate(id_etiqueta,idDebate) VALUES (@idEtiqueta,d);
END $$
DELIMITER ;



GRANT SELECT ON proponleZac.*  TO 'proponleZacConsulta'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.debatesList TO 'proponleZacConsulta'@'localhost';
GRANT SELECT,INSERT,UPDATE,DELETE ON proponleZac.* TO 'proponleZacUsr'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.insertarEtiquetas TO 'proponleZacUsr'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.insertarDebate TO 'proponleZacUsr'@'localhost';
