DROP TABLE IF EXISTS MaladieAnomalie CASCADE;
DROP TABLE IF EXISTS Traitement CASCADE;
DROP TABLE IF EXISTS Ordonnance CASCADE;
DROP TABLE IF EXISTS Activite CASCADE;
DROP TABLE IF EXISTS Handicap CASCADE;
DROP TABLE IF EXISTS Medicament CASCADE;
DROP TABLE IF EXISTS Dosage CASCADE;

CREATE TABLE Handicap
(
	nom text PRIMARY KEY,
	definition text NOT NULL,
	causes text NOT NULL,
	bilan text NOT NULL,
	exemples text NOT NULL
);

CREATE TABLE Medicament
(
	nom varchar(32) PRIMARY KEY,
	description text NOT NULL
);

CREATE TABLE Ordonnance
(
	num serial PRIMARY KEY,
	dateOrdonnance date NOT NULL,
);

CREATE TABLE Dosage
(
	numOrdonnance serial REFERENCES Ordonnance(num),
	nomMedoc varchar(32) REFERENCES Medicament(nom),
	PRIMARY KEY (numOrdonnance,nomMedoc),
	dosage text NOT NULL
);

CREATE TABLE Activite
(
	nom text PRIMARY KEY,
	description text
);

CREATE TABLE Traitement
(
	id serial PRIMARY KEY,
	description text NOT NULL,
	ordonnance serial REFERENCES Ordonnance(num),
	activite text REFERENCES Activite(nom)
);

CREATE TABLE MaladieAnomalie
(
	nom varchar(125) PRIMARY KEY,
	description text NOT NULL,
	causes text NOT NULL,
	handicap text REFERENCES Handicap(nom),
	traitement serial REFERENCES Traitement(id)
);