SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `aulaonco_site_aulas` ;
CREATE SCHEMA IF NOT EXISTS `aulaonco_site_aulas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `aulaonco_site_aulas` ;

-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`Nivel Disciplina`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Nivel_Disciplina` ;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Nivel_Disciplina` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Nivel` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`Id`) )
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`cursos_superiores`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Cursos_Superiores`;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Cursos_Superiores` (
	`Id` INT NOT NULL AUTO_INCREMENT ,
	`Nome` VARCHAR(100) NOT NULL ,
        PRIMARY KEY (`Id`));
        

-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`Disciplinas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Disciplinas` ;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Disciplinas` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Nome` VARCHAR(45) NOT NULL ,
  `Nivel_Disciplina_Id` INT NOT NULL ,
  PRIMARY KEY (`Id`),
  CONSTRAINT `fk_Disciplinas_Nivel_Disciplina`
    FOREIGN KEY (`Nivel_Disciplina_Id` )
    REFERENCES `aulaonco_site_aulas`.`Nivel_Disciplina` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`Disciplina_Curso_Superior`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Disciplina_Curso_Superior` ;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Disciplina_Curso_Superior` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Disciplina_Professor_Id` INT NOT NULL ,
  `Curso_Superior_Id` INT NOT NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `index_Disciplina_Curso_Superior_Curso_Superior_Id` (`Curso_Superior_Id` ASC) ,
  INDEX `index_Disciplina_Curso_Superior_Curso_Disciplina_Id` (`Disciplina_Professor_Id` ASC) ,
  CONSTRAINT `fk_Disciplina_Curso_Superior_Disciplinas`
    FOREIGN KEY (`Disciplina_Professor_Id` )
    REFERENCES `aulaonco_site_aulas`.`Disciplina_Professor` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Disciplina_Curso_Superior_Cursos_Superiores`
    FOREIGN KEY (`Curso_Superior_Id` )
    REFERENCES `aulaonco_site_aulas`.`Cursos_Superiores` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
		
-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Usuario` ;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Usuario` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Nome` VARCHAR(45) NOT NULL ,
  `DN` DATE NOT NULL ,
  `Sexo` VARCHAR(45) NOT NULL ,
  `CPF` VARCHAR(45) NOT NULL ,
  `Email` VARCHAR(145) NOT NULL ,
  `Telefone` VARCHAR(45) NOT NULL ,
  `Celular` VARCHAR(45) NOT NULL ,
  `Senha` VARCHAR(45) NOT NULL ,
  `Data_exp` DATETIME,
  `Senha_temp` VARCHAR(45) NOT NULL default '' ,
  PRIMARY KEY (`Id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`Aluno`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Aluno` ;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Aluno` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Usuario_Id` INT NOT NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `index_Aluno_Usuario_Id` (`Usuario_Id` ASC) ,
  CONSTRAINT `fk_Aluno_Usuario`
    FOREIGN KEY (`Usuario_Id` )
    REFERENCES `aulaonco_site_aulas`.`Usuario` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`Professor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Professor` ;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Professor` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Usuario_Id` INT NOT NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `index_Professor_Usuario_Id` (`Usuario_Id` ASC) ,
  CONSTRAINT `fk_Professor_Usuario`
    FOREIGN KEY (`Usuario_Id` )
    REFERENCES `aulaonco_site_aulas`.`Usuario` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`Disciplina_Professor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Disciplina_Professor` ;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Disciplina_Professor` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Disciplina_Id` INT NOT NULL ,
  `Professor_Id` INT NOT NULL ,
  `Valor` INT NOT NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `index_Disciplina_Professor_Professor_Id` (`Professor_Id` ASC) ,
  INDEX `index_Disciplina_Professor_Disciplina_Id` (`Disciplina_Id` ASC) ,
  CONSTRAINT `fk_Disciplina_Professor_Disciplinas`
    FOREIGN KEY (`Disciplina_Id` )
    REFERENCES `aulaonco_site_aulas`.`Disciplinas` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Disciplina_Professor_Professor`
    FOREIGN KEY (`Professor_Id` )
    REFERENCES `aulaonco_site_aulas`.`Professor` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`Aula`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Aula` ;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Aula` (
  `Id` INT NOT NULL AUTO_INCREMENT ,
  `Disciplina_Id` INT NOT NULL ,
  `Aluno_Id` INT NOT NULL ,
  `Professor_Id` INT NOT NULL ,
  `Nome` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `index_Aula_Disciplina_Id` (`Disciplina_Id` ASC) ,
  INDEX `index_Aula_Aluno_id` (`Aluno_Id` ASC) ,
  INDEX `index_Aula_Professor_id` (`Professor_Id` ASC) ,
  CONSTRAINT `fk_Aula_Disciplina`
    FOREIGN KEY (`Disciplina_Id` )
    REFERENCES `aulaonco_site_aulas`.`Disciplinas` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aula_Aluno`
    FOREIGN KEY (`Aluno_Id` )
    REFERENCES `aulaonco_site_aulas`.`Aluno` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Aula_Professor`
    FOREIGN KEY (`Professor_Id` )
    REFERENCES `aulaonco_site_aulas`.`Professor` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `aulaonco_site_aulas`.`Avaliacao`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `aulaonco_site_aulas`.`Avaliacao` ;

CREATE  TABLE IF NOT EXISTS `aulaonco_site_aulas`.`Avaliacao` (
  `Id` INT NOT NULL ,
  `Nota` INT NOT NULL ,
  `Descricao` VARCHAR(45) NOT NULL ,
  `Data` DATE NOT NULL ,
  `Aula_Id` INT NOT NULL ,
  PRIMARY KEY (`Id`) ,
  INDEX `index_Avaliação_Aula_Id` (`Aula_Id` ASC) ,
  CONSTRAINT `fk_Avaliação_Aula`
    FOREIGN KEY (`Aula_Id` )
    REFERENCES `aulaonco_site_aulas`.`Aula` (`Id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
