<?php

class Commentaires extends BaseDeDonnees
{
		public function commentairesAll()
		{
			if (isset($_GET["limitMin"])) {
				$limitMin = $_GET["limitMin"];
			} else {
				$limitMin = 0;
			}
			if (isset($_POST["idChapitre"])) {
				$idChapitre = $_POST["idChapitre"];
			} else {
				$idChapitre = $_GET["idChapitre"];
			}

			$bdd = $this->connexionBdd();
			$commentaires = $bdd->prepare('SELECT * FROM chapitres INNER JOIN commentaires  ON commentaires.idChapitre = chapitres.idChapitre WHERE commentaires.idChapitre = :idChapitre ORDER BY commentaires.dateHeure DESC LIMIT :limitMin , 3 ');
			$commentaires->bindValue(':idChapitre', $idChapitre, PDO::PARAM_INT);
			$commentaires->bindValue(':limitMin', $limitMin, PDO::PARAM_INT);

			$commentaires->execute() or die(print_r($commentaires->errorInfo(), TRUE));
			return $commentaires;
		}

		public function ajoutCommentaires()
		{
			$bdd = $this->connexionBdd();
			$ajoutCommentaires = $bdd->prepare("INSERT INTO `commentaires`(`idChapitre`, `pseudo`, `commentaire`, `dateHeure`) VALUES (:idChapitre, :pseudo, :commentaire, NOW())");
			$ajoutCommentaires->execute(array(
				'idChapitre' => $_POST["idChapitre"],
				'pseudo' => $_POST["pseudo"],
				'commentaire' => $_POST["commentaire"]

			));
			return $ajoutCommentaires;
		}

		public function maxCommentaires()
		{
			if (isset($_POST["idChapitre"])) {
				$idChapitre = $_POST["idChapitre"];
			} else {
				$idChapitre = $_GET["idChapitre"];
			}
			$bdd = $this->connexionBdd();
			$req = $bdd->prepare("SELECT * FROM `commentaires` WHERE idChapitre = :idChapitre ORDER BY id DESC ");
			$req->execute(array('idChapitre' => $idChapitre));
			$maxCommentaires = 0;
			while ($donnees = $req->fetch()) {
				$maxCommentaires++;
			}
			return $maxCommentaires;
		}

		public function maxCommentairesSignaler()
		{
			if (isset($_POST["idChapitre"])) {
				$idChapitre = $_POST["idChapitre"];
			} else {
				$idChapitre = $_GET["idChapitre"];
			}
			$bdd = $this->connexionBdd();
			$req = $bdd->prepare("SELECT * FROM `commentaires` WHERE idChapitre = :idChapitre && signalement = true ORDER BY id DESC ");
			$req->execute(array('idChapitre' => $idChapitre));
			$maxCommentairesSignaler = 0;
			while ($donnees = $req->fetch()) {
				$maxCommentairesSignaler++;
			}
			return $maxCommentairesSignaler;
		}

		public function supprimerCommentaire()
		{
			$bdd = $this->connexionBdd();
			$supprimerCommentaire = $bdd->prepare("DELETE FROM `commentaires` WHERE `id`= :id");
			$supprimerCommentaire->execute(array('id' => $_POST["id"]));

			return $supprimerCommentaire;
		}

		public function signaler()
		{
			$bdd = $this->connexionBdd();
			$signaler = $bdd->prepare("UPDATE `commentaires` SET `signalement`= true,`dateSignalement`= NOW() WHERE `id`= :id");
			$signaler->execute(array('id' => $_POST["id"]));

			return $signaler;
		}

		public function supprimerSignalement()
		{
			$bdd = $this->connexionBdd();
			$supprimerSignalement = $bdd->prepare("UPDATE `commentaires` SET `signalement`= false,`dateSignalement`= NOW() WHERE `id`= :id");
			$supprimerSignalement->execute(array('id' => $_POST["id"]));

			return $supprimerSignalement;
		}
}

$commentaires = new Commentaires;

?>