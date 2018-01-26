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
    `titulo_debate` VARCHAR(64) NOT NULL,
    `id_usuario_auth` BIGINT NOT NULL,
    `fecha_post` DATETIME NOT NULL,
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

CREATE TABLE `comentariosDebate`
(
    `id_comentario` bigint NOT NULL AUTO_INCREMENT,
    `id_debate` bigint NOT NULL,
    `id_usuario` bigint NOT NULL,
    `fecha` datetime NOT NULL,
    `comentario` text NOT NULL,
    `votos_favor` BIGINT NOT NULL,
    `votos_contra` BIGINT DEFAULT NULL,
    PRIMARY KEY (`id_comentario`)
);

CREATE TABLE `respuestasComentarios`
(
    `id_respuesta` BIGINT NOT NULL AUTO_INCREMENT,
    `id_debate` BIGINT NOT NULL,
    `id_comentario` BIGINT NOT NULL,
    `id_usuario` BIGINT NOT NULL,
    `fecha` DATETIME NOT NULL,
    `respuesta` TEXT NOT NULL,
    `votos_favor` BIGINT NOT NULL,
    `votos_contra` BIGINT NOT NULL,
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

ALTER TABLE `comentariosDebate`
    ADD INDEX `usuarioComenta_idx` (`id_usuario` ASC),
    ADD INDEX `debateComenta_idx` (`id_debate` ASC);

ALTER TABLE `proponleZac`.`comentariosDebate`
    ADD CONSTRAINT `usuarioComenta`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `proponleZac`.`usuarios` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    ADD CONSTRAINT `debateComenta`
    FOREIGN KEY (`id_debate`)
    REFERENCES `proponleZac`.`debates` (`id_debate`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION;


ALTER TABLE `respuestasComentarios`
    ADD INDEX `respuestaDebate_idx` (`id_debate` ASC),
    ADD INDEX `respuestaComentario_idx` (`id_comentario` ASC),
    ADD INDEX `respuestaUsuario_idx` (`id_usuario` ASC);

ALTER TABLE `proponleZac`.`respuestasComentarios`
    ADD CONSTRAINT `respuestaDebate`
    FOREIGN KEY (`id_debate`)
    REFERENCES `proponleZac`.`debates` (`id_debate`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    ADD CONSTRAINT `respuestaComentario`
    FOREIGN KEY (`id_comentario`)
    REFERENCES `proponleZac`.`comentariosDebate` (`id_comentario`)
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
