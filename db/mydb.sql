SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`User` (
  `iduser` INT NOT NULL AUTO_INCREMENT,
  `mail` VARCHAR(45) NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `prenom` VARCHAR(45) NOT NULL,
  `mdp` VARCHAR(150) NULL,
  PRIMARY KEY (`iduser`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`QueryType`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`QueryType` (
  `idqueryType` INT NOT NULL AUTO_INCREMENT,
  `libelle` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idqueryType`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Questionnaire`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Questionnaire` (
  `idQuestionnaire` INT NOT NULL AUTO_INCREMENT,
  `timer` INT NOT NULL,
  `nbQuery` INT NOT NULL,
  PRIMARY KEY (`idQuestionnaire`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Question`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Question` (
  `idquery` INT NOT NULL,
  `libelle` VARCHAR(145) NOT NULL,
  `idqueryType` INT NOT NULL,
  `idQuestionnaire` INT NOT NULL,
  PRIMARY KEY (`idquery`),
  INDEX `fk_query_queryType_idx` (`idqueryType` ASC),
  INDEX `fk_query_Questionnaire1_idx` (`idQuestionnaire` ASC),
  CONSTRAINT `fk_query_queryType`
    FOREIGN KEY (`idqueryType`)
    REFERENCES `mydb`.`QueryType` (`idqueryType`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_query_Questionnaire1`
    FOREIGN KEY (`idQuestionnaire`)
    REFERENCES `mydb`.`Questionnaire` (`idQuestionnaire`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Answer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Answer` (
  `idAnswer` INT NOT NULL AUTO_INCREMENT,
  `libelle` VARCHAR(45) NOT NULL,
  `isCorrect` TINYINT(1) NOT NULL,
  `query_idquery` INT NOT NULL,
  PRIMARY KEY (`idAnswer`),
  INDEX `fk_Answer_query1_idx` (`query_idquery` ASC),
  CONSTRAINT `fk_Answer_query1`
    FOREIGN KEY (`query_idquery`)
    REFERENCES `mydb`.`Question` (`idquery`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Passage`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Passage` (
  `idPassage` INT NOT NULL AUTO_INCREMENT,
  `datehour` TIMESTAMP NOT NULL,
  `user_iduser` INT NOT NULL,
  `Questionnaire_idQuestionnaire` INT NOT NULL,
  PRIMARY KEY (`idPassage`),
  INDEX `fk_Passage_user1_idx` (`user_iduser` ASC),
  INDEX `fk_Passage_Questionnaire1_idx` (`Questionnaire_idQuestionnaire` ASC),
  CONSTRAINT `fk_Passage_user1`
    FOREIGN KEY (`user_iduser`)
    REFERENCES `mydb`.`User` (`iduser`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Passage_Questionnaire1`
    FOREIGN KEY (`Questionnaire_idQuestionnaire`)
    REFERENCES `mydb`.`Questionnaire` (`idQuestionnaire`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Passage_has_query`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Passage_has_query` (
  `Passage_idPassage` INT NOT NULL,
  `query_idquery` INT NOT NULL,
  `isFlag` TINYINT(1) NOT NULL,
  PRIMARY KEY (`Passage_idPassage`, `query_idquery`),
  INDEX `fk_Passage_has_query_query1_idx` (`query_idquery` ASC),
  INDEX `fk_Passage_has_query_Passage1_idx` (`Passage_idPassage` ASC),
  CONSTRAINT `fk_Passage_has_query_Passage1`
    FOREIGN KEY (`Passage_idPassage`)
    REFERENCES `mydb`.`Passage` (`idPassage`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Passage_has_query_query1`
    FOREIGN KEY (`query_idquery`)
    REFERENCES `mydb`.`Question` (`idquery`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
