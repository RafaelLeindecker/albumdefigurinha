-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/05/2014 às 22:13
-- Versão do servidor: 5.6.17
-- Versão do PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `albumdacopa`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(100) NOT NULL,
  `id_figurinha` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `figurinha`
--

CREATE TABLE IF NOT EXISTS `figurinha` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) DEFAULT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `posicao` int(100) DEFAULT NULL,
  `id_time` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `resposta`
--

CREATE TABLE IF NOT EXISTS `resposta` (
  `id_usuario` int(100) NOT NULL,
  `id_pergunda` int(100) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `resposta`
--

INSERT INTO `resposta` (`id_usuario`, `id_pergunda`, `data`) VALUES
(1, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `sobrenome` varchar(60) NOT NULL,
  `email` varchar(100) NOT NULL,
  `idade` int(10) NOT NULL,
  `sexo` int(11) NOT NULL,
  `senha` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Fazendo dump de dados para tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `idade`, `sexo`, `senha`) VALUES
(8, 'Felipe', 'Mello', 'felpmel@gmail.com', 29, 0, '1234'),
(9, 'Teste2', 'TesteSobrenome2', 'email2', 22, 0, '12345');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
