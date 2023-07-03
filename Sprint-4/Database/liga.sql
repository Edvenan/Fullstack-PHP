-- MySQL Workbench Synchronization
-- Generated: 2023-06-14 12:21
-- Model: New Model
-- Version: 1.0
-- Project: Name of the project
-- Author: e_ven

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

CREATE SCHEMA IF NOT EXISTS `Liga` DEFAULT CHARACTER SET utf8 ;

CREATE TABLE IF NOT EXISTS `Liga`.`teams` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `creation_date` TIMESTAMP NOT NULL,
  `coach` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Liga`.`players` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(35) NOT NULL,
  `last_name` VARCHAR(35) NOT NULL,
  `age` INT(11) NOT NULL,
  `team_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`, `team_id`),
  INDEX `fk_players_equipos_idx` (`team_id` ASC),
  CONSTRAINT `fk_players_equipos`
    FOREIGN KEY (`team_id`)
    REFERENCES `Liga`.`teams` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

CREATE TABLE IF NOT EXISTS `Liga`.`games` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `team_1` INT(11) NOT NULL,
  `team_2` INT(11) NOT NULL,
  `date` DATETIME NULL DEFAULT NULL,
  `score_team_1` INT(11) NULL DEFAULT NULL,
  `score_team_2` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `team_1`, `team_2`),
  INDEX `fk_team_1_idx` (`team_1` ASC),
  INDEX `fk_team_2_idx` (`team_2` ASC),
  CONSTRAINT `fk_team_1`
    FOREIGN KEY (`team_1`)
    REFERENCES `Liga`.`teams` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_team_2`
    FOREIGN KEY (`team_2`)
    REFERENCES `Liga`.`teams` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;



INSERT INTO `liga`.`teams` (`name`, `coach`) VALUES ('Barcelona', 'Guardiola');
INSERT INTO `liga`.`teams` (`name`, `coach`) VALUES ('Español', 'Valdano');
INSERT INTO `liga`.`teams` (`name`, `coach`) VALUES ('Girona', 'Puig');
INSERT INTO `liga`.`teams` (`name`, `coach`) VALUES ('Lleida', 'Sempere');
INSERT INTO `liga`.`teams` (`name`, `coach`) VALUES ('Tarragona', 'Conesa');


INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Leo', 'Messi', '30', '1');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Bernd', 'Schuster', '60', '1');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Jose Luis', 'Arconada', '61', '1');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Carles', 'Busquets', '35', '1');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Lluis', 'Pique', '35', '1');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Jesus', 'Mariñas', '29', '2');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Carlos', 'Peña', '32', '2');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Jose', 'Caldere', '23', '2');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Javier', 'Lozaon', '21', '2');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Marcos', 'Pelaez', '35', '2');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Joaquin', 'Garcia', '32', '3');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Carlos', 'Mata', '25', '3');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Hugo', 'Tarugo', '23', '3');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Martin', 'Peluche', '56', '3');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Santiago', 'Maltrago', '33', '3');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Carlo', 'Benito', '32', '4');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Toni', 'Meloni', '34', '4');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Peter', 'Pan', '15', '4');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Jacko', 'Malako', '31', '4');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Nils', 'Cabrils', '23', '4');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Felipe', 'Queflipe', '21', '5');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Juan Carlos', 'Bercianos', '22', '5');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Daniel', 'Cartel', '23', '5');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Jose Antonio', 'Polonio', '24', '5');
INSERT INTO `liga`.`players` (`first_name`, `last_name`, `age`, `team_id`) VALUES ('Cristiano', 'Avellano', '25', '5');


INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('1', '2');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('1', '3');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('1', '4');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('1', '5');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('2', '1');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('2', '3');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('2', '4');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('2', '5');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('3', '1');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('3', '2');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('3', '4');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('3', '5');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('4', '1');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('4', '2');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('4', '3');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('4', '5');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('5', '1');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('5', '2');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('5', '3');
INSERT INTO `liga`.`games` (`team_1`, `team_2`) VALUES ('5', '4');

