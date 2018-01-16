CREATE DATABASE `proponleZac`;
USE `proponleZac`;

-- Usuarios y Perfiles -----------------------
CREATE TABLE `usuarios` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `facebook_id` VARCHAR(45) NULL,
  `twitter_id` VARCHAR(45) NULL,
  `google_id` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NULL,
  `perfil` TINYINT NOT NULL,
  `localidad` INT NULL,
  PRIMARY KEY (`idUsuario`));

  CREATE TABLE `perfiles` (
  `idPerfil` tinyint(4) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(45) NOT NULL,
  PRIMARY KEY (`idPerfil`)
);

ALTER TABLE `proponleZac`.`usuarios`
ADD INDEX `perfilUsuario_idx` (`perfil` ASC);
ALTER TABLE `proponleZac`.`usuarios`
ADD CONSTRAINT `perfilUsuario`
  FOREIGN KEY (`perfil`)
  REFERENCES `proponleZac`.`perfiles` (`idPerfil`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;
-- Fin Usuarios y Perfiles------------------

