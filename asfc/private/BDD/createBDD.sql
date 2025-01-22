DROP SCHEMA IF EXISTS asfc;
CREATE DATABASE asfc;
USE asfc;

CREATE TABLE Users
(
    id         INT AUTO_INCREMENT PRIMARY KEY,
    prenom         VARCHAR(100)                        NOT NULL,
    nom            VARCHAR(100)                        NOT NULL,
    age            INT                                  NOT NULL CHECK(age > 0),
    email          VARCHAR(255)                        NOT NULL UNIQUE,
    password       VARCHAR(255)                        NOT NULL,
    role           VARCHAR(20)   DEFAULT 'utilisateur'   NOT NULL,
    cotisation     INT           DEFAULT 0               ,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);
create table question
(
    id_question      int          not null
        primary key,
    type_question    varchar(20)  null,
    libelle_question varchar(200) not null
);

create table `option`
(
    id_option      int          not null,
    id_question    int          not null,
    libelle_option varchar(100) not null,
    primary key (id_option, id_question),
    constraint OPTION_FK
        foreign key (id_question) references question (id_question)
);
create table Reponses(
         id_rep INT AUTO_INCREMENT,
         id_user INT NOT NULL,
         region_id INT NOT NULL,
         housing_id INT NOT NULL,
         cdaph INT NOT NULL,
         lifeSatisfaction_id INT NOT NULL,
         activity_id INT NOT NULL,
         lifeQuality_id INT NOT NULL,
         supportNeeded_id INT NOT NULL,
         CONSTRAINT pk_reponse PRIMARY KEY (id_rep),
         CONSTRAINT u_reponse_user UNIQUE (id_user),
         CONSTRAINT fk_region FOREIGN KEY (region_id)
             REFERENCES `option` (id_option) ON DELETE CASCADE,
         CONSTRAINT fk_situationLogement FOREIGN KEY (housing_id)
             REFERENCES `option` (id_option) ON DELETE CASCADE,
         CONSTRAINT fk_orientationCDAPH FOREIGN KEY (cdaph)
             REFERENCES `option` (id_option) ON DELETE CASCADE,
         CONSTRAINT fk_satisfactionLieuDeVie FOREIGN KEY (lifeSatisfaction_id)
             REFERENCES `option` (id_option) ON DELETE CASCADE,
         CONSTRAINT fk_activite FOREIGN KEY (activity_id)
             REFERENCES `option` (id_option) ON DELETE CASCADE,
         CONSTRAINT fk_qualiteDeVie FOREIGN KEY (lifeQuality_id)
             REFERENCES `option` (id_option) ON DELETE CASCADE,
         CONSTRAINT fk_besoinSoutien FOREIGN KEY (supportNeeded_id)
             REFERENCES `option` (id_option) ON DELETE CASCADE,
         CONSTRAINT fk_id_user FOREIGN KEY (id_user)
             REFERENCES Users (id) ON DELETE CASCADE
);




insert into Users(prenom, nom, age,  email, password,cotisation) values ("momo","amsan",13,"mohamedam999@gmail.com","$2y$12$juRQT/RNTdimK8LMPcu7r.IVgG73r.y4FuvJc1u4jzG2TQohtfdlW",10);
insert into Users(prenom, nom, age,  email, password,role) values ("abd","bedded",13,"mohamedam555@gmail.com","$2y$12$Dtk.9P/DBgI9cT/e4CIANuc0f0gQIGZNo/AxxlKkp6ksDr8Ue5Ely","admin");
DELIMITER $$

INSERT INTO question (id_question, type_question, libelle_question)
VALUES
    (1, 'select', 'Quelle est votre région de résidence ?'),
    (2, 'select', 'Quelle est votre situation en matière de logement ?'),
    (3, 'button', 'Votre lieu de vie correspond-il à une orientation CDAPH ?'),
    (4, 'button', 'Êtes-vous satisfait de votre lieu de vie ?'),
    (5, 'select', 'Quelle est votre activité professionnelle ?'),
    (6, 'select', 'Qu’en pensez-vous de votre qualité de vie ?'),
    (7, 'select', 'Quels sont les soutiens dont vous avez besoin ?');

INSERT INTO `option` (id_option, id_question, libelle_option)
VALUES
    (1, 1, 'Auvergne-Rhône-Alpes'),
    (2, 1, 'Bourgogne-Franche-Comté'),
    (3, 1, 'Bretagne'),
    (4, 1, 'Centre-Val de Loire'),
    (5, 1, 'Corse'),
    (6, 1, 'Grand Est'),
    (7, 1, 'Hauts-de-France'),
    (8, 1, 'Île-de-France'),
    (9, 1, 'Normandie'),
    (10, 1, 'Nouvelle-Aquitaine'),
    (11, 1, 'Occitanie'),
    (12, 1, 'Pays de la Loire'),
    (13, 1, 'Provence-Alpes-Côte d\'Azur'),
    (14, 1, 'Guadeloupe'),
    (15, 1, 'Guyane'),
    (16, 1, 'Martinique'),
    (17, 1, 'Mayotte'),
    (18, 1, 'La Réunion');

