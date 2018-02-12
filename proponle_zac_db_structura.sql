CREATE DATABASE proponleZac;
ALTER SCHEMA `proponleZac`  DEFAULT CHARACTER SET utf8 ;
 CREATE USER 'proponleZacAdm'@'localhost' IDENTIFIED BY '>GD2R3,(<xj8m:<a';
 GRANT ALL PRIVILEGES ON proponleZac.* TO 'proponleZacAdm'@'localhost';
 CREATE USER 'proponleZacUsr'@'localhost' IDENTIFIED BY 'uxU2j*6gXVTT;_#7';
 CREATE USER 'proponleZacConsulta'@'localhost' IDENTIFIED BY '!<x8KS@CKKbx=gWF';
USE proponleZac;


-- Usuarios y Perfiles -----------------------
CREATE TABLE `usuarios` (
    `idUsuario` bigint NOT NULL AUTO_INCREMENT,
    `facebook_id` varchar(45) DEFAULT NULL,
    `twitter_id` varchar(45) DEFAULT NULL,
    `google_id` varchar(45) DEFAULT NULL,
    `nombre` varchar(45) NOT NULL,
    `email` varchar(45) DEFAULT NULL,
    `perfil` tinyint(4) NOT NULL,
    `localidad` int(11) DEFAULT NULL,
    `password` varchar(32) NOT NULL,
    PRIMARY KEY (`idUsuario`)
);

CREATE TABLE `perfiles`
(
    `idPerfil` tinyint(4) NOT NULL AUTO_INCREMENT,
    `perfil` varchar(45) NOT NULL,
    PRIMARY KEY (`idPerfil`)
);

INSERT INTO perfiles (perfil) VALUES ('Administrador');
INSERT INTO perfiles (perfil) VALUES ('Ciudadano');
INSERT INTO perfiles (perfil) VALUES ('Funcionario');

ALTER TABLE `usuarios` ADD INDEX `perfilUsuario_idx` (`perfil` ASC);
ALTER TABLE `proponleZac`.`usuarios`
    ADD CONSTRAINT `perfilUsuario`
    FOREIGN KEY (`perfil`)
    REFERENCES `proponleZac`.`perfiles` (`idPerfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;
-- Fin Usuarios y Perfiles------------------

/* ---- Debates estrucutura ---------*/
CREATE TABLE `debates`
(
    `id_debate` BIGINT NOT NULL AUTO_INCREMENT,
    `id_usuario_auth` BIGINT NOT NULL,
    `fecha_post` DATETIME NOT NULL,
    `titulo_debate` VARCHAR(64) NOT NULL,
    `introduccion` TEXT NOT NULL,
    `contenido` TEXT NOT NULL,
    `votos_favor` BIGINT NOT NULL DEFAULT 0,
    `votos_contra` BIGINT NOT NULL DEFAULT 0,
    `validado` TINYINT NOT NULL DEFAULT 0,
    `cerrado` tinyint(4) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id_debate`)
);

ALTER TABLE `debates`  ADD INDEX `usuarioDebate_idx` (`id_usuario_auth` ASC);
ALTER TABLE `proponleZac`.`debates`
    ADD CONSTRAINT `usuarioDebate`
    FOREIGN KEY (`id_usuario_auth`)
    REFERENCES `proponleZac`.`usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;


CREATE TABLE `respuestasComentarios`
(
    `id_respuesta` BIGINT NOT NULL AUTO_INCREMENT,
    `id_debate` BIGINT NOT NULL,
    `id_comentario` BIGINT NOT NULL,
    `id_usuario` BIGINT NOT NULL,
    `fecha` DATETIME NOT NULL,
    `respuesta` TEXT NOT NULL,
    `validado` TINYINT NOT NULL default 0,
    `votos_favor` BIGINT NOT NULL DEFAULT 0,
    `votos_contra` BIGINT NOT NULL DEFAULT 0,
    PRIMARY KEY (`id_respuesta`)
)COMMENT = 'Respuestas a los comentarios de los debates';


CREATE TABLE `etiquetas`
(
    `id_etiqueta` INT NOT NULL AUTO_INCREMENT,
    `etiqueta` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`id_etiqueta`)
);

CREATE TABLE `etiquetaDebate` (
  `id_etiqueta` INT NOT NULL,
  `idDebate` BIGINT NOT NULL
);




ALTER TABLE `respuestasComentarios`
    ADD INDEX `respuestaDebate_idx` (`id_debate` ASC),
    ADD INDEX `respuestaComentario_idx` (`id_comentario` ASC),
    ADD INDEX `respuestaUsuario_idx` (`id_usuario` ASC);


    CREATE TABLE `proponleZac`.`comentarios` (
  `idcomentario` BIGINT NOT NULL AUTO_INCREMENT,
  `id_debate` BIGINT NOT NULL,
  `id_usuario` BIGINT NOT NULL,
  `fecha` DATETIME NOT NULL,
  `comentario` TEXT NOT NULL,
  `validado` TINYINT NOT NULL DEFAULT 0,
  `aFavor` INT NOT NULL DEFAULT 0,
  `enContra` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`idcomentario`));

ALTER TABLE `proponleZac`.`respuestasComentarios`
    ADD CONSTRAINT `respuestaDebate`
    FOREIGN KEY (`id_debate`)
    REFERENCES `proponleZac`.`debates` (`id_debate`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    ADD CONSTRAINT `respuestaComentario`
    FOREIGN KEY (`id_comentario`)
    REFERENCES `proponleZac`.`comentarios` (`idcomentario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    ADD CONSTRAINT `respuestaUsuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `proponleZac`.`usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;

ALTER TABLE `proponleZac`.`etiquetaDebate`
    ADD INDEX `edebate1_idx` (`id_etiqueta` ASC),
    ADD INDEX `edebate2_idx` (`idDebate` ASC);

ALTER TABLE `proponleZac`.`etiquetaDebate`
    ADD CONSTRAINT `edebate1`
    FOREIGN KEY (`id_etiqueta`)
    REFERENCES `proponleZac`.`etiquetas` (`id_etiqueta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    ADD CONSTRAINT `edebate2`
    FOREIGN KEY (`idDebate`)
    REFERENCES `proponleZac`.`debates` (`id_debate`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;

CREATE TABLE `proponleZac`.`votosDebate` (
  `idvotosDebate` BIGINT NOT NULL AUTO_INCREMENT,
  `idDebate` INT NOT NULL,
  `idUsuario` INT NOT NULL,
  `voto` TINYINT NOT NULL,
  PRIMARY KEY (`idvotosDebate`));




  ALTER TABLE `proponleZac`.`comentarios`
ADD INDEX `comentario_debate_idx` (`id_debate` ASC),
ADD INDEX `usuario_comentario_idx` (`id_usuario` ASC);
ALTER TABLE `proponleZac`.`comentarios`
ADD CONSTRAINT `comentario_debate`
  FOREIGN KEY (`id_debate`)
  REFERENCES `proponleZac`.`debates` (`id_debate`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION,
ADD CONSTRAINT `usuario_comentario`
  FOREIGN KEY (`id_usuario`)
  REFERENCES `proponleZac`.`usuarios` (`idUsuario`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
