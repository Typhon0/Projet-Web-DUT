DROP TABLE IF EXISTS MessagePrive, Post, Topic, Section, Membre, Categorie;

CREATE TABLE Categorie (
  idCategorie int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  nom varchar(30) collate latin1_general_ci NOT NULL,
  ordre int(11) NOT NULL UNIQUE
);

 CREATE TABLE Membre (
  idMembre int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  pseudo varchar(30) collate latin1_general_ci NOT NULL,
  mdp varchar(32) collate latin1_general_ci NOT NULL,
  email varchar(250) collate latin1_general_ci NOT NULL,
  description text collate latin1_general_ci NOT NULL,
  avatar varchar(100) collate latin1_general_ci NOT NULL
); 

CREATE TABLE Section (
  idSection int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  idCategorie int(11) NOT NULL,
  FOREIGN KEY (idCategorie) REFERENCES Categorie(idCategorie) ON DELETE CASCADE,
  nom varchar(30) collate latin1_general_ci NOT NULL,
  description text collate latin1_general_ci NOT NULL,
  ordre mediumint(8) NOT NULL
); 

CREATE TABLE Topic (
  idTopic int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  idSection int(11) NOT NULL,
  FOREIGN KEY (idSection) REFERENCES Section(idSection) ON DELETE CASCADE,
  titre char(60) collate latin1_general_ci NOT NULL,
  idCreateur int(11) NOT NULL,
  FOREIGN KEY(idCreateur) REFERENCES Membre(idMembre) ON DELETE CASCADE,
  nbVisites mediumint(8) NOT NULL,
  idLastPost int(11) NOT NULL UNIQUE,
  idFirstPost int(11) NOT NULL UNIQUE
);

CREATE TABLE Post (
  idPost int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  idCreateur int(11) NOT NULL,
  FOREIGN KEY (idCreateur) REFERENCES Membre(idMembre) ON DELETE CASCADE,
  contenu text collate latin1_general_ci NOT NULL,
  dateHeure timestamp NOT NULL,
  idTopic int(11) NOT NULL,
  FOREIGN KEY (idTopic) REFERENCES Topic(idTopic) ON DELETE CASCADE,
  idSection int(11) NOT NULL,
  FOREIGN KEY (idSection) REFERENCES Section(idSection) ON DELETE CASCADE
);

CREATE TABLE MessagePrive (
  idMessage int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  expediteur int(11) NOT NULL,
  FOREIGN KEY (expediteur) REFERENCES Membre(idMembre) ON DELETE CASCADE,
  destinataire int(11) NOT NULL,
  FOREIGN KEY (destinataire) REFERENCES Membre(idMembre) ON DELETE CASCADE,
  titre varchar(100) collate latin1_general_ci NOT NULL,
  contenu text collate latin1_general_ci NOT NULL,
  dateHeure timestamp NOT NULL
)