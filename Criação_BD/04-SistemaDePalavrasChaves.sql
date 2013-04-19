USE `aulaonco_site_aulas` ;
-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`status_transacoes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Palavras_Chaves`;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Palavras_Chaves` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Nome` VARCHAR(50) NOT NULL ,
   PRIMARY KEY (`Id`));
   
   
-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`Disciplinas_Palavras_Chaves`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Disciplina_Palavra_Chave` ;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Disciplina_Palavra_Chave` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Disciplina_Professor_Id` INT NOT NULL ,
  `Palavra_Chave_Id` INT NOT NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `index_Disciplina_Professor_Id` (`Disciplina_Professor_Id` ASC) ,
  INDEX `index_Palavra_Chave_Id` (`Palavra_Chave_Id` ASC) ,
  CONSTRAINT `fk_Disciplina_Palavra_Chave_Disciplina`
    FOREIGN KEY (`Disciplina_Professor_Id` )
    REFERENCES `aulaonco_site_aulas`.`Disciplina_Professor` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Disciplina_Palavra_Chave_Palavra_Chave`
    FOREIGN KEY (`Palavra_Chave_Id` )
    REFERENCES `aulaonco_site_aulas`.`Palavras_Chaves` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`Dias_Semanas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Dias_Semana`;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Dias_Semana` (
	`Id` INT NOT NULL AUTO_INCREMENT ,
	`Nome` VARCHAR(50) NOT NULL ,
	PRIMARY KEY (`Id`)
);
-- -----------------------------------------------------
-- Cria os níveis de curso
-- -----------------------------------------------------
INSERT INTO `Dias_Semana`(`Nome`) VALUES ('Domingo');
INSERT INTO `Dias_Semana`(`Nome`) VALUES ('Segunda-Feira');
INSERT INTO `Dias_Semana`(`Nome`) VALUES ('Terça-Feira');
INSERT INTO `Dias_Semana`(`Nome`) VALUES ('Quarta-Feira');
INSERT INTO `Dias_Semana`(`Nome`) VALUES ('Quinta-Feira');
INSERT INTO `Dias_Semana`(`Nome`) VALUES ('Sexta-Feira');
INSERT INTO `Dias_Semana`(`Nome`) VALUES ('Sábado');


-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`Professor_Horarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Professor_Horarios`;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Professor_Horarios` (
	`Id` INT NOT NULL AUTO_INCREMENT ,
	`Nome` VARCHAR(50) NOT NULL ,
	`Professor_Id` INT NOT NULL ,
	`Dia_Semana_Id` INT NOT NULL ,
	`Ativo` BIT NOT NULL DEFAULT 1 ,
	`Hora_Inicio` VARCHAR(5) NOT NULL ,
	`Hora_Fim` VARCHAR(5) NOT NULL ,
	PRIMARY KEY (`Id`) ,
	CONSTRAINT `fk_Professor_Professor_Horarios`
	FOREIGN KEY (`Professor_Id` )
	REFERENCES `aulaonco_site_aulas`.`Professor` (`Id` )
	ON DELETE NO ACTION
	ON UPDATE NO ACTION,
	CONSTRAINT `fk_Dias_Semana_Professor_Horarios`
	FOREIGN KEY (`Dia_Semana_Id` )
	REFERENCES `aulaonco_site_aulas`.`Dias_Semana` (`Id` )
	ON DELETE NO ACTION
	ON UPDATE NO ACTION
    );