-- MySQL Workbench Synchronization
-- Generated: 2023-05-09 16:55
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: e_ven

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `optica` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `optica`.`adreça` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `carrer` VARCHAR(45) NOT NULL,
  `numero` VARCHAR(10) NOT NULL,
  `pis` VARCHAR(10) NOT NULL,
  `porta` VARCHAR(10) NULL DEFAULT NULL,
  `ciutat` VARCHAR(45) NOT NULL,
  `codi_postal` VARCHAR(10) NOT NULL,
  `pais` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `optica`.`client` (
  `id` INT(10) UNSIGNED NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `cognom1` VARCHAR(45) NOT NULL,
  `cognom2` VARCHAR(45) NOT NULL,
  `telefon` INT(11) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `data_registre` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prescriptor_id` INT(10) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  INDEX `fk_client_prescriptor_idx` (`prescriptor_id` ASC) ,
  CONSTRAINT `fk_client_adreça`
    FOREIGN KEY (`id`)
    REFERENCES `optica`.`adreça` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT,
  CONSTRAINT `fk_client_prescriptor`
    FOREIGN KEY (`prescriptor_id`)
    REFERENCES `optica`.`client` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `optica`.`proveidor` (
  `id` INT(10) UNSIGNED NOT NULL,
  `nom` VARCHAR(45) NOT NULL,
  `telefon` INT(11) NOT NULL,
  `fax` INT(13) NULL DEFAULT NULL,
  `NIF` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `NIF_UNIQUE` (`NIF` ASC) ,
  CONSTRAINT `fk_proveidor_adreça`
    FOREIGN KEY (`id`)
    REFERENCES `optica`.`adreça` (`id`)
    ON DELETE RESTRICT
    ON UPDATE RESTRICT)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `optica`.`marca` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `proveidor_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`, `proveidor_id`),
  INDEX `fk_marca_proveidor_idx` (`proveidor_id` ASC) ,
  CONSTRAINT `fk_marca_proveidor`
    FOREIGN KEY (`proveidor_id`)
    REFERENCES `optica`.`proveidor` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `optica`.`ulleres` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `marca_id` INT(10) UNSIGNED NOT NULL,
  `vidre_dret_graduacio` VARCHAR(45) NOT NULL,
  `vidre_esquerre_graduacio` VARCHAR(45) NOT NULL,
  `vidre_dret_color` VARCHAR(45) NOT NULL,
  `vidre_esquerre_color` VARCHAR(45) NOT NULL,
  `muntura_tipus` ENUM("flotant", "pasta", "metàl·lica") NOT NULL,
  `muntura_color` VARCHAR(45) NOT NULL,
  `preu` FLOAT(6,2) NOT NULL,
  PRIMARY KEY (`id`, `marca_id`),
  INDEX `fk_ulleres_marca_idx` (`marca_id` ASC) ,
  CONSTRAINT `fk_ulleres_marca`
    FOREIGN KEY (`marca_id`)
    REFERENCES `optica`.`marca` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `optica`.`venedor` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(45) NOT NULL,
  `cognom1` VARCHAR(45) NOT NULL,
  `cognom2` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `venedor` (`nom` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `optica`.`venda` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` INT(10) UNSIGNED NOT NULL,
  `venedor_id` INT(10) UNSIGNED NOT NULL,
  `data` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`, `client_id`, `venedor_id`),
  INDEX `fk_venda_client_idx` (`client_id` ASC) ,
  INDEX `fk_venda_Venedor_idx` (`venedor_id` ASC) ,
  INDEX `data_idx` (`data` ASC) ,
  CONSTRAINT `fk_venda_client`
    FOREIGN KEY (`client_id`)
    REFERENCES `optica`.`client` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_venda_venedor`
    FOREIGN KEY (`venedor_id`)
    REFERENCES `optica`.`venedor` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `optica`.`venda_ulleres` (
  `venda_id` INT(10) UNSIGNED NOT NULL,
  `ulleres_id` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`venda_id`, `ulleres_id`),
  INDEX `fk_venda_ulleres_ulleres_idx` (`ulleres_id` ASC) ,
  CONSTRAINT `fk_venda_ulleres_venda`
    FOREIGN KEY (`venda_id`)
    REFERENCES `optica`.`venda` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_venda_ulleres_ulleres`
    FOREIGN KEY (`ulleres_id`)
    REFERENCES `optica`.`ulleres` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
