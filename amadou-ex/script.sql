CREATE DATABASE IF NOT EXISTS `pdoDB` CHARACTER SET 'UTF8';

USE `pdoDB`;

CREATE TABLE IF NOT EXISTS `users` (
`id` INT NOT NULL AUTO_INCREMENT,
`firstname` VARCHAR(50),
`lastname` VARCHAR(50),
`birthdate` DATE,
PRIMARY KEY(`id`)
) ENGINE=INNODB;


-- Peuplement de la table

INSERT INTO `users` (`firstname`,`lastname`,`birthdate`) 
VALUES ('DUPONT', 'Jean', '1990-02-01'),
    ('DURANT', 'Paul', '1990-02-01'),
    ('CA', 'Louis', '1998-06-01'),
    ('HA', 'Wong', '1995-02-25'),
    ('Doe', 'John', '1990-12-05');