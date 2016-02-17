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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela stylesheets_intranet.administrador: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` (`administrador_id`, `administrador_email`, `administrador_senha`, `administrador_ativo`, `administrador_nome`) VALUES
	(2, 'nandorodpires@gmail.com', 'c42e3273c1a653caac79188efa0349a9', 1, 'Fernando Rodrigues');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.cliente
DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_tipo` set('PF','PJ') DEFAULT NULL,
  `cliente_cpf_cnpj` varchar(50) DEFAULT NULL,
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
  `cliente_senha` varchar(32) DEFAULT NULL,
  `cliente_acesso` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela stylesheets_intranet.cliente: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`cliente_id`, `cliente_tipo`, `cliente_cpf_cnpj`, `cliente_nome`, `cliente_empresa`, `cliente_email`, `cliente_telefone`, `cliente_celular`, `cliente_endereco`, `cliente_numero`, `cliente_complemento`, `cliente_bairro`, `cliente_cidade`, `cliente_estado`, `cliente_ativo`, `cliente_pre`, `cliente_senha`, `cliente_acesso`) VALUES
	(5, 'PF', NULL, 'Edno ', '', 'edno@yahoo.com.br', '(31) 1111-2222', '(31) 9999-99999', NULL, NULL, NULL, NULL, 'Santa Luzia', 'MG', 1, 0, NULL, 0),
	(6, 'PJ', NULL, 'Carlos Matos', 'Layout', 'contato@lyt.com.br', '', '', NULL, NULL, NULL, NULL, 'Belo Horizonte', 'MG', 1, 0, NULL, 0),
	(7, 'PJ', NULL, 'José Luiz', 'Olyva Digital', 'contato@olyva.com.br', '(31) 3261-6792', '(31) 9961-21118', NULL, NULL, NULL, NULL, 'Belo Horizonte', 'MG', 1, 0, NULL, 0),
	(8, 'PF', NULL, 'Valdir Moura', '', 'valdirfmoura@gmail.com ', '', '(31) 9998-53381', NULL, NULL, NULL, NULL, 'Sarzedo', 'MG', 1, 0, NULL, 0),
	(9, 'PJ', NULL, 'Fernando Rodrigues', 'StyleSheets -Sistemas Web', 'fernando@olyva.com.br', '', '(31) 9820-10904', NULL, NULL, NULL, NULL, 'Belo Horizonte', 'MG', 1, 0, NULL, 0),
	(10, 'PF', NULL, 'Ermilon Junior', NULL, 'ermilonjr@gmail.com', '', '', NULL, NULL, NULL, NULL, 'Santa Luzia', 'MG', 1, 0, NULL, 0);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.configuracoes
