-- user privileges
GRANT SELECT ON proponleZac.*  TO 'proponleZacConsulta'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.debatesList TO 'proponleZacConsulta'@'localhost';
GRANT SELECT,INSERT,UPDATE,DELETE ON proponleZac.* TO 'proponleZacUsr'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.insertarEtiquetas TO 'proponleZacUsr'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.insertarDebate TO 'proponleZacUsr'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.registrosDebates TO 'proponleZacConsulta'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.etiquetasVisitadas TO 'proponleZacConsulta'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.registroUsuario TO 'proponleZacUsr'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.usuarios TO 'proponleZacConsulta'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.infoUsuario TO 'proponleZacConsulta'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.tagsDebate TO 'proponleZacConsulta'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.registrarVoto TO 'proponleZacUsr'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.buscarVoto TO 'proponleZacConsulta'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.comentarios TO 'proponleZacConsulta'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.propuestasList TO 'proponleZacConsulta'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.registrosPropuestas TO 'proponleZacConsulta'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.categoriasVisitadas TO 'proponleZacConsulta'@'localhost';
FLUSH PRIVILEGES;
