<?php

class BaseDeDonnees
{
	/* GENERAL */


	protected function connexionBdd()
	{
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=blog;port=3308', 'root', '');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}

		return $bdd;
	}

}
