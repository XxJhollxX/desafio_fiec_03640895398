-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06-Maio-2019 às 02:29
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_desafio_03640895398`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `dataNasc` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `dataNasc`) VALUES
(1, 'teste1 de teste', '00000000000', '1988-10-22'),
(3, 'teste3 de teste', '33333333333', '2000-02-10'),
(4, 'teste4 de teste', '44444444444', '2009-08-21'),
(7, 'Olivia', '12345678909', '2003-01-01'),
(8, 'Amelia Maria', '12345678909', '1995-07-03'),
(9, 'Maria Olivia', '12345678909', '1998-11-01'),
(10, 'Maria Isla', '12345678909', '1993-03-11'),
(11, 'Maria Emily', '12345678909', '1995-12-19'),
(12, 'Maria Ava', '12345678909', '1997-06-08'),
(13, 'Lily Maria', '12345678909', '1998-04-07'),
(14, 'Mia', '12345678909', '1994-07-03'),
(15, 'Sophia', '12345678909', '1996-09-01'),
(16, 'Isabella', '12345678909', '2013-02-06'),
(17, 'Oliver', '12345678909', '2009-03-06'),
(18, 'Harry', '12345678909', '2008-06-07'),
(19, 'Jack', '12345678909', '2006-08-05'),
(20, 'George', '12345678909', '2004-01-01'),
(21, 'Noah', '12345678909', '2008-08-09'),
(22, 'Charlie', '12345678909', '2006-01-10'),
(23, 'Jacob', '12345678909', '2000-02-18'),
(24, 'Alfie', '12345678909', '2001-04-16'),
(25, 'Freddie', '12345678909', '2002-05-13'),
(26, 'Oscar', '12345678909', '1997-12-22'),
(27, 'Adolfo', '12345678909', '1996-04-23'),
(28, 'Adriano', '12345678909', '1994-02-21'),
(29, 'Maria Alanne', '12345678909', '1999-02-01'),
(30, 'Alejandra', '12345678909', '1994-11-11'),
(31, 'Alex', '12345678909', '1989-02-05'),
(32, 'Amadeu', '12345678909', '1999-01-10'),
(33, 'Maria Zulmira', '12345678909', '1991-01-05'),
(34, 'Zélia', '12345678909', '1988-03-01'),
(35, 'Túlio', '12345678909', '2013-11-01'),
(36, 'Renata', '12345678909', '2005-06-01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `logradouro` varchar(450) NOT NULL,
  `complemento` varchar(450) NOT NULL,
  `bairro` varchar(450) NOT NULL,
  `localidade` varchar(450) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `numero` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_endereco`
--

CREATE TABLE `tipos_endereco` (
  `id` int(11) NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipos_endereco`
--

INSERT INTO `tipos_endereco` (`id`, `tipo`) VALUES
(1, 'residencial'),
(2, 'trabalho'),
(3, 'parente'),
(4, 'outros');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipo`),
  ADD KEY `cliente` (`cliente`);

--
-- Indexes for table `tipos_endereco`
--
ALTER TABLE `tipos_endereco`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipos_endereco` (`id`),
  ADD CONSTRAINT `endereco_ibfk_2` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
