-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 18-Fev-2018 às 13:09
-- Versão do servidor: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbase_coman_aprendendo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anotacoes`
--

DROP TABLE IF EXISTS `anotacoes`;
CREATE TABLE IF NOT EXISTS `anotacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_destinatario` varchar(220) CHARACTER SET utf8 NOT NULL,
  `observacoes` text CHARACTER SET utf8,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `anotacoes`
--

INSERT INTO `anotacoes` (`id`, `nome_destinatario`, `observacoes`, `created`, `modified`) VALUES
(1, 'Andre de Lima Andrade', 'Autonomo de Retratos, filho de Antonio Andrade Neto e de Maria Tom&eacute; Lima Andrade, com alternancia de endere&ccedil;o na casa do pai - Sitio Cajui (logo depois da entrada da mina e antes do balneario Cruz das Pedras) e na casa da m&atilde;e - centro do Distrito de Jos&eacute; de Alencar - casa vizinha ao sal&atilde;o paroquial na lateral da Igreja Cat&oacute;lica - Distrito de Alencar/Iguatu-CE', '2017-10-21 00:00:00', '2017-10-22 09:32:44'),
(2, 'Caubi Candido da Silva', 'Deficiente - uma das pernas amputadas; casa num cercado com acesso do mesmo lado para terras do ex-vereador Antonio do Carmo; S&iacute;tio V&aacute;rzea Grande - Distrito de Jos&eacute; de Alencar - Telefone de Contato 88 99713-5245', '2017-10-22 09:39:16', NULL),
(3, 'Maria Socorro Araujo de Alencar', 'Viuva (foi casada com o ex-deputado Erasmo Rodovalho de Alencar), RG 20000290054290 e CPF 989.077.003-20, residente na Rua Francisco Holanda Montenegro, 445 - Distrito de Jos&eacute; de Alencar; tamb&eacute;m pode ser encontrada na ch&aacute;cara &agrave; margem da Estrada para o S&iacute;tio Estrada, no S&iacute;tio Catol&eacute; dos Beneditos, logo ap&oacute;s a Piladeira de Arroz e entrada para o s&iacute;tio v&aacute;rzea de fora/varzinha', '2017-10-22 09:42:29', NULL),
(4, 'Jose Nilton de Araujo', 'S&iacute;tio Estrada, Distrito de Jos&eacute; de Alencar, final da Pracinha, pr&oacute;ximo a casa dos pais do Prefeito Ednaldo LAvor; Falecido em data de 09/12/2016 - informa&ccedil;&otilde;es prestadas pela filha Maria Derlandia de Araujo', '2017-10-22 09:46:15', NULL),
(5, 'Roseli do Carmo Lima', 'Irm&atilde; de Rosangela \"Rosa\", S&iacute;tio Caj&aacute;s - casa dos pais - refer&ecirc;ncia acesso pela Igreja Cat&oacute;lica passando na lateral da casa do ex-vererador Antonio do Carmo indo at&eacute; o final do corredor - casa de taipa; tamb&eacute;m podendo ser encontrada no S&iacute;tio Carrapicho de Baixo - lado das Vertentes - onde est&aacute; amigada com \"Antonio Ca&ccedil;ote\"', '2017-10-22 09:48:48', NULL),
(6, 'Maria Gerusa Martins de Araujo', 'Residente a margem da Rodovia, quase em frente ao Posto de Combust&iacute;vel, vizinho a casa de Paulo e Neide, im&oacute;veis do projeto Casa Popular - Conjunto Novo Alencar - Distrito de Jos&eacute; de Alencar - CPF 035.397.623-70; promovente da a&ccedil;&atilde;o contra Andre de Lima Andrade', '2017-10-22 09:51:36', NULL),
(7, 'Antonio Rodrigues Silva Filho', 'Conhecido por Geninho Franco, radialista, trabalhou na cidade de Catarina-CE, telefone de contato (83) 9817-8712, com endereÃ§o na casa de familaires (mÃ£e e filhos) no Alto da Gangorra, 1Âª Travessa, casa alpendrada, Distrito de JosÃ© de Alencar', '2017-10-31 05:14:03', NULL),
(8, 'Cicera Medeiros dos Santos', 'Trabalha na Dakota, reside no SÃ­tio Pitombeira, Distrito de JosÃ© de Alencar, 2Âª Casa, estrada de acesso na lateral da fÃ¡brica magnesita; foi amigada com o irmÃ£o de graÃ§a do JECC, Luciano Ferreira Lima (contato deste 9706-5058 - Rua Manoel Alexandre - \"Beira Fresca\", casa de nÂº 389 - Prado)', '2017-10-31 05:16:50', NULL),
(9, 'Francisco Rodrigues da Costa', 'Conhecido por \"Catarina\", disse ser primo do Coronel Gomes Filho; perna amputada; residÃªncia na Avenida Amalia Brasil casa de nÂº 275 - Vila Moura, vizinho a residÃªncia alpendrada de nÂº 277', '2017-10-31 10:26:37', NULL),
(10, 'Sebastiana Bernardo da Silva', 'Travessa da Rua Manoel Camilo, casa de nÂº 10 - Vila Neuma; referÃªncia fica entre o comercio de seu manelzinho e a Rua Tome de Souza', '2017-11-01 09:52:34', NULL),
(11, 'James Bandeira da Silva', 'Rua SÃ£o Gabriel, nÂº 168 - Casa dos Pais; fica prÃ³ximo a esquina com a Travessa Amalia Brasil II - do Mercantil do Senhor CÃ¢ndido; filho de Jose Sandoval Bandeira e Marlene Miguel da Silva', '2017-11-01 09:53:43', NULL),
(12, 'Adonias Luciano Guedes de Caldas', 'Motorista do Ã´nibus Escolar do SÃ­tio TrÃªs IrmÃ£os a Canabrava; residÃªncia no SÃ­tio Barriga, estando em casa por volta das 18h00; telefone de contato 9414-3827 e 9955-7494', '2017-11-01 09:56:33', NULL),
(13, 'Antonieta Batista de Souza Carvalho', 'Conhecida por Nem; Ã© irmÃ£ de Ivanir Carvalho do Altiplano; SÃ­tio Bravo, no rabo da gata, casa dos pais; residÃªncia fica na Rua 18 do Conjunto Altiplano; telefone de contato 9771-1151', '2017-11-01 09:58:51', NULL),
(14, 'Yara Benedito da Silva', 'Rua CiÃ­cero Vieira Alves, ou seja, Rua do Meio, casa de nÂº 289 - Bairro Chapadinha', '2017-11-01 10:00:28', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_classe` varchar(220) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `classes`
--

