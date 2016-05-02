-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.6.17 - MySQL Community Server (GPL)
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              9.3.0.5037
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura para tabela gardenia_curriculo.curriculo
CREATE TABLE IF NOT EXISTS `curriculo` (
  `curriculo_id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculo_email` varchar(200) DEFAULT NULL,
  `curriculo_senha` varchar(32) DEFAULT NULL,
  `curriculo_nome` varchar(45) DEFAULT NULL,
  `curriculo_datanascimento` date DEFAULT NULL,
  `curriculo_sexo` char(1) DEFAULT NULL,
  `curriculo_naturalidade` varchar(45) DEFAULT NULL,
  `curriculo_identidade` varchar(45) DEFAULT NULL,
  `curriculo_orgao_emissor` varchar(45) DEFAULT NULL,
  `curriculo_habilitacao` tinyint(4) DEFAULT NULL,
  `curriculo_habilitacao_categoria` varchar(45) DEFAULT NULL,
  `curriculo_necessidade_especial` tinyint(4) DEFAULT NULL,
  `curriculo_estado_civil` varchar(45) DEFAULT NULL,
  `curriculo_numero_filhos` int(11) DEFAULT NULL,
  `curriculo_telefone_residencial` varchar(45) DEFAULT NULL,
  `curriculo_telefone_comercial` varchar(45) DEFAULT NULL,
  `curriculo_telefone_celular` varchar(45) DEFAULT NULL,
  `curriculo_qualidades` text,
  `curriculo_motivo_contratar` text,
  `curriculo_salario_atual` float DEFAULT NULL,
  `curriculo_pretensao_salarial` float DEFAULT NULL,
  `curriculo_campo_interesse` varchar(200) DEFAULT NULL,
  `curriculo_nivel_cargo_interesse` varchar(200) DEFAULT NULL,
  `curriculo_localidade_interesse` varchar(200) DEFAULT NULL,
  `curriculo_parentes_empresa` tinyint(4) DEFAULT NULL,
  `curriculo_conheceu_empresa` varchar(200) DEFAULT NULL,
  `curriculo_trabalhou_empresa` tinyint(4) DEFAULT NULL,
  `curriculo_endereco` varchar(200) DEFAULT NULL,
  `curriculo_endereco_numero` int(11) DEFAULT NULL,
  `curriculo_endereco_complemento` varchar(45) DEFAULT NULL,
  `curriculo_endereco_bairro` varchar(200) DEFAULT NULL,
  `curriculo_endereco_cidade` varchar(200) DEFAULT NULL,
  `curriculo_endereco_estado` char(2) DEFAULT NULL,
  `curriculo_endereco_cep` varchar(45) DEFAULT NULL,
  `curriculo_escolaridade` varchar(200) DEFAULT NULL,
  `curriculo_escolaridade_instituicao` varchar(200) DEFAULT NULL,
  `curriculo_escolaridade_curso` varchar(200) DEFAULT NULL,
  `curriculo_escolaridade_estagioatual` varchar(200) DEFAULT NULL,
  `curriculo_escolaridade_datainicio` date DEFAULT NULL,
  `curriculo_escolaridade_datafim` date DEFAULT NULL,
  `curriculo_escolaridade_ingles` varchar(45) DEFAULT NULL,
  `curriculo_escolaridade_informatica` tinyint(4) DEFAULT NULL,
  `curriculo_ultima_atualizacao` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`curriculo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela gardenia_curriculo.curriculo: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `curriculo` DISABLE KEYS */;
INSERT INTO `curriculo` (`curriculo_id`, `curriculo_email`, `curriculo_senha`, `curriculo_nome`, `curriculo_datanascimento`, `curriculo_sexo`, `curriculo_naturalidade`, `curriculo_identidade`, `curriculo_orgao_emissor`, `curriculo_habilitacao`, `curriculo_habilitacao_categoria`, `curriculo_necessidade_especial`, `curriculo_estado_civil`, `curriculo_numero_filhos`, `curriculo_telefone_residencial`, `curriculo_telefone_comercial`, `curriculo_telefone_celular`, `curriculo_qualidades`, `curriculo_motivo_contratar`, `curriculo_salario_atual`, `curriculo_pretensao_salarial`, `curriculo_campo_interesse`, `curriculo_nivel_cargo_interesse`, `curriculo_localidade_interesse`, `curriculo_parentes_empresa`, `curriculo_conheceu_empresa`, `curriculo_trabalhou_empresa`, `curriculo_endereco`, `curriculo_endereco_numero`, `curriculo_endereco_complemento`, `curriculo_endereco_bairro`, `curriculo_endereco_cidade`, `curriculo_endereco_estado`, `curriculo_endereco_cep`, `curriculo_escolaridade`, `curriculo_escolaridade_instituicao`, `curriculo_escolaridade_curso`, `curriculo_escolaridade_estagioatual`, `curriculo_escolaridade_datainicio`, `curriculo_escolaridade_datafim`, `curriculo_escolaridade_ingles`, `curriculo_escolaridade_informatica`, `curriculo_ultima_atualizacao`) VALUES
	(3, 'nandorodpires@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Fernando Rodrigues', '1982-09-28', 'F', 'Belo Horizonte', 'MG12925620', 'SSP', 1, 'AB', 2, 'Solteiro(a)', 0, '', '', '(31) 9820-10904', 'd dsd', 'Porque sou o melhor', 1000, 2000, '', '', '', 0, '', 0, 'Rua Mauritânia', 110, 'Bloco 5 - Apto 78', 'Canaã', 'Belo Horizonte', 'MG', '31749-010', '2', 'PUC Minas', 'Sistemas de Informação', 'Completo', '1990-01-01', '2001-12-01', 'Intermediário', 1, '2016-04-22 16:21:04');
/*!40000 ALTER TABLE `curriculo` ENABLE KEYS */;


-- Copiando estrutura para tabela gardenia_curriculo.escolaridade
CREATE TABLE IF NOT EXISTS `escolaridade` (
  `escolaridade_id` int(11) NOT NULL AUTO_INCREMENT,
  `escolaridade_grau` varchar(200) DEFAULT NULL,
  `escolaridade_ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`escolaridade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela gardenia_curriculo.escolaridade: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `escolaridade` DISABLE KEYS */;
INSERT INTO `escolaridade` (`escolaridade_id`, `escolaridade_grau`, `escolaridade_ativo`) VALUES
	(1, 'Ensino Médio', 1),
	(2, 'Ensino Técnico', 1),
	(3, 'Superior', 1),
	(4, 'Graduação', 1),
	(5, 'Pós-graduação', 1),
	(6, 'MBA', 1),
	(7, 'Mestrado', 1),
	(8, 'Doutorado', 1),
	(9, 'Outros', 1);
/*!40000 ALTER TABLE `escolaridade` ENABLE KEYS */;


-- Copiando estrutura para tabela gardenia_curriculo.experiencia
CREATE TABLE IF NOT EXISTS `experiencia` (
  `experiencia_id` int(11) NOT NULL AUTO_INCREMENT,
  `curriculo_id` int(11) NOT NULL,
  `experiencia_empresa` varchar(200) DEFAULT NULL,
  `experiencia_cargo` varchar(200) DEFAULT NULL,
  `experiencia_area` varchar(200) DEFAULT NULL,
  `experiencia_dataadmissao` date DEFAULT NULL,
  `experiencia_datademissao` date DEFAULT NULL,
  `experiencia_atividades` text,
  `experiencia_referencia1_nome` varchar(200) DEFAULT NULL,
  `experiencia_referencia1_telefone` varchar(45) DEFAULT NULL,
  `experiencia_referencia2_nome` varchar(200) DEFAULT NULL,
  `experiencia_referencia2_telefone` varchar(45) DEFAULT NULL,
  `experiencia_ativo` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`experiencia_id`,`curriculo_id`),
  KEY `fk_experiencia_curriculo_idx` (`curriculo_id`),
  CONSTRAINT `fk_experiencia_curriculo` FOREIGN KEY (`curriculo_id`) REFERENCES `curriculo` (`curriculo_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela gardenia_curriculo.experiencia: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `experiencia` DISABLE KEYS */;
INSERT INTO `experiencia` (`experiencia_id`, `curriculo_id`, `experiencia_empresa`, `experiencia_cargo`, `experiencia_area`, `experiencia_dataadmissao`, `experiencia_datademissao`, `experiencia_atividades`, `experiencia_referencia1_nome`, `experiencia_referencia1_telefone`, `experiencia_referencia2_nome`, `experiencia_referencia2_telefone`, `experiencia_ativo`) VALUES
	(7, 3, 'Olyva Digital', 'Analista Desenvolvedor', 'TI', '2014-02-09', NULL, 'Tes', '', '', '', '', 1);
/*!40000 ALTER TABLE `experiencia` ENABLE KEYS */;


-- Copiando estrutura para tabela gardenia_curriculo.vaga
CREATE TABLE IF NOT EXISTS `vaga` (
  `vaga_id` int(11) NOT NULL AUTO_INCREMENT,
  `vaga_nome` varchar(200) DEFAULT NULL,
  `vaga_localidade` varchar(200) DEFAULT NULL,
  `vaga_descricao` varchar(500) DEFAULT NULL,
  `vaga_data` date DEFAULT NULL,
  PRIMARY KEY (`vaga_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela gardenia_curriculo.vaga: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `vaga` DISABLE KEYS */;
/*!40000 ALTER TABLE `vaga` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
