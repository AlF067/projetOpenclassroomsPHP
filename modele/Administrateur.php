<?php

class Administrateur extends BaseDeDonnees
{

		public function ajouterChapitre()
		{
			$bdd = $this->connexionBdd();
			$ajouterChapitre = $bdd->prepare("INSERT INTO `chapitres`(`id`,`titre`, `histoire`, `dateAjout`) VALUES (:id, :titre, :histoire, CURDATE())");
			$ajouterChapitre->execute(array(
				'titre' => $_POST["titre"],
				'histoire' => $_POST["histoire"],
				'id' => $_POST["id"]
			));
			return $ajouterChapitre;
		}

		public function modifierChapitre()
		{
			$bdd = $this->connexionBdd();
			$modifierChapitre = $bdd->prepare("UPDATE `chapitres` SET `titre`= :titre,`histoire`= :histoire WHERE `id`= :id");
			$modifierChapitre->execute(array(
				'id' => $_POST["id"],
				'titre' => $_POST["modifTitre"],
				'histoire' => $_POST["modifHistoire"]
			));

			return $modifierChapitre;
		}

		public function supprimerChapitre()
		{
			$bdd = $this->connexionBdd();
			$supprimerChapitre = $bdd->prepare("DELETE FROM `chapitres` WHERE `id`= :id");
			$supprimerChapitre->execute(array('id' => $_POST["id"]));
			return $supprimerChapitre;
		}
}

$administrateur = new Administrateur;
