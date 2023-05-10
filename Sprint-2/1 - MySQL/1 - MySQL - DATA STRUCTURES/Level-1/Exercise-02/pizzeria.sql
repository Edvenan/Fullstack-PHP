-- MySQL Workbench Synchronization
-- Generated: 2023-05-10 12:46
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: e_ven

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `pizzeria` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;

CREATE TABLE IF NOT EXISTS `pizzeria`.`client` (
  `client_id` INT(10) UNSIGNED NOT NULL,
  `adreça_id` INT(10) UNSIGNED NOT NULL,
  INDEX `fk_client_adreça1_idx` (`adreça_id` ASC),
  INDEX `fk_client_persona1_idx` (`client_id` ASC),
  PRIMARY KEY (`client_id`, `adreça_id`),
  CONSTRAINT `fk_client_adreça`
    FOREIGN KEY (`adreça_id`)
    REFERENCES `pizzeria`.`adreça` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_client_persona`
    FOREIGN KEY (`client_id`)
    REFERENCES `pizzeria`.`persona` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `pizzeria`.`comanda` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `botiga_id` INT(10) UNSIGNED NOT NULL,
  `client_id` INT(10) UNSIGNED NOT NULL,
  `tipus_entrega` ENUM('domicili', 'botiga') NOT NULL,
  `preu_total` DECIMAL(5,2) NOT NULL,
  `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`, `client_id`, `botiga_id`),
  INDEX `fk_comanda_botiga_idx` (`botiga_id` ASC),
  INDEX `fk_comanda_client_idx` (`client_id` ASC),
  CONSTRAINT `fk_comanda_botiga`
    FOREIGN KEY (`botiga_id`)
    REFERENCES `pizzeria`.`botiga` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_comanda_client`
    FOREIGN KEY (`client_id`)
    REFERENCES `pizzeria`.`client` (`client_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `pizzeria`.`producte` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `categoria_id` INT(10) UNSIGNED NULL DEFAULT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `descripcio` VARCHAR(100) NOT NULL,
  `imatge` VARCHAR(45) NOT NULL,
  `preu` DECIMAL(5,2) NOT NULL,
  `tipus` ENUM('pizza', 'hamburguesa', 'beguda') NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_producte_categoria_idx` (`categoria_id` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  CONSTRAINT `fk_producte_categoria`
    FOREIGN KEY (`categoria_id`)
    REFERENCES `pizzeria`.`categoria` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `pizzeria`.`categoria` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `pizzeria`.`botiga` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `adreça_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `adreça_id`),
  INDEX `fk_botiga_adreça_idx` (`adreça_id` ASC),
  CONSTRAINT `fk_botiga_adreça`
    FOREIGN KEY (`adreça_id`)
    REFERENCES `pizzeria`.`adreça` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `pizzeria`.`treballador` (
  `treballador_id` INT(10) UNSIGNED NOT NULL,
  `botiga_id` INT(10) UNSIGNED NOT NULL,
  `tipus` ENUM('cuiner', 'repartidor') NOT NULL,
  `nif` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`treballador_id`, `botiga_id`),
  INDEX `fk_treballador_persona_idx` (`treballador_id` ASC),
  INDEX `fk_treballador_botiga_idx` (`botiga_id` ASC),
  UNIQUE INDEX `nif_UNIQUE` (`nif` ASC),
  CONSTRAINT `fk_treballador_persona`
    FOREIGN KEY (`treballador_id`)
    REFERENCES `pizzeria`.`persona` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_treballador_botiga`
    FOREIGN KEY (`botiga_id`)
    REFERENCES `pizzeria`.`botiga` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `pizzeria`.`persona` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `cognom1` VARCHAR(45) NOT NULL,
  `cognom2` VARCHAR(45) NOT NULL,
  `telefon` INT(7) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `pizzeria`.`adreça` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `adreça` VARCHAR(45) NOT NULL,
  `codi_postal` INT(5) ZEROFILL NOT NULL,
  `localitat` VARCHAR(45) NOT NULL,
  `provincia` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `pizzeria`.`entrega_domicili` (
  `comanda_id` INT(10) UNSIGNED NOT NULL,
  `treballador_id` INT(10) UNSIGNED NOT NULL,
  `data_entrega` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX `fk_entrega_domicili_comanda1_idx1` (`comanda_id` ASC),
  PRIMARY KEY (`comanda_id`, `treballador_id`),
  CONSTRAINT `fk_entrega_domicili_comanda`
    FOREIGN KEY (`comanda_id`)
    REFERENCES `pizzeria`.`comanda` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_entrega_domicili_treballador`
    FOREIGN KEY (`treballador_id`)
    REFERENCES `pizzeria`.`treballador` (`treballador_id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;

CREATE TABLE IF NOT EXISTS `pizzeria`.`comanda_has_producte` (
  `comanda_id` INT(10) UNSIGNED NOT NULL,
  `producte_id` INT(10) UNSIGNED NOT NULL,
  INDEX `fk_comanda_has_producte_producte_idx` (`producte_id` ASC),
  INDEX `fk_comanda_has_producte_comanda_idx` (`comanda_id` ASC),
  CONSTRAINT `fk_comanda_has_producte_comanda`
    FOREIGN KEY (`comanda_id`)
    REFERENCES `pizzeria`.`comanda` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_comanda_has_producte_producte`
    FOREIGN KEY (`producte_id`)
    REFERENCES `pizzeria`.`producte` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_bin;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
