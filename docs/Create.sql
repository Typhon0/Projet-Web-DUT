DROP TABLE IF EXISTS Agenda, Ordonnance, Section , Sujet, MessageForum, Utilisateur;

CREATE TABLE Agenda (
   	numAgenda int AUTO_INCREMENT PRIMARY KEY,
    date date NOT NULL,
    contenu text NOT NULL
);

CREATE TABLE Utilisateur (
    login varchar(32) PRIMARY KEY,
    email varchar(32) NOT NULL UNIQUE,
    mdp varchar(12) NOT NULL,
    type text NOT NULL,
	numAgenda int NOT NULL,
    FOREIGN KEY(numAgenda) REFERENCES Agenda(numAgenda) ON DELETE CASCADE
);
    
CREATE TABLE Ordonnance (
    numOrdonnance int AUTO_INCREMENT NOT NULL,
    login varchar(32) NOT NULL,
    FOREIGN KEY(login) REFERENCES Utilisateur(login) ON DELETE CASCADE,
    PRIMARY KEY(numOrdonnance, login),
    dateValidite date NOT NULL
);

CREATE TABLE MessagePrive (
    idMessage int AUTO_INCREMENT PRIMARY KEY,
    expediteur varchar(32) NOT NULL,
    FOREIGN KEY(expediteur) REFERENCES Utilisateur(login) ON DELETE CASCADE,
    destinataire varchar(32) NOT NULL,
    FOREIGN KEY(destinataire) REFERENCES Utilisateur(login) ON DELETE CASCADE,
    dateheure timestamp NOT NULL,
    contenu text
);

CREATE TABLE Section (
    idSection int AUTO_INCREMENT PRIMARY KEY,
    nom varchar(255) NOT NULL UNIQUE
);

CREATE TABLE Sujet (
    idSection int PRIMARY KEY,
    FOREIGN KEY(idSection) REFERENCES Section(idSection) ON DELETE CASCADE,
    titre varchar(255) NOT NULL
);

CREATE TABLE MessageForum (
    idMessage int AUTO_INCREMENT PRIMARY KEY,
    utilisateur varchar(32) NOT NULL,
    FOREIGN KEY(utilisateur) REFERENCES Utilisateur(login) ON DELETE CASCADE,
    dateheure timestamp NOT NULL,
    contenu text
);
