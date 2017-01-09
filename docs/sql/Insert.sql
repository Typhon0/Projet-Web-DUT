INSERT INTO Service(nom) VALUES ('Bricolage - Travaux'), ('Jardinage - Piscine'), ('Déménagement - Manutention'),
('Dépannage - Réparation de matériel'), ('Entretien - Réparation véhicules'), ('Services véhiculés'), ('Services à la personne'),
('Enfants'), ('Animaux'), ('Informatique et web'), ('Photographie - Vidéo'), ('Animation - Evénements'), ('Cours- Formations'), 
('Administratif - Bureautique'), ('Mode - Santé - Bien être'), ('Sport - Partenaires'), ('Restaurant - Réception');

INSERT INTO Utilisateur(login, email, mdp, description, dateNaiss, typeU) VALUES 
('Dorian', 'dorian@email.fr', 'mdp', 'Description de Dorian', '1997-12-10', 'type'), 
('Loic', 'loic@email.fr', 'mdp', 'Description de Loic', '1996-06-02', 'type'),
('Anthony', 'anthony@email.fr', 'mdp', 'Description d"'"Anthony', '1996-06-02', 'type'),
('Aymeric', 'aymeric@email.fr', 'mdp', 'Description d"'"Aymeric', '1996-06-02', 'type'),
('Karim', 'karim@email.fr', 'mdp', 'Description de Karim', '1996-06-02', 'type'),
('Saliou', 'saliou@email.fr', 'mdp', 'Description de Saliou', '1996-06-02', 'type'),
('Wafi', 'wafi@email.fr', 'mdp', 'Description de Wafi', '1996-06-02', 'type');

INSERT INTO UtilisateurService VALUES
(1, 1, true), (1, 4, true),
(2, 2, true), (2, 4, true),
(3, 9, true), (2, 11, true), (2, 3, true),
(4, 8, true), (4, 7, true), (4, 6, true),
(5, 10, true),
(6, 12, true), (6, 1, true), (6, 5, true),
(7, 4, true), (7, 6, true);

INSERT INTO Annonce (demandeur, titre, service, lieu, prix, message) VALUES
(1, 'Location kangourou', 9, 'Maubeuge', 2, 'Bonjour, je voudrais louer un kangourou pour un combat de boxe'),
(2, 'Location voiture', 6, 'Valenciennes', 50, 'Bonjour, je voudrais louer une voiture pour un court trajet'),
(3, 'Location pistolet à peinture', 1, 'Villeneuve-d-ascq', 10, 'Bonjour, je recherche un pistolet à peinture svp. Merci d avance.'),
(4, 'Location benne', 6, 'Abscon', 100, 'Bonjour, je suis à la recherche d une benne pour gravât avec enlèvement merci'),
(5, 'Réparation voiture', 6, 'Lille', 200, 'Bonjour, panne voiture changement alternateur mise en route voiture.'),
(6, 'Plomberie - Installation sanitaire', 1, 'Hon-hergies', 150, 'Bonjour, je souhaiterais déboucher une canalisation toilette de diamétre 100 m/m.'),
(7, 'Couturière', 15, 'Bellignies', 25, 'Bonjour, je suis à la rechercher d une couturière possédant machine à coudre sur bellignies 59570.'),
(1, 'Paysagiste - Aménagement du jardin', 2, 'Feignies', 60, 'Bonjour, je cherche quequ un qui aurait une mini pelle ou un manitou pour un aménagement d entrée de maison merci'),
(2, 'Bricolage - Petits travaux', 1, 'Gommegnies', 30, 'Bonjour, je recherche un bricoleur polyvalent pour divers petits travaux. - fuite d eau quand on evacue l eau de la baignoire - electricité, quelques prises à changer et petit problemes... - petits travaux divers. '),
(3, 'Dépannage électroménager', 4, 'Fegnies', 35, 'Bonjour, Je recherche un réparateur pour mon sèche linge.'),
(4, 'Location enceinte murale', 12, 'Maubeuge', 5, 'Bonjour, je voudrai une enceinte ou une chaine Hifi pour la nouvelle année s il vous plait :) .'),
(5, 'Couverture - toiture', 1, 'Maubeuge', 50, 'Bonjour, problème d étanchéité lamterneaux camping car pas moyen de résoudre j ai refait les joints silicone pareil fuite ensuite j ai mis de la bande autocollants encore fuite demande conseil car je ne sais plus quoi faire 3 lanterneaux.'),
(6, 'Massage', 16, 'Valenciennes', 25, 'Bonjour, je cherche un masseur'),
(7, 'Réparation ordinateur', 10, 'Maubeuge', 20, 'Bonjour, mon ordinateur ne s allume plus. Je cherche quelqu un pour le réparer.');

INSERT INTO AnnonceSauv VALUES
(1, 2), (1,14),
(2, 4), (2, 7), (2,9);