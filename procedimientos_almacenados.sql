USE proponleZac;

DELIMITER $$
CREATE PROCEDURE debatesList (IN b INT, IN e INT, IN c INT, IN t varchar(128), IN f1 datetime, in f2 datetime)
BEGIN
	-- evitamos nulos para que el if pueda leer las variables
	IF t IS NULL THEN SET @texto = " "; ELSE SET @texto = t;  END IF;
    IF f1 IS NULL THEN SET @fecha1 = " "; ELSE SET @fecha1 = f1;  END IF;
    IF f2 IS NULL THEN SET @fecha2 = " "; ELSE SET @fecha2 = f2;  END IF;
    -- generamos la consulta necesaria
    IF( @texto = " " and @fecha1 = " ") THEN
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
			where d.validado = 1 AND d.cerrado = c order by d.fecha_post DESC
			LIMIT b,e;

    ELSEIF (@texto !=  " " AND @fecha1 = " ")  then
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
			where d.validado = 1 AND d.cerrado = c AND titulo_debate LIKE concat("%",@texto,"%") order by d.fecha_post DESC
			LIMIT b,e;


    ELSEIF (@texto != " " AND @fecha1 !=  " ") THEN

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
			where d.validado = 1 AND d.cerrado = c AND titulo_debate LIKE concat("%",@texto,"%") AND (d.fecha_post between @fecha1 and @fecha2 )  order by d.fecha_post DESC
			LIMIT 0,10;




    ELSEIF (c= 1 AND @texto = " " AND @fecha1 != " ") THEN


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
			where d.validado = 1 AND d.cerrado = c  AND (d.fecha_post between @fecha1 and @fecha2 )  order by d.fecha_post DESC
			LIMIT 0,10;

    END IF;

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

  IF EXISTS (select * from etiquetas WHERE etiqueta = e) THEN
     SET @idEtiqueta =(select id_etiqueta FROM etiquetas WHERE etiqueta = e);
     INSERT INTO etiquetaDebate(id_etiqueta,idDebate) VALUES (@idEtiqueta,d);
ELSE
    insert into  etiquetas(etiqueta) VALUES (e);
     SET @idEtiqueta =(select id_etiqueta FROM etiquetas WHERE etiqueta = e);
    INSERT INTO etiquetaDebate(id_etiqueta,idDebate) VALUES (@idEtiqueta,d);
END IF;

END $$
DELIMITER ;


delimiter $$
create procedure registrosDebates()
begin
	select count(*) from debates where validado = 1;
end $$
delimiter ;

delimiter $$
create procedure etiquetasVisitadas()
begin
    select
    count(ed.id_etiqueta),
    e.etiqueta
    from etiquetaDebate ed
    inner join etiquetas e on (ed.id_etiqueta = e.id_etiqueta)
    group by ed.id_etiqueta
    LIMIT 7
    ;
end $$
delimiter ;

delimiter $$
CREATE PROCEDURE registroUsuario(in u varchar(128), in p varchar(32), in n varchar(128), in r int)
begin
    insert into usuarios (facebook_id,password,nombre,perfil) values (u,p,n,r);
end $$
delimiter ;

delimiter $$
create procedure usuarios(in u varchar(128))
begin
select count(*) from usuarios where facebook_id = u;
end $$
delimiter ;

delimiter $$
create procedure infoUsuario(in u varchar(128))
begin
select
idUsuario,
facebook_id,
nombre,
perfil
from usuarios
where facebook_id = u;
end $$
delimiter ;

