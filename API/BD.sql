-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/04/2022 às 06:22
-- Versão do servidor: 10.4.19-MariaDB
-- Versão do PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `plan`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `calls`
--

CREATE TABLE `calls` (
  `idCalls` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `CallsTo` int(11) DEFAULT NULL,
  `CallFrom` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `calls`
--

INSERT INTO `calls` (`idCalls`, `price`, `CallsTo`, `CallFrom`) VALUES
(1, 1.9, 16, 11),
(2, 2.9, 11, 16),
(3, 1.7, 17, 11),
(4, 2.7, 11, 17),
(5, 0.9, 18, 11),
(6, 1.9, 11, 18);

-- --------------------------------------------------------

--
-- Estrutura para tabela `city`
--

CREATE TABLE `city` (
  `idCity` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `city`
--

INSERT INTO `city` (`idCity`, `name`, `code`) VALUES
(1, 'Belo Horizonte', 11),
(2, 'Rio de Janeiro', 16),
(3, 'Sao Paulo', 17),
(4, 'Santa Catarina', 18);

-- --------------------------------------------------------

--
-- Estrutura para tabela `speakmore`
--

CREATE TABLE `speakmore` (
  `idSpeakMore` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `Speakminute` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `speakmore`
--

INSERT INTO `speakmore` (`idSpeakMore`, `name`, `Speakminute`) VALUES
(1, 'Fale Mais 30', 30),
(2, 'Fale Mais 60', 60),
(3, 'Fale Mais 120', 120);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`idCalls`);

--
-- Índices de tabela `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`idCity`);

--
-- Índices de tabela `speakmore`
--
ALTER TABLE `speakmore`
  ADD PRIMARY KEY (`idSpeakMore`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `calls`
--
ALTER TABLE `calls`
  MODIFY `idCalls` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `city`
--
ALTER TABLE `city`
  MODIFY `idCity` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `speakmore`
--
ALTER TABLE `speakmore`
  MODIFY `idSpeakMore` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
