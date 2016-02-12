-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.17 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.3.0.4992
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela stylesheets_intranet.administrador
DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `administrador_id` int(11) NOT NULL AUTO_INCREMENT,
  `administrador_email` varchar(200) DEFAULT NULL,
  `administrador_senha` varchar(32) DEFAULT NULL,
  `administrador_ativo` tinyint(1) DEFAULT '1',
  `administrador_nome` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`administrador_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela stylesheets_intranet.administrador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` (`administrador_id`, `administrador_email`, `administrador_senha`, `administrador_ativo`, `administrador_nome`) VALUES
	(1, 'nandorodpires@gmail.com', 'c42e3273c1a653caac79188efa0349a9', 1, 'Fernando Rodrigues');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.cliente
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_nome` varchar(200) DEFAULT NULL,
  `cliente_empresa` varchar(200) DEFAULT NULL,
  `cliente_email` varchar(200) DEFAULT NULL,
  `cliente_telefone` varchar(45) DEFAULT NULL,
  `cliente_celular` varchar(45) DEFAULT NULL,
  `cliente_endereco` varchar(200) DEFAULT NULL,
  `cliente_numero` varchar(200) DEFAULT NULL,
  `cliente_complemento` varchar(200) DEFAULT NULL,
  `cliente_bairro` varchar(200) DEFAULT NULL,
  `cliente_cidade` varchar(200) DEFAULT NULL,
  `cliente_estado` varchar(200) DEFAULT NULL,
  `cliente_ativo` tinyint(1) DEFAULT '1',
  `cliente_pre` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela stylesheets_intranet.cliente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`cliente_id`, `cliente_nome`, `cliente_empresa`, `cliente_email`, `cliente_telefone`, `cliente_celular`, `cliente_endereco`, `cliente_numero`, `cliente_complemento`, `cliente_bairro`, `cliente_cidade`, `cliente_estado`, `cliente_ativo`, `cliente_pre`) VALUES
	(1, 'Edno', 'Autônomo', 'edno.mari@gmail.com', NULL, '(31)98615-8716', NULL, NULL, NULL, NULL, 'Santa Luzia', 'MG', 1, 0),
	(3, 'Carlos Matos', 'Layout', 'contato@lyt.com.br', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.estado
DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_nome` varchar(200) DEFAULT NULL,
  `estado_sigla` char(2) DEFAULT NULL,
  `estado_ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela stylesheets_intranet.estado: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` (`estado_id`, `estado_nome`, `estado_sigla`, `estado_ativo`) VALUES
	(1, 'Acre', 'AC', 1),
	(2, 'Alagoas', 'AL', 1),
	(3, 'Amapá ', 'AP', 1),
	(4, 'Amazonas ', 'AM', 1),
	(5, 'Bahia', 'BA', 1),
	(6, 'Ceará', 'CE', 1),
	(7, 'Distrito Federal', 'DF', 1),
	(8, 'Espírito Santo', 'ES', 1),
	(9, 'Goiás', 'GO', 1),
	(10, 'Maranhão', 'MA', 1),
	(11, 'Mato Grosso', 'MT', 1),
	(12, 'Mato Grosso do Sul', 'MS', 1),
	(13, 'Minas Gerais', 'MG', 1),
	(14, 'Pará', 'PA', 1),
	(15, 'Paraíba', 'PB', 1),
	(16, 'Paraná', 'PR', 1),
	(17, 'Pernambuco', 'PE', 1),
	(18, 'Piauí', 'PI', 1),
	(19, 'Rio de Janeiro', 'RJ', 1),
	(20, 'Rio Grande do Norte', 'RN', 1),
	(21, 'Rio Grande do Sul', 'RS', 1),
	(22, 'Rondônia', 'RO', 1),
	(23, 'Roraima', 'RR', 1),
	(24, 'Santa Catarina', 'SC', 1),
	(25, 'São Paulo', 'SP', 1),
	(26, 'Sergipe', 'SE', 1),
	(27, 'Tocantins', 'TO', 1);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.proposta
DROP TABLE IF EXISTS `proposta`;
CREATE TABLE IF NOT EXISTS `proposta` (
  `proposta_id` int(11) NOT NULL AUTO_INCREMENT,
  `proposta_numero` varchar(45) DEFAULT NULL,
  `proposta_valor` float DEFAULT NULL,
  `proposta_status` varchar(45) DEFAULT NULL,
  `cliente_id` int(11) NOT NULL,
  `proposta_data` date NOT NULL,
  `proposta_vencimento` date NOT NULL,
  PRIMARY KEY (`proposta_id`),
  KEY `fk_proposta_cliente_idx` (`cliente_id`),
  CONSTRAINT `fk_proposta_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela stylesheets_intranet.proposta: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `proposta` DISABLE KEYS */;
INSERT INTO `proposta` (`proposta_id`, `proposta_numero`, `proposta_valor`, `proposta_status`, `cliente_id`, `proposta_data`, `proposta_vencimento`) VALUES
	(53, '053/16', 700, 'Aguardando resposta', 1, '2016-01-29', '2016-02-13'),
	(54, '054/16', 7544, 'Aguardando resposta', 3, '2016-02-12', '2016-02-27');
/*!40000 ALTER TABLE `proposta` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.site_menu
DROP TABLE IF EXISTS `site_menu`;
CREATE TABLE IF NOT EXISTS `site_menu` (
  `site_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_menu_module` varchar(200) DEFAULT NULL,
  `site_menu_controller` varchar(200) DEFAULT NULL,
  `site_menu_action` varchar(200) DEFAULT NULL,
  `site_menu_label` varchar(200) DEFAULT NULL,
  `site_menu_ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`site_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela stylesheets_intranet.site_menu: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `site_menu` DISABLE KEYS */;
INSERT INTO `site_menu` (`site_menu_id`, `site_menu_module`, `site_menu_controller`, `site_menu_action`, `site_menu_label`, `site_menu_ativo`) VALUES
	(1, 'site', 'dashboard', 'index', 'Dashboard', 1),
	(2, 'site', 'cliente', 'index', 'Clientes', 1),
	(3, 'site', 'proposta', 'index', 'Propostas', 1),
	(4, 'site', 'auth', 'logout', 'SAIR', 1);
/*!40000 ALTER TABLE `site_menu` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
