-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Set-2020 às 23:53
-- Versão do servidor: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `doacoes`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cad_cadastro_doadores`
--

CREATE TABLE IF NOT EXISTS `cad_cadastro_doadores` (
  `cad_cadastro_doadores_id` int(11) NOT NULL AUTO_INCREMENT,
  `cad_nome` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cad_cpf` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cad_dtnascimento` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cad_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cad_celular` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cad_telfixo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cad_endereco` text COLLATE utf8_unicode_ci NOT NULL,
  `cad_intervalo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cad_valor` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cad_dtcadastro` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `cad_forma_pagamento_id` int(11) NOT NULL,
  PRIMARY KEY (`cad_cadastro_doadores_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fop_forma_pagamento`
--

CREATE TABLE IF NOT EXISTS `fop_forma_pagamento` (
  `fop_forma_pagamento_id` int(11) NOT NULL AUTO_INCREMENT,
  `fop_forma` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`fop_forma_pagamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
