-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Jun-2018 às 17:47
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cargo`
--

INSERT INTO `cargo` (`id`, `nome`) VALUES
(1, 'Usuario'),
(2, 'Moderador'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `texto` varchar(255) NOT NULL,
  `rank` int(1) NOT NULL,
  `servidorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`id`, `nome`, `texto`, `rank`, `servidorid`) VALUES
(1, 'Gabriel Pablo', 'Servidor muito bom', 4, 2),
(2, 'Guilherme', 'Servidor muito bom', 1, 2),
(3, 'Romulo', 'Servidor muito bom', 3, 2),
(4, 'Joao', 'Servidor muito bom', 5, 2),
(5, 'Gabriel Pablo', 'Bom de novo', 5, 2),
(6, 'Guilherme Leme', 'asdasdasd', 2, 2),
(7, 'Igor Leandro', 'Muito bom', 1, 3),
(8, 'Muito bom', 'good', 5, 7),
(9, 'asdjklasjlk', 'kasjdlkasjdl', 5, 7),
(10, 'sadasda', 'sdsadas', 5, 7),
(11, 'sadsad', 'asdasda', 5, 7),
(12, 'sadasdas', 'dasdsad', 5, 8),
(13, 'asdas', 'dasda', 5, 8),
(14, 'dsadasdas', 'dasdasdasd', 2, 9),
(15, 'sadas', 'dsadasd', 5, 9),
(16, 'sadasd', 'asdasd', 5, 9),
(17, 'Renata Aparecida da Silva', 'Muito bom!', 3, 14),
(18, 'Pedrim', 'Servidor um pouco lagado', 1, 14);

-- --------------------------------------------------------

--
-- Estrutura da tabela `jogo`
--

CREATE TABLE `jogo` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `jogo`
--

