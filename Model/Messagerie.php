<?php

class Messagerie
{
	public $idMessage ;
	public $destinataire ;
	public $emetteur ;
	public $contenu ;
	public $objet ;
	public $lu ;
	public $date_envoi ;
	
	
	public function get_liste_message_non_lu($users)
	{
		include('config.php');
		try {
			$req = $bdd->prepare(' SELECT * FROM Message WHERE destinataire = ? AND lu!=2 ORDER by date_envoi DESC ;');
			$req->execute(array($users));
			$donnees = $req->fetchall();
			return $donnees ;
			
		} catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		
		
	}
	
	public function get_liste_message_lu($users)
	{
		include('config.php');
		try {
			$req = $bdd->prepare(' SELECT * FROM Message WHERE destinataire = ? AND lu=1 ;');
			$req->execute(array($users));
			$donnees = $req->fetchall();
			return $donnees ;
			
		} catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		
		
	}
	
	
	public function get_message($idMessage)
	{
		include('config.php');
		try {
			$req = $bdd->prepare(' SELECT * FROM Message WHERE idMessage = ?');
			$req->execute(array($idMessage));
			$donnees = $req->fetch();
			return $donnees ;
			
		} catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		
		
	}
	
	public function update_to_lu($idMessage)
	{
		include('config.php');
		try {
			$req = $bdd->prepare('UPDATE Message SET lu = 1 WHERE idMessage = ?');
			$req->execute(array($idMessage));
		}catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		}
		
		
	}
	
	
	
}