-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema gpgshs_db
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `gpgshs_db` ;

-- -----------------------------------------------------
-- Schema gpgshs_db
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `gpgshs_db` DEFAULT CHARACTER SET utf8 ;
USE `gpgshs_db` ;

-- -----------------------------------------------------
-- Table `gpgshs_db`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`roles` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `rolename` VARCHAR(45) NOT NULL,
  `description` VARCHAR(150) NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `token` VARCHAR(32) NOT NULL,
  `active` TINYINT(1) NOT NULL DEFAULT 0,
  `roles_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_users_roles1_idx` (`roles_id` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  CONSTRAINT `fk_users_roles1`
    FOREIGN KEY (`roles_id`)
    REFERENCES `gpgshs_db`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`login_attempts`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`login_attempts` (
  `id` INT NOT NULL,
  `last_attempt` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `users_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_login_attempts_users1_idx` (`users_id` ASC),
  CONSTRAINT `fk_login_attempts_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `gpgshs_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`provinces`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`provinces` (
  `id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`municipalities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`municipalities` (
  `id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `zipcode` INT(4) NOT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `provinces_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_municipalities_provinces1_idx` (`provinces_id` ASC),
  CONSTRAINT `fk_municipalities_provinces1`
    FOREIGN KEY (`provinces_id`)
    REFERENCES `gpgshs_db`.`provinces` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`barangays`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`barangays` (
  `id` INT UNSIGNED NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `municipalities_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_barangays_municipalities1_idx` (`municipalities_id` ASC),
  CONSTRAINT `fk_barangays_municipalities1`
    FOREIGN KEY (`municipalities_id`)
    REFERENCES `gpgshs_db`.`municipalities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`senior_high_schools`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`senior_high_schools` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `contact_no` VARCHAR(11) NOT NULL,
  `contact_person` VARCHAR(45) NOT NULL,
  `map` VARCHAR(100) NOT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`user_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`user_details` (
  `id` INT UNSIGNED NOT NULL,
  `first_name` VARCHAR(100) NOT NULL,
  `middle_name` VARCHAR(100) NOT NULL,
  `last_name` VARCHAR(100) NOT NULL,
  `extension_name` VARCHAR(45) NULL,
  `birth_date` DATE NULL,
  `age` INT NULL,
  `sex` CHAR(1) NULL,
  `barangays_id` INT UNSIGNED NOT NULL,
  `address` VARCHAR(255) NOT NULL,
  `tel_no` VARCHAR(13) NULL,
  `mobile_no` VARCHAR(13) NULL,
  `religion` VARCHAR(100) NULL,
  `mother_tongue` VARCHAR(100) NULL,
  `ip_group` VARCHAR(100) NULL,
  `senior_high_schools_id` INT UNSIGNED NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_user_details_users1_idx` (`id` ASC),
  INDEX `fk_user_details_barangays1_idx` (`barangays_id` ASC),
  INDEX `fk_user_details_senior_high_schools1_idx` (`senior_high_schools_id` ASC),
  CONSTRAINT `fk_user_details_users1`
    FOREIGN KEY (`id`)
    REFERENCES `gpgshs_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_details_barangays1`
    FOREIGN KEY (`barangays_id`)
    REFERENCES `gpgshs_db`.`barangays` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_details_senior_high_schools1`
    FOREIGN KEY (`senior_high_schools_id`)
    REFERENCES `gpgshs_db`.`senior_high_schools` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`career_tracks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`career_tracks` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` MEDIUMTEXT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`career_strands`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`career_strands` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `description` MEDIUMTEXT NULL,
  `category` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `career_tracks_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_career_strands_career_tracks1_idx` (`career_tracks_id` ASC),
  CONSTRAINT `fk_career_strands_career_tracks1`
    FOREIGN KEY (`career_tracks_id`)
    REFERENCES `gpgshs_db`.`career_tracks` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`personalities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`personalities` (
  `id` INT NOT NULL,
  `personality_type` VARCHAR(4) NOT NULL,
  `short_desc` VARCHAR(255) NULL,
  `long_desc` MEDIUMTEXT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`learners`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`learners` (
  `id` INT UNSIGNED NOT NULL,
  `school_year` VARCHAR(45) NULL,
  `grade` INT NULL,
  `senior_high_schools_id` INT UNSIGNED NULL,
  `career_strands_id` INT UNSIGNED NULL,
  `personalities_id` INT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX `fk_learners_user_details1_idx` (`id` ASC),
  INDEX `fk_learners_senior_high_schools1_idx` (`senior_high_schools_id` ASC),
  INDEX `fk_learners_career_strands1_idx` (`career_strands_id` ASC),
  INDEX `fk_learners_personalities1_idx` (`personalities_id` ASC),
  CONSTRAINT `fk_learners_user_details1`
    FOREIGN KEY (`id`)
    REFERENCES `gpgshs_db`.`user_details` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_learners_senior_high_schools1`
    FOREIGN KEY (`senior_high_schools_id`)
    REFERENCES `gpgshs_db`.`senior_high_schools` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_learners_career_strands1`
    FOREIGN KEY (`career_strands_id`)
    REFERENCES `gpgshs_db`.`career_strands` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_learners_personalities1`
    FOREIGN KEY (`personalities_id`)
    REFERENCES `gpgshs_db`.`personalities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`user_educational_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`user_educational_details` (
  `id` INT UNSIGNED NOT NULL,
  `lrn_no` VARCHAR(12) NULL,
  `prev_junior_hs` VARCHAR(255) NULL,
  `prev_junior_hs_level` INT(2) NULL,
  `prev_senior_hs` VARCHAR(255) NULL,
  `prev_senior_hs_level` VARCHAR(45) NULL,
  `prev_school_year` YEAR NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `career_strands_id` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_user_educational_details_career_strands1_idx` (`career_strands_id` ASC),
  CONSTRAINT `fk_learners_educational_bg_users1`
    FOREIGN KEY (`id`)
    REFERENCES `gpgshs_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_educational_details_career_strands1`
    FOREIGN KEY (`career_strands_id`)
    REFERENCES `gpgshs_db`.`career_strands` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`user_health_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`user_health_details` (
  `id` INT UNSIGNED NOT NULL,
  `height` VARCHAR(5) NULL,
  `weight` VARCHAR(5) NULL,
  `disabilities` VARCHAR(100) NULL,
  `chronic_illness` VARCHAR(100) NULL,
  `remarks` VARCHAR(255) NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_user_health_profile_users1`
    FOREIGN KEY (`id`)
    REFERENCES `gpgshs_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`learner_documents`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`learner_documents` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `filename` VARCHAR(255) NOT NULL,
  `extension` VARCHAR(10) NOT NULL,
  `filesize` VARCHAR(45) NOT NULL,
  `location` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `learners_id` INT UNSIGNED NOT NULL,
  INDEX `fk_learners_documents_learners1_idx` (`learners_id` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_learners_documents_learners1`
    FOREIGN KEY (`learners_id`)
    REFERENCES `gpgshs_db`.`learners` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`user_guardian_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`user_guardian_details` (
  `id` INT UNSIGNED NOT NULL,
  `father_name` VARCHAR(100) NOT NULL,
  `mother_name` VARCHAR(100) NOT NULL,
  `guardian_name` VARCHAR(100) NOT NULL,
  `guardian_contact_no` VARCHAR(13) NOT NULL,
  `father_contact_no` VARCHAR(13) NOT NULL,
  `mother_contact_no` VARCHAR(13) NOT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_guardian_details_users1`
    FOREIGN KEY (`id`)
    REFERENCES `gpgshs_db`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`learner_validations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`learner_validations` (
  `id` INT UNSIGNED NOT NULL,
  `status` VARCHAR(45) NOT NULL,
  `validated_by` VARCHAR(100) NULL,
  `comments` LONGTEXT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_learner_validations_learners1`
    FOREIGN KEY (`id`)
    REFERENCES `gpgshs_db`.`learners` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`personality_questions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`personality_questions` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` VARCHAR(255) NOT NULL,
  `mbti` VARCHAR(2) NOT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`personality_answers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`personality_answers` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `a` VARCHAR(255) NOT NULL,
  `b` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `personality_questions_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_personality_answers_personality_questions1_idx` (`personality_questions_id` ASC),
  CONSTRAINT `fk_personality_answers_personality_questions1`
    FOREIGN KEY (`personality_questions_id`)
    REFERENCES `gpgshs_db`.`personality_questions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`strands_personalities`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`strands_personalities` (
  `career_strands_id` INT UNSIGNED NOT NULL,
  `personalities_id` INT NOT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`career_strands_id`, `personalities_id`),
  INDEX `fk_career_strands_has_personalities_personalities1_idx` (`personalities_id` ASC),
  INDEX `fk_career_strands_has_personalities_career_strands1_idx` (`career_strands_id` ASC),
  CONSTRAINT `fk_career_strands_has_personalities_career_strands1`
    FOREIGN KEY (`career_strands_id`)
    REFERENCES `gpgshs_db`.`career_strands` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_career_strands_has_personalities_personalities1`
    FOREIGN KEY (`personalities_id`)
    REFERENCES `gpgshs_db`.`personalities` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gpgshs_db`.`available_courses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `gpgshs_db`.`available_courses` (
  `senior_high_schools_id` INT UNSIGNED NOT NULL,
  `career_strands_id` INT UNSIGNED NOT NULL,
  `created_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP(0) NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`senior_high_schools_id`, `career_strands_id`),
  INDEX `fk_senior_high_schools_has_career_strands_career_strands1_idx` (`career_strands_id` ASC),
  INDEX `fk_senior_high_schools_has_career_strands_senior_high_schoo_idx` (`senior_high_schools_id` ASC),
  CONSTRAINT `fk_senior_high_schools_has_career_strands_senior_high_schools1`
    FOREIGN KEY (`senior_high_schools_id`)
    REFERENCES `gpgshs_db`.`senior_high_schools` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_senior_high_schools_has_career_strands_career_strands1`
    FOREIGN KEY (`career_strands_id`)
    REFERENCES `gpgshs_db`.`career_strands` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;