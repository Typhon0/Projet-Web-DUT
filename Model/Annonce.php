<?php

class Annonce {
	
	public $demandeur;
	public $titre;
	public $service;
	public $lieu;
	public $prix;
	public $message;
	
	public function __construct($new_demandeur,$new_titre,$new_service,$new_lieu,$new_prix,$new_message)
	{
		$this->demandeur = $new_demandeur;	
		$this->titre = $new_titre;
		$this->service =$new_service;
		$this->lieu = $new_lieu;
		$this->prix = $new_prix;
		$this->message = $new_message;
	}

	
}
?>