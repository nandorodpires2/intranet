ALTER TABLE `proposta`
	ADD COLUMN `proposta_tipo_id` INT(11) NULL DEFAULT NULL AFTER `tipo_servico_id`,
	ADD INDEX `proposta_tipo_id` (`proposta_tipo_id`);
	
ALTER TABLE `proposta`
	ADD CONSTRAINT `fk_proposta_proposta_tipo` FOREIGN KEY (`proposta_tipo_id`) REFERENCES `proposta_tipo` (`proposta_tipo_id`) ON UPDATE NO ACTION ON DELETE NO ACTION;
	
ALTER TABLE `projeto`
	CHANGE COLUMN `projeto_status` `projeto_status` VARCHAR(200) NULL DEFAULT 'Em desenvolvimento' AFTER `cliente_id`;
	
ALTER TABLE `projeto`
	ADD COLUMN `projeto_controle_horas` INT(11) NULL DEFAULT NULL AFTER `proposta_id`,
	ADD INDEX `projeto_controle_horas` (`projeto_controle_horas`);