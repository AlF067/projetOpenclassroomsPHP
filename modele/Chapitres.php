<?php

class Chapitres extends BaseDeDonnees
{

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

	public function chapitresAll()
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

			$donneesChapitresChoisis = $chapitresChoisis->fetch();
			$title = $donneesChapitresChoisis['titre'];
	
			?>
			<h2><?php echo $donneesChapitresChoisis['titre'] . " " . " ajouté le " . $donneesChapitresChoisis['dateAjout'] ?></h2>
			<p><?php echo $donneesChapitresChoisis['histoire'] ?></p>
	
			<?php
	
			$chapitresChoisis->closeCursor();

			return $chapitresChoisis;
		}
}

$chapitres = new Chapitres;

?>