INSERT INTO `jogo` (`id`, `nome`, `img`) VALUES
(1, 'Counter-Strike: Global Offensive', 'csgo.png'),
(2, 'Minecraft', 'mine.png'),
(3, 'SAMP', 'samp.png'),
(4, 'Call Of Duty World At War', '73604235.ico'),
(5, 'Battlefield 3', '93484126.png'),
(6, 'Battlefield 4', '54674136.png'),
(7, 'Call Of Duty Advanced Warfare', '81456055.png'),
(8, 'Call Of Duty Black Ops 3', '85281248.png'),
(9, 'Call Of Duty Modern Warfare 3', '44132490.png'),
(10, 'Insurgency', '51872732.png'),
(11, 'Grand Theft Auto V', '69933552.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacote`
--

CREATE TABLE `pacote` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `preco` float NOT NULL,
  `dias` int(3) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pacote`
--

INSERT INTO `pacote` (`id`, `nome`, `preco`, `dias`, `img`) VALUES
(1, 'bronze', 10, 30, 'bronze.png'),
(2, 'silver', 25, 90, 'silver.png'),
(3, 'gold', 110, 365, 'gold.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id` int(11) NOT NULL,
  `servidorid` int(11) NOT NULL,
  `pacoteid` int(11) NOT NULL,
  `usuarioid` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id`, `servidorid`, `pacoteid`, `usuarioid`, `data`) VALUES
(6, 7, 1, 3, '2018-06-26'),
(7, 8, 3, 2, '2018-06-26'),
(8, 9, 1, 3, '2018-06-26'),
(9, 10, 3, 3, '2018-06-28'),
(10, 11, 2, 2, '2018-06-28'),
(11, 12, 3, 2, '2018-06-28'),
(12, 13, 2, 2, '2018-06-28'),
(13, 14, 1, 2, '2018-06-28'),
(14, 15, 3, 2, '2018-06-28'),
(15, 16, 3, 3, '2018-06-28'),
(16, 17, 2, 3, '2018-06-28'),
(17, 18, 2, 3, '2018-06-28'),
(18, 19, 3, 3, '2018-06-28'),
(19, 20, 2, 3, '2018-06-28'),
(20, 21, 3, 3, '2018-06-28'),
(21, 22, 2, 2, '2018-06-28'),
(22, 23, 2, 2, '2018-06-28'),
(23, 24, 2, 2, '2018-06-28'),
(24, 25, 1, 2, '2018-06-28'),
(25, 26, 3, 2, '2018-06-28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servidor`
--

CREATE TABLE `servidor` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `ip` varchar(16) DEFAULT NULL,
  `porta` varchar(6) DEFAULT NULL,
  `jogoid` int(11) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `maxjogador` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `servidor`
--

INSERT INTO `servidor` (`id`, `nome`, `ip`, `porta`, `jogoid`, `banner`, `maxjogador`) VALUES
(10, 'Pirata Servers X8', '182.18.1.1', '153', 6, '88595495.png', 15),
(11, 'Deathmatch', '192.458.1.4', '5895', 6, '45849781.jpg', 64),
(12, 'Servidor Arena x1', '156.69.669.55', '1842', 1, '48367769.png', 16),
(13, 'Minecraft Battlegrounds', '215.66.588.6', '1578', 2, '14714296.png', 100),
(14, 'Minecraft Real Life', '154.588.15.6', '1558', 2, '20311141.png', 500),
(15, 'Minecraft BR', '448.665.88.6', '1585', 2, '81941191.jpg', 75),
(16, 'SAMP Role Play', '158.669.66.1', '1588', 3, '43210684.png', 1000),
(17, 'GTA REAL LIFE', '118.698.32.6', '5987', 11, '75357834.jpg', 75),
(18, 'GTA5 BR', '157.699.654.5', '1588', 11, '53133618.jpg', 100),
(19, 'GTA5 REAL LIFE', '145.998.55.6', '1589', 11, '46288520.jpg', 50),
(20, 'Call of Duty WAW', '148.669.332.6', '1577', 4, '62325984.jpg', 32),
(21, 'Call of Duty USA', '158.558.632.7', '1588', 4, '69825884.jpg', 12),
(22, 'CAMPRS', '418.569.69.1', '2285', 5, '22742904.png', 30),
(23, 'Call of Duty 777', '158.984.98.2', '2554', 7, '70561356.jpg', 24),
(24, 'MW3 Server', '158.669.321.8', '3365', 9, '11591200.jpg', 24),
(25, 'BO3 BR', '258.698.69.3', '1012', 8, '88969341.jpg', 24),
(26, 'Insurgency x10', '155.696.69.2', '1578', 10, '11957085.jpg', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sugestoes`
--

CREATE TABLE `sugestoes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `texto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sugestoes`
--

INSERT INTO `sugestoes` (`id`, `nome`, `email`, `texto`) VALUES
(2, 'Maria das Dores Silva', 'dora@gmail.com', 'Vocês poderiam adicionar mais alguns jogos tal como DayZ'),
(3, 'Joao dos brinquedos', 'jaozim@bol.com.br', 'Vocês poderiam adicionar novos pacotes com mais tempos para anunciar.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `senha` varchar(16) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `cargoid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `usuario`, `senha`, `email`, `cargoid`) VALUES
(1, 'Gabriel Pablo', 'admin', 'admin', 'gusdnide@gmail.com', 3),
(2, 'Guilherme Leme', 'gui', 'gui', 'guizzgod@gmail.com', 3),
(3, 'Teste', 'teste', 'teste', 'teste@gmail.com', 1),
(4, 'Renata Aparecida', 'renata', '12345678', 're@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jogo`
--
ALTER TABLE `jogo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacote`
--
ALTER TABLE `pacote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servidor`
--
ALTER TABLE `servidor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sugestoes`
--
ALTER TABLE `sugestoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jogo`
--
ALTER TABLE `jogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pacote`
--
ALTER TABLE `pacote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `servidor`
--
ALTER TABLE `servidor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `sugestoes`
--
ALTER TABLE `sugestoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
