-- CREATE SCHEMA `immobilier` ;

-- USE immobilier;

-- CREATE USER 'student'@'localhost' IDENTIFIED BY 'studentwf3';
-- GRANT ALL PRIVILEGES ON immobilier.* TO 'student'@'localhost';

-- CREATE TABLE IF NOT EXISTS type_logement (
-- 	id INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
--     type VARCHAR(20),
-- 	PRIMARY KEY(id)
-- ) ENGINE=INNODB;

-- CREATE TABLE IF NOT EXISTS logement (
-- 	id_logement INT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE,
--     titre VARCHAR(75),
--     adresse VARCHAR(150),
--     ville VARCHAR(150),
--     cp INT,
--     surface INT,
--     prix BIGINT,
--     photo VARCHAR(150),
--     type_id TINYINT REFERENCES type_logement(id),
--     description VARCHAR(250),
--     PRIMARY KEY(id_logement)
-- ) ENGINE=INNODB;

-- INSERT INTO type_logement
-- (type) VALUES ('location');

-- INSERT INTO type_logement
-- (type) VALUES ('vente');


