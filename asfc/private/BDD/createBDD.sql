DROP SCHEMA IF EXISTS asfc;
CREATE DATABASE asfc;
USE asfc;


CREATE TABLE Users
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    prenom         VARCHAR(100)                        NOT NULL,
    nom            VARCHAR(100)                        NOT NULL,
    age            INT                                  NOT NULL CHECK(age > 0),
    region         varchar(100)                        NOT NULL,
    email          VARCHAR(255)                        NOT NULL UNIQUE,
    password       VARCHAR(255)                        NOT NULL,
    role           VARCHAR(20)   DEFAULT 'adherent'   NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);
insert into users(prenom, nom, age, region, email, password) values ("momo","amsan",13,"idf","mohamedam999@gmail.com","$2y$12$juRQT/RNTdimK8LMPcu7r.IVgG73r.y4FuvJc1u4jzG2TQohtfdlW");
insert into users(prenom, nom, age, region, email, password,role) values ("abd","bedded",13,"idf","mohamedam555@gmail.com","$2y$12$Dtk.9P/DBgI9cT/e4CIANuc0f0gQIGZNo/AxxlKkp6ksDr8Ue5Ely","admin");