INSERT INTO `option` (id_option, id_question, libelle_option)
VALUES
    (1, 2, 'Dans la famille en permanence'),
    (2, 2, 'Dans la famille avec une solution d\'accueil ou des activités en journée'),
    (3, 2, 'Dans la famille principalement mais avec un accueil temporaire ou séquentiel en établissement'),
    (4, 2, 'Dans un logement indépendant'),
    (5, 2, 'Dans un habitat inclusif'),
    (6, 2, 'Dans un foyer d\'accueil médicalisé (FAM)'),
    (7, 2, 'Dans une maison d\'accueil spécialisée (MAS)'),
    (8, 2, 'Dans un foyer de vie ou foyer d\'hébergement'),
    (9, 2, 'En IME avec internat'),
    (10, 2, 'Hospitalisation en psychiatrie'),
    (11, 2, 'Autre');

INSERT INTO `option` (id_option, id_question, libelle_option)
VALUES
    (1, 3, 'Oui'),
    (2, 3, 'Non');
INSERT INTO `option` (id_option, id_question, libelle_option)
VALUES
    (1, 4, 'Oui'),
    (2, 4, 'Non');
INSERT INTO `option` (id_option, id_question, libelle_option)
VALUES
    (1, 5, 'Scolarité en milieu ordinaire'),
    (2, 5, 'Scolarité en dispositif spécialisé de l\'éducation nationale'),
    (3, 5, 'Instruction en famille'),
    (4, 5, 'Scolarité dans un établissement médico-social'),
    (5, 5, 'Formation professionnelle'),
    (6, 5, 'Études supérieures'),
    (7, 5, 'Activité professionnelle en milieu ordinaire'),
    (8, 5, 'Activité professionnelle en milieu protégé'),
    (9, 5, 'Sans aucune activité scolaire ou professionnelle'),
    (10, 5, 'Autre');

INSERT INTO `option` (id_option, id_question, libelle_option)
VALUES
    (1, 6, 'Tout va bien'),
    (2, 6, 'Restriction de vie sociale'),
    (3, 6, 'Souffrance psychologique'),
    (4, 6, 'Réduction d\'activité professionnelle'),
    (5, 6, 'Coûts financiers importants'),
    (6, 6, 'Conflits familiaux');
INSERT INTO `option` (id_option, id_question, libelle_option)
VALUES
    (1, 7, 'Personne autonome'),
    (2, 7, 'Aide quotidienne par un tiers 24h/24'),
    (3, 7, 'Des interventions et stimulations ponctuelles mais quotidiennes'),
    (4, 7, 'Soutien à l\'autonomie pour le logement, la santé, les loisirs et démarches administratives');


-- Procédure pour générer n utilisateurs
CREATE PROCEDURE GenerateUsers(IN number_of_users INT)
BEGIN
    DECLARE i INT DEFAULT 1;
    WHILE i <= number_of_users DO
            INSERT INTO Users (prenom, nom, age, email, password,cotisation)
            VALUES (
                       CONCAT('User', i, FLOOR(RAND() * 1000)),
                       CONCAT('Nom', i),
                       FLOOR(RAND() * 80 + 18), -- Âge entre 18 et 98
                       CONCAT('user', UUID(), '@asfc.com'), -- Email unique
                       '$2y$12$juRQT/RNTdimK8LMPcu7r.IVgG73r.y4FuvJc1u4jzG2TQohtfdlW',
                       FLOOR(RAND() * 80 + 18)
                   );
            SET i = i + 1;
        END WHILE;
END$$

CREATE PROCEDURE GenerateReponses(IN number_of_reponses INT)
BEGIN
    DECLARE i INT DEFAULT 1;
    DECLARE user_id INT;

    WHILE i <= number_of_reponses DO
            SELECT id INTO user_id
            FROM Users
            WHERE id NOT IN (SELECT id_user FROM Reponses)
            ORDER BY RAND()
            LIMIT 1;

            INSERT INTO Reponses (region_id, housing_id, cdaph, lifeSatisfaction_id, activity_id, lifeQuality_id, supportNeeded_id, id_user)
            VALUES (
                       (SELECT id_option FROM `option` WHERE id_question = 1 ORDER BY RAND() LIMIT 1), -- région
                       (SELECT id_option FROM `option` WHERE id_question = 2 ORDER BY RAND() LIMIT 1), -- logement
                       (SELECT id_option FROM `option` WHERE id_question = 3 ORDER BY RAND() LIMIT 1), -- orientation CDAPH
                       (SELECT id_option FROM `option` WHERE id_question = 4 ORDER BY RAND() LIMIT 1), -- satisfaction
                       (SELECT id_option FROM `option` WHERE id_question = 5 ORDER BY RAND() LIMIT 1), -- activité
                       (SELECT id_option FROM `option` WHERE id_question = 6 ORDER BY RAND() LIMIT 1), -- qualité de vie
                       (SELECT id_option FROM `option` WHERE id_question = 7 ORDER BY RAND() LIMIT 1), -- soutien
                       user_id
                   );
            SET i = i + 1;
        END WHILE;
END$$

CREATE PROCEDURE GenerateData(IN user_count INT, IN reponse_count INT)
BEGIN
    CALL GenerateUsers(user_count);
    CALL GenerateReponses(reponse_count);
END$$

DELIMITER ;

CALL GenerateData(1000,500);


