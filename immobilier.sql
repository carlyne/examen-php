-- CREATE SCHEMA `immobilier` ;

-- USE immobilier;

-- CREATE USER 'guest'@'localhost' IDENTIFIED BY 'guest123';
-- GRANT ALL PRIVILEGES ON immobilier.* TO 'guest'@'localhost';

-- CREATE TABLE type_logement (
-- 	id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
--     type VARCHAR(20),
-- 	PRIMARY KEY(id)
-- ) ENGINE=INNODB;

-- CREATE TABLE logement (
-- 	id_logement INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
--     titre VARCHAR(75),
--     adresse VARCHAR(150),
--     ville VARCHAR(150),
--     cp SMALLINT,
--     surface SMALLINT,
--     prix SMALLINT,
--     photo VARCHAR(150),
--     type_id TINYINT REFERENCES type_logement(id),
--     description VARCHAR(250),
--     PRIMARY KEY(id_logement)
-- ) ENGINE=INNODB;

-- INSERT INTO type_logement
-- (type) VALUES ('location');

-- INSERT INTO type_logement
-- (type) VALUES ('vente');



