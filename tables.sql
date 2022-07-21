USE espacemembres;

ALTER TABLE liked DROP CONSTRAINT nasapic_ibfk_1;
ALTER TABLE liked DROP CONSTRAINT membres_ibfk_2;

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
    idLikedNasaPic INT UNSIGNED,
    PRIMARY KEY(idNasaPic) 
) ENGINE=InnoDB;

DROP TABLE IF EXISTS nasapic;
CREATE table nasapic(
    idNasaPic INT UNSIGNED NOT NULL AUTO_INCREMENT,
    urlLikedNasaPic TEXT,
    likedBy INT UNSIGNED,
    PRIMARY KEY(idNasaPic) 
) ENGINE=InnoDB;

DROP TABLE IF EXISTS liked;
CREATE table liked(
    idLikedPic INT UNSIGNED,
    idLikedBy INT UNSIGNED,
    PRIMARY KEY(idLikedPic, idLikedBy),
    FOREIGN KEY(idLikedPic) REFERENCES nasapic(idNasaPic),
    FOREIGN KEY(idLikedBy) REFERENCES membres(id)
) ENGINE=InnoDB;