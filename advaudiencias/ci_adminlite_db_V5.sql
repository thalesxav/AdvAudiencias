-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 05-Ago-2019 às 00:14
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_adminlite_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `advogados`
--

DROP TABLE IF EXISTS `advogados`;
CREATE TABLE IF NOT EXISTS `advogados` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `numero_oab` int(15) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `banco` int(4) NOT NULL,
  `agencia` int(10) NOT NULL,
  `conta` int(10) NOT NULL,
  `vlr_justica_comum` decimal(5,2) NOT NULL,
  `vlr_adv_preposto` decimal(5,2) NOT NULL,
  `vlr_preposto` decimal(5,2) NOT NULL,
  `vlr_procon` decimal(5,2) NOT NULL,
  `vlr_trabalhista` decimal(5,2) NOT NULL,
  `vlr_outros` decimal(5,2) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `advogados`
--

INSERT INTO `advogados` (`codigo`, `nome`, `numero_oab`, `cpf`, `email`, `telefone`, `banco`, `agencia`, `conta`, `vlr_justica_comum`, `vlr_adv_preposto`, `vlr_preposto`, `vlr_procon`, `vlr_trabalhista`, `vlr_outros`) VALUES
(1, 'asdas1111111111111', 123123, '123.123.123-12', '123@123.com', '(12)31231-2312', 4, 123, 123, '1.23', '1.23', '1.23', '1.23', '1.23', '10.23'),
(3, 'asdas2222222222', 123123, '123.123.123-12', '123@123.com', '(12)31231-2312', 4, 123, 123, '1.23', '1.23', '1.23', '1.23', '1.23', '10.23');

-- --------------------------------------------------------

--
-- Estrutura da tabela `advogado_comarca`
--

