-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/11/2022 às 15:11
-- Versão do servidor: 10.4.25-MariaDB
-- Versão do PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `cod_cliente` int(11) NOT NULL,
  `nome_completo` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(18) NOT NULL,
  `username` varchar(45) NOT NULL,
  `passwords` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `clientes`
--

INSERT INTO `clientes` (`cod_cliente`, `nome_completo`, `email`, `telefone`, `username`, `passwords`) VALUES
(1, 'marcelo', 'marcelo@gmail.com', '232123123', 'marcelo', '1234'),
(2, 'Mathus', 'mateus@gmail.com', '666', 'mathues', '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itenspedidos`
--

CREATE TABLE `itenspedidos` (
  `item_cod_pedido` int(11) NOT NULL,
  `cod_pedido` int(11) NOT NULL,
  `cod_produto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `produtos_cod_produto` int(11) NOT NULL,
  `pedidos_cod_pedidos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `itenspedidos`
--

INSERT INTO `itenspedidos` (`item_cod_pedido`, `cod_pedido`, `cod_produto`, `quantidade`, `produtos_cod_produto`, `pedidos_cod_pedidos`) VALUES
(12, 32, 2, 3, 2, 32);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `cod_pedidos` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `data_time` varchar(45) NOT NULL,
  `clientes_cod_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`cod_pedidos`, `cod_cliente`, `data_time`, `clientes_cod_cliente`) VALUES
(32, 2, '25/11/2022 10:50:28 ', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `cod_produto` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`cod_produto`, `descricao`, `quantidade`, `preco`) VALUES
(1, 'Ração Labradores', 190, '134,00'),
(2, 'Ração Pequena T', 90, '100,00');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cod_cliente`);

--
-- Índices de tabela `itenspedidos`
--
ALTER TABLE `itenspedidos`
  ADD PRIMARY KEY (`item_cod_pedido`),
  ADD KEY `fk_itenspedidos_produtos` (`produtos_cod_produto`),
  ADD KEY `fk_itenspedidos_pedidos1` (`pedidos_cod_pedidos`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`cod_pedidos`,`clientes_cod_cliente`),
  ADD KEY `fk_pedidos_clientes1` (`clientes_cod_cliente`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`cod_produto`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `itenspedidos`
--
ALTER TABLE `itenspedidos`
  MODIFY `item_cod_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `cod_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `cod_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `itenspedidos`
--
ALTER TABLE `itenspedidos`
  ADD CONSTRAINT `fk_itenspedidos_pedidos1` FOREIGN KEY (`pedidos_cod_pedidos`) REFERENCES `pedidos` (`cod_pedidos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itenspedidos_produtos` FOREIGN KEY (`produtos_cod_produto`) REFERENCES `produtos` (`cod_produto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_clientes1` FOREIGN KEY (`clientes_cod_cliente`) REFERENCES `clientes` (`cod_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
