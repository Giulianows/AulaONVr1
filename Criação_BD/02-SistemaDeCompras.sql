USE `aulaonco_site_aulas` ;
-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`status_transacoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Status_Transacoes`;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Status_Transacoes` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Nome` VARCHAR(10) NOT NULL ,
   PRIMARY KEY (`Id`));
   
 
 -- -----------------------------------------------------
-- Dados padrão da tabela status_transacoes
-- -----------------------------------------------------
INSERT into Status_Transacoes(nome) values ('Iniciada');

INSERT into Status_Transacoes(nome) values ('Completada');

INSERT into Status_Transacoes(nome) values ('Creditada');


-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`transacoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Transacoes`;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Transacoes` (
	`Id` INT NOT NULL AUTO_INCREMENT ,
	`Usuario_Id` INT NOT NULL ,
	`Valor` REAL NOT NULL,
	`Data` DATETIME NOT NULL ,
	`Status_id` INT NOT NULL ,
	`Transacao_PagSeguro` VARCHAR(10) NOT NULL ,
	PRIMARY KEY (`Id`) ,
	CONSTRAINT `fk_transacao_Usuario`
		FOREIGN KEY (`Usuario_Id` )
			REFERENCES `aulaonco_site_aulas`.`Usuario` (`Id` ),
	CONSTRAINT `fk_transacoes_status_transacoes`
			FOREIGN KEY (`Status_id` )
			REFERENCES `aulaonco_site_aulas`.`status_transacoes` (`Id`)
   );
   
   -- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`creditos`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Creditos`;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Creditos` (
	`Id` INT NOT NULL AUTO_INCREMENT ,
	`Usuario_Id` INT NOT NULL ,
	`Valor` REAL NOT NULL,
	`Saldo_atual` REAL NOT NULL,
	`Data` DATE NOT NULL ,
	`Tipo_transacao` BIT NOT NULL ,
	PRIMARY KEY (`Id`) ,
	CONSTRAINT `fk_creditos_Usuario`
		FOREIGN KEY (`Usuario_Id` )
			REFERENCES `aulaonco_site_aulas`.`Usuario` (`Id` )
)