DROP TABLE IF EXISTS `configuracoes`;
CREATE TABLE IF NOT EXISTS `configuracoes` (
  `configuracoes_id` int(11) NOT NULL AUTO_INCREMENT,
  `configuracoes_chave` varchar(200) DEFAULT NULL,
  `configuracoes_valor` varchar(200) DEFAULT NULL,
  `configuracoes_ativo` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`configuracoes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela stylesheets_intranet.configuracoes: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `configuracoes` DISABLE KEYS */;
/*!40000 ALTER TABLE `configuracoes` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.controle_horas
DROP TABLE IF EXISTS `controle_horas`;
CREATE TABLE IF NOT EXISTS `controle_horas` (
  `controle_horas_id` int(11) NOT NULL AUTO_INCREMENT,
  `controle_horas_data_inicio` datetime DEFAULT NULL,
  `controle_horas_data_fim` datetime DEFAULT NULL,
  `projeto_id` int(11) NOT NULL,
  PRIMARY KEY (`controle_horas_id`),
  KEY `fk_controle_horas_projeto1_idx` (`projeto_id`),
  CONSTRAINT `fk_controle_horas_projeto1` FOREIGN KEY (`projeto_id`) REFERENCES `projeto` (`projeto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela stylesheets_intranet.controle_horas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `controle_horas` DISABLE KEYS */;
INSERT INTO `controle_horas` (`controle_horas_id`, `controle_horas_data_inicio`, `controle_horas_data_fim`, `projeto_id`) VALUES
	(2, '2016-02-17 16:04:21', '2016-02-17 16:04:40', 1),
	(3, '2016-02-17 16:04:54', '2016-02-17 22:18:17', 1),
	(4, '2016-02-17 17:34:52', '2016-02-18 02:43:53', 1),
	(5, '2016-02-17 17:44:44', '2016-02-17 17:56:01', 1),
	(6, '2016-02-17 17:56:06', '2016-02-17 20:57:03', 2),
	(7, '2016-02-18 08:58:05', '2016-02-18 16:58:08', 2),
	(8, '2016-02-17 18:06:07', '2016-02-17 18:15:47', 1),
	(9, '2016-02-17 18:06:12', '2016-02-17 18:16:17', 2),
	(10, '2016-02-17 18:48:57', '2016-02-17 19:02:53', 2),
	(11, '2016-02-17 18:49:29', '2016-02-17 18:49:36', 1),
	(12, '2016-02-17 18:50:00', '2016-02-17 19:02:49', 1);
/*!40000 ALTER TABLE `controle_horas` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.estado
DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `estado_id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_nome` varchar(200) DEFAULT NULL,
  `estado_sigla` char(2) DEFAULT NULL,
  `estado_ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`estado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela stylesheets_intranet.estado: ~27 rows (aproximadamente)
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


-- Copiando estrutura para tabela stylesheets_intranet.faturamento
DROP TABLE IF EXISTS `faturamento`;
CREATE TABLE IF NOT EXISTS `faturamento` (
  `faturamento_id` int(11) NOT NULL AUTO_INCREMENT,
  `faturamento_valor` float DEFAULT NULL,
  `faturamento_descrição` varchar(200) DEFAULT NULL,
  `faturamento_num_boleto` varchar(200) DEFAULT NULL,
  `faturamento_status` varchar(200) DEFAULT NULL,
  `projeto_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  PRIMARY KEY (`faturamento_id`),
  KEY `fk_faturamento_projeto1_idx` (`projeto_id`),
  KEY `fk_faturamento_cliente1_idx` (`cliente_id`),
  CONSTRAINT `fk_faturamento_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_faturamento_projeto1` FOREIGN KEY (`projeto_id`) REFERENCES `projeto` (`projeto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela stylesheets_intranet.faturamento: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `faturamento` DISABLE KEYS */;
/*!40000 ALTER TABLE `faturamento` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.projeto
DROP TABLE IF EXISTS `projeto`;
CREATE TABLE IF NOT EXISTS `projeto` (
  `projeto_id` int(11) NOT NULL AUTO_INCREMENT,
  `projeto_nome` varchar(200) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `projeto_status` varchar(200) DEFAULT 'Em desenvolvimento',
  `projeto_horas` int(11) DEFAULT NULL,
  `projeto_valor` float DEFAULT NULL,
  `proposta_id` int(11) DEFAULT NULL,
  `projeto_controle_horas` int(11) DEFAULT NULL,
  PRIMARY KEY (`projeto_id`),
  KEY `fk_projeto_cliente1_idx` (`cliente_id`),
  KEY `fk_projeto_proposta1_idx` (`proposta_id`),
  KEY `projeto_controle_horas` (`projeto_controle_horas`),
  CONSTRAINT `fk_projeto_cliente1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_projeto_proposta1` FOREIGN KEY (`proposta_id`) REFERENCES `proposta` (`proposta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela stylesheets_intranet.projeto: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `projeto` DISABLE KEYS */;
INSERT INTO `projeto` (`projeto_id`, `projeto_nome`, `cliente_id`, `projeto_status`, `projeto_horas`, `projeto_valor`, `proposta_id`, `projeto_controle_horas`) VALUES
	(1, 'MediaBus e BackBus', 6, 'Pausado', 230, 7544, 54, 1),
	(2, 'Site Banda Milon & Tchelo', 10, 'Pausado', 50, 0, 55, 1);
/*!40000 ALTER TABLE `projeto` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.proposta
DROP TABLE IF EXISTS `proposta`;
CREATE TABLE IF NOT EXISTS `proposta` (
  `proposta_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_servico_id` int(11) NOT NULL,
  `proposta_tipo_id` int(11) DEFAULT NULL,
  `proposta_numero` varchar(45) DEFAULT NULL,
  `proposta_horas` int(11) DEFAULT NULL,
  `proposta_valor` float DEFAULT NULL,
  `proposta_status` varchar(45) DEFAULT 'Aguardando Resposta',
  `cliente_id` int(11) NOT NULL,
  `proposta_documento` varchar(200) DEFAULT NULL,
  `proposta_data` date NOT NULL,
  `proposta_vencimento` date NOT NULL,
  PRIMARY KEY (`proposta_id`),
  KEY `fk_proposta_cliente_idx` (`cliente_id`),
  KEY `fk_proposta_tipo_servico1` (`tipo_servico_id`),
  KEY `proposta_tipo_id` (`proposta_tipo_id`),
  CONSTRAINT `fk_proposta_proposta_tipo` FOREIGN KEY (`proposta_tipo_id`) REFERENCES `proposta_tipo` (`proposta_tipo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proposta_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_proposta_tipo_servico1` FOREIGN KEY (`tipo_servico_id`) REFERENCES `tipo_servico` (`tipo_servico_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela stylesheets_intranet.proposta: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `proposta` DISABLE KEYS */;
INSERT INTO `proposta` (`proposta_id`, `tipo_servico_id`, `proposta_tipo_id`, `proposta_numero`, `proposta_horas`, `proposta_valor`, `proposta_status`, `cliente_id`, `proposta_documento`, `proposta_data`, `proposta_vencimento`) VALUES
	(53, 6, 2, '053/16', 30, 700, 'Vencida', 5, 'Proposta_053-16.pdf', '2016-01-29', '2016-02-15'),
	(54, 5, 2, '054/16', 230, 7544, 'Aprovada', 6, 'Proposta_054-16.pdf', '2016-02-12', '2016-02-29'),
	(55, 6, 1, '055/16', 50, 0, 'Aprovada', 10, 'Proposta_055-16.pdf', '2016-02-15', '2016-03-15');
/*!40000 ALTER TABLE `proposta` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.proposta_modulo
DROP TABLE IF EXISTS `proposta_modulo`;
CREATE TABLE IF NOT EXISTS `proposta_modulo` (
  `proposta_modulo_id` int(11) NOT NULL AUTO_INCREMENT,
  `proposta_modulo_nome` varchar(200) DEFAULT NULL,
  `proposta_modulo_horas` int(11) DEFAULT NULL,
  `proposta_modulo_valor` float DEFAULT NULL,
  `proposta_id` int(11) NOT NULL,
  PRIMARY KEY (`proposta_modulo_id`),
  KEY `fk_proposta_modulo_proposta1_idx` (`proposta_id`),
  CONSTRAINT `fk_proposta_modulo_proposta1` FOREIGN KEY (`proposta_id`) REFERENCES `proposta` (`proposta_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela stylesheets_intranet.proposta_modulo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `proposta_modulo` DISABLE KEYS */;
/*!40000 ALTER TABLE `proposta_modulo` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.proposta_tipo
DROP TABLE IF EXISTS `proposta_tipo`;
CREATE TABLE IF NOT EXISTS `proposta_tipo` (
  `proposta_tipo_id` int(11) NOT NULL AUTO_INCREMENT,
  `proposta_tipo_nome` varchar(200) DEFAULT NULL,
  `proposta_tipo_ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`proposta_tipo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela stylesheets_intranet.proposta_tipo: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `proposta_tipo` DISABLE KEYS */;
INSERT INTO `proposta_tipo` (`proposta_tipo_id`, `proposta_tipo_nome`, `proposta_tipo_ativo`) VALUES
	(1, 'Parceria', 1),
	(2, 'Comercial', 1);
/*!40000 ALTER TABLE `proposta_tipo` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.site_menu
DROP TABLE IF EXISTS `site_menu`;
CREATE TABLE IF NOT EXISTS `site_menu` (
  `site_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_menu_module` varchar(45) DEFAULT NULL,
  `site_menu_controller` varchar(45) DEFAULT NULL,
  `site_menu_action` varchar(45) DEFAULT NULL,
  `site_menu_label` varchar(45) DEFAULT NULL,
  `site_menu_ordem` int(11) DEFAULT NULL,
  `site_menu_ativo` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`site_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela stylesheets_intranet.site_menu: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `site_menu` DISABLE KEYS */;
INSERT INTO `site_menu` (`site_menu_id`, `site_menu_module`, `site_menu_controller`, `site_menu_action`, `site_menu_label`, `site_menu_ordem`, `site_menu_ativo`) VALUES
	(1, 'site', 'dashboard', 'index', 'Dashboard', 10, 1),
	(2, 'site', 'cliente', 'index', 'Clientes', 20, 1),
	(3, 'site', 'proposta', 'index', 'Propostas', 30, 1),
	(4, 'site', 'auth', 'logout', 'SAIR', 99, 1),
	(5, 'site', 'faturamento', 'index', 'Faturamento', 50, 1),
	(6, 'site', 'controle-horas', 'index', 'Controle Horas', 60, 1),
	(7, 'site', 'configuracoes', 'index', 'Configurações', 70, 1),
	(8, 'site', 'projeto', 'index', 'Projetos', 40, 1);
/*!40000 ALTER TABLE `site_menu` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.tipo_servico
DROP TABLE IF EXISTS `tipo_servico`;
CREATE TABLE IF NOT EXISTS `tipo_servico` (
  `tipo_servico_id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_servico_nome` varchar(200) DEFAULT NULL,
  `tipo_servico_ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`tipo_servico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela stylesheets_intranet.tipo_servico: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_servico` DISABLE KEYS */;
INSERT INTO `tipo_servico` (`tipo_servico_id`, `tipo_servico_nome`, `tipo_servico_ativo`) VALUES
	(5, 'Sistema', 1),
	(6, 'Site', 1),
	(7, 'Hospedagem', 1),
	(8, 'Loja Virtual', 1);
/*!40000 ALTER TABLE `tipo_servico` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
