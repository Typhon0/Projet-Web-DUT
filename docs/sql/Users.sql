DROP TABLE IF EXISTS Message, AnnonceSauv, Annonce, Ordonnance, Evenement, UtilisateurService, Service, Agenda, Utilisateur;

CREATE TABLE Utilisateur (
	idUtilisateur int AUTO_INCREMENT PRIMARY KEY,
    login varchar(32) NOT NULL UNIQUE,
    email varchar(32) NOT NULL UNIQUE,
    mdp varchar(12) NOT NULL,
	description text NOT NULL,
	dateNaiss date NOT NULL,
    typeU varchar(32) NOT NULL
);

CREATE TABLE Agenda (
	idAgenda int AUTO_INCREMENT NOT NULL,
	idUtilisateur int NOT NULL,
	FOREIGN KEY(idUtilisateur) REFERENCES Utilisateur(idUtilisateur) ON DELETE CASCADE,
	PRIMARY KEY(idAgenda, idUtilisateur)
);

CREATE TABLE Evenement (
	idEvenement int AUTO_INCREMENT PRIMARY KEY,
	dateheure timestamp NOT NULL,
	resumeE varchar(255),
	idAgenda int NOT NULL,
	FOREIGN KEY(idAgenda) REFERENCES Agenda(idAgenda) ON DELETE CASCADE
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
	nom varchar(128) NOT NULL
);

CREATE TABLE UtilisateurService(
	idUtilisateur int NOT NULL,
	FOREIGN KEY(idUtilisateur) REFERENCES Utilisateur(idUtilisateur) ON DELETE CASCADE,
	idService int NOT NULL,
	FOREIGN KEY(idService) REFERENCES Service(idService) ON DELETE CASCADE,
	disponible boolean NOT NULL
);

CREATE TABLE Annonce (
	idAnnonce int AUTO_INCREMENT PRIMARY KEY,
	demandeur int NOT NULL,
	FOREIGN KEY(demandeur) REFERENCES Utilisateur(idUtilisateur) ON DELETE CASCADE,
	titre varchar(255) NOT NULL,
	service int NOT NULL,
	FOREIGN KEY(service) REFERENCES Service(idService) ON DELETE CASCADE,
	lieu varchar(255) NOT NULL,
	prix int NOT NULL,
	message text NOT NULL
);

CREATE TABLE Message (
	idMessage int AUTO_INCREMENT PRIMARY KEY,
	destinataire varchar(32) NOT NULL,
	FOREIGN KEY(destinataire) REFERENCES Utilisateur(login) ON DELETE CASCADE,
	emetteur varchar(32) NOT NULL,
	FOREIGN KEY(emetteur) REFERENCES Utilisateur(login) ON DELETE CASCADE,
	contenu text NOT NULL,	
	objet varchar(128) NOT NULL,
	lu boolean NOT NULL,	
	date_envoi timestamp NOT NULL
);

CREATE TABLE AnnonceSauv (
	idUtilisateur int NOT NULL,
	FOREIGN KEY(idUtilisateur) REFERENCES Utilisateur(idUtilisateur) ON DELETE CASCADE,
	idAnnonce int NOT NULL,
	FOREIGN KEY(idAnnonce) REFERENCES Annonce(idAnnonce) ON DELETE CASCADE,
	PRIMARY KEY (idAnnonce,idUtilisateur)
	
);
