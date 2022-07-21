DROP DATABASE IF EXISTS espacemembres;
CREATE DATABASE espacemembres
CHARACTER SET utf8 			-- characterset
COLLATE utf8_general_ci;	-- collation (ordre des caractères)

USE espacemembres;

DROP TABLE IF EXISTS membres;
CREATE table membres(
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    pseudo VARCHAR(255),
    email VARCHAR(255),
    motdepasse TEXT,
    PRIMARY KEY(id) 
) ENGINE=InnoDB;

DROP TABLE IF EXISTS nasapic;
CREATE table nasapic(
    idNasaPic INT UNSIGNED NOT NULL AUTO_INCREMENT,
    PRIMARY KEY(idNasaPic) 
) ENGINE=InnoDB;

DROP TABLE IF EXISTS memPic;
-- Creation de la table d'association 
CREATE TABLE memPic(
   membres.id INT UNSIGNED NOT NULL,
   nasapic.idNasaPic INT UNSIGNED NOT NULL,
   PRIMARY KEY(membres.id, idNasaPic),
   FOREIGN KEY(membres.id) REFERENCES mem(membres.id),
   FOREIGN KEY(nasapic.idNasaPic) REFERENCES nasapic(nasapic.idNasaPic)
) ENGINE=InnoDB;

TRUNCATE TABLE membres; -- pour RESET
INSERT INTO membres (`id`, `pseudo`, `email`, `motdepasse`)	
	VALUES
		(1, 'a', 'a@a.a', 'a'),
        (2, 'b', 'b@b.b', 'b');
TRUNCATE TABLE nasapic;
INSERT INTO nasapic (`idNasaPic`)
	VALUES
		(1),
        (2),
		(3);
TRUNCATE TABLE memPic;
INSERT INTO memPic (`id`, `idNasaPic`)
	VALUES
		(1, 1),
        (2, 2);