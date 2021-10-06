-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26-Set-2021 às 23:47
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdteste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `nomeFantasia` varchar(80) NOT NULL,
  `cnpj` varchar(25) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cidade` varchar(80) NOT NULL,
  `uf` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`nomeFantasia`, `cnpj`, `endereco`, `cidade`, `uf`) VALUES
('empresa 1', '1234567890001-150', 'rua dos bobos, 150', 'montes claros', 'MG'),
('empresa 2', '3216549870001-002', 'rua 20, 100', 'ceilandia', 'DF');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `empresaCnpj` varchar(25) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `docIdent` varchar(25) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `rg` varchar(15) NOT NULL,
  `dataNasc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `fornecedor`
--

INSERT INTO `fornecedor` (`empresaCnpj`, `nome`, `tipo`, `docIdent`, `dataCadastro`, `telefone`, `rg`, `dataNasc`) VALUES
('1234567890001-150', '123', '1', '32424324', '2021-09-26 00:00:00', '12312', '32424324', '2000-05-05'),
('1234567890001-150', 'alisson', '1', '3245345355', '2021-09-26 00:00:00', '643443540454', '3245345355', '1991-10-12'),
('3216549870001-002', 'joao jose', '1', '12123321', '2021-09-26 00:00:00', '38 988995544', '12123321', '2001-05-20'),
('1234567890001-150', 'proximo fornecedor', '1', '32112321', '2021-09-26 00:00:00', '31991911919', '32112321', '1997-10-02');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `valor` double NOT NULL,
  `qtde` int(11) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `fornecedor` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `valor`, `qtde`, `categoria`, `fornecedor`) VALUES
(1, 'arroz', 7.5, 7, 'ALIMENTOS', 'alisson');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint(20) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'usuario teste', 'user', '123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`cnpj`);

--
-- Índices para tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`nome`),
  ADD KEY `empresaCnpj` (`empresaCnpj`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fornecedor` (`fornecedor`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD CONSTRAINT `fornecedor_ibfk_1` FOREIGN KEY (`empresaCnpj`) REFERENCES `empresa` (`cnpj`);

--
-- Limitadores para a tabela `produtos`
--
ALTER TABLE `produtos`
  ADD CONSTRAINT `produtos_ibfk_1` FOREIGN KEY (`fornecedor`) REFERENCES `fornecedor` (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
