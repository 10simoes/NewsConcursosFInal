-- MySQL Script generated by MySQL Workbench
-- Sat Oct 28 14:58:32 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema newsconcursos
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema newsconcursos
-- -----------------------------------------------------
DROP DATABASE IF EXISTS `newsconcursos` ;
CREATE SCHEMA IF NOT EXISTS `newsconcursos` ;
USE `newsconcursos` ;

-- -----------------------------------------------------
-- Table `newsconcursos`.`perfil`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `newsconcursos`.`perfil` ;

CREATE TABLE IF NOT EXISTS `newsconcursos`.`perfil` (
  `idPerfil` INT(11) NOT NULL AUTO_INCREMENT,
  `nomePerfil` VARCHAR(45) NULL DEFAULT NULL COMMENT 'Administrador\\\\nFuncionário\\\\nCliente Pessoa Física\\\\nCliente Pessoa Jurídica',
  `siglaPerfil` CHAR(5) NULL DEFAULT NULL,
  PRIMARY KEY (`idPerfil`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `nomePerfil`, `siglaPerfil`) VALUES
(1, 'Administrador', 'ADM'),
(2, 'Funcionário', 'FUNC'),
(3, 'Cliente Pessoa Física', 'CLIPF'),
(4, 'Cliente Pessoa Jurídica', 'CLIPJ');


-- -----------------------------------------------------
-- Table `newsconcursos`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `newsconcursos`.`usuario` ;

CREATE TABLE IF NOT EXISTS `newsconcursos`.`usuario` (
  `idUsuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nomeUsuario` VARCHAR(100) NULL DEFAULT NULL,
  `fotoUsuario` VARCHAR(100) NULL DEFAULT NULL COMMENT 'Nome do arquivo da Foto do usuário',
  `dtNascimento` DATE NULL DEFAULT NULL,
  `cpf` VARCHAR(14) NULL DEFAULT NULL,
  `cnpj` VARCHAR(18) NULL DEFAULT NULL,
  `cep` CHAR(9) NULL DEFAULT NULL,
  `endereco` VARCHAR(100) NULL DEFAULT NULL,
  `numero` INT(11) NULL DEFAULT NULL,
  `complemento` VARCHAR(20) NULL DEFAULT NULL,
  `bairro` VARCHAR(100) NULL DEFAULT NULL,
  `cidade` VARCHAR(100) NULL DEFAULT NULL,
  `uf` CHAR(2) NULL DEFAULT NULL,
  `emailUsuario` VARCHAR(100) NOT NULL,
  `senhaUsuario` VARCHAR(50) NOT NULL,
  `situacaoUsuario` VARCHAR(12) NULL DEFAULT 'Ativo' COMMENT 'Ativo\\\\nInativo\\\\nBloqueado',
  `perfil_idPerfil` INT(11) NOT NULL,
  INDEX `fk_usuario_perfil` (`perfil_idPerfil` ASC) ,
  PRIMARY KEY (`idUsuario`),
  CONSTRAINT `fk_usuario_perfil`
    FOREIGN KEY (`perfil_idPerfil`)
    REFERENCES `newsconcursos`.`perfil` (`idPerfil`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;
--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `fotoUsuario`, `dtNascimento`, `cpf`, `cnpj`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `emailUsuario`, `senhaUsuario`, `situacaoUsuario`, `perfil_idPerfil`) VALUES
(1, 'Administrador instalação', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adm@newsconcursos.com.br', '202cb962ac59075b964b07152d234b70', 'Ativo', 1),
(2, 'José Funalo xx', ' ', '1977-10-28', '777.333.222-11', '76677,0001/90', '72333900', 'QNM 2', 111, 'CASA', 'CEILANDIA', 'BRASÍLIA', 'DF', 'xxy@email.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 3),
(3, 'Maria Silva yy', '', '2004-11-28', '888.333.222-88', '888330001/90', '72333222', 'QNM 8', 4444, 'CASA', 'CEILANDIA', 'BRASÍLIA', 'DF', 'teste99@email.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 3),
(4, 'Antônio Teste de Tal', '', '2002-10-28', '333.444.777-09', '', '72210-025', 'QNM 2 Conjunto E', 11, '', '', 'Brasília', 'DF', 'xx99@email.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 3);


-- -----------------------------------------------------
-- Table `newsconcursos`.`produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `newsconcursos`.`produto` ;

CREATE TABLE IF NOT EXISTS `newsconcursos`.`produto` (
  `idProduto` INT NOT NULL AUTO_INCREMENT,
  `nomeProduto` VARCHAR(200) NULL,
  `nomeProdutoResumido` VARCHAR(50) NULL,
  `qtdProduto` FLOAT(10,3) NULL DEFAULT 0,
  `vlUnitarioProduto` DECIMAL(13,2) NULL DEFAULT 0,
  `vlEntradaProduto` DECIMAL(13,2) NULL,
  `imagemProduto` VARCHAR(100) NULL,
  `dtCadastroProduto` DATE NULL,
  `situacaoProduto` VARCHAR(45) NULL DEFAULT 'Ativo' COMMENT 'Ativo\nInativo\nCancelado\nBloqueado',
  PRIMARY KEY (`idProduto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `newsconcursos`.`pacote`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `newsconcursos`.`pacote` ;

CREATE TABLE IF NOT EXISTS `newsconcursos`.`pacote` (
  `idPacote` INT NOT NULL AUTO_INCREMENT,
  `dtPacote` DATE NULL,
  `dtValidadePacote` DATE NULL,
  `vlTotalPacote` DECIMAL(13,2) NULL DEFAULT 0,
  `situacaoPedido` VARCHAR(30) NULL DEFAULT 'Aberto' COMMENT 'Aberto\nFechado\nCancelado',
  `usuario_idUsuario` INT(11) NOT NULL,
  PRIMARY KEY (`idPacote`),
  INDEX `fk_pacote_usuario1_idx` (`usuario_idUsuario` ASC) ,
  CONSTRAINT `fk_pacote_usuario1`
    FOREIGN KEY (`usuario_idUsuario`)
    REFERENCES `newsconcursos`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `newsconcursos`.`pacote_itens_produto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `newsconcursos`.`pacote_itens_produto` ;

CREATE TABLE IF NOT EXISTS `newsconcursos`.`pacote_itens_produto` (
  `pacote_idPacote` INT NOT NULL,
  `produto_idProduto` INT NOT NULL,
  `seqItem` INT NULL DEFAULT 0,
  `qtdItem` FLOAT(10,3) NULL DEFAULT 0,
  `precoUnitarioItem` DECIMAL(13,2) NULL DEFAULT 0,
  `vlTotalItem` DECIMAL(13,2) NULL DEFAULT 0,
  `estrelasItem` INT NULL DEFAULT 0,
  `situacaoItem` VARCHAR(20) NULL DEFAULT 'Ativo' COMMENT 'Ativo\nCancelado',
  PRIMARY KEY (`pacote_idPacote`, `produto_idProduto`),
  INDEX `fk_pacote_has_produto_produto1_idx` (`produto_idProduto` ASC) ,
  INDEX `fk_pacote_has_produto_pacote1_idx` (`pacote_idPacote` ASC) ,
  CONSTRAINT `fk_pacote_has_produto_pacote1`
    FOREIGN KEY (`pacote_idPacote`)
    REFERENCES `newsconcursos`.`pacote` (`idPacote`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pacote_has_produto_produto1`
    FOREIGN KEY (`produto_idProduto`)
    REFERENCES `newsconcursos`.`produto` (`idProduto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;