INSERT INTO `classes` (`id`, `nome_classe`, `created`, `modified`) VALUES
(1, 'ControleAnotacao', '2017-10-30 17:01:59', NULL),
(2, 'ControleFim', '2017-10-30 17:02:00', NULL),
(3, 'ControleHome', '2017-10-30 17:02:01', NULL),
(4, 'ControleLogin', '2017-10-30 17:02:01', NULL),
(5, 'ControleMandado', '2017-10-30 17:02:02', NULL),
(6, 'ControleNiveisAcesso', '2017-10-30 17:02:03', NULL),
(7, 'ControleRota', '2017-10-30 17:02:03', NULL),
(8, 'ControleSitUsuario', '2017-10-30 17:02:04', NULL),
(9, 'ControleUsuario', '2017-10-30 17:02:04', NULL),
(10, 'ControleVara', '2017-10-30 17:02:05', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fins`
--

DROP TABLE IF EXISTS `fins`;
CREATE TABLE IF NOT EXISTS `fins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_fim` varchar(25) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fins`
--

INSERT INTO `fins` (`id`, `nome_fim`, `created`, `modified`) VALUES
(1, 'Citacao e Intimacao', '2017-10-19 00:00:00', '2017-10-20 16:08:26'),
(2, 'Intimacao', '2017-10-19 00:00:00', NULL),
(4, 'Oficio', '2017-10-20 15:58:29', '2017-10-21 11:21:57'),
(5, 'Busca e Apreensao', '2017-10-20 16:08:37', NULL),
(6, 'Despejo', '2017-10-21 11:22:17', NULL),
(7, 'NotificaÃ§Ã£o', '2017-10-30 16:52:26', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `mandados`
--

DROP TABLE IF EXISTS `mandados`;
CREATE TABLE IF NOT EXISTS `mandados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origem` int(6) NOT NULL DEFAULT '0',
  `processo` varchar(45) NOT NULL,
  `destinatario` varchar(220) NOT NULL,
  `vara_id` int(11) NOT NULL,
  `fim_id` int(11) NOT NULL,
  `rota_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fim_id` (`fim_id`),
  KEY `rota_id` (`rota_id`),
  KEY `user_id` (`user_id`),
  KEY `vara_id` (`vara_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `mandados`
--

INSERT INTO `mandados` (`id`, `origem`, `processo`, `destinatario`, `vara_id`, `fim_id`, `rota_id`, `user_id`, `created`, `modified`) VALUES
(1, 5793, '43627-40.2017', 'Antonio Diego Pereira da Silva', 2, 1, 3, 1, '2017-10-23 00:00:00', '2017-10-23 00:00:00'),
(2, 5793, '43627-40.2017', 'Maria Sonia Feitosa Silva', 2, 2, 3, 1, '2017-10-23 21:38:34', NULL),
(3, 2002, '49946-58.2016', 'Gilsara Alves de Lavor', 3, 2, 2, 1, '2017-10-23 21:42:07', NULL),
(4, 1282, '44126-24.2017', 'Debora Nayane Soares da Silva', 1, 2, 3, 1, '2017-10-23 21:42:53', NULL),
(5, 1286, '44135-83.2017', 'Expedito Reinaldo de Souza', 1, 2, 6, 1, '2017-10-23 21:44:23', NULL),
(6, 1999, '42209-67.2017', 'Bruno Vando Batista de Freitas, Antonia Matos Pereira, Diana Batista de Lima e Ingrid de MendonÃ§a de Lima', 3, 2, 6, 1, '2017-10-23 21:46:03', NULL),
(7, 1281, '44080-35.2017', 'Luiz Alves Leite filho', 1, 1, 5, 1, '2017-10-23 21:47:11', NULL),
(8, 1995, '42794-22.2017', 'Caubi Candido da Silva', 3, 2, 6, 1, '2017-10-23 21:48:27', NULL),
(9, 5798, '50310-98.2014', 'Maria Socorro Araujo de Alencar', 2, 2, 6, 1, '2017-10-23 21:49:12', NULL),
(10, 1975, '42845-33.2017', 'Francisca Siebra Clementino, Maria Siebra de Sousa e Sarah Julie Siebra da Silva', 3, 2, 6, 1, '2017-10-23 21:49:59', NULL),
(11, 1925, 'Oficio 1147', 'SAAE', 3, 4, 6, 1, '2017-10-23 21:50:51', NULL),
(12, 1974, '47257-41.2016', 'Antonio Barboza Alves', 3, 2, 2, 1, '2017-10-23 21:51:25', NULL),
(13, 1267, '41870-11.2017', 'Roseli do Carmo Lima', 1, 2, 6, 1, '2017-10-23 21:52:08', NULL),
(14, 1270, '3191-25.2006', 'Pedro Menino da Silva', 1, 2, 6, 1, '2017-10-23 21:56:02', NULL),
(15, 1969, '48756-31.2014', 'Braz Antonio da Silva', 3, 2, 6, 1, '2017-10-23 21:57:26', NULL),
(16, 5733, '41710-83.2017', 'Maria Gerusa Martins de Araujo', 2, 2, 6, 1, '2017-10-23 21:59:10', NULL),
(17, 5749, 'Oficio 1586', 'Delegado de Policia', 2, 4, 4, 1, '2017-10-23 21:59:53', NULL),
(18, 5762, '30733-08.2012', 'Jose Nilton de Araujo', 2, 2, 6, 1, '2017-10-23 22:00:30', NULL),
(19, 7727, '43627-40.2017', 'Antonio Diego Pereira da Silva', 2, 1, 6, 1, '2017-10-23 22:01:21', NULL),
(20, 7669, '42209-67.2017', 'Dryele Batista Campos, Adaurinete Antunes Batista e Maria das GraÃ§as Camilo da Silva', 3, 2, 6, 1, '2017-10-23 22:02:41', NULL),
(21, 1296, '42939-69.2017', 'Francisca Maria Pontes', 1, 2, 6, 1, '2017-10-23 22:03:57', NULL),
(22, 7575, '41710-83.2017', 'Andre de Lima Andrade', 2, 1, 6, 1, '2017-10-23 22:04:42', NULL),
(23, 5792, '42766-54.2017', 'Antonio Carlos Ferreira do Nascimento', 2, 1, 6, 1, '2017-10-23 22:05:28', NULL),
(24, 1929, '48928-70.2014', 'Josecy Ferreira Lessa', 3, 2, 6, 1, '2017-10-23 22:06:25', NULL),
(25, 7473, 'Oficio 1136', 'DETRAN', 3, 4, 6, 1, '2017-10-23 22:07:10', NULL),
(26, 1910, 'Oficio 1140', 'DETRAN', 3, 4, 6, 1, '2017-10-23 22:07:44', NULL),
(27, 1916, 'Oficio 1844', 'DETRAN', 3, 4, 6, 1, '2017-10-23 22:08:11', NULL),
(28, 1924, 'Oficio 1148', 'DETRAN', 3, 4, 6, 1, '2017-10-23 22:08:50', NULL),
(29, 5752, 'Oficio 1436', 'SAAE', 2, 4, 6, 1, '2017-10-23 22:09:13', NULL),
(30, 5759, 'Oficio 1443', 'INSS', 2, 4, 6, 1, '2017-10-23 22:09:50', NULL),
(31, 1291, '44078-65.2017', 'Jorge Luis Rodrigues Moura', 1, 1, 6, 1, '2017-10-23 22:10:39', NULL),
(32, 1242, '29723-89.2013', 'Rosania Ramalho da Silva', 1, 2, 6, 1, '2017-10-23 22:12:26', NULL),
(33, 5602, '28695-86.2013', 'Francisco Miguel Ferreira de Araujo', 1, 2, 5, 1, '2017-10-23 22:13:15', NULL),
(34, 0, '40916-62.2017', 'Prefeitura Municipal', 3, 2, 4, 1, '2017-10-23 22:13:59', NULL),
(35, 0, '42076-25.2017', 'Andreza Alexandre Freitas', 2, 2, 2, 1, '2017-10-23 22:15:10', NULL),
(36, 1901, '28330-95.2014', 'Lucivania Pereira Lopes', 3, 2, 6, 1, '2017-10-23 22:16:57', NULL),
(37, 8045, '3001839-92.2017', 'Sebastiana Bernardo da Silva', 3, 1, 3, 1, '2017-11-01 10:01:27', '2018-02-17 13:19:00'),
(38, 7998, '98126-42.2015', 'James Bandeira da Silva', 1, 2, 6, 1, '2017-11-01 10:02:09', NULL),
(39, 7983, '44044-90.2017', 'Adonias Luciano Guedes de Caldas', 2, 2, 6, 1, '2017-11-01 10:02:47', NULL),
(40, 8027, '47240-05.2016', 'Antonieta Batista de Souza Carvalho', 2, 2, 6, 1, '2017-11-01 10:03:54', NULL),
(41, 8046, '3001767-08.2017', 'Yara Benedito da Silva', 4, 1, 6, 1, '2017-11-01 10:06:50', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `methodos`
--

DROP TABLE IF EXISTS `methodos`;
CREATE TABLE IF NOT EXISTS `methodos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_method` varchar(220) DEFAULT NULL,
  `nome_menu` varchar(120) DEFAULT NULL,
  `obs` text,
  `classe_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `methodos`
--

INSERT INTO `methodos` (`id`, `nome_method`, `nome_menu`, `obs`, `classe_id`, `created`, `modified`) VALUES
(1, 'index', NULL, NULL, 1, '2017-10-30 17:01:59', NULL),
(2, 'cadastrar', NULL, NULL, 1, '2017-10-30 17:01:59', NULL),
(3, 'visualizar', NULL, NULL, 1, '2017-10-30 17:01:59', NULL),
(4, 'editar', NULL, NULL, 1, '2017-10-30 17:02:00', NULL),
(5, 'apagar', NULL, NULL, 1, '2017-10-30 17:02:00', NULL),
(6, 'pesquisarDiversos', NULL, NULL, 1, '2017-10-30 17:02:00', NULL),
(7, 'gerarPdf', NULL, NULL, 1, '2017-10-30 17:02:00', NULL),
(8, 'index', NULL, NULL, 2, '2017-10-30 17:02:00', NULL),
(9, 'cadastrar', NULL, NULL, 2, '2017-10-30 17:02:00', NULL),
(10, 'visualizar', NULL, NULL, 2, '2017-10-30 17:02:00', NULL),
(11, 'editar', NULL, NULL, 2, '2017-10-30 17:02:01', NULL),
(12, 'apagar', NULL, NULL, 2, '2017-10-30 17:02:01', NULL),
(13, 'pesquisarFinalidade', NULL, NULL, 2, '2017-10-30 17:02:01', NULL),
(14, 'gerarPdf', NULL, NULL, 2, '2017-10-30 17:02:01', NULL),
(15, 'index', NULL, NULL, 3, '2017-10-30 17:02:01', NULL),
(16, 'login', NULL, NULL, 4, '2017-10-30 17:02:01', NULL),
(17, 'logout', NULL, NULL, 4, '2017-10-30 17:02:01', NULL),
(18, 'recuperarSenha', NULL, NULL, 4, '2017-10-30 17:02:01', NULL),
(19, 'atualizarSenha', NULL, NULL, 4, '2017-10-30 17:02:01', NULL),
(20, 'atualizarSenhaPrivado', NULL, NULL, 4, '2017-10-30 17:02:02', NULL),
(21, 'listarClasseMethodo', NULL, NULL, 4, '2017-10-30 17:02:02', NULL),
(22, 'cadastrarClasse', NULL, NULL, 4, '2017-10-30 17:02:02', NULL),
(23, 'editarPermissao', NULL, NULL, 4, '2017-10-30 17:02:02', NULL),
(24, 'index', NULL, NULL, 5, '2017-10-30 17:02:02', NULL),
(25, 'cadastrarMandado', NULL, NULL, 5, '2017-10-30 17:02:02', NULL),
(26, 'visualizar', NULL, NULL, 5, '2017-10-30 17:02:02', NULL),
(27, 'editar', NULL, NULL, 5, '2017-10-30 17:02:02', NULL),
(28, 'apagar', NULL, NULL, 5, '2017-10-30 17:02:02', NULL),
(29, 'pesquisarMandado', NULL, NULL, 5, '2017-10-30 17:02:02', NULL),
(30, 'gerarPdf', NULL, NULL, 5, '2017-10-30 17:02:02', NULL),
(31, 'index', NULL, NULL, 6, '2017-10-30 17:02:03', NULL),
(32, 'cadastrar', NULL, NULL, 6, '2017-10-30 17:02:03', NULL),
(33, 'visualizar', NULL, NULL, 6, '2017-10-30 17:02:03', NULL),
(34, 'editar', NULL, NULL, 6, '2017-10-30 17:02:03', NULL),
(35, 'apagar', NULL, NULL, 6, '2017-10-30 17:02:03', NULL),
(36, 'index', NULL, NULL, 7, '2017-10-30 17:02:03', NULL),
(37, 'cadastrar', NULL, NULL, 7, '2017-10-30 17:02:03', NULL),
(38, 'visualizar', NULL, NULL, 7, '2017-10-30 17:02:03', NULL),
(39, 'editar', NULL, NULL, 7, '2017-10-30 17:02:03', NULL),
(40, 'apagar', NULL, NULL, 7, '2017-10-30 17:02:03', NULL),
(41, 'index', NULL, NULL, 8, '2017-10-30 17:02:04', NULL),
(42, 'cadastrar', NULL, NULL, 8, '2017-10-30 17:02:04', NULL),
(43, 'visualizar', NULL, NULL, 8, '2017-10-30 17:02:04', NULL),
(44, 'editar', NULL, NULL, 8, '2017-10-30 17:02:04', NULL),
(45, 'apagar', NULL, NULL, 8, '2017-10-30 17:02:04', NULL),
(46, 'index', NULL, NULL, 9, '2017-10-30 17:02:04', NULL),
(47, 'cadastrar', NULL, NULL, 9, '2017-10-30 17:02:04', NULL),
(48, 'visualizar', NULL, NULL, 9, '2017-10-30 17:02:04', NULL),
(49, 'verPerfil', NULL, NULL, 9, '2017-10-30 17:02:04', NULL),
(50, 'editar', NULL, NULL, 9, '2017-10-30 17:02:05', NULL),
(51, 'editarPerfil', NULL, NULL, 9, '2017-10-30 17:02:05', NULL),
(52, 'apagar', NULL, NULL, 9, '2017-10-30 17:02:05', NULL),
(53, 'index', NULL, NULL, 10, '2017-10-30 17:02:05', NULL),
(54, 'cadastrar', NULL, NULL, 10, '2017-10-30 17:02:05', NULL),
(55, 'visualizar', NULL, NULL, 10, '2017-10-30 17:02:05', NULL),
(56, 'editar', NULL, NULL, 10, '2017-10-30 17:02:05', NULL),
(57, 'apagar', NULL, NULL, 10, '2017-10-30 17:02:05', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `niveis_acessos`
--

DROP TABLE IF EXISTS `niveis_acessos`;
CREATE TABLE IF NOT EXISTS `niveis_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_niveis_acesso` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `niveis_acessos`
--

INSERT INTO `niveis_acessos` (`id`, `nome_niveis_acesso`, `created`, `modified`) VALUES
(1, 'Super Administrador', '2017-10-23 15:40:30', NULL),
(2, 'Administrador', '2017-10-23 18:40:02', NULL),
(3, 'Colaborador', '2017-10-23 18:40:38', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes`
--

DROP TABLE IF EXISTS `permissoes`;
CREATE TABLE IF NOT EXISTS `permissoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classe_id` int(11) DEFAULT NULL,
  `methodo_id` int(11) DEFAULT NULL,
  `niveis_acesso_id` int(11) DEFAULT NULL,
  `situacao_permissao` int(11) DEFAULT NULL,
  `menu` int(11) NOT NULL DEFAULT '2',
  `ordem` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=172 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `permissoes`
--

INSERT INTO `permissoes` (`id`, `classe_id`, `methodo_id`, `niveis_acesso_id`, `situacao_permissao`, `menu`, `ordem`, `created`, `modified`) VALUES
(1, 1, 1, 1, 1, 2, NULL, '2017-10-30 17:01:59', NULL),
(2, 1, 1, 2, 1, 2, NULL, '2017-10-30 17:01:59', NULL),
(3, 1, 1, 3, 1, 2, NULL, '2017-10-30 17:01:59', NULL),
(4, 1, 2, 1, 1, 2, NULL, '2017-10-30 17:01:59', NULL),
(5, 1, 2, 2, 1, 2, NULL, '2017-10-30 17:01:59', NULL),
(6, 1, 2, 3, 2, 2, NULL, '2017-10-30 17:01:59', NULL),
(7, 1, 3, 1, 1, 2, NULL, '2017-10-30 17:02:00', NULL),
(8, 1, 3, 2, 1, 2, NULL, '2017-10-30 17:02:00', NULL),
(9, 1, 3, 3, 2, 2, NULL, '2017-10-30 17:02:00', NULL),
(10, 1, 4, 1, 1, 2, NULL, '2017-10-30 17:02:00', NULL),
(11, 1, 4, 2, 2, 2, NULL, '2017-10-30 17:02:00', NULL),
(12, 1, 4, 3, 2, 2, NULL, '2017-10-30 17:02:00', NULL),
(13, 1, 5, 1, 1, 2, NULL, '2017-10-30 17:02:00', NULL),
(14, 1, 5, 2, 2, 2, NULL, '2017-10-30 17:02:00', NULL),
(15, 1, 5, 3, 2, 2, NULL, '2017-10-30 17:02:00', NULL),
(16, 1, 6, 1, 1, 2, NULL, '2017-10-30 17:02:00', NULL),
(17, 1, 6, 2, 1, 2, NULL, '2017-10-30 17:02:00', NULL),
(18, 1, 6, 3, 2, 2, NULL, '2017-10-30 17:02:00', NULL),
(19, 1, 7, 1, 1, 2, NULL, '2017-10-30 17:02:00', NULL),
(20, 1, 7, 2, 1, 2, NULL, '2017-10-30 17:02:00', NULL),
(21, 1, 7, 3, 2, 2, NULL, '2017-10-30 17:02:00', NULL),
(22, 2, 8, 1, 1, 2, NULL, '2017-10-30 17:02:00', NULL),
(23, 2, 8, 2, 1, 2, NULL, '2017-10-30 17:02:00', NULL),
(24, 2, 8, 3, 1, 2, NULL, '2017-10-30 17:02:00', NULL),
(25, 2, 9, 1, 1, 2, NULL, '2017-10-30 17:02:00', NULL),
(26, 2, 9, 2, 1, 2, NULL, '2017-10-30 17:02:00', NULL),
(27, 2, 9, 3, 2, 2, NULL, '2017-10-30 17:02:00', NULL),
(28, 2, 10, 1, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(29, 2, 10, 2, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(30, 2, 10, 3, 2, 2, NULL, '2017-10-30 17:02:01', NULL),
(31, 2, 11, 1, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(32, 2, 11, 2, 2, 2, NULL, '2017-10-30 17:02:01', NULL),
(33, 2, 11, 3, 2, 2, NULL, '2017-10-30 17:02:01', NULL),
(34, 2, 12, 1, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(35, 2, 12, 2, 2, 2, NULL, '2017-10-30 17:02:01', NULL),
(36, 2, 12, 3, 2, 2, NULL, '2017-10-30 17:02:01', NULL),
(37, 2, 13, 1, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(38, 2, 13, 2, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(39, 2, 13, 3, 2, 2, NULL, '2017-10-30 17:02:01', NULL),
(40, 2, 14, 1, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(41, 2, 14, 2, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(42, 2, 14, 3, 2, 2, NULL, '2017-10-30 17:02:01', NULL),
(43, 3, 15, 1, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(44, 3, 15, 2, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(45, 3, 15, 3, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(46, 4, 16, 1, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(47, 4, 16, 2, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(48, 4, 16, 3, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(49, 4, 17, 1, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(50, 4, 17, 2, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(51, 4, 17, 3, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(52, 4, 18, 1, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(53, 4, 18, 2, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(54, 4, 18, 3, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(55, 4, 19, 1, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(56, 4, 19, 2, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(57, 4, 19, 3, 1, 2, NULL, '2017-10-30 17:02:01', NULL),
(58, 4, 20, 1, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(59, 4, 20, 2, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(60, 4, 20, 3, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(61, 4, 21, 1, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(62, 4, 21, 2, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(63, 4, 21, 3, 2, 2, NULL, '2017-10-30 17:02:02', NULL),
(64, 4, 22, 1, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(65, 4, 22, 2, 2, 2, NULL, '2017-10-30 17:02:02', NULL),
(66, 4, 22, 3, 2, 2, NULL, '2017-10-30 17:02:02', NULL),
(67, 4, 23, 1, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(68, 4, 23, 2, 2, 2, NULL, '2017-10-30 17:02:02', NULL),
(69, 4, 23, 3, 2, 2, NULL, '2017-10-30 17:02:02', NULL),
(70, 5, 24, 1, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(71, 5, 24, 2, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(72, 5, 24, 3, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(73, 5, 25, 1, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(74, 5, 25, 2, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(75, 5, 25, 3, 2, 2, NULL, '2017-10-30 17:02:02', NULL),
(76, 5, 26, 1, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(77, 5, 26, 2, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(78, 5, 26, 3, 2, 2, NULL, '2017-10-30 17:02:02', NULL),
(79, 5, 27, 1, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(80, 5, 27, 2, 2, 2, NULL, '2017-10-30 17:02:02', NULL),
(81, 5, 27, 3, 2, 2, NULL, '2017-10-30 17:02:02', NULL),
(82, 5, 28, 1, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(83, 5, 28, 2, 2, 2, NULL, '2017-10-30 17:02:02', NULL),
(84, 5, 28, 3, 2, 2, NULL, '2017-10-30 17:02:02', NULL),
(85, 5, 29, 1, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(86, 5, 29, 2, 1, 2, NULL, '2017-10-30 17:02:02', NULL),
(87, 5, 29, 3, 2, 2, NULL, '2017-10-30 17:02:02', NULL),
(88, 5, 30, 1, 1, 2, NULL, '2017-10-30 17:02:03', NULL),
(89, 5, 30, 2, 1, 2, NULL, '2017-10-30 17:02:03', NULL),
(90, 5, 30, 3, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(91, 6, 31, 1, 1, 2, NULL, '2017-10-30 17:02:03', NULL),
(92, 6, 31, 2, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(93, 6, 31, 3, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(94, 6, 32, 1, 1, 2, NULL, '2017-10-30 17:02:03', NULL),
(95, 6, 32, 2, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(96, 6, 32, 3, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(97, 6, 33, 1, 1, 2, NULL, '2017-10-30 17:02:03', NULL),
(98, 6, 33, 2, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(99, 6, 33, 3, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(100, 6, 34, 1, 1, 2, NULL, '2017-10-30 17:02:03', NULL),
(101, 6, 34, 2, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(102, 6, 34, 3, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(103, 6, 35, 1, 1, 2, NULL, '2017-10-30 17:02:03', NULL),
(104, 6, 35, 2, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(105, 6, 35, 3, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(106, 7, 36, 1, 1, 2, NULL, '2017-10-30 17:02:03', NULL),
(107, 7, 36, 2, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(108, 7, 36, 3, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(109, 7, 37, 1, 1, 2, NULL, '2017-10-30 17:02:03', NULL),
(110, 7, 37, 2, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(111, 7, 37, 3, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(112, 7, 38, 1, 1, 2, NULL, '2017-10-30 17:02:03', NULL),
(113, 7, 38, 2, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(114, 7, 38, 3, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(115, 7, 39, 1, 1, 2, NULL, '2017-10-30 17:02:03', NULL),
(116, 7, 39, 2, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(117, 7, 39, 3, 2, 2, NULL, '2017-10-30 17:02:03', NULL),
(118, 7, 40, 1, 1, 2, NULL, '2017-10-30 17:02:04', NULL),
(119, 7, 40, 2, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(120, 7, 40, 3, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(121, 8, 41, 1, 1, 2, NULL, '2017-10-30 17:02:04', NULL),
(122, 8, 41, 2, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(123, 8, 41, 3, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(124, 8, 42, 1, 1, 2, NULL, '2017-10-30 17:02:04', NULL),
(125, 8, 42, 2, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(126, 8, 42, 3, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(127, 8, 43, 1, 1, 2, NULL, '2017-10-30 17:02:04', NULL),
(128, 8, 43, 2, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(129, 8, 43, 3, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(130, 8, 44, 1, 1, 2, NULL, '2017-10-30 17:02:04', NULL),
(131, 8, 44, 2, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(132, 8, 44, 3, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(133, 8, 45, 1, 1, 2, NULL, '2017-10-30 17:02:04', NULL),
(134, 8, 45, 2, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(135, 8, 45, 3, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(136, 9, 46, 1, 1, 2, NULL, '2017-10-30 17:02:04', NULL),
(137, 9, 46, 2, 1, 2, NULL, '2017-10-30 17:02:04', NULL),
(138, 9, 46, 3, 1, 2, NULL, '2017-10-30 17:02:04', NULL),
(139, 9, 47, 1, 1, 2, NULL, '2017-10-30 17:02:04', NULL),
(140, 9, 47, 2, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(141, 9, 47, 3, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(142, 9, 48, 1, 1, 2, NULL, '2017-10-30 17:02:04', NULL),
(143, 9, 48, 2, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(144, 9, 48, 3, 2, 2, NULL, '2017-10-30 17:02:04', NULL),
(145, 9, 49, 1, 1, 2, NULL, '2017-10-30 17:02:04', NULL),
(146, 9, 49, 2, 1, 2, NULL, '2017-10-30 17:02:04', NULL),
(147, 9, 49, 3, 1, 2, NULL, '2017-10-30 17:02:05', NULL),
(148, 9, 50, 1, 1, 2, NULL, '2017-10-30 17:02:05', NULL),
(149, 9, 50, 2, 2, 2, NULL, '2017-10-30 17:02:05', NULL),
(150, 9, 50, 3, 2, 2, NULL, '2017-10-30 17:02:05', NULL),
(151, 9, 51, 1, 1, 2, NULL, '2017-10-30 17:02:05', NULL),
(152, 9, 51, 2, 1, 2, NULL, '2017-10-30 17:02:05', NULL),
(153, 9, 51, 3, 1, 2, NULL, '2017-10-30 17:02:05', NULL),
(154, 9, 52, 1, 1, 2, NULL, '2017-10-30 17:02:05', NULL),
(155, 9, 52, 2, 2, 2, NULL, '2017-10-30 17:02:05', NULL),
(156, 9, 52, 3, 2, 2, NULL, '2017-10-30 17:02:05', NULL),
(157, 10, 53, 1, 1, 2, NULL, '2017-10-30 17:02:05', NULL),
(158, 10, 53, 2, 2, 2, NULL, '2017-10-30 17:02:05', NULL),
(159, 10, 53, 3, 2, 2, NULL, '2017-10-30 17:02:05', NULL),
(160, 10, 54, 1, 1, 2, NULL, '2017-10-30 17:02:05', NULL),
(161, 10, 54, 2, 2, 2, NULL, '2017-10-30 17:02:05', NULL),
(162, 10, 54, 3, 2, 2, NULL, '2017-10-30 17:02:05', NULL),
(163, 10, 55, 1, 1, 2, NULL, '2017-10-30 17:02:05', NULL),
(164, 10, 55, 2, 2, 2, NULL, '2017-10-30 17:02:05', NULL),
(165, 10, 55, 3, 2, 2, NULL, '2017-10-30 17:02:05', NULL),
(166, 10, 56, 1, 1, 2, NULL, '2017-10-30 17:02:05', NULL),
(167, 10, 56, 2, 2, 2, NULL, '2017-10-30 17:02:05', NULL),
(168, 10, 56, 3, 2, 2, NULL, '2017-10-30 17:02:05', NULL),
(169, 10, 57, 1, 1, 2, NULL, '2017-10-30 17:02:05', NULL),
(170, 10, 57, 2, 2, 2, NULL, '2017-10-30 17:02:05', NULL),
(171, 10, 57, 3, 2, 2, NULL, '2017-10-30 17:02:05', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `rotas`
--

DROP TABLE IF EXISTS `rotas`;
CREATE TABLE IF NOT EXISTS `rotas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_rota` varchar(12) NOT NULL DEFAULT 'Para Editar',
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rotas`
--

INSERT INTO `rotas` (`id`, `nome_rota`, `created`, `modified`) VALUES
(1, 'D', '2017-10-19 00:00:00', NULL),
(2, 'E', '2017-10-19 00:00:00', '2017-10-23 21:39:48'),
(3, 'G', '2017-10-21 13:17:30', '2017-10-23 21:40:12'),
(4, 'I', '2017-10-21 13:37:24', '2017-10-23 21:40:24'),
(5, 'J', '2017-10-23 21:40:31', NULL),
(6, 'O', '2017-10-23 21:40:42', NULL),
(7, 'Editar', '2017-10-30 16:57:51', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `situacoes_users`
--

DROP TABLE IF EXISTS `situacoes_users`;
CREATE TABLE IF NOT EXISTS `situacoes_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_sit_user` varchar(220) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `situacoes_users`
--

INSERT INTO `situacoes_users` (`id`, `nome_sit_user`, `created`, `modified`) VALUES
(1, 'Ativo', '2016-10-13 00:00:00', NULL),
(2, 'Inativo', '2016-10-13 00:00:00', NULL),
(3, 'Aguardando Confirmacao', '2016-10-13 00:00:00', '2016-11-28 23:21:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(220) DEFAULT NULL,
  `email` varchar(220) DEFAULT NULL,
  `password` varchar(220) DEFAULT NULL,
  `recuperar_senha` varchar(50) DEFAULT NULL,
  `foto` varchar(220) DEFAULT NULL,
  `niveis_acesso_id` int(11) DEFAULT NULL,
  `situacoes_user_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `niveis_acesso_id` (`niveis_acesso_id`),
  KEY `situacoes_user_id` (`situacoes_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `recuperar_senha`, `foto`, `niveis_acesso_id`, `situacoes_user_id`, `created`, `modified`) VALUES
(1, 'Oliveira', 'jgoliveira@tjce.jus.br', '202cb962ac59075b964b07152d234b70', '9609f9997b275c423807f6850df55b54', 'oliver.jpg', 1, 1, '2017-10-23 15:11:30', '2018-02-18 10:46:20'),
(2, 'Daniel', 'daniel@coman', '202cb962ac59075b964b07152d234b70', NULL, NULL, 2, 1, '2017-10-23 18:15:04', NULL),
(3, 'Erley', 'erley@coman', '202cb962ac59075b964b07152d234b70', NULL, NULL, 2, 1, '2017-10-23 18:16:16', NULL),
(4, 'Irlando', 'irlando@coman', '202cb962ac59075b964b07152d234b70', NULL, NULL, 2, 1, '2017-10-23 18:16:40', NULL),
(5, 'Jandira', 'jandira@coman', '202cb962ac59075b964b07152d234b70', NULL, 'peixe.jpg', 3, 1, '2017-10-23 18:17:12', '2017-10-30 17:27:07'),
(6, 'Gustavo', 'gustavo@coman', '202cb962ac59075b964b07152d234b70', NULL, 'global-searc.png', 3, 1, '2017-10-23 18:17:46', '2017-10-30 17:40:33'),
(7, 'Tiago Queiroz', 'tiago@estudo', '202cb962ac59075b964b07152d234b70', NULL, 'img2092.jpg', 3, 1, '2018-02-17 08:57:53', '2018-02-17 08:59:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `varas`
--

DROP TABLE IF EXISTS `varas`;
CREATE TABLE IF NOT EXISTS `varas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_vara` varchar(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `varas`
--

INSERT INTO `varas` (`id`, `nome_vara`, `created`, `modified`) VALUES
(1, '1Âª Vara', '2017-10-21 00:00:00', '2017-10-21 12:46:28'),
(2, '2Âª Vara', '2017-10-21 12:46:45', NULL),
(3, '3Âª Vara', '2017-10-21 12:47:00', NULL),
(4, 'JECC', '2017-10-21 12:47:16', '2017-10-21 22:35:54');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `mandados`
--
ALTER TABLE `mandados`
  ADD CONSTRAINT `mandados_ibfk_1` FOREIGN KEY (`fim_id`) REFERENCES `fins` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `mandados_ibfk_2` FOREIGN KEY (`rota_id`) REFERENCES `rotas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mandados_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `mandados_ibfk_4` FOREIGN KEY (`vara_id`) REFERENCES `varas` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`niveis_acesso_id`) REFERENCES `niveis_acessos` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`situacoes_user_id`) REFERENCES `situacoes_users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
