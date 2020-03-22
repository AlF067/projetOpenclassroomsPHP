<?php


class BaseDeDonnees
{
	/* GENERAL */


	private function connexionBdd()
	{
		try {
			$bdd = new PDO('mysql:host=localhost;dbname=blog;port=3308', 'root', '');
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (Exception $e) {
			die('Erreur : ' . $e->getMessage());
		}

		return $bdd;
	}

	/* PARTIE CLIENT */

	public function chapitresAccueil()
	{
		$bdd = $this->connexionBdd();
		$chapitresAccueil = $bdd->query('SELECT * FROM chapitres ORDER BY titre DESC LIMIT 0,3');
		while ($donnees = $chapitresAccueil->fetch()) {
?>
			<div class="blocBillet">
				<div class="billet">
					<h2><?php echo $donnees['titre'] . " " . " ajouté le " . $donnees['dateAjout'] ?></h2>
					<p><?php echo $donnees['histoire'] ?></p>
				</div>
				<div class="lireChapitre">
					<a href="../controleur/chapitresChoisis.php?idChapitre=<?php echo $donnees['id'] ?>">Lire le chapitre</a>
				</div>
			</div>

		<?php
		}
		$chapitresAccueil->closeCursor();
	}

	public function chapitres()
	{
		if (isset($_GET['page'])) {
			$limitMin = $_GET['page'] * 5;
		} else {
			$limitMin = 0;
		}
		$bdd = $this->connexionBdd();
		$chapitres = $bdd->prepare('SELECT * FROM chapitres ORDER BY id DESC LIMIT :limitMin , 5');
		$chapitres->bindValue(':limitMin', $limitMin, PDO::PARAM_INT);

		$chapitres->execute() or die(print_r($chapitres->errorInfo(), TRUE));



		while ($donnees = $chapitres->fetch()) {

		?>

			<div class="blocChapitre">
				<div class="chapitre">
					<h2><?php echo $donnees['titre'] . " " . " ajouté le " . $donnees['dateAjout'] ?></h2>
					<p><?php echo $donnees['histoire'] ?></p>
				</div>
				<div class="lireChapitre">
					<a href="../controleur/chapitresChoisis.php?idChapitre=<?php echo $donnees['id'] ?>">Lire le chapitre</a>
				</div>
			</div>
		<?php

		}
		?>
		<div id="paginationChapitres">
			<?php
			$pages = 0;
			$limitMin = 0;
			$commentairesParPage = 0;
			echo "<div id='nombreDePages'>Pages : </div>";
			while ($limitMin < $this->maxChapitres()) {
			?>

				<?php
				if ($pages == 0) {
				} else {
					echo "<div class='slash'>/</div>";
				} ?>
				<div id="numerosPage">
					<a href="../controleur/chapitres.php?page=<?php echo $pages ?>&limitMin=<?php echo $pages * 5 ?> "><?php echo $pages; ?></a>

				</div>

	<?php
				$commentairesParPage += 5;
				$limitMin += 5;
				$pages++;
			}




			$chapitres->closeCursor();;

			return $chapitres;
		}

		public function maxChapitres()
		{
			$bdd = $this->connexionBdd();
			$reqMaxChapitres = $bdd->query('SELECT * FROM chapitres ORDER BY id DESC ');
			$maxChapitres = 0;
			while ($donnees = $reqMaxChapitres->fetch()) {
				$maxChapitres++;
			}
			return $maxChapitres;
		}

		public function chapitresChoisis()
		{
			if (isset($_POST["idChapitre"])) {
				$idChapitre = $_POST["idChapitre"];
			} else {
				$idChapitre = $_GET["idChapitre"];
			}
			$bdd = $this->connexionBdd();
			$chapitresChoisis = $bdd->prepare('SELECT * FROM chapitres WHERE id=? ');
			$chapitresChoisis->execute(array($idChapitre));

			return $chapitresChoisis;
		}

		/* PARTIE ADMINISTRATEUR */

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


		/* RUBRIQUE COMMENTAIRES */

		public function commentaires()
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

	$bdd = new BaseDeDonnees;

	?>