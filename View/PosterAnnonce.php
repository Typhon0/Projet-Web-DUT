<!DOCTYPE html>
<html>
    <head>
        <title>Poster une annonce</title>
        <meta charset="utf-8" />
    </head>
    <body>
        <h2>Poster une annonce</h2>
        
        <p>
<form action="posterAnnonce.php" method="post">
		<p>Type de service : <FORM>
	<SELECT name="service" size="1">
		<OPTION>Bricolage - Travaux</OPTION>
		<OPTION>Jardinage - Piscine</OPTION>
		<OPTION>Déménagement - Manutention</OPTION>
		<OPTION>Services véhiculés</OPTION>
		<OPTION>Services à la personne</OPTION>
		<OPTION>Enfants</OPTION>
		<OPTION>Animaux</OPTION>
		<OPTION>Informatique et web</OPTION>
		<OPTION>Photographie - Vidéo</OPTION>
		<OPTION>Animation - Evenements</OPTION>
		<OPTION>Cours - Formations</OPTION>
		<OPTION>Administratif - Bureautique </OPTION>
		<OPTION>Mode - Santé - Bien être</OPTION>
		<OPTION>Sport-Partenaires</OPTION>
		<OPTION>Restauration - Réception</OPTION>
	</SELECT>

<p> Expliquez votre besoin :</br><TEXTAREA name="message" rows=4 cols=40>Description du service :	
		
Date :</TEXTAREA>
		<p>Lieu : <input type="text" name="lieu" /></p>
		<p>Prix global : <input type="number" name="prix" /></p>
		<p><input type="submit" value="Poster annonce"></p>
		
</form>
</p>      
</body>
</html>