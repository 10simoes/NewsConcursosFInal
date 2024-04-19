-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07/11/2023 às 02:16
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `newsconcursos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `assinatura`
--

CREATE TABLE `assinatura` (
  `idAssinatura` int(11) DEFAULT NULL,
  `vlAssinatura` int(11) NOT NULL,
  `vlTotalAssinatura` decimal(13,2) DEFAULT 0.00,
  `situacaoAssinatura` varchar(20) DEFAULT 'Ativo' COMMENT 'Ativo\r\nCancelado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `concurso`
--

CREATE TABLE `concurso` (
  `idConcurso` int(11) NOT NULL,
  `dtConcurso` date DEFAULT NULL,
  `dtValidadeConcurso` date DEFAULT NULL,
  `vlTotalConcurso` decimal(13,2) DEFAULT 0.00,
  `situacaoPedido` varchar(30) DEFAULT 'Aberto' COMMENT 'Aberto\nFechado\nCancelado',
  `usuario_idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `material`
--

CREATE TABLE `material` (
  `idMaterial` int(11) NOT NULL,
  `nomeMaterial` varchar(200) DEFAULT NULL,
  `nomeMaterialResumido` varchar(50) DEFAULT NULL,
  `qtdMaterial` float(10,3) DEFAULT 0.000,
  `vlUnitarioMaterial` decimal(13,2) DEFAULT 0.00,
  `vlEntradaMaterial` decimal(13,2) DEFAULT NULL,
  `imagemMaterial` varchar(100) DEFAULT NULL,
  `dtCadastroMaterial` date DEFAULT NULL,
  `situacaoMaterial` varchar(45) DEFAULT 'Ativo' COMMENT 'Ativo\r\nInativo\r\nCancelado\r\nBloqueado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `idPerfil` int(11) NOT NULL,
  `nomePerfil` varchar(45) DEFAULT NULL COMMENT 'Administrador\\\\nFuncionário\\\\nCliente Pessoa Física\\\\nCliente Pessoa Jurídica',
  `siglaPerfil` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `perfil`
--

INSERT INTO `perfil` (`idPerfil`, `nomePerfil`, `siglaPerfil`) VALUES
(1, 'Administrador', 'ADM'),
(2, 'Professor', 'PROF'),
(3, 'Candidato', 'CAND');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(100) DEFAULT NULL,
  `fotoUsuario` varchar(100) DEFAULT NULL COMMENT 'Nome do arquivo da Foto do usuário',
  `dtNascimento` date DEFAULT NULL,
  `cpf` varchar(14) DEFAULT NULL,
  `cnpj` varchar(18) DEFAULT NULL,
  `cep` char(9) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(20) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `emailUsuario` varchar(100) NOT NULL,
  `senhaUsuario` varchar(50) NOT NULL,
  `situacaoUsuario` varchar(12) DEFAULT 'Ativo' COMMENT 'Ativo\\\\nInativo\\\\nBloqueado',
  `perfil_idPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nomeUsuario`, `fotoUsuario`, `dtNascimento`, `cpf`, `cnpj`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `emailUsuario`, `senhaUsuario`, `situacaoUsuario`, `perfil_idPerfil`) VALUES
(1, 'Administrador instalação', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adm@newsconcursos.com.br', '202cb962ac59075b964b07152d234b70', 'Ativo', 1),
(2, 'José Funalo xx', ' ', '1977-10-28', '777.333.222-11', '76677,0001/90', '72333900', 'QNM 2', 111, 'CASA', 'CEILANDIA', 'BRASÍLIA', 'DF', 'xxy@email.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 3),
(3, 'Maria Silva yy', '', '2004-11-28', '888.333.222-88', '888330001/90', '72333222', 'QNM 8', 4444, 'CASA', 'CEILANDIA', 'BRASÍLIA', 'DF', 'teste99@email.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 3),
(4, 'Antônio Teste de Tal', '', '2002-10-28', '333.444.777-09', '', '72210-025', 'QNM 2 Conjunto E', 11, '', '', 'Brasília', 'DF', 'xx99@email.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 3),
(5, 'Caio SIlva', '', '1999-02-03', '11122233345', '', '847474744', 'qnl 21 conj R', 5, 'casa', 'Taguatinga Norte', 'Brasilia', 'DF', 'caio@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 3),
(7, 'cristiane', '', '1999-03-03', '11122233312', '', '572727527', 'qnm  5 conj l', 9, 'casa', 'Ceilândia Sul', 'Brasilia', 'DF', 'cristiane@gmail.com', '202cb962ac59075b964b07152d234b70', 'Ativo', 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `concurso`
--
ALTER TABLE `concurso`
  ADD PRIMARY KEY (`idConcurso`),
  ADD KEY `fk_pacote_usuario1_idx` (`usuario_idUsuario`);

--
-- Índices de tabela `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`idMaterial`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_usuario_perfil` (`perfil_idPerfil`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `concurso`
--
ALTER TABLE `concurso`
  MODIFY `idConcurso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `material`
--
ALTER TABLE `material`
  MODIFY `idMaterial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `assinatura`
--
ALTER TABLE `assinatura`
  ADD CONSTRAINT `fk_pacote_has_produto_pacote1` FOREIGN KEY (`idAssinatura`) REFERENCES `concurso` (`idConcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pacote_has_produto_produto1` FOREIGN KEY (`vlAssinatura`) REFERENCES `material` (`idMaterial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `concurso`
--
ALTER TABLE `concurso`
  ADD CONSTRAINT `fk_pacote_usuario1` FOREIGN KEY (`usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`perfil_idPerfil`) REFERENCES `perfil` (`idPerfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
