-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 26-Out-2020 às 18:39
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `LOJA`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ACOMPANHAMENTO_COMPRA`
--

CREATE TABLE `ACOMPANHAMENTO_COMPRA` (
  `SEQ_ACOMPANHAMENTO_COMPRA` int(11) NOT NULL,
  `DTA_HOR_SITUACAO` datetime DEFAULT current_timestamp(),
  `NUM_ITEM_COMPRA` int(11) DEFAULT NULL,
  `COD_SITUACAO_COMPRA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `CARACTERISTICA`
--

CREATE TABLE `CARACTERISTICA` (
  `COD_CARACTERISTICA` int(11) NOT NULL,
  `NOM_CARACTERISTICA` varchar(45) NOT NULL,
  `IDF_ATIVO` varchar(1) DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `CARACTERISTICA`
--

INSERT INTO `CARACTERISTICA` (`COD_CARACTERISTICA`, `NOM_CARACTERISTICA`, `IDF_ATIVO`) VALUES
(1, 'PROCESSADOR', 'S'),
(2, 'MEMORIA RAM', 'S'),
(3, 'CAPACIDADE DO HD', 'S'),
(4, 'MEMORIA FLASH SSD', 'S'),
(5, 'SISTEMA OPERACIONAL', 'S'),
(6, 'TAMANHO DA TELA', 'S'),
(7, 'CARACTERISTICAS', 'S'),
(9, 'ACELERADOR DE GRÁFICO', 'S'),
(10, 'FAIXA DE PREÇO', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `CATEGORIA`
--

CREATE TABLE `CATEGORIA` (
  `COD_CATEGORIA` int(11) NOT NULL,
  `NOM_CATEGORIA` varchar(45) NOT NULL,
  `IDF_ATIVO` varchar(1) DEFAULT 'S',
  `COD_DEPARTAMENTO` int(11) NOT NULL,
  `POS_CATEGORIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `CATEGORIA`
--

INSERT INTO `CATEGORIA` (`COD_CATEGORIA`, `NOM_CATEGORIA`, `IDF_ATIVO`, `COD_DEPARTAMENTO`, `POS_CATEGORIA`) VALUES
(1, 'LEITOR DE LIVROS DIGITAIS (E-READER)', 'S', 1, 23),
(2, 'ULTRABOOK', 'S', 1, 1),
(3, 'NOTEBOOK', 'S', 1, 2),
(4, 'NETBOOK', 'S', 1, 3),
(5, 'COMPUTADORES', 'S', 1, 4),
(6, 'COMPUTADOR ALL IN ONE', 'S', 1, 5),
(7, 'MONITORES', 'S', 1, 6),
(8, 'IMPRESSORAS', 'S', 1, 7),
(9, 'MULTIFUNCIONAL', 'S', 1, 8),
(10, 'IPOS E ACESSÓRIOS', 'S', 1, 9),
(11, 'SUPRIMENTOS', 'S', 1, 10),
(12, 'SCANNER', 'S', 1, 11),
(13, 'PROJETORES', 'S', 1, 12),
(14, 'PEN DRIVES', 'S', 1, 13),
(15, 'HD EXTERNO', 'S', 1, 14),
(16, 'COMPONENTES E PEÇAS', 'S', 1, 15),
(17, 'SOFTWARES', 'S', 1, 16),
(18, 'PROTEÇÃO ELÉTRICA', 'S', 1, 17),
(19, 'EQUIPAMENTOS DE REDE / WIRELESS', 'S', 1, 18),
(20, 'ACESSÓRIOS E PERIFÉRICOS', 'S', 1, 19),
(21, 'SERVIÇOS', 'S', 1, 20),
(22, 'FONES DE OUVIDO', 'S', 1, 21),
(23, 'JOGOS PARA PC', 'S', 1, 22),
(24, 'CAMERAS DIGITAIS', 'S', 3, 1),
(25, 'FILMADORAS', 'S', 3, 1),
(26, 'FILMADORAS', 'S', 3, 1),
(27, 'CARTÕES DE MEMÓRIA', 'S', 3, 1),
(28, 'PORTA RETRATO DIGITAL', 'S', 3, 1),
(29, 'BINÓCULOS E TELESCÓPIOS', 'S', 3, 1),
(30, 'CAMERAS ESPECIAIS', 'S', 3, 1),
(31, 'PILHAS BATERIAS E CARREGADORES', 'S', 3, 1),
(32, 'ACESSÓRIOS ORIGINAIS', 'S', 3, 1),
(33, 'ACESSÓRIOS', 'S', 3, 1),
(34, 'DRONE', 'S', 3, 1),
(35, 'ACESSÓRIOS', 'S', 7, 1),
(36, 'ADEGA DE VINHOS', 'S', 7, 1),
(37, 'CHURRASQUEIRAS', 'S', 7, 1),
(38, 'COIFAS', 'S', 7, 1),
(39, 'LAVA E SECA', 'S', 7, 1),
(40, 'COOLER', 'S', 7, 1),
(41, 'DEPURADORES DE AR', 'S', 7, 1),
(42, 'FOGÕES', 'S', 7, 1),
(43, 'FORNO DE EMBUTIR', 'S', 7, 1),
(44, 'FORNO DE MICRO-ONDAS', 'S', 7, 1),
(45, 'FREEZER', 'S', 7, 1),
(46, 'LAVADORAS', 'S', 7, 1),
(47, 'LAVA-LOUÇAS', 'S', 7, 1),
(48, 'COOKTOPS', 'S', 7, 1),
(49, 'REFRIGERADORES', 'S', 7, 1),
(51, 'SECADORAS DE ROUPAS', 'S', 7, 1),
(52, 'CENTRÍFUGAS DE ROUPAS', 'S', 7, 1),
(53, 'AQUECEDORES A GÁS E ACESSÓRIOS', 'S', 7, 1),
(54, 'AR CONDICIONADO', 'S', 7, 1),
(55, 'ASPIRADOR DE PÓ', 'S', 7, 1),
(56, 'CLIMATIZADOR', 'S', 7, 1),
(57, 'FREEZER HORIZONTAL', 'S', 7, 1),
(58, 'LINHA INDUSTRIAL', 'S', 7, 1),
(59, 'MÁQUINA DE GELO', 'S', 7, 1),
(60, 'ELETROPORTÁTEIS', 'S', 7, 1),
(61, 'TORRADEIRAS', 'S', 7, 1),
(62, 'FILMES E SERIADOS', 'S', 14, 1),
(63, 'MUSICA E SHOWS', 'S', 14, 1),
(64, 'DVDs E BLUE-RAY PLAYERS', 'S', 14, 1),
(65, 'CAIXAS E ESTOJOS', 'S', 14, 1),
(66, 'RELÓGIOS DECORATIVOS', 'S', 14, 1),
(67, 'RELÓGIOS INFANTIS', 'S', 14, 1),
(68, 'MASCULINOS', 'S', 14, 1),
(69, 'FEININOS', 'S', 14, 1),
(70, 'UNISEX', 'S', 14, 1),
(71, 'AQUECEDORES', 'S', 12, 1),
(72, 'AR CONDICIONADO', 'S', 12, 1),
(73, 'CLIMATIZADORES', 'S', 12, 1),
(74, 'CORTINA DE AR', 'S', 12, 1),
(75, 'CLIMATIZADORES', 'S', 12, 1),
(76, 'CORTINA DE AR', 'S', 12, 1),
(77, 'TRATAMENTO DE AR', 'S', 12, 1),
(78, 'VENTILADORES E CIRCUADORES', 'S', 12, 1),
(79, 'AQUECEDORES A GÁS E ACESSÓRIOS', 'S', 12, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `CLIENTE`
--

CREATE TABLE `CLIENTE` (
  `COD_CLIENTE` int(11) NOT NULL,
  `NOM_CLIENTE` varchar(100) NOT NULL,
  `END_CLIENTE` varchar(250) NOT NULL,
  `CPF_CLIENTE` varchar(11) NOT NULL,
  `CEP_CLIENTE` varchar(8) NOT NULL,
  `BAI_CLIENTE` varchar(45) NOT NULL,
  `FON_CLIENTE` varchar(11) DEFAULT NULL,
  `CEL_CLIENTE` varchar(11) DEFAULT NULL,
  `USR_CLIENTE` varchar(15) DEFAULT NULL,
  `SEN_CLIENTE` varchar(15) DEFAULT NULL,
  `IDF_ATIVO` varchar(1) DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `CLIENTE`
--

INSERT INTO `CLIENTE` (`COD_CLIENTE`, `NOM_CLIENTE`, `END_CLIENTE`, `CPF_CLIENTE`, `CEP_CLIENTE`, `BAI_CLIENTE`, `FON_CLIENTE`, `CEL_CLIENTE`, `USR_CLIENTE`, `SEN_CLIENTE`, `IDF_ATIVO`) VALUES
(1, 'EMERSON FITIPALDI', 'RUA LOTUS, 2', '63812516209', '14100000', 'JARDIM DOS CAMPEOES', NULL, NULL, NULL, NULL, 'S'),
(2, 'NELSON PIQUET', 'AV DA WILLIAMS, 3', '48842214272', '14200000', 'JARDIM DOS CAMPEOES', NULL, NULL, NULL, NULL, 'S'),
(3, 'AIRTON SENNA', 'AV MACLAREN, 3', '65144471200', '14300000', 'JARDIM DOS CAMPEOES', NULL, NULL, NULL, NULL, 'S'),
(4, 'RUBENS BARRICHELLO', 'TRAVESSA DA FERRARI, 2', '76266285274', '14400000', 'VILA VINTEM', NULL, NULL, NULL, NULL, 'S'),
(5, 'FELIPE MASSA', 'TRAVESSA DA SAUBER, 2', '65441306564', '14500000', 'VILA VINTEM', NULL, NULL, NULL, NULL, 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `COMPRA`
--

CREATE TABLE `COMPRA` (
  `NUM_COMPRA` int(11) NOT NULL,
  `DTA_HOR_COMPRA` varchar(45) DEFAULT NULL,
  `COD_CLIENTE` int(11) NOT NULL,
  `COD_CONDICAO_PAGAMENTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `COMPRA`
--

INSERT INTO `COMPRA` (`NUM_COMPRA`, `DTA_HOR_COMPRA`, `COD_CLIENTE`, `COD_CONDICAO_PAGAMENTO`) VALUES
(1, '2020-09-11 19:13:29', 1, 1),
(2, '2020-09-11 19:13:29', 2, 1),
(3, '2020-09-11 19:13:29', 3, 1),
(4, '2020-09-11 19:13:29', 4, 1),
(5, '2020-09-11 19:13:29', 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `CONDICAO_PAGAMENTO`
--

CREATE TABLE `CONDICAO_PAGAMENTO` (
  `COD_CONDICAO_PAGAMENTO` int(11) NOT NULL,
  `DSC_CONDICAO_PAGAMENTO` varchar(45) NOT NULL,
  `IDF_ATIVO` varchar(1) DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `CONDICAO_PAGAMENTO`
--

INSERT INTO `CONDICAO_PAGAMENTO` (`COD_CONDICAO_PAGAMENTO`, `DSC_CONDICAO_PAGAMENTO`, `IDF_ATIVO`) VALUES
(1, '10X SEM JUROS NO CARTÃO DE CRÉDITO', 'S'),
(2, 'A VISTA DINHEIRO', 'S'),
(3, '5X SEM JUROS NO CARTAO', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `DEPARTAMENTO`
--

CREATE TABLE `DEPARTAMENTO` (
  `COD_DEPARTAMENTO` int(11) NOT NULL,
  `NOM_DEPARTAMENTO` varchar(45) NOT NULL,
  `IDF_ATIVO` varchar(1) DEFAULT 'S',
  `COD_GRUPO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `DEPARTAMENTO`
--

INSERT INTO `DEPARTAMENTO` (`COD_DEPARTAMENTO`, `NOM_DEPARTAMENTO`, `IDF_ATIVO`, `COD_GRUPO`) VALUES
(1, 'INFORMATICA', 'S', 2),
(2, 'TABLETS', 'S', 2),
(3, 'CINE E FOTO', 'S', 2),
(4, 'TELEFONES E CELULARES', 'S', 2),
(5, 'AUDIO', 'S', 2),
(6, 'TV E VIDEO', 'S', 2),
(7, 'ELETRODOMÉSTICOS', 'S', 3),
(8, 'MÓVEIS', 'S', 3),
(9, 'ELETROPORTÁTEIS', 'S', 3),
(10, 'UTILIDADES DOMÉSTICAS', 'S', 3),
(11, 'CAMA, MESA E BANHO', 'S', 3),
(12, 'AR E VENTILAÇÃO', 'S', 3),
(13, 'GAMES', 'S', 4),
(14, 'DVDS E BLU-RAY', 'S', 4),
(15, 'LIVROS', 'S', 4),
(16, 'PAPELARIA', 'S', 4),
(17, 'LIVROS DIGITAIS', 'S', 4),
(18, 'CALÇADOS', 'S', 5),
(19, 'MODA', 'S', 5),
(20, 'RELÓGIOS', 'S', 5),
(21, 'PERFUMARIA', 'S', 5),
(22, 'MALAS E MOCHILAS', 'S', 5),
(23, 'BELEZA E SAÚDE', 'S', 5),
(24, 'AUTOMOTIVO', 'S', 6),
(25, 'FERRAMENTAS', 'S', 6),
(26, 'ESPORTE E LAZER', 'S', 7),
(27, 'SUPLEMENTOS ALIMENTARES', 'S', 7),
(28, 'BEBÊS', 'S', 8),
(29, 'BRINQUEDOS', 'S', 8),
(30, 'ALIMENTOS E BEBIDAS', 'S', 1),
(31, 'VINHOS E CERVEJAS', 'S', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `FABRICANTE`
--

CREATE TABLE `FABRICANTE` (
  `COD_FABRICANTE` int(11) NOT NULL,
  `NOM_FABRICANTE` varchar(100) NOT NULL,
  `SITE_FABRICANTE` varchar(250) DEFAULT NULL,
  `IDF_ATIVO` varchar(1) DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `FABRICANTE`
--

INSERT INTO `FABRICANTE` (`COD_FABRICANTE`, `NOM_FABRICANTE`, `SITE_FABRICANTE`, `IDF_ATIVO`) VALUES
(1, 'ACER', NULL, 'S'),
(2, 'APPLE', NULL, 'S'),
(3, 'ASUS', NULL, 'S'),
(4, 'DELL', NULL, 'S'),
(5, 'HP', NULL, 'S'),
(6, 'LENOVO', NULL, 'S'),
(7, 'LG', NULL, 'S'),
(8, 'POSITIVO', NULL, 'S'),
(9, 'SAMSUNG', NULL, 'S'),
(10, 'SEMP-TOSHIBA', NULL, 'S'),
(12, 'SANDISK', NULL, 'S'),
(13, 'KINGSTON', NULL, 'S'),
(14, 'MULTILASER', NULL, 'S'),
(15, 'SONY', 'HTTPS://SONY.COM', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `GRUPO`
--

CREATE TABLE `GRUPO` (
  `COD_GRUPO` int(11) NOT NULL,
  `NOM_GRUPO` varchar(45) NOT NULL,
  `IDF_ATIVO` varchar(1) DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `GRUPO`
--

INSERT INTO `GRUPO` (`COD_GRUPO`, `NOM_GRUPO`, `IDF_ATIVO`) VALUES
(1, 'ALIMENTOS E BEBIDAS', 'S'),
(2, 'INFORMÁTICA E TECNOLOGIA', 'S'),
(3, 'CASA E ESCRITÓRIO', 'S'),
(4, 'CULTURA E DIVERSÃO', 'S'),
(5, 'MODA E BELEZA', 'S'),
(6, 'FERRAMENTAS E AUTOMOTIVO', 'S'),
(7, 'ESPORTE E SAÚDE', 'S'),
(8, 'BEBÊS E BRINQUEDOS', 'S'),
(12, 'ROUPAS', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ITEM_COMPRA`
--

CREATE TABLE `ITEM_COMPRA` (
  `NUM_ITEM_COMPRA` int(11) NOT NULL,
  `COD_PRODUTO` int(11) NOT NULL,
  `NUM_COMPRA` int(11) NOT NULL,
  `PCO_PRODUTO` decimal(10,2) NOT NULL DEFAULT 0.00,
  `QTD_PRODUTO` int(11) NOT NULL DEFAULT 1,
  `NUM_DIAS_PREV_ENTREGA` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ITEM_COMPRA`
--

INSERT INTO `ITEM_COMPRA` (`NUM_ITEM_COMPRA`, `COD_PRODUTO`, `NUM_COMPRA`, `PCO_PRODUTO`, `QTD_PRODUTO`, `NUM_DIAS_PREV_ENTREGA`) VALUES
(1, 1, 1, '2199.99', 1, 7),
(2, 18, 2, '29.66', 5, 7),
(3, 21, 3, '27.30', 3, 7),
(4, 22, 4, '551.65', 4, 7),
(5, 17, 4, '381.65', 1, 7),
(6, 11, 5, '1399.00', 1, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `PRAZO_COND_PAGAMENTO`
--

CREATE TABLE `PRAZO_COND_PAGAMENTO` (
  `COD_CONDICAO_PAGAMENTO` int(11) NOT NULL,
  `NUM_PARCELAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `PRAZO_COND_PAGAMENTO`
--

INSERT INTO `PRAZO_COND_PAGAMENTO` (`COD_CONDICAO_PAGAMENTO`, `NUM_PARCELAS`) VALUES
(1, 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `PRODUTO`
--

CREATE TABLE `PRODUTO` (
  `COD_PRODUTO` int(11) NOT NULL,
  `NOM_PRODUTO` varchar(250) NOT NULL,
  `DSC_PRODUTO` longtext DEFAULT NULL,
  `IMG_PRODUTO` varchar(250) DEFAULT NULL,
  `EST_PRODUTO` int(11) DEFAULT 0,
  `PCO_PRODUTO` decimal(10,2) DEFAULT 0.00,
  `IDF_ATIVO` varchar(1) DEFAULT 'S',
  `COD_CATEGORIA` int(11) NOT NULL,
  `COD_FABRICANTE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `PRODUTO`
--

INSERT INTO `PRODUTO` (`COD_PRODUTO`, `NOM_PRODUTO`, `DSC_PRODUTO`, `IMG_PRODUTO`, `EST_PRODUTO`, `PCO_PRODUTO`, `IDF_ATIVO`, `COD_CATEGORIA`, `COD_FABRICANTE`) VALUES
(1, 'Ultrabook Acer Aspire M5-481T-6650 com Intel® Core™ i3-3227U', 'Ultrabook Acer Aspire M5-481T-6417 com Intel® Core™ i5-3317U, 6GB, 500GB, 20GB SSD, Gravador de DVD, Bluetooth, HDMI, Wireless, LED 14” e Windows 8', NULL, 10, '2199.99', 'S', 2, 4),
(2, 'Ultrabook Acer Aspire M5-481T-6417 com Intel® Core™ i5-3317U', 'Ultrabook Acer Aspire M5-481T-6650 com Intel® Core™ i3-3227U, 4GB, 500GB, 20GB SSD, Gravador de DVD, Leitor de Cartões, HDMI, LED 14\" e Windows 8', NULL, 10, '1699.99', 'S', 2, 4),
(3, 'Ultrabook Acer Aspire M5-481T-6195 com Intel® Core™ i5-3317U', 'Ultrabook Acer Aspire M5-481T-6195 com Intel® Core™ i5-3317U, 4GB, 500GB, 20GB SSD, Gravador de DVD, Bluetooth, HDMI, Wireless, LED 14” e Windows 8', NULL, 10, '2049.99', 'S', 2, 4),
(4, 'Ultrabook Acer Aspire com Intel® Core™ i5', 'Ultrabook Acer Aspire com Intel® Core™ i5, 6GB, 500GB, 20GB SSD, Gravador de DVD, Bluetooth, HDMI, LED 14\" e Windows 8+ Mochila Targus p/ Notebook 16\"', NULL, 10, '2399.99', 'S', 2, 4),
(5, 'Computador HP 402 G1 SFF com Intel Core i3-4130, 4GB, 500GB, Gravador de DVD e FreeDOS 2.0', 'Computador HP 402 G1 SFF com Intel Core i3-4130, 4GB, 500GB, Gravador de DVD e FreeDOS 2.0', NULL, 10, '1440.00', 'S', 5, 5),
(6, 'Computador HP ProDesk 600 G1 SFF com Intel® Core™ i3-4130, 4GB, 500GB, Gravador de DVD e Windows 8 Pro', 'Computador HP ProDesk 600 G1 SFF com Intel® Core™ i3-4130, 4GB, 500GB, Gravador de DVD e Windows 8 Pro', NULL, 10, '2814.81', 'S', 5, 5),
(7, 'Computador HP All in One Pavilion 20-b410br Processador Intel® Core™ i3-3220T, Windows 8.1, 4GB, 500GB, Gravador de DVD, Leitor de Cartões, LED 20”', 'Computador HP All in One Pavilion 20-b410br Processador Intel® Core™ i3-3220T, Windows 8.1, 4GB, 500GB, Gravador de DVD, Leitor de Cartões, LED 20”', NULL, 10, '1529.15', 'S', 5, 5),
(8, 'Computador HP All in One Pavilion TouchSmart 23-h000br Processador Intel® Core™ i5, Windows 8.1, 8GB, 1TB, LED 23\", Wireless, Placa NVIDIA GeForce', 'Computador HP All in One Pavilion TouchSmart 23-h000br Processador Intel® Core™ i5, Windows 8.1, 8GB, 1TB, LED 23\", Wireless, Placa NVIDIA GeForce', NULL, 10, '3229.15', 'S', 5, 5),
(9, 'Notebook Acer Aspire E1-572-6_BR648 com Intel® Core™ i5-4200U, 6GB, 500GB, Gravador de DVD, Leitor de Cartões, HDMI, Wireless, LED 15.6\" e Windows 8.1', 'Notebook Acer Aspire E1-572-6_BR648 com Intel® Core™ i5-4200U, 6GB, 500GB, Gravador de DVD, Leitor de Cartões, HDMI, Wireless, LED 15.6\" e Windows 8.1', NULL, 10, '1598.99', 'S', 3, 1),
(10, 'Notebook Samsung ATIV Book 2 270E4E-KD6 com Intel® Dual Core, 4GB, 500GB, Gravador de DVD, Leitor de Cartões, HDMI, Bluetooth 4.0, LED 14\" e Windows 8', 'Notebook Samsung ATIV Book 2 270E4E-KD6 com Intel® Dual Core, 4GB, 500GB, Gravador de DVD, Leitor de Cartões, HDMI, Bluetooth 4.0, LED 14\" e Windows 8', NULL, 10, '1108.48', 'S', 3, 9),
(11, 'Notebook 2 em 1 Touch HP Pavilion x360 11-n022br Processador Intel® Celeron®, Windows 8.1, 4GB, 500GB, 25GB grátis na Nuvem, Beats Audio, LED 11.6\"', 'Notebook 2 em 1 Touch HP Pavilion x360 11-n022br Processador Intel® Celeron®, Windows 8.1, 4GB, 500GB, 25GB grátis na Nuvem, Beats Audio, LED 11.6\"', NULL, 10, '1399.00', 'S', 3, 5),
(12, 'Notebook Asus X551MA-BRAL-SX207H com Intel® Quad Core, 4GB, 500GB, Gravador de DVD, Leitor de Cartões, HDMI, Wireless, Webcam, LED 15.6\" e Windows 8.1', 'Notebook Asus X551MA-BRAL-SX207H com Intel® Quad Core, 4GB, 500GB, Gravador de DVD, Leitor de Cartões, HDMI, Wireless, Webcam, LED 15.6\" e Windows 8.1', NULL, 10, '1061.65', 'S', 3, 3),
(13, 'Notebook Lenovo G400S com Intel® Core™ i5-3230M, 4GB, 1TB, Gravador de DVD, Leitor de Cartões, HDMI, Wireless, Webcam, LED 14\" e Windows 8.1', 'Notebook Lenovo G400S com Intel® Core™ i5-3230M, 4GB, 1TB, Gravador de DVD, Leitor de Cartões, HDMI, Wireless, Webcam, LED 14\" e Windows 8.1', NULL, 10, '1399.00', 'S', 3, 6),
(14, 'Impressora Monocromática Laser - Samsung ML-2165', 'Impressora Monocromática Laser - Samsung ML-2165', NULL, 10, '269.00', 'S', 8, 9),
(15, 'Impressora Jato de Tinta HP Designjet T120 ePrinter Series CQ891A#B1K', 'Impressora Jato de Tinta HP Designjet T120 ePrinter Series CQ891A#B1K', NULL, 10, '3959.00', 'S', 8, 5),
(16, 'Impressora HP LaserJet Pro P1102w Wireless com ePrint', 'Impressora HP LaserJet Pro P1102w Wireless com ePrint', NULL, 10, '447.00', 'S', 8, 5),
(17, 'Impressora HP LaserJet Pro P1102 CE651A#696 - Branco/Cinza', 'Impressora HP LaserJet Pro P1102 CE651A#696 - Branco/Cinza', NULL, 10, '381.65', 'S', 8, 5),
(18, 'Pen Drive SanDisk Cruzer Blade 16GB', 'Pen Drive SanDisk Cruzer Blade 16GB', NULL, 10, '29.66', 'S', 14, 12),
(19, 'Pen Drive SanDisk Ultra® Dual Drive com USB 2.0 e Micro-USB 32GB - Preto', 'Pen Drive SanDisk Ultra® Dual Drive com USB 2.0 e Micro-USB 32GB - Preto', NULL, 10, '76.42', 'S', 14, 12),
(20, 'Pen Drive Kingston Data Traveler 101G2 32GB - Roxo', 'Pen Drive Kingston Data Traveler 101G2 32GB - Roxo', NULL, 10, '103.62', 'S', 14, 13),
(21, 'Pen Drive Multilaser Nano 8GB - Preto', 'Pen Drive Multilaser Nano 8GB - Preto', NULL, 10, '27.30', 'S', 14, 14),
(22, 'Tablet Samsung Galaxy Tab 3 Lite SMT111M Branco com Tela 7”, Wi-Fi, 3G, 8GB, Processador Dual Core de 1.2GHz, Câm. 2MP, AGPS, Bluetooth e Android 4.2 - Tablet Samsung Galaxy Tab 3 Lite', 'Tablet Samsung Galaxy Tab 3 Lite SMT111M Branco com Tela 7”, Wi-Fi, 3G, 8GB, Processador Dual Core de 1.2GHz, Câm. 2MP, AGPS, Bluetooth e Android 4.2 - Tablet Samsung Galaxy Tab 3 Lite', NULL, 10, '551.65', 'S', 10, 9),
(23, 'Tablet Samsung Galaxy Tab 4 7.0 com Tela 7”, com TV Digital, 8GB, Processador Quad Core 1.2 Ghz, Câmera 3MP, Wi-Fi, GPS e Android 4.4 - Branco - Tablet Samsung Galaxy Tab 4 7.0 com Tela 7”', 'Tablet Samsung Galaxy Tab 4 7.0 com Tela 7”, com TV Digital, 8GB, Processador Quad Core 1.2 Ghz, Câmera 3MP, Wi-Fi, GPS e Android 4.4 - Branco - Tablet Samsung Galaxy Tab 4 7.0 com Tela 7”', NULL, 10, '662.15', 'S', 10, 9),
(24, 'iPad Air com Tela Retina Apple Wi-Fi com 32GB, Bluetooth 4.0, Câmera HD, Bússola Digital, Tela 9,7\" e iOS 7 - Space GrayiPad Air com Tela Retina Apple Wi-Fi 32GB', 'iPad Air com Tela Retina Apple Wi-Fi com 32GB, Bluetooth 4.0, Câmera HD, Bússola Digital, Tela 9,7\" e iOS 7 - Space GrayiPad Air com Tela Retina Apple Wi-Fi 32GB', NULL, 10, '1528.22', 'S', 10, 2),
(25, 'iPad Air com Tela Retina Apple Wi-Fi + 3G/4G* com 32GB, Bluetooth 4.0, Câmera HD, Bússola Digital, GPS, Tela 9,7\" e iOS 7 - Silver', 'iPad Air com Tela Retina Apple Wi-Fi + 3G/4G* com 32GB, Bluetooth 4.0, Câmera HD, Bússola Digital, GPS, Tela 9,7\" e iOS 7 - Silver', NULL, 10, '1869.15', 'S', 10, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `PRODUTO_CARACTERISTICA`
--

CREATE TABLE `PRODUTO_CARACTERISTICA` (
  `SEQ_PRODUTO_CARACTERISTICA` int(11) NOT NULL,
  `COD_PRODUTO` int(11) NOT NULL,
  `COD_CARACTERISTICA` int(11) NOT NULL,
  `VLR_CARACTERISTICA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `PRODUTO_CARACTERISTICA`
--

INSERT INTO `PRODUTO_CARACTERISTICA` (`SEQ_PRODUTO_CARACTERISTICA`, `COD_PRODUTO`, `COD_CARACTERISTICA`, `VLR_CARACTERISTICA`) VALUES
(1, 1, 1, 'CORE I3'),
(2, 1, 2, 'CORE I5'),
(3, 1, 3, 'CORE I5'),
(4, 1, 4, 'CORE I7'),
(5, 2, 1, '6GB'),
(6, 2, 2, '4GB'),
(7, 2, 3, '4GB'),
(8, 2, 4, '6GB'),
(9, 3, 1, '500GB'),
(10, 3, 2, '500GB'),
(11, 3, 3, '1TB'),
(12, 3, 4, '1TB'),
(13, 4, 1, '20GB'),
(14, 4, 2, '20GB'),
(15, 4, 3, '30GB'),
(16, 4, 4, '30GB'),
(17, 5, 1, 'WINDOWS 8'),
(18, 5, 2, 'WINDOWS 8.1'),
(19, 5, 3, 'WINDOWS 8.1'),
(20, 5, 4, 'WINDOWS 8'),
(21, 6, 1, '14\"'),
(22, 6, 2, '14\"'),
(23, 6, 3, '14\"'),
(24, 6, 4, '14\"'),
(25, 7, 1, 'PRETO'),
(26, 7, 2, 'PRETO'),
(27, 7, 3, 'BRANCO'),
(28, 7, 4, 'PRETO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `PROMOCAO`
--

CREATE TABLE `PROMOCAO` (
  `COD_PROMOCAO` int(11) NOT NULL,
  `NOM_PROMOCAO` varchar(45) DEFAULT 'PROMOÇÃO ESPETACULAR',
  `DTA_HOR_INI_PROMOCAO` datetime NOT NULL,
  `DTA_HOR_FIM_PROMOCAO` datetime NOT NULL,
  `IDF_FRETE_GRATIS` varchar(1) DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `PROMOCAO`
--

INSERT INTO `PROMOCAO` (`COD_PROMOCAO`, `NOM_PROMOCAO`, `DTA_HOR_INI_PROMOCAO`, `DTA_HOR_FIM_PROMOCAO`, `IDF_FRETE_GRATIS`) VALUES
(1, 'PROMOÇÃO ESPETACULAR', '2020-04-10 00:00:00', '2020-04-30 23:59:59', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `PROMOCAO_PRODUTO`
--

CREATE TABLE `PROMOCAO_PRODUTO` (
  `COD_PROMOCAO` int(11) NOT NULL,
  `COD_PRODUTO` int(11) NOT NULL,
  `COD_CONDICAO_PAGAMENTO` int(11) NOT NULL,
  `PCO_PRODUTO` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `PROMOCAO_PRODUTO`
--

INSERT INTO `PROMOCAO_PRODUTO` (`COD_PROMOCAO`, `COD_PRODUTO`, `COD_CONDICAO_PAGAMENTO`, `PCO_PRODUTO`) VALUES
(1, 1, 1, '1979.10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `SITUACAO_COMPRA`
--

CREATE TABLE `SITUACAO_COMPRA` (
  `COD_SITUACAO_COMPRA` int(11) NOT NULL,
  `DSC_SITUACAO_COMPRA` varchar(45) NOT NULL,
  `IDF_ATIVO` varchar(1) DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `SITUACAO_COMPRA`
--

INSERT INTO `SITUACAO_COMPRA` (`COD_SITUACAO_COMPRA`, `DSC_SITUACAO_COMPRA`, `IDF_ATIVO`) VALUES
(1, 'PEDIDO CONCLUÍDO', 'S'),
(2, 'PAGAMENTO APROVADO', 'S'),
(3, 'PRODUTO EM SEPARAÇÃO', 'S'),
(4, 'PRODUTO ENTREGUE A TRANSPORTADORA', 'S'),
(5, 'PRODUTO ENTREGUE', 'S'),
(6, 'COMPRA CANCELADA', 'S'),
(7, 'PRODUTO DEVOLVIDO', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela `TIPO_USUARIO`
--

CREATE TABLE `TIPO_USUARIO` (
  `COD_TIPO_USUARIO` int(11) NOT NULL,
  `DSC_TIPO_USUARIO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `TIPO_USUARIO`
--

INSERT INTO `TIPO_USUARIO` (`COD_TIPO_USUARIO`, `DSC_TIPO_USUARIO`) VALUES
(1, 'GERENTE'),
(2, 'FUNCIONARIO'),
(3, 'CLIENTE'),
(4, 'FORNECEDOR'),
(6, 'PROGRAMADOR'),
(7, 'ANALISTA DE SUPORTE'),
(8, 'ANALISTA DE SISTEMA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `USUARIO`
--

CREATE TABLE `USUARIO` (
  `COD_USUARIO` int(11) NOT NULL,
  `NOM_USUARIO` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(252) NOT NULL,
  `DTA_HOR_CRIACAO_USUARIO` datetime NOT NULL,
  `IDF_ATIVO` varchar(1) DEFAULT 'S',
  `COD_TIPO_USUARIO` int(11) NOT NULL,
  `password_resets` varchar(250) DEFAULT NULL,
  `remember_token` varchar(250) DEFAULT NULL
) ;

--
-- Extraindo dados da tabela `USUARIO`
--

INSERT INTO `USUARIO` (`COD_USUARIO`, `NOM_USUARIO`, `email`, `password`, `DTA_HOR_CRIACAO_USUARIO`, `IDF_ATIVO`, `COD_TIPO_USUARIO`, `password_resets`, `remember_token`) VALUES
(3, 'ANDERSON LOPES DE SIQUEIRA', 'contato@andersonls.com.br', '$2y$10$RxiLuDTzTSQWf4Zp4wnTYuAzbXR7rD0aLAfdMyc2juw4UP0cJCJQe', '2020-10-23 22:49:35', 'S', 3, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ACOMPANHAMENTO_COMPRA`
--
ALTER TABLE `ACOMPANHAMENTO_COMPRA`
  ADD PRIMARY KEY (`SEQ_ACOMPANHAMENTO_COMPRA`);

--
-- Índices para tabela `CARACTERISTICA`
--
ALTER TABLE `CARACTERISTICA`
  ADD PRIMARY KEY (`COD_CARACTERISTICA`);

--
-- Índices para tabela `CATEGORIA`
--
ALTER TABLE `CATEGORIA`
  ADD PRIMARY KEY (`COD_CATEGORIA`),
  ADD KEY `COD_DEPARTAMENTO` (`COD_DEPARTAMENTO`);

--
-- Índices para tabela `CLIENTE`
--
ALTER TABLE `CLIENTE`
  ADD PRIMARY KEY (`COD_CLIENTE`);

--
-- Índices para tabela `COMPRA`
--
ALTER TABLE `COMPRA`
  ADD PRIMARY KEY (`NUM_COMPRA`),
  ADD KEY `COD_CLIENTE` (`COD_CLIENTE`),
  ADD KEY `COD_CONDICAO_PAGAMENTO` (`COD_CONDICAO_PAGAMENTO`);

--
-- Índices para tabela `CONDICAO_PAGAMENTO`
--
ALTER TABLE `CONDICAO_PAGAMENTO`
  ADD PRIMARY KEY (`COD_CONDICAO_PAGAMENTO`);

--
-- Índices para tabela `DEPARTAMENTO`
--
ALTER TABLE `DEPARTAMENTO`
  ADD PRIMARY KEY (`COD_DEPARTAMENTO`),
  ADD KEY `COD_GRUPO` (`COD_GRUPO`);

--
-- Índices para tabela `FABRICANTE`
--
ALTER TABLE `FABRICANTE`
  ADD PRIMARY KEY (`COD_FABRICANTE`);

--
-- Índices para tabela `GRUPO`
--
ALTER TABLE `GRUPO`
  ADD PRIMARY KEY (`COD_GRUPO`);

--
-- Índices para tabela `ITEM_COMPRA`
--
ALTER TABLE `ITEM_COMPRA`
  ADD PRIMARY KEY (`NUM_ITEM_COMPRA`),
  ADD KEY `COD_PRODUTO` (`COD_PRODUTO`),
  ADD KEY `NUM_COMPRA` (`NUM_COMPRA`);

--
-- Índices para tabela `PRAZO_COND_PAGAMENTO`
--
ALTER TABLE `PRAZO_COND_PAGAMENTO`
  ADD PRIMARY KEY (`COD_CONDICAO_PAGAMENTO`,`NUM_PARCELAS`);

--
-- Índices para tabela `PRODUTO`
--
ALTER TABLE `PRODUTO`
  ADD PRIMARY KEY (`COD_PRODUTO`),
  ADD KEY `COD_CATEGORIA` (`COD_CATEGORIA`),
  ADD KEY `COD_FABRICANTE` (`COD_FABRICANTE`);

--
-- Índices para tabela `PRODUTO_CARACTERISTICA`
--
ALTER TABLE `PRODUTO_CARACTERISTICA`
  ADD PRIMARY KEY (`SEQ_PRODUTO_CARACTERISTICA`),
  ADD KEY `COD_PRODUTO` (`COD_PRODUTO`),
  ADD KEY `COD_CARACTERISTICA` (`COD_CARACTERISTICA`);

--
-- Índices para tabela `PROMOCAO`
--
ALTER TABLE `PROMOCAO`
  ADD PRIMARY KEY (`COD_PROMOCAO`);

--
-- Índices para tabela `PROMOCAO_PRODUTO`
--
ALTER TABLE `PROMOCAO_PRODUTO`
  ADD PRIMARY KEY (`COD_PROMOCAO`,`COD_PRODUTO`,`COD_CONDICAO_PAGAMENTO`),
  ADD KEY `COD_PRODUTO` (`COD_PRODUTO`),
  ADD KEY `COD_CONDICAO_PAGAMENTO` (`COD_CONDICAO_PAGAMENTO`);

--
-- Índices para tabela `SITUACAO_COMPRA`
--
ALTER TABLE `SITUACAO_COMPRA`
  ADD PRIMARY KEY (`COD_SITUACAO_COMPRA`);

--
-- Índices para tabela `TIPO_USUARIO`
--
ALTER TABLE `TIPO_USUARIO`
  ADD PRIMARY KEY (`COD_TIPO_USUARIO`);

--
-- Índices para tabela `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`COD_USUARIO`),
  ADD UNIQUE KEY `UQ_USUARIO_EMAIL` (`email`),
  ADD KEY `FK_USUARIO_TIPO_USUARIO` (`COD_TIPO_USUARIO`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ACOMPANHAMENTO_COMPRA`
--
ALTER TABLE `ACOMPANHAMENTO_COMPRA`
  MODIFY `SEQ_ACOMPANHAMENTO_COMPRA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `CARACTERISTICA`
--
ALTER TABLE `CARACTERISTICA`
  MODIFY `COD_CARACTERISTICA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `CATEGORIA`
--
ALTER TABLE `CATEGORIA`
  MODIFY `COD_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de tabela `CLIENTE`
--
ALTER TABLE `CLIENTE`
  MODIFY `COD_CLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `COMPRA`
--
ALTER TABLE `COMPRA`
  MODIFY `NUM_COMPRA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `CONDICAO_PAGAMENTO`
--
ALTER TABLE `CONDICAO_PAGAMENTO`
  MODIFY `COD_CONDICAO_PAGAMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `DEPARTAMENTO`
--
ALTER TABLE `DEPARTAMENTO`
  MODIFY `COD_DEPARTAMENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `FABRICANTE`
--
ALTER TABLE `FABRICANTE`
  MODIFY `COD_FABRICANTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `GRUPO`
--
ALTER TABLE `GRUPO`
  MODIFY `COD_GRUPO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `ITEM_COMPRA`
--
ALTER TABLE `ITEM_COMPRA`
  MODIFY `NUM_ITEM_COMPRA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `PRODUTO`
--
ALTER TABLE `PRODUTO`
  MODIFY `COD_PRODUTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `PRODUTO_CARACTERISTICA`
--
ALTER TABLE `PRODUTO_CARACTERISTICA`
  MODIFY `SEQ_PRODUTO_CARACTERISTICA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `PROMOCAO`
--
ALTER TABLE `PROMOCAO`
  MODIFY `COD_PROMOCAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `SITUACAO_COMPRA`
--
ALTER TABLE `SITUACAO_COMPRA`
  MODIFY `COD_SITUACAO_COMPRA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `TIPO_USUARIO`
--
ALTER TABLE `TIPO_USUARIO`
  MODIFY `COD_TIPO_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `USUARIO`
--
ALTER TABLE `USUARIO`
  MODIFY `COD_USUARIO` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `CATEGORIA`
--
ALTER TABLE `CATEGORIA`
  ADD CONSTRAINT `CATEGORIA_ibfk_1` FOREIGN KEY (`COD_DEPARTAMENTO`) REFERENCES `DEPARTAMENTO` (`COD_DEPARTAMENTO`);

--
-- Limitadores para a tabela `COMPRA`
--
ALTER TABLE `COMPRA`
  ADD CONSTRAINT `COMPRA_ibfk_1` FOREIGN KEY (`COD_CLIENTE`) REFERENCES `CLIENTE` (`COD_CLIENTE`),
  ADD CONSTRAINT `COMPRA_ibfk_2` FOREIGN KEY (`COD_CONDICAO_PAGAMENTO`) REFERENCES `CONDICAO_PAGAMENTO` (`COD_CONDICAO_PAGAMENTO`);

--
-- Limitadores para a tabela `DEPARTAMENTO`
--
ALTER TABLE `DEPARTAMENTO`
  ADD CONSTRAINT `DEPARTAMENTO_ibfk_1` FOREIGN KEY (`COD_GRUPO`) REFERENCES `GRUPO` (`COD_GRUPO`);

--
-- Limitadores para a tabela `ITEM_COMPRA`
--
ALTER TABLE `ITEM_COMPRA`
  ADD CONSTRAINT `ITEM_COMPRA_ibfk_1` FOREIGN KEY (`COD_PRODUTO`) REFERENCES `PRODUTO` (`COD_PRODUTO`),
  ADD CONSTRAINT `ITEM_COMPRA_ibfk_2` FOREIGN KEY (`NUM_COMPRA`) REFERENCES `COMPRA` (`NUM_COMPRA`);

--
-- Limitadores para a tabela `PRAZO_COND_PAGAMENTO`
--
ALTER TABLE `PRAZO_COND_PAGAMENTO`
  ADD CONSTRAINT `PRAZO_COND_PAGAMENTO_ibfk_1` FOREIGN KEY (`COD_CONDICAO_PAGAMENTO`) REFERENCES `CONDICAO_PAGAMENTO` (`COD_CONDICAO_PAGAMENTO`);

--
-- Limitadores para a tabela `PRODUTO`
--
ALTER TABLE `PRODUTO`
  ADD CONSTRAINT `PRODUTO_ibfk_1` FOREIGN KEY (`COD_CATEGORIA`) REFERENCES `CATEGORIA` (`COD_CATEGORIA`),
  ADD CONSTRAINT `PRODUTO_ibfk_2` FOREIGN KEY (`COD_FABRICANTE`) REFERENCES `FABRICANTE` (`COD_FABRICANTE`);

--
-- Limitadores para a tabela `PRODUTO_CARACTERISTICA`
--
ALTER TABLE `PRODUTO_CARACTERISTICA`
  ADD CONSTRAINT `PRODUTO_CARACTERISTICA_ibfk_1` FOREIGN KEY (`COD_PRODUTO`) REFERENCES `PRODUTO` (`COD_PRODUTO`),
  ADD CONSTRAINT `PRODUTO_CARACTERISTICA_ibfk_2` FOREIGN KEY (`COD_CARACTERISTICA`) REFERENCES `CARACTERISTICA` (`COD_CARACTERISTICA`);

--
-- Limitadores para a tabela `PROMOCAO_PRODUTO`
--
ALTER TABLE `PROMOCAO_PRODUTO`
  ADD CONSTRAINT `PROMOCAO_PRODUTO_ibfk_1` FOREIGN KEY (`COD_PROMOCAO`) REFERENCES `PROMOCAO` (`COD_PROMOCAO`),
  ADD CONSTRAINT `PROMOCAO_PRODUTO_ibfk_2` FOREIGN KEY (`COD_PRODUTO`) REFERENCES `PRODUTO` (`COD_PRODUTO`),
  ADD CONSTRAINT `PROMOCAO_PRODUTO_ibfk_3` FOREIGN KEY (`COD_CONDICAO_PAGAMENTO`) REFERENCES `CONDICAO_PAGAMENTO` (`COD_CONDICAO_PAGAMENTO`);

--
-- Limitadores para a tabela `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD CONSTRAINT `FK_USUARIO_TIPO_USUARIO` FOREIGN KEY (`COD_TIPO_USUARIO`) REFERENCES `TIPO_USUARIO` (`COD_TIPO_USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
