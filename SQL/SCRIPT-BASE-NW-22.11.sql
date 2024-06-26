-- MySQL Script generated by MySQL Workbench
-- Wed Nov 22 15:25:13 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema newsconcursos4
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema newsconcursos4
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `newsconcursos4`;
CREATE SCHEMA IF NOT EXISTS `newsconcursos4` DEFAULT CHARACTER SET utf8 ;
USE `newsconcursos4` ;

-- -----------------------------------------------------
-- Table `newsconcursos4`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `newsconcursos4`.`perfil` (
  `idPerfil` INT NOT NULL AUTO_INCREMENT,
  `nomePerfil` VARCHAR(45) NULL COMMENT 'Administrador\nProfessor\nUsuario',
  `siglaPerfil` VARCHAR(45) NULL,
  PRIMARY KEY (`idPerfil`))
ENGINE = InnoDB;

INSERT INTO `perfil` ( `nomePerfil`, `siglaPerfil`) VALUES
('Administrador', 'ADM'),
( 'Professor', 'PROF'),
( 'Usuário', 'USER');
-- -----------------------------------------------------
-- Table `newsconcursos4`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `newsconcursos4`.`usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nomeUsuario` VARCHAR(45) NULL,
  `fotoUsuario` VARCHAR(45) NULL,
  `dtNascimento` DATE NULL,
  `cpf` VARCHAR(45) NULL,
  `logradouro` VARCHAR(45) NULL,
  `numero` INT NULL,
  `complemento` VARCHAR(45) NULL,
  `bairro` VARCHAR(45) NULL,
  `cidade` VARCHAR(45) NULL,
  `uf` VARCHAR(45) NULL,
  `cep` VARCHAR(45) NULL,
  `emailUsuario` VARCHAR(45) NULL,
  `senhaUsuario` VARCHAR(45) NULL,
  `situacaoUsuario` VARCHAR(45) NULL COMMENT 'Ativo\nInativo\nBloqueado',
  `perfil_idPerfil` INT NOT NULL,
  PRIMARY KEY (`idUsuario`),
  INDEX `fk_usuario_perfil_idx` (`perfil_idPerfil` ASC) ,
  CONSTRAINT `fk_usuario_perfil`
    FOREIGN KEY (`perfil_idPerfil`)
    REFERENCES `newsconcursos4`.`perfil` (`idPerfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

INSERT INTO `usuario`(`nomeUsuario`, `fotoUsuario`, `dtNascimento`, `cpf`,`logradouro`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `cep`, `emailUsuario`, `senhaUsuario`, `situacaoUsuario`, `perfil_idPerfil`) VALUES ('Administrador de Sistema','','2000-11-22','056.023.014-65','Qnm 2 Conjunto K','10','casa','Ceilandia','Brasilia','DF','89563017','admnewsconcursos4@gmail.com',MD5('123'),'Ativo','1');
-- -----------------------------------------------------
-- Table `newsconcursos4`.`concurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `newsconcursos4`.`concurso` (
  `idConcurso` INT NOT NULL AUTO_INCREMENT,
  `tituloConcurso` VARCHAR(45) NULL,
  `dtAbertura` DATE NULL,
  `dtEncerramento` DATE NULL,
  `nivel` VARCHAR(45) NULL,
  `areaConcurso` VARCHAR(45) NULL,
  PRIMARY KEY (`idConcurso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `newsconcursos4`.`material`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `newsconcursos4`.`material` (
  `idMaterial` INT NOT NULL AUTO_INCREMENT,
  `dtCadastroMaterial` DATE NULL,
  `nomeMaterial` VARCHAR(45) NULL,
  `titulo` VARCHAR(45) NULL,
  `tipoMaterial` VARCHAR(45) NULL,
  `concurso_idConcurso` INT NOT NULL,
  PRIMARY KEY (`idMaterial`),
  INDEX `fk_material_concurso1_idx` (`concurso_idConcurso` ASC) ,
  CONSTRAINT `fk_material_concurso1`
    FOREIGN KEY (`concurso_idConcurso`)
    REFERENCES `newsconcursos4`.`concurso` (`idConcurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `newsconcursos4`.`assinatura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `newsconcursos4`.`assinatura` (
  `idAssinatura` INT NOT NULL AUTO_INCREMENT,
  `tipoAssinatura` VARCHAR(45) NULL,
  `validade` INT NULL DEFAULT 0 COMMENT 'Validade e a quantidade de dias do pacote\nmensal 30 dias\nsemestral 180 dias\nanual 365',
  `valorAssinatura` DECIMAL(13,2) NULL DEFAULT 0,
  PRIMARY KEY (`idAssinatura`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `newsconcursos4`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `newsconcursos4`.`pagamento` (
  `idPagamento` INT NOT NULL AUTO_INCREMENT,
  `dtPagamento` DATE NULL,
  `valorTotal` DECIMAL(13,2) NULL DEFAULT 0,
  `tipoPagamento` VARCHAR(45) NULL,
  `assinatura_idAssinatura` INT NOT NULL,
  `usuario_idUsuario` INT NOT NULL,
  `dtLimite` DATE NULL COMMENT 'A dtLimite e igual a validade da assinatura(quantidade de dias) somada a data de pagamento ',
  PRIMARY KEY (`idPagamento`),
  INDEX `fk_pagamento_assinatura1_idx` (`assinatura_idAssinatura` ASC) ,
  INDEX `fk_pagamento_usuario1_idx` (`usuario_idUsuario` ASC) ,
  CONSTRAINT `fk_pagamento_assinatura1`
    FOREIGN KEY (`assinatura_idAssinatura`)
    REFERENCES `newsconcursos4`.`assinatura` (`idAssinatura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagamento_usuario1`
    FOREIGN KEY (`usuario_idUsuario`)
    REFERENCES `newsconcursos4`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `newsconcursos4`.`usuario_concurso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `newsconcursos4`.`usuario_concurso` (
  `usuario_idUsuario` INT NOT NULL,
  `concurso_idConcurso` INT NOT NULL,
  PRIMARY KEY (`usuario_idUsuario`, `concurso_idConcurso`),
  INDEX `fk_usuario_has_concurso_concurso1_idx` (`concurso_idConcurso` ASC) ,
  INDEX `fk_usuario_has_concurso_usuario1_idx` (`usuario_idUsuario` ASC) ,
  CONSTRAINT `fk_usuario_has_concurso_usuario1`
    FOREIGN KEY (`usuario_idUsuario`)
    REFERENCES `newsconcursos4`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_concurso_concurso1`
    FOREIGN KEY (`concurso_idConcurso`)
    REFERENCES `newsconcursos4`.`concurso` (`idConcurso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `newsconcursos4`.`usuario_material`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `newsconcursos4`.`usuario_material` (
  `usuario_idUsuario` INT NOT NULL,
  `material_idmMaterial` INT NOT NULL,
  PRIMARY KEY (`usuario_idUsuario`, `material_idmMaterial`),
  INDEX `fk_usuario_has_material_material1_idx` (`material_idmMaterial` ASC) ,
  INDEX `fk_usuario_has_material_usuario1_idx` (`usuario_idUsuario` ASC) ,
  CONSTRAINT `fk_usuario_has_material_usuario1`
    FOREIGN KEY (`usuario_idUsuario`)
    REFERENCES `newsconcursos4`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_material_material1`
    FOREIGN KEY (`material_idmMaterial`)
    REFERENCES `newsconcursos4`.`material` (`idMaterial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
