SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema DESPESAS
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `DESPESAS` ;
CREATE SCHEMA IF NOT EXISTS `DESPESAS` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `DESPESAS` ;

-- -----------------------------------------------------
-- Table `DESPESAS`.`Tipo_despesa`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DESPESAS`.`Tipo_despesa` ;

CREATE TABLE IF NOT EXISTS `DESPESAS`.`Tipo_despesa` (
  `ID_TIPO_DESPESA` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(90) NOT NULL,
  `DESPESA_PAI` INT NULL,
  PRIMARY KEY (`ID_TIPO_DESPESA`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `DESPESAS`.`USUARIO`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DESPESAS`.`USUARIO` ;

CREATE TABLE IF NOT EXISTS `DESPESAS`.`USUARIO` (
  `ID_USUARIO` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(45) NOT NULL,
  `LOGIN` VARCHAR(45) NOT NULL,
  `SENHA` VARCHAR(45) NOT NULL,
  `CPF` CHAR(15) NOT NULL,
  `EMAIL` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `LOGIN_UNIQUE` ON `DESPESAS`.`USUARIO` (`LOGIN` ASC);

CREATE UNIQUE INDEX `EMAIL_UNIQUE` ON `DESPESAS`.`USUARIO` (`EMAIL` ASC);


-- -----------------------------------------------------
-- Table `DESPESAS`.`DESPESAS`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DESPESAS`.`DESPESAS` ;

CREATE TABLE IF NOT EXISTS `DESPESAS`.`DESPESAS` (
  `ID_DESPESAS` INT NOT NULL AUTO_INCREMENT,
  `DATA_DESPESA` TIMESTAMP NOT NULL,
  `DESCRICAO` VARCHAR(200) NULL,
  `ID_USUARIO` INT NOT NULL,
  `ID_TIPO_DESPESA` INT NOT NULL,
  `PRECO` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`ID_DESPESAS`),
  CONSTRAINT `fk_DESPESAS_USUARIO`
    FOREIGN KEY (`ID_USUARIO`)
    REFERENCES `DESPESAS`.`USUARIO` (`ID_USUARIO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_DESPESAS_Tipo_despesa1`
    FOREIGN KEY (`ID_TIPO_DESPESA`)
    REFERENCES `DESPESAS`.`Tipo_despesa` (`ID_TIPO_DESPESA`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_DESPESAS_USUARIO_idx` ON `DESPESAS`.`DESPESAS` (`ID_USUARIO` ASC);

CREATE INDEX `fk_DESPESAS_Tipo_despesa1_idx` ON `DESPESAS`.`DESPESAS` (`ID_TIPO_DESPESA` ASC);


-- -----------------------------------------------------
-- Table `DESPESAS`.`Itens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `DESPESAS`.`Itens` ;

CREATE TABLE IF NOT EXISTS `DESPESAS`.`Itens` (
  `ID_ITEM` INT NOT NULL AUTO_INCREMENT,
  `NOME` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`ID_ITEM`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `NOME_UNIQUE` ON `DESPESAS`.`Itens` (`NOME` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
