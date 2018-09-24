-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 23/09/2018 às 22:43
-- Versão do servidor: 5.7.23-0ubuntu0.18.04.1
-- Versão do PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `la`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `descricaoCategoria` varchar(50) NOT NULL,
  `DATE_CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DATE_MODIFIED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cpf_cnpj` varchar(14) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel1` varchar(15) DEFAULT NULL,
  `tel2` varchar(15) DEFAULT NULL,
  `logradouro` varchar(50) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cep` int(8) DEFAULT NULL,
  `inf_adicionais` varchar(250) DEFAULT NULL,
  `DATE_CREATED` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DATE_MODIFIED` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `entradaprodutos`
--

CREATE TABLE `entradaprodutos` (
  `idEntradaProduto` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `codigoProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `precoUnitario` decimal(10,2) NOT NULL,
  `fornecedor` int(11) DEFAULT NULL,
  `dataCompra` date DEFAULT NULL,
  `DATE_CREATED` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DATE_MODIFIED` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `formapagamento`
--

CREATE TABLE `formapagamento` (
  `idFormaPagamento` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `DATE_CREATED` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DATE_MODIFIED` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `idFornecedor` int(11) NOT NULL,
  `codigoFornecedor` int(11) NOT NULL,
  `nomeFornecedor` varchar(255) NOT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `contato1` varchar(15) DEFAULT NULL,
  `contato2` varchar(15) DEFAULT NULL,
  `email` varchar(95) DEFAULT NULL,
  `inf_adicionais` text,
  `DATE_CREATED` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DATE_MODIFIED` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `itensdesconsiderar`
--

CREATE TABLE `itensdesconsiderar` (
  `id` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `dataDescarte` date DEFAULT NULL,
  `DATE_CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DATE_MODIFIED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `itensvenda`
--

CREATE TABLE `itensvenda` (
  `idItem` int(11) NOT NULL,
  `idVenda` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `precoUnitario` decimal(10,2) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `DATE_CREATED` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DATE_MODIFIED` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProduto` int(11) NOT NULL,
  `codigoProduto` varchar(10) NOT NULL,
  `descricaoProduto` varchar(150) NOT NULL,
  `categoria` int(11) DEFAULT NULL,
  `disponivel` tinyint(1) NOT NULL DEFAULT '1',
  `precoVenda` decimal(10,2) NOT NULL DEFAULT '0.00',
  `estoqueMinimo` int(11) DEFAULT NULL,
  `estoque` int(11) NOT NULL DEFAULT '0',
  `DATE_CREATED` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DATE_MODIFIED` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `status`
--

CREATE TABLE `status` (
  `idstatus` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `classe` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `status`
--

INSERT INTO `status` (`idstatus`, `descricao`, `classe`) VALUES
(1, 'Ativo', 'success'),
(2, 'Inativo', 'danger');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `login` varchar(150) NOT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `DATE_CREATED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `DATE_MODIFIED` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`login`, `senha`, `DATE_CREATED`, `DATE_MODIFIED`) VALUES
('admin', 'Priscila', '2018-09-24 00:16:26', '2018-09-24 00:16:26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `idVenda` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `dataVenda` datetime DEFAULT NULL,
  `valorVenda` decimal(10,2) NOT NULL DEFAULT '-1.00',
  `disconto` decimal(4,2) DEFAULT NULL,
  `formaPagamento` int(11) DEFAULT NULL,
  `DATE_CREATED` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `DATE_MODIFIED` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices de tabela `entradaprodutos`
--
ALTER TABLE `entradaprodutos`
  ADD PRIMARY KEY (`idEntradaProduto`);

--
-- Índices de tabela `formapagamento`
--
ALTER TABLE `formapagamento`
  ADD PRIMARY KEY (`idFormaPagamento`);

--
-- Índices de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`idFornecedor`);

--
-- Índices de tabela `itensdesconsiderar`
--
ALTER TABLE `itensdesconsiderar`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `itensvenda`
--
ALTER TABLE `itensvenda`
  ADD PRIMARY KEY (`idItem`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProduto`);

--
-- Índices de tabela `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`idstatus`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`idVenda`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `entradaprodutos`
--
ALTER TABLE `entradaprodutos`
  MODIFY `idEntradaProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `formapagamento`
--
ALTER TABLE `formapagamento`
  MODIFY `idFormaPagamento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `idFornecedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `itensdesconsiderar`
--
ALTER TABLE `itensdesconsiderar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `itensvenda`
--
ALTER TABLE `itensvenda`
  MODIFY `idItem` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `status`
--
ALTER TABLE `status`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `idVenda` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
TRUNCATE `categorias`;
TRUNCATE `clientes`;
TRUNCATE `entradaprodutos`;
TRUNCATE `formapagamento`;
TRUNCATE `fornecedores`;
TRUNCATE `itensdesconsiderar`;
TRUNCATE `itensvenda`;
TRUNCATE `produtos`;
TRUNCATE `users`;
TRUNCATE `vendas`;