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

-- Copiando estrutura para tabela stylesheets_intranet.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `cliente_id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_nome` varchar(200) DEFAULT NULL,
  `cliente_email` varchar(200) DEFAULT NULL,
  `cliente_telefone` varchar(45) DEFAULT NULL,
  `cliente_celular` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`cliente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela stylesheets_intranet.cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`cliente_id`, `cliente_nome`, `cliente_email`, `cliente_telefone`, `cliente_celular`) VALUES
	(1, 'Edno', 'edno.mari@gmail.com', NULL, '(31)98615-8716');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;


-- Copiando estrutura para tabela stylesheets_intranet.proposta
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Copiando dados para a tabela stylesheets_intranet.proposta: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `proposta` DISABLE KEYS */;
INSERT INTO `proposta` (`proposta_id`, `proposta_numero`, `proposta_valor`, `proposta_status`, `cliente_id`, `proposta_data`, `proposta_vencimento`) VALUES
	(1, '053/16', 700, 'Aguardando resposta', 1, '2016-01-29', '2016-02-13');
/*!40000 ALTER TABLE `proposta` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
