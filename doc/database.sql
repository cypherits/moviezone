-- MySQL Script generated by MySQL Workbench
-- 11/09/16 01:38:48
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema moviezone
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `moviezone` ;

-- -----------------------------------------------------
-- Schema moviezone
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `moviezone` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `moviezone` ;

-- -----------------------------------------------------
-- Table `moviezone`.`Users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `moviezone`.`Users` ;

CREATE TABLE IF NOT EXISTS `moviezone`.`Users` (
  `Users_ID` INT NOT NULL AUTO_INCREMENT,
  `Users_name` VARCHAR(255) NULL,
  `Users_email` VARCHAR(255) NULL,
  `Users_username` VARCHAR(255) NULL,
  `Users_passwords` VARCHAR(32) NULL,
  `Users_role` ENUM('admin', 'manager', 'subscriber') NULL,
  `Users_status` ENUM('active', 'inactive') NULL,
  `Users_favorite` TEXT NULL,
  PRIMARY KEY (`Users_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moviezone`.`Categories`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `moviezone`.`Categories` ;

CREATE TABLE IF NOT EXISTS `moviezone`.`Categories` (
  `Categories_ID` INT NOT NULL AUTO_INCREMENT,
  `Categories_name` VARCHAR(255) NULL,
  `Categories_alias` VARCHAR(255) NULL,
  `Categories_status` ENUM('active', 'inactive') NULL,
  `Categories_parent` INT NULL,
  PRIMARY KEY (`Categories_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moviezone`.`Genres`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `moviezone`.`Genres` ;

CREATE TABLE IF NOT EXISTS `moviezone`.`Genres` (
  `Genres_id` INT NOT NULL AUTO_INCREMENT,
  `Genres_name` VARCHAR(255) NULL,
  `Genres_alias` VARCHAR(255) NULL,
  `Genres_status` ENUM('active', 'inactive') NULL,
  PRIMARY KEY (`Genres_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moviezone`.`Movies`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `moviezone`.`Movies` ;

CREATE TABLE IF NOT EXISTS `moviezone`.`Movies` (
  `Movies_ID` INT NOT NULL AUTO_INCREMENT,
  `Movies_name` VARCHAR(255) NULL,
  `Users_ID` INT NULL,
  `Categories_ID` VARCHAR(255) NULL,
  `Genres_ID` VARCHAR(255) NULL,
  `Movies_IMDB` INT NULL,
  `Movies_poster` VARCHAR(255) NULL,
  `Movies_isFeature` ENUM('yes', 'no') NULL,
  `Movies_location` TEXT NULL,
  PRIMARY KEY (`Movies_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moviezone`.`History`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `moviezone`.`History` ;

CREATE TABLE IF NOT EXISTS `moviezone`.`History` (
  `History_ID` INT NOT NULL AUTO_INCREMENT,
  `Movies_ID` INT NULL,
  `History_date` DATE NULL,
  `History_hitCount` INT NULL,
  PRIMARY KEY (`History_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moviezone`.`Request`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `moviezone`.`Request` ;

CREATE TABLE IF NOT EXISTS `moviezone`.`Request` (
  `Request_ID` INT NOT NULL AUTO_INCREMENT,
  `Request_movieName` VARCHAR(255) NULL,
  `Request_description` TINYTEXT NULL,
  `Request_status` ENUM('unviewd', 'onhold', 'complete') NULL,
  PRIMARY KEY (`Request_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moviezone`.`Support`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `moviezone`.`Support` ;

CREATE TABLE IF NOT EXISTS `moviezone`.`Support` (
  `Support_ID` INT NOT NULL AUTO_INCREMENT,
  `Support_ticketID` VARCHAR(255) NULL,
  `Users_ID` INT NULL,
  `Support_startDate` DATE NULL,
  `Support_description` TINYTEXT NULL,
  `Support_discussion` TEXT NULL,
  `Support_status` ENUM('unviewd', 'onhold', 'completed') NULL,
  PRIMARY KEY (`Support_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moviezone`.`Chat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `moviezone`.`Chat` ;

CREATE TABLE IF NOT EXISTS `moviezone`.`Chat` (
  `Chat_ID` INT NOT NULL,
  `Chat_userOne` INT NULL,
  `Chat_userTwo` INT NULL,
  `Chat_messages` BLOB NULL,
  PRIMARY KEY (`Chat_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `moviezone`.`Ftp`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `moviezone`.`Ftp` ;

CREATE TABLE IF NOT EXISTS `moviezone`.`Ftp` (
  `Ftp_ID` INT NOT NULL AUTO_INCREMENT,
  `Ftp_name` VARCHAR(255) NULL,
  `Ftp_host` VARCHAR(255) NULL,
  `Ftp_username` VARCHAR(255) NULL,
  `Ftp_password` VARCHAR(255) NULL,
  PRIMARY KEY (`Ftp_ID`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
