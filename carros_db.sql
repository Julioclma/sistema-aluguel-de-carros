-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 15-Ago-2022 às 23:01
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `carros_db`
--
CREATE DATABASE IF NOT EXISTS `carros_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `carros_db`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluguel`
--

CREATE TABLE IF NOT EXISTS `aluguel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_carro` varchar(100) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `celular` varchar(100) NOT NULL,
  `data_alugado` date NOT NULL,
  `data_devolvido` date NOT NULL,
  `devolvido` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `aluguel`
--

INSERT INTO `aluguel` (`id`, `fk_carro`, `cpf`, `celular`, `data_alugado`, `data_devolvido`, `devolvido`) VALUES
(1, 'QIY-4699', '489.712.958-30', '(11) 946086758', '2022-08-15', '0000-00-00', 'sim'),
(2, 'QPV-9583', '555.555.555-55', '(11) 946086758', '2022-08-15', '2022-08-15', 'sim'),
(3, 'IBS-9821', '295.555.295-55', '11946086758', '2022-08-15', '0000-00-00', 'sim'),
(4, 'QPV-9583', '489.712.958-30', '11946086758', '2022-08-17', '2022-08-31', 'sim'),
(5, 'QPV-9583', '555.555.555-55', '(11) 946086758', '2022-08-15', '2022-08-15', 'sim'),
(6, 'QAB-9583', '489.712.958-30', '(11) 946086758', '2022-08-15', '2022-08-15', 'sim'),
(7, 'QPV-6583', '555.555.555-55', '(11) 946086758', '2022-08-15', '2022-08-18', 'sim'),
(8, 'QIY-4699', '489.712.958-30', '(11) 946086758', '2022-08-15', '0000-00-00', 'sim'),
(9, 'QIY-4699', '489.712.958-30', '(11) 946086758', '2022-08-15', '2022-08-15', 'sim'),
(10, 'QIY-4699', '489.712.958-30', '(11) 946086758', '2022-08-15', '0000-00-00', 'nao'),
(11, 'QPV-9583', '489.712.958-30', '(11) 946086758', '2022-08-15', '2022-08-15', 'sim'),
(12, 'IBS-9821', '489.712.958-30', '(11) 946086758', '2022-08-15', '2022-08-15', 'sim'),
(13, 'QPV-9583', '', '', '2022-08-15', '0000-00-00', 'nao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `carros`
--

CREATE TABLE IF NOT EXISTS `carros` (
  `id_carro` int(11) NOT NULL AUTO_INCREMENT,
  `modelo_carro` varchar(100) NOT NULL,
  `placa_carro` varchar(100) NOT NULL,
  `disponivel_carro` varchar(10) NOT NULL,
  PRIMARY KEY (`id_carro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `carros`
--

INSERT INTO `carros` (`id_carro`, `modelo_carro`, `placa_carro`, `disponivel_carro`) VALUES
(9, 'HB20', 'QIY-4699', 'nao'),
(10, 'HB20', 'QPV-9583', 'nao'),
(13, 'Fiat uno 2012', 'IBS-9821', 'sim'),
(19, 'Pálio 2022', 'QAB-9583', 'sim'),
(20, 'Pálio 2011', 'APV-9283', 'sim'),
(21, 'Fiat uno 2022', 'IAS-0291', 'sim');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name_user` varchar(100) NOT NULL,
  `password_user` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `name_user`, `password_user`) VALUES
(1, 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
