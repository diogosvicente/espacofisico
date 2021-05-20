-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 20-Maio-2021 às 02:33
-- Versão do servidor: 8.0.17
-- versão do PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `espacofisico`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL,
  `id_local_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `events`
--

INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`, `id_local_fk`) VALUES
(15, 'MAAMAAEE', '2021-04-07 10:00:00', '2021-04-07 11:00:00', 1),
(16, 'MAAMAAEE', '2021-04-03 21:06:00', '2021-04-03 21:06:00', 2),
(17, 'CAVALEIROS DO ZODÍACO', '2021-04-03 22:41:00', '2021-04-03 22:41:00', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `locais`
--

CREATE TABLE `locais` (
  `id_local` int(11) NOT NULL,
  `nome_local` varchar(255) NOT NULL,
  `bloco` char(1) NOT NULL,
  `pavimento` char(1) NOT NULL,
  `sala` varchar(100) NOT NULL,
  `capacidade` int(11) NOT NULL,
  `demais_informacoes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `locais`
--

INSERT INTO `locais` (`id_local`, `nome_local`, `bloco`, `pavimento`, `sala`, `capacidade`, `demais_informacoes`) VALUES
(1, 'AUDITÓRIO 1', 'F', '1', '1001', 50, 'PROJETOS, SOM'),
(2, 'AUDITÓRIO 2', 'F', '3', '3003', 40, 'PROJETOR');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo` enum('administrador','comum') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sexo` enum('F','M') NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `login`, `senha`, `tipo`, `sexo`, `avatar`) VALUES
(1, 'Diogo', 'diogosvicente', 'ZTFiN2U3ODAzMjE1ZDU0ODg1ODgzNzA1NzJkMTMxMDI=', 'administrador', 'M', 'bd024-40c4f-foto_perfil.png'),
(2, 'Teste', 'teste', 'ZTFiN2U3ODAzMjE1ZDU0ODg1ODgzNzA1NzJkMTMxMDI=', 'comum', 'F', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `locais`
--
ALTER TABLE `locais`
  ADD PRIMARY KEY (`id_local`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `locais`
--
ALTER TABLE `locais`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
