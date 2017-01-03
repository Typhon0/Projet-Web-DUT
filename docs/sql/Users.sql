DROP TABLE IF EXISTS Annonce, Ordonnance, Utilisateur, Agenda, Service, UtilisateurService;

CREATE TABLE Agenda (
   	numAgenda int AUTO_INCREMENT,
    date date,
    contenu varchar(255),
	PRIMARY KEY(numAgenda, date, contenu)
);

CREATE TABLE Utilisateur (
	idUtilisateur int AUTO_INCREMENT PRIMARY KEY,
    login varchar(32),
    email varchar(32) NOT NULL UNIQUE,
    mdp varchar(12) NOT NULL,
	description text NOT NULL,
	dateNaiss date NOT NULL,
    type varchar(32) NOT NULL,
	avatar varchar(100) collate latin1_general_ci, 
	numAgenda int NOT NULL,
    FOREIGN KEY(numAgenda) REFERENCES Agenda(numAgenda) ON DELETE CASCADE
);
    
CREATE TABLE Ordonnance (
    numOrdonnance int AUTO_INCREMENT NOT NULL,
    idUtilisateur int NOT NULL,
    FOREIGN KEY(idUtilisateur) REFERENCES Utilisateur(idUtilisateur) ON DELETE CASCADE,
    PRIMARY KEY(numOrdonnance, idUtilisateur),
    dateValidite date NOT NULL
);

CREATE TABLE Service (
	idService int AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nom varchar(32) NOT NULL
);

CREATE TABLE UtilisateurService(
	idUtilisateur int NOT NULL,
	FOREIGN KEY(idUtilisateur) REFERENCES Utilisateur(idUtilisateur) ON DELETE CASCADE,
	idService int NOT NULL,
	FOREIGN KEY(idService) REFERENCES Service(idService) ON DELETE CASCADE,
	dateDebut timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	dateFin timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Annonce (
	idAnnonce int AUTO_INCREMENT PRIMARY KEY,
	demandeur int NOT NULL,
	FOREIGN KEY(demandeur) REFERENCES Utilisateur(idUtilisateur) ON DELETE CASCADE,
	lieu varchar(255) NOT NULL,
	prix int NOT NULL
);