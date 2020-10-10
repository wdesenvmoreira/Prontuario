ALTER TABLE `paciente` ADD CONSTRAINT `fk_paciente_contato` FOREIGN KEY (`contato`) REFERENCES `contato`(`id_contato`) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE `paciente` ADD CONSTRAINT `fk_paciente_endereco` FOREIGN KEY (`endereco`) REFERENCES `endereco`(`id`) ON DELETE CASCADE ON UPDATE CASCADE; 
ALTER TABLE `paciente` ADD CONSTRAINT `fk_paciente_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa`(`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE; 

ALTER TABLE `medico` ADD CONSTRAINT `fk_medico_pessoa` FOREIGN KEY (`id_pessoa`) REFERENCES `pessoa`(`id_pessoa`) ON DELETE CASCADE ON UPDATE CASCADE; 

ALTER TABLE `ficha_paciente` ADD CONSTRAINT `fk_ficha_paciente_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente`(`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `ficha_paciente` ADD CONSTRAINT `fk_ficha_paciente_medico` FOREIGN KEY (`id_medico`) REFERENCES `medico`(`id_medico`) ON DELETE CASCADE ON UPDATE CASCADE; 

ALTER TABLE `exame` ADD CONSTRAINT `fk_exame_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente`(`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE; 

ALTER TABLE `laudo` ADD CONSTRAINT `fk_laudo_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `paciente`(`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `laudo` ADD CONSTRAINT `fk_laudo_medico` FOREIGN KEY (`id_medico`) REFERENCES `medico`(`id_medico`) ON DELETE CASCADE ON UPDATE CASCADE; 

ALTER TABLE `ficha_paciente_laudo` ADD CONSTRAINT `fk_ficha_paciente_laudo_laudo` FOREIGN KEY (`id_ficlha_laudo`) REFERENCES `laudo`(`id_laudo`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `ficha_paciente_laudo` ADD CONSTRAINT `fk_ficha_paciente_laudo_paciente` FOREIGN KEY (`id_ficha_paciente`) REFERENCES `paciente`(`id_paciente`) ON DELETE CASCADE ON UPDATE CASCADE; 

ALTER TABLE `ficha_paciente_exame` ADD CONSTRAINT `fk_ficha_paciente_exame_exame` FOREIGN KEY (`id_exame`) REFERENCES `exame`(`id_exame`) ON DELETE CASCADE ON UPDATE CASCADE; ALTER TABLE `ficha_paciente_exame` ADD CONSTRAINT `fk_ficha_paciente_exame_ficha` FOREIGN KEY (`id_ficha_paciente`) REFERENCES `ficha_paciente`(`id_ficha_paciente`) ON DELETE CASCADE ON UPDATE CASCADE; 