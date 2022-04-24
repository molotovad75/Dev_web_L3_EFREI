CREATE TABLE Etudiant(
    `Id_etudiant` INTEGER  NOT NULL AUTO_INCREMENT,
 	`Nom_etudiant` VARCHAR(150),
    `Prenom_etudiant` VARCHAR(150),
    `Nb_emprunts` INTEGER,
    `Mot_de_passe_etu` VARCHAR(150),
    PRIMARY KEY(`Id_etudiant`)
);

CREATE TABLE Ecole(
  `Id_ecole` INTEGER NOT NULL AUTO_INCREMENT,
  `Nom_ecole` VARCHAR(150),
  `Adresse` VARCHAR(150),
  `Nb_etudiant` INTEGER,
  PRIMARY KEY(`Id_ecole`)
);

CREATE TABLE Materiel(
    `Id_Materiel` INTEGER NOT NULL AUTO_INCREMENT,
	`Code_barre` INTEGER(13),
    `Nom_materiel` VARCHAR(150),
    `Description` VARCHAR,
    `Date_achat` DATE,
    `Prix_achat` FLOAT,
    `Id_fournisseur` INTEGER,
    PRIMARY KEY(`Id_Materiel`)
);

CREATE TABLE Responsable(
	`Id_responsable` INTEGER NOT NULL AUTO_INCREMENT,
    `Nom_responsable` VARCHAR(150),
    `Identifiant_connexion` VARCHAR(150),
    `Mot_de_passe_respo` VARCHAR(150),
    PRIMARY KEY(`Id_Materiel`)
);