DROP TABLE IF EXISTS `advogado_comarca`;
CREATE TABLE IF NOT EXISTS `advogado_comarca` (
  `codigo_advogado` int(6) NOT NULL,
  `codigo_comarca` int(6) NOT NULL,
  KEY `FK_ADV` (`codigo_advogado`),
  KEY `FK_COM` (`codigo_comarca`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `advogado_comarca`
--

INSERT INTO `advogado_comarca` (`codigo_advogado`, `codigo_comarca`) VALUES
(1, 1),
(1, 3),
(3, 1),
(3, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `audiencias`
--

DROP TABLE IF EXISTS `audiencias`;
CREATE TABLE IF NOT EXISTS `audiencias` (
  `codigo` int(10) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` varchar(5) NOT NULL,
  `codigo_comarca` int(6) NOT NULL,
  `codigo_advogado` int(10) NOT NULL,
  `processo` varchar(20) NOT NULL,
  `grupo_cota` varchar(100) NOT NULL,
  `tipo_audiencia` tinyint(1) NOT NULL,
  `parte_1` varchar(255) NOT NULL,
  `parte_2` varchar(255) NOT NULL,
  `adv_escritorio` varchar(255) NOT NULL,
  `observacoes` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`codigo`),
  KEY `FK_ADV_AUDI` (`codigo_advogado`),
  KEY `FK_COMARCAS_AUDI` (`codigo_comarca`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `audiencias`
--

INSERT INTO `audiencias` (`codigo`, `data`, `hora`, `codigo_comarca`, `codigo_advogado`, `processo`, `grupo_cota`, `tipo_audiencia`, `parte_1`, `parte_2`, `adv_escritorio`, `observacoes`, `status`) VALUES
(4, '2019-08-03', '12:32', 3, 1, '123123123', '123', 5, '123123', '123123', '12312', 'hhh', 5),
(5, '0000-00-00', '34:12', 1, 1, '12312', '123123', 1, '23234', '234234', '234', '234234', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `bancos`
--

DROP TABLE IF EXISTS `bancos`;
CREATE TABLE IF NOT EXISTS `bancos` (
  `cod` varchar(4) NOT NULL,
  `banco` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `bancos`
--

INSERT INTO `bancos` (`cod`, `banco`) VALUES
('1', '001 - BANCO DO BRASIL S/A'),
('2', '002 - BANCO CENTRAL DO BRASIL'),
('3', '003 - BANCO DA AMAZONIA S.A'),
('4', '004 - BANCO DO NORDESTE DO BRASIL S.A'),
('7', '007 - BANCO NAC DESENV. ECO. SOCIAL S.A'),
('8', '008 - BANCO MERIDIONAL DO BRASIL'),
('20', '020 - BANCO DO ESTADO DE ALAGOAS S.A'),
('21', '021 - BANCO DO ESTADO DO ESPIRITO SANTO S.A'),
('22', '022 - BANCO DE CREDITO REAL DE MINAS GERAIS SA'),
('24', '024 - BANCO DO ESTADO DE PERNAMBUCO'),
('25', '025 - BANCO ALFA S/A'),
('26', '026 - BANCO DO ESTADO DO ACRE S.A'),
('27', '027 - BANCO DO ESTADO DE SANTA CATARINA S.A'),
('28', '028 - BANCO DO ESTADO DA BAHIA S.A'),
('29', '029 - BANCO DO ESTADO DO RIO DE JANEIRO S.A'),
('30', '030 - BANCO DO ESTADO DA PARAIBA S.A'),
('31', '031 - BANCO DO ESTADO DE GOIAS S.A'),
('32', '032 - BANCO DO ESTADO DO MATO GROSSO S.A.'),
('33', '033 - BANCO DO ESTADO DE SAO PAULO S.A'),
('34', '034 - BANCO DO ESADO DO AMAZONAS S.A'),
('35', '035 - BANCO DO ESTADO DO CEARA S.A'),
('36', '036 - BANCO DO ESTADO DO MARANHAO S.A'),
('37', '037 - BANCO DO ESTADO DO PARA S.A'),
('38', '038 - BANCO DO ESTADO DO PARANA S.A'),
('39', '039 - BANCO DO ESTADO DO PIAUI S.A'),
('41', '041 - BANCO DO ESTADO DO RIO GRANDE DO SUL S.A'),
('47', '047 - BANCO DO ESTADO DE SERGIPE S.A'),
('48', '048 - BANCO DO ESTADO DE MINAS GERAIS S.A'),
('59', '059 - BANCO DO ESTADO DE RONDONIA S.A'),
('70', '070 - BANCO DE BRASILIA S.A'),
('104', '104 - CAIXA ECONOMICA FEDERAL'),
('106', '106 - BANCO ITABANCO S.A.'),
('107', '107 - BANCO BBM S.A'),
('109', '109 - BANCO CREDIBANCO S.A'),
('116', '116 - BANCO B.N.L DO BRASIL S.A'),
('148', '148 - MULTI BANCO S.A'),
('151', '151 - CAIXA ECONOMICA DO ESTADO DE SAO PAULO'),
('153', '153 - CAIXA ECONOMICA DO ESTADO DO R.G.SUL'),
('165', '165 - BANCO NORCHEM S.A'),
('166', '166 - BANCO INTER-ATLANTICO S.A'),
('168', '168 - BANCO C.C.F. BRASIL S.A'),
('175', '175 - CONTINENTAL BANCO S.A'),
('184', '184 - BBA - CREDITANSTALT S.A'),
('199', '199 - BANCO FINANCIAL PORTUGUES'),
('200', '200 - BANCO FRICRISA AXELRUD S.A'),
('201', '201 - BANCO AUGUSTA INDUSTRIA E COMERCIAL S.A'),
('204', '204 - BANCO S.R.L S.A'),
('205', '205 - BANCO SUL AMERICA S.A'),
('206', '206 - BANCO MARTINELLI S.A'),
('208', '208 - BANCO PACTUAL S.A'),
('210', '210 - DEUTSCH SUDAMERIKANICHE BANK AG'),
('211', '211 - BANCO SISTEMA S.A'),
('212', '212 - BANCO MATONE S.A'),
('213', '213 - BANCO ARBI S.A'),
('214', '214 - BANCO DIBENS S.A'),
('215', '215 - BANCO AMERICA DO SUL S.A'),
('216', '216 - BANCO REGIONAL MALCON S.A'),
('217', '217 - BANCO AGROINVEST S.A'),
('218', '218 - BBS - BANCO BONSUCESSO S.A.'),
('219', '219 - BANCO DE CREDITO DE SAO PAULO S.A'),
('220', '220 - BANCO CREFISUL'),
('221', '221 - BANCO GRAPHUS S.A'),
('222', '222 - BANCO AGF BRASIL S. A.'),
('223', '223 - BANCO INTERUNION S.A'),
('224', '224 - BANCO FIBRA S.A'),
('225', '225 - BANCO BRASCAN S.A'),
('228', '228 - BANCO ICATU S.A'),
('229', '229 - BANCO CRUZEIRO S.A'),
('230', '230 - BANCO BANDEIRANTES S.A'),
('231', '231 - BANCO BOAVISTA S.A'),
('232', '232 - BANCO INTERPART S.A'),
('233', '233 - BANCO MAPPIN S.A'),
('234', '234 - BANCO LAVRA S.A.'),
('235', '235 - BANCO LIBERAL S.A'),
('236', '236 - BANCO CAMBIAL S.A'),
('237', '237 - BANCO BRADESCO S.A'),
('239', '239 - BANCO BANCRED S.A'),
('240', '240 - BANCO DE CREDITO REAL DE MINAS GERAIS S.'),
('241', '241 - BANCO CLASSICO S.A'),
('242', '242 - BANCO EUROINVEST S.A'),
('243', '243 - BANCO STOCK S.A'),
('244', '244 - BANCO CIDADE S.A'),
('245', '245 - BANCO EMPRESARIAL S.A'),
('246', '246 - BANCO ABC ROMA S.A'),
('247', '247 - BANCO OMEGA S.A'),
('249', '249 - BANCO INVESTCRED S.A'),
('250', '250 - BANCO SCHAHIN CURY S.A'),
('251', '251 - BANCO SAO JORGE S.A.'),
('252', '252 - BANCO FININVEST S.A'),
('254', '254 - BANCO PARANA BANCO S.A'),
('255', '255 - MILBANCO S.A.'),
('256', '256 - BANCO GULVINVEST S.A'),
('258', '258 - BANCO INDUSCRED S.A'),
('261', '261 - BANCO VARIG S.A'),
('262', '262 - BANCO BOREAL S.A'),
('263', '263 - BANCO CACIQUE'),
('264', '264 - BANCO PERFORMANCE S.A'),
('265', '265 - BANCO FATOR S.A'),
('266', '266 - BANCO CEDULA S.A'),
('267', '267 - BANCO BBM-COM.C.IMOB.CFI S.A.'),
('275', '275 - BANCO REAL S.A'),
('277', '277 - BANCO PLANIBANC S.A'),
('282', '282 - BANCO BRASILEIRO COMERCIAL'),
('291', '291 - BANCO DE CREDITO NACIONAL S.A'),
('294', '294 - BCR - BANCO DE CREDITO REAL S.A'),
('295', '295 - BANCO CREDIPLAN S.A'),
('300', '300 - BANCO DE LA NACION ARGENTINA S.A'),
('302', '302 - BANCO DO PROGRESSO S.A'),
('303', '303 - BANCO HNF S.A.'),
('304', '304 - BANCO PONTUAL S.A'),
('308', '308 - BANCO COMERCIAL BANCESA S.A.'),
('318', '318 - BANCO B.M.G. S.A'),
('320', '320 - BANCO INDUSTRIAL E COMERCIAL'),
('341', '341 - BANCO ITAU S.A'),
('346', '346 - BANCO FRANCES E BRASILEIRO S.A'),
('347', '347 - BANCO SUDAMERIS BRASIL S.A'),
('351', '351 - BANCO BOZANO SIMONSEN S.A'),
('353', '353 - BANCO GERAL DO COMERCIO S.A'),
('356', '356 - ABN AMRO S.A'),
('366', '366 - BANCO SOGERAL S.A'),
('369', '369 - PONTUAL'),
('370', '370 - BEAL - BANCO EUROPEU PARA AMERICA LATINA'),
('372', '372 - BANCO ITAMARATI S.A'),
('375', '375 - BANCO FENICIA S.A'),
('376', '376 - CHASE MANHATTAN BANK S.A'),
('388', '388 - BANCO MERCANTIL DE DESCONTOS S/A'),
('389', '389 - BANCO MERCANTIL DO BRASIL S.A'),
('392', '392 - BANCO MERCANTIL DE SAO PAULO S.A'),
('394', '394 - BANCO B.M.C. S.A'),
('399', '399 - BANCO BAMERINDUS DO BRASIL S.A'),
('409', '409 - UNIBANCO - UNIAO DOS BANCOS BRASILEIROS'),
('412', '412 - BANCO NACIONAL DA BAHIA S.A'),
('415', '415 - BANCO NACIONAL S.A'),
('420', '420 - BANCO NACIONAL DO NORTE S.A'),
('422', '422 - BANCO SAFRA S.A'),
('424', '424 - BANCO NOROESTE S.A'),
('434', '434 - BANCO FORTALEZA S.A'),
('453', '453 - BANCO RURAL S.A'),
('456', '456 - BANCO TOKIO S.A'),
('464', '464 - BANCO SUMITOMO BRASILEIRO S.A'),
('466', '466 - BANCO MITSUBISHI BRASILEIRO S.A'),
('472', '472 - LLOYDS BANK PLC'),
('473', '473 - BANCO FINANCIAL PORTUGUES S.A'),
('477', '477 - CITIBANK N.A'),
('479', '479 - BANCO DE BOSTON S.A'),
('480', '480 - BANCO PORTUGUES DO ATLANTICO-BRASIL S.A'),
('483', '483 - BANCO AGRIMISA S.A.'),
('487', '487 - DEUTSCHE BANK S.A - BANCO ALEMAO'),
('488', '488 - BANCO J. P. MORGAN S.A'),
('489', '489 - BANESTO BANCO URUGAUAY S.A'),
('492', '492 - INTERNATIONALE NEDERLANDEN BANK N.V.'),
('493', '493 - BANCO UNION S.A.C.A'),
('494', '494 - BANCO LA REP. ORIENTAL DEL URUGUAY'),
('495', '495 - BANCO LA PROVINCIA DE BUENOS AIRES'),
('496', '496 - BANCO EXTERIOR DE ESPANA S.A'),
('498', '498 - CENTRO HISPANO BANCO'),
('499', '499 - BANCO IOCHPE S.A'),
('501', '501 - BANCO BRASILEIRO IRAQUIANO S.A.'),
('502', '502 - BANCO SANTANDER S.A'),
('504', '504 - BANCO MULTIPLIC S.A'),
('505', '505 - BANCO GARANTIA S.A'),
('600', '600 - BANCO LUSO BRASILEIRO S.A'),
('601', '601 - BFC BANCO S.A.'),
('602', '602 - BANCO PATENTE S.A'),
('604', '604 - BANCO INDUSTRIAL DO BRASIL S.A'),
('607', '607 - BANCO SANTOS NEVES S.A'),
('608', '608 - BANCO OPEN S.A'),
('610', '610 - BANCO V.R. S.A'),
('611', '611 - BANCO PAULISTA S.A'),
('612', '612 - BANCO GUANABARA S.A'),
('613', '613 - BANCO PECUNIA S.A'),
('616', '616 - BANCO INTERPACIFICO S.A'),
('617', '617 - BANCO INVESTOR S.A.'),
('618', '618 - BANCO TENDENCIA S.A'),
('621', '621 - BANCO APLICAP S.A.'),
('622', '622 - BANCO DRACMA S.A'),
('623', '623 - BANCO PANAMERICANO S.A'),
('624', '624 - BANCO GENERAL MOTORS S.A'),
('625', '625 - BANCO ARAUCARIA S.A'),
('626', '626 - BANCO FICSA S.A'),
('627', '627 - BANCO DESTAK S.A'),
('628', '628 - BANCO CRITERIUM S.A'),
('629', '629 - BANCORP BANCO COML. E. DE INVESTMENTO'),
('630', '630 - BANCO INTERCAP S.A'),
('633', '633 - BANCO REDIMENTO S.A'),
('634', '634 - BANCO TRIANGULO S.A'),
('635', '635 - BANCO DO ESTADO DO AMAPA S.A'),
('637', '637 - BANCO SOFISA S.A'),
('638', '638 - BANCO PROSPER S.A'),
('639', '639 - BIG S.A. - BANCO IRMAOS GUIMARAES'),
('640', '640 - BANCO DE CREDITO METROPOLITANO S.A'),
('641', '641 - BANCO EXCEL ECONOMICO S/A'),
('643', '643 - BANCO SEGMENTO S.A'),
('645', '645 - BANCO DO ESTADO DE RORAIMA S.A'),
('647', '647 - BANCO MARKA S.A'),
('648', '648 - BANCO ATLANTIS S.A'),
('649', '649 - BANCO DIMENSAO S.A'),
('650', '650 - BANCO PEBB S.A'),
('652', '652 - BANCO FRANCES E BRASILEIRO SA'),
('653', '653 - BANCO INDUSVAL S.A'),
('654', '654 - BANCO A. J. RENNER S.A'),
('655', '655 - BANCO VOTORANTIM S.A.'),
('656', '656 - BANCO MATRIX S.A'),
('657', '657 - BANCO TECNICORP S.A'),
('658', '658 - BANCO PORTO REAL S.A'),
('702', '702 - BANCO SANTOS S.A'),
('705', '705 - BANCO INVESTCORP S.A.'),
('707', '707 - BANCO DAYCOVAL S.A'),
('711', '711 - BANCO VETOR S.A.'),
('713', '713 - BANCO CINDAM S.A'),
('715', '715 - BANCO VEGA S.A'),
('718', '718 - BANCO OPERADOR S.A'),
('719', '719 - BANCO PRIMUS S.A'),
('720', '720 - BANCO MAXINVEST S.A'),
('721', '721 - BANCO CREDIBEL S.A'),
('722', '722 - BANCO INTERIOR DE SAO PAULO S.A'),
('724', '724 - BANCO PORTO SEGURO S.A'),
('725', '725 - BANCO FINABANCO S.A'),
('726', '726 - BANCO UNIVERSAL S.A'),
('728', '728 - BANCO FITAL S.A'),
('729', '729 - BANCO FONTE S.A'),
('730', '730 - BANCO COMERCIAL PARAGUAYO S.A'),
('731', '731 - BANCO GNPP S.A.'),
('732', '732 - BANCO PREMIER S.A.'),
('733', '733 - BANCO NACOES S.A.'),
('734', '734 - BANCO GERDAU S.A'),
('735', '735 - BACO POTENCIAL'),
('736', '736 - BANCO UNITED S.A'),
('737', '737 - THECA'),
('738', '738 - MARADA'),
('739', '739 - BGN'),
('740', '740 - BCN BARCLAYS'),
('741', '741 - BRP'),
('742', '742 - EQUATORIAL'),
('743', '743 - BANCO EMBLEMA S.A'),
('744', '744 - THE FIRST NATIONAL BANK OF BOSTON'),
('745', '745 - CITIBAN N.A.'),
('746', '746 - MODAL SA'),
('747', '747 - RAIBOBANK DO BRASIL'),
('748', '748 - SICREDI'),
('749', '749 - BRMSANTIL SA'),
('750', '750 - BANCO REPUBLIC NATIONAL OF NEW YORK (BRA'),
('751', '751 - DRESDNER BANK LATEINAMERIKA-BRASIL S/A'),
('752', '752 - BANCO BANQUE NATIONALE DE PARIS BRASIL S'),
('753', '753 - BANCO COMERCIAL URUGUAI S.A.'),
('755', '755 - BANCO MERRILL LYNCH S.A'),
('756', '756 - BANCO COOPERATIVO DO BRASIL S.A.'),
('757', '757 - BANCO KEB DO BRASIL S.A.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_admin`
--

DROP TABLE IF EXISTS `ci_admin`;
CREATE TABLE IF NOT EXISTS `ci_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_role_id` varchar(15) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `image` varchar(300) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime NOT NULL,
  `is_verify` tinyint(4) NOT NULL DEFAULT '1',
  `is_admin` tinyint(4) NOT NULL DEFAULT '1',
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `is_supper` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `estados` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ci_admin`
--

INSERT INTO `ci_admin` (`admin_id`, `admin_role_id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `image`, `password`, `last_login`, `is_verify`, `is_admin`, `is_active`, `is_supper`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`, `estados`) VALUES
(24, '1', 'superadmin', 'SuperAdmin', 'User', 'sa@g.com', '324234234', 'ff993fc6bcf2d42a9f4e42446d8e45ea.png', '$2y$10$gM5Hb9gQ9kR9rzqPSelFLu4m889Ea5oQc.TdfrQMvhDnZscN.hXFC', '2019-01-04 11:18:36', 1, 1, 1, 1, '', '', '', '2018-03-17 00:00:00', '2019-01-26 08:01:50', ''),
(25, '2', 'advogados', 'Advogados', 'User', 'advogados@gmail.com', '544354353', '', '$2y$10$UBKdRKhMxEFlqq8HYKQIVuHhUu/JUbzR10zeh9jtItuf63fjO836a', '2019-01-09 00:00:00', 1, 1, 1, 0, '', '', '', '2018-03-19 00:00:00', '2019-07-31 05:07:22', '1'),
(26, '3', 'audiencias', 'Audiencias', 'bush', 'audiencias@gmail.com', '5446546545665', '1c576d254c9f8a23c9243702bdb45a11.png', '$2y$10$qlAzDhBEqkKwP3OykqA7N.ZQk6T67fxD9RHfdv3zToxa9Mtwu9C/e', '2018-11-01 09:46:23', 1, 1, 1, 0, '', '', '', '2018-03-19 00:00:00', '2019-01-26 02:01:11', ''),
(29, '4', 'apuracao', 'Apuracao', 'Man', 'apuracao@gmail.com', '06985214562', '', '698d51a19d8a121ce581499d7b701668', '2019-01-03 00:00:00', 1, 1, 1, 0, '', '', '', '2018-03-15 00:00:00', '2019-01-26 02:01:16', ''),
(66, '2,3,4', 'Thaleco', '', '', 'xavier.thales@gmail.com', '', '', '$2y$10$saVHCljIA9JOtaQKRXcbfea5/nWKaR0MdBIAIlGGTTZaGUuXrjMv2', '2019-01-03 00:00:00', 1, 1, 1, 0, '', '', '', '2019-07-31 07:07:05', '2019-08-01 06:08:23', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_admin_roles`
--

DROP TABLE IF EXISTS `ci_admin_roles`;
CREATE TABLE IF NOT EXISTS `ci_admin_roles` (
  `admin_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_role_title` varchar(30) CHARACTER SET utf8 NOT NULL,
  `admin_role_status` int(11) NOT NULL,
  `admin_role_created_by` int(1) NOT NULL,
  `admin_role_created_on` datetime NOT NULL,
  `admin_role_modified_by` int(11) NOT NULL,
  `admin_role_modified_on` datetime NOT NULL,
  PRIMARY KEY (`admin_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ci_admin_roles`
--

INSERT INTO `ci_admin_roles` (`admin_role_id`, `admin_role_title`, `admin_role_status`, `admin_role_created_by`, `admin_role_created_on`, `admin_role_modified_by`, `admin_role_modified_on`) VALUES
(1, 'Super Admin', 1, 0, '2018-03-15 12:48:04', 0, '2018-03-17 12:53:16'),
(2, 'Cadastro de Advogados', 0, 0, '2018-03-15 12:53:19', 0, '2019-07-31 05:14:59'),
(3, 'Cadastro de Audiências', 0, 0, '2018-03-15 01:46:54', 0, '2019-07-31 05:15:32'),
(4, 'Relatório de Apuração', 0, 0, '2018-03-16 05:52:45', 0, '2019-07-31 05:15:43');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_companies`
--

DROP TABLE IF EXISTS `ci_companies`;
CREATE TABLE IF NOT EXISTS `ci_companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(50) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ci_companies`
--

INSERT INTO `ci_companies` (`id`, `name`, `email`, `mobile_no`, `address1`, `address2`, `created_date`) VALUES
(9, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444 United State ', '', '2018-04-26 09:04:18'),
(8, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444 United State ', '', '2018-04-26 09:04:30'),
(7, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444 United State ', '', '2018-04-26 09:04:59'),
(6, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444  United State LLC', '', '2017-12-11 08:12:15'),
(10, 'Codeglamour', 'codeglamour1@gmail.com', '44785566952', '27 new jersey - Level 58 - CA 444 United State ', '', '2019-01-27 10:01:18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_payments`
--

DROP TABLE IF EXISTS `ci_payments`;
CREATE TABLE IF NOT EXISTS `ci_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `invoice_no` varchar(30) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `items_detail` longtext NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `total_tax` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `grand_total` decimal(10,2) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `payment_status` varchar(30) NOT NULL,
  `client_note` longtext NOT NULL,
  `termsncondition` longtext NOT NULL,
  `due_date` date NOT NULL,
  `created_date` date NOT NULL,
  `updated_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ci_payments`
--

INSERT INTO `ci_payments` (`id`, `admin_id`, `user_id`, `company_id`, `invoice_no`, `txn_id`, `items_detail`, `sub_total`, `total_tax`, `discount`, `grand_total`, `currency`, `payment_method`, `payment_status`, `client_note`, `termsncondition`, `due_date`, `created_date`, `updated_date`) VALUES
(4, 3, 34, 9, 'INV-2001', '', 'a:5:{s:19:\"product_description\";a:1:{i:0;s:17:\"Samsung Galaxy S3\";}s:8:\"quantity\";a:1:{i:0;s:1:\"1\";}s:5:\"price\";a:1:{i:0;s:4:\"1000\";}s:3:\"tax\";a:1:{i:0;s:1:\"2\";}s:5:\"total\";a:1:{i:0;s:7:\"1000.00\";}}', '1000.00', '20.00', '5.00', '1015.00', 'USD', '', 'Paid', 'Will be delivered within next 24 hours', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-11-29', '2017-12-06', '2018-04-26'),
(2, 3, 32, 7, 'INV-1001', '', 'a:5:{s:19:\"product_description\";a:2:{i:0;s:9:\"Galaxy S6\";i:1;s:9:\"Galaxy S5\";}s:8:\"quantity\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"1\";}s:5:\"price\";a:2:{i:0;s:4:\"1000\";i:1;s:3:\"800\";}s:3:\"tax\";a:2:{i:0;s:1:\"5\";i:1;s:1:\"5\";}s:5:\"total\";a:2:{i:0;s:7:\"1000.00\";i:1;s:6:\"800.00\";}}', '1800.00', '90.00', '2.00', '1888.00', 'USD', '', 'Paid', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-12-20', '2017-12-12', '2018-04-26'),
(3, 3, 33, 8, 'INV-2002', '', 'a:5:{s:19:\"product_description\";a:1:{i:0;s:17:\"Samsung Galaxy S3\";}s:8:\"quantity\";a:1:{i:0;s:1:\"1\";}s:5:\"price\";a:1:{i:0;s:2:\"10\";}s:3:\"tax\";a:1:{i:0;s:1:\"2\";}s:5:\"total\";a:1:{i:0;s:5:\"10.00\";}}', '10.00', '0.20', '1.00', '9.20', 'USD', '', 'Paid', 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2017-12-06', '2017-12-06', '2018-04-26'),
(5, 24, 3, 10, '10021', '', 'a:5:{s:19:\"product_description\";a:2:{i:0;s:9:\"Galaxy S7\";i:1;s:9:\"Galaxy S8\";}s:8:\"quantity\";a:2:{i:0;s:1:\"1\";i:1;s:1:\"3\";}s:5:\"price\";a:2:{i:0;s:3:\"300\";i:1;s:3:\"700\";}s:3:\"tax\";a:2:{i:0;s:1:\"0\";i:1;s:1:\"2\";}s:5:\"total\";a:2:{i:0;s:6:\"300.00\";i:1;s:7:\"2100.00\";}}', '2400.00', '42.00', '1.00', '2441.00', 'USD', '', 'Paid', 'Will be delivered on next Friday', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2018-04-20', '2018-04-11', '2019-01-27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_users`
--

DROP TABLE IF EXISTS `ci_users`;
CREATE TABLE IF NOT EXISTS `ci_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT '1',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `is_verify` tinyint(4) NOT NULL DEFAULT '0',
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(255) NOT NULL,
  `password_reset_code` varchar(255) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ci_users`
--

INSERT INTO `ci_users` (`id`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `password`, `address`, `role`, `is_active`, `is_verify`, `is_admin`, `token`, `password_reset_code`, `last_ip`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin', 'admin', 'admin@admin.com', '12345', '$2y$10$qlAzDhBEqkKwP3OykqA7N.ZQk6T67fxD9RHfdv3zToxa9Mtwu9C/e', '27 new jersey - Level 58 - CA 444 \r\nUnited State ', 1, 1, 1, 1, '', '', '', '2017-09-29 10:09:44', '2017-12-14 10:12:41'),
(32, 'user', 'user', 'user', 'user@user.com', '44897866462', '$2y$10$sU5msVdifYie7cZbCEnyku6hLH8Sef0VCHqO9UIOg6rsBsDtsLcyS', '', 1, 1, 1, 0, '352fe25daf686bdb4edca223c921acea', '', '', '2018-04-24 07:04:07', '2019-01-26 03:01:30'),
(33, 'john123', 'john', 'smith', 'johnsmith@gmail.com', '445889654656', '$2y$10$CcBiQrcW597s5muOP2blhOev48gzBv2VvAVp83NsXbLo7cZM7tjGm', 'USA', 7, 1, 0, 0, '', '', '', '2018-04-25 06:04:25', '2019-01-24 04:01:33'),
(34, 'naumancs', 'nauman', 'ahmed', 'nacreativeprogrammer@gmail.com', '4456545632215', '$2y$10$Mo6FHIusHr9oDWZxJPaTC.DWZBRom7SfEryk66BbXs25OLYsmKkrK', '', 1, 1, 1, 0, '', '', '', '2018-04-25 07:04:12', '2018-04-25 07:04:28'),
(35, 'alire', 'ali', 'raza', 'ali@gmail.com', '12345', '$2y$10$fq5VZXpOxnzv7uZADBSBA.cg1fip8xRDuoTAsuLC8O5SHGYTjgZXG', 'wwe', 1, 1, 0, 0, '', '', '', '2019-01-24 05:01:14', '2019-01-24 05:01:14'),
(36, 'zohaib', 'zohaib', 'rana', 'zohaibrana@gmail.com', '12345988444', '$2y$10$UGpdlIob/e1gBsE2yQ/OEeqKwGGymuYFlhHogw19/SgQYRo2OqA/S', 'wwe', 1, 1, 0, 0, '', '', '', '2019-01-24 05:01:01', '2019-01-24 05:01:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comarcas`
--

DROP TABLE IF EXISTS `comarcas`;
CREATE TABLE IF NOT EXISTS `comarcas` (
  `codigo` int(6) NOT NULL AUTO_INCREMENT,
  `estado` varchar(2) NOT NULL,
  `comarca` varchar(255) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `comarcas`
--

INSERT INTO `comarcas` (`codigo`, `estado`, `comarca`) VALUES
(1, 'AC', 'teste'),
(3, 'AC', 'rhegfdfg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE IF NOT EXISTS `estados` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` varchar(2) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`codigo`, `sigla`, `descricao`) VALUES
(1, 'AC', 'Acre'),
(2, 'AL', 'Alagoas'),
(3, 'AP', 'Amapá'),
(4, 'AM', 'Amazonas'),
(5, 'BA', 'Bahia'),
(6, 'CE', 'Ceará'),
(7, 'DF', 'Distrito Federal'),
(8, 'ES', 'Espírito Santo'),
(9, 'GO', 'Goiás'),
(10, 'MA', 'Maranhão'),
(11, 'MT', 'Mato Grosso'),
(12, 'MS', 'Mato Grosso do Sul'),
(13, 'MG', 'Minas Gerais'),
(14, 'PA', 'Pará'),
(15, 'PB', 'Paraíba'),
(16, 'PR', 'Paraná'),
(17, 'PE', 'Pernambuco'),
(18, 'PI', 'Piauí'),
(19, 'RJ', 'Rio de Janeiro'),
(20, 'RN', 'Rio Grande do Norte'),
(21, 'RS', 'Rio Grande do Sul'),
(22, 'RO', 'Rondônia'),
(23, 'RR', 'Roraima'),
(24, 'SC', 'Santa Catarina'),
(25, 'SP', 'São Paulo'),
(26, 'SE', 'Sergipe'),
(27, 'TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `module_id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(255) NOT NULL,
  `controller_name` varchar(255) NOT NULL,
  `fa_icon` varchar(100) NOT NULL,
  `operation` text NOT NULL,
  `sort_order` tinyint(4) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `controller_name`, `fa_icon`, `operation`, `sort_order`) VALUES
(1, 'Admin List', 'admin', '', 'view|add|edit|delete|change_status|access', 0),
(2, 'Role & Permissions', 'admin_roles', '', 'view|add|edit|delete|change_status|access', 0),
(3, 'Advogados', 'advogado', '', 'view|add|edit|delete|change_status|access', 0),
(4, 'Comarcas', 'comarca', '', 'view|add|edit|delete|access', 0),
(5, 'Audiências', 'audiencia', '', 'view|add|edit|delete|access', 0),
(6, 'Apuração', 'apuracao', '', 'view|add|edit|delete|access', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `module_access`
--

DROP TABLE IF EXISTS `module_access`;
CREATE TABLE IF NOT EXISTS `module_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_role_id` int(11) NOT NULL,
  `module` varchar(255) NOT NULL,
  `operation` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `RoleId` (`admin_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `module_access`
--

INSERT INTO `module_access` (`id`, `admin_role_id`, `module`, `operation`) VALUES
(1, 1, 'admin', 'view'),
(2, 1, 'admin', 'add'),
(3, 1, 'admin', 'edit'),
(4, 1, 'admin', 'delete'),
(5, 1, 'admin', 'change_status'),
(6, 1, 'admin', 'access'),
(7, 1, 'admin_roles', 'view'),
(8, 1, 'admin_roles', 'add'),
(9, 1, 'admin_roles', 'edit'),
(10, 1, 'admin_roles', 'delete'),
(11, 1, 'admin_roles', 'change_status'),
(12, 1, 'admin_roles', 'access'),
(13, 1, 'admin', 'change_pwd'),
(14, 1, 'advogado', 'add'),
(15, 1, 'advogado', 'edit'),
(16, 1, 'advogado', 'delete'),
(17, 1, 'advogado', 'change_status'),
(18, 1, 'advogado', 'access'),
(23, 1, 'audiencia', 'view'),
(24, 1, 'audiencia', 'add'),
(25, 1, 'audiencia', 'edit'),
(26, 1, 'audiencia', 'delete'),
(27, 1, 'audiencia', 'access'),
(28, 1, 'apuracao', 'access'),
(29, 1, 'apuracao', 'add'),
(30, 1, 'apuracao', 'view'),
(31, 1, 'advogado', 'view'),
(36, 1, 'apuracao', 'edit'),
(37, 1, 'apuracao', 'delete'),
(38, 1, 'comarca', 'access'),
(39, 1, 'comarca', 'delete'),
(40, 1, 'comarca', 'view'),
(41, 1, 'comarca', 'edit'),
(42, 1, 'comarca', 'add'),
(76, 2, 'advogado', 'view'),
(77, 2, 'advogado', 'change_status'),
(78, 2, 'advogado', 'add'),
(79, 2, 'advogado', 'access'),
(80, 2, 'advogado', 'edit'),
(81, 2, 'advogado', 'delete'),
(82, 2, 'comarca', 'view'),
(83, 2, 'comarca', 'access'),
(84, 2, 'comarca', 'add'),
(85, 2, 'comarca', 'edit'),
(86, 2, 'comarca', 'delete'),
(87, 3, 'audiencia', 'view'),
(88, 3, 'audiencia', 'access'),
(89, 3, 'audiencia', 'add'),
(90, 3, 'audiencia', 'edit'),
(91, 3, 'audiencia', 'delete'),
(92, 4, 'apuracao', 'view'),
(93, 4, 'apuracao', 'access'),
(94, 4, 'apuracao', 'add'),
(95, 4, 'apuracao', 'edit'),
(96, 4, 'apuracao', 'delete');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `advogado_comarca`
--
ALTER TABLE `advogado_comarca`
  ADD CONSTRAINT `FK_ADV` FOREIGN KEY (`codigo_advogado`) REFERENCES `advogados` (`codigo`),
  ADD CONSTRAINT `FK_COM` FOREIGN KEY (`codigo_comarca`) REFERENCES `comarcas` (`codigo`);

--
-- Limitadores para a tabela `audiencias`
--
ALTER TABLE `audiencias`
  ADD CONSTRAINT `FK_ADV_AUDI` FOREIGN KEY (`codigo_advogado`) REFERENCES `advogados` (`codigo`),
  ADD CONSTRAINT `FK_COMARCAS_AUDI` FOREIGN KEY (`codigo_comarca`) REFERENCES `comarcas` (`codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
