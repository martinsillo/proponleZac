GRANT SELECT ON proponleZac.*  TO 'proponleZacConsulta'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.debatesList TO 'proponleZacConsulta'@'localhost';
GRANT SELECT,INSERT,UPDATE,DELETE ON proponleZac.* TO 'proponleZacUsr'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.insertarEtiquetas TO 'proponleZacUsr'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.insertarDebate TO 'proponleZacUsr'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.registrosDebates TO 'proponleZacConsulta'@'localhost';
GRANT EXECUTE ON PROCEDURE proponleZac.etiquetasVisitadas TO 'proponleZacConsulta'@'localhost';
FLUSH PRIVILEGES;
