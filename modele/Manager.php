<?php


class Manager
{

  private $_bdd;
 

  public function __construct()
  {
    $this->bdd();
  }

  private function bdd()
  {
    try {
      $this->_bdd = new PDO('mysql:host=localhost;dbname=blog;port=3308', 'root', '');
      $this->_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {
      die('Erreur : ' . $e->getMessage());
    }
  }

    /* PARIE CHAPITRES */ 

  public function addChaptre(Chapters $objet)
  {
  }

  public function chaptre($idChapitre)
  {
    $chapitresChoisis = $this->_bdd->prepare('SELECT * FROM chapitres WHERE id=? ');
    $chapitresChoisis->execute(array($idChapitre));

    $donneesChapitresChoisis = $chapitresChoisis->fetch();
    return $donneesChapitresChoisis;
  }

  public function updateChaptre(Chapters $objet)
  {
  }

  public function deleteChapitre(Chapters $objet)
  {
  }

  public function listChaptres($limitMin, $limitMax)
  {

    $chapitres = $this->_bdd->prepare('SELECT * FROM chapitres ORDER BY id DESC LIMIT :limitMin , :limitMax');
    $chapitres->bindValue(':limitMin', $limitMin, PDO::PARAM_INT);
    $chapitres->bindValue(':limitMax', $limitMax, PDO::PARAM_INT);
    $chapitres->execute() or die(print_r($chapitres->errorInfo(), TRUE));
    while ($donnees = $chapitres->fetch()) {
      $chapitre[] = new Chapters($donnees);
    }
    $chapitres->closeCursor();

    return $chapitre;
  }

  public function maxChaptres(){
    $chapitres = $this->_bdd->query('SELECT * FROM chapitres ORDER BY id DESC ');
    $chapitres->execute() or die(print_r($chapitres->errorInfo(), TRUE));
    $maxChapters = 0;
    while ($donnees = $chapitres->fetch()) {
      
      $maxChapters++;
    }
    $chapitres->closeCursor();

    return $maxChapters;
    
  }


  /* PARIE COMMENTAIRES */ 

  public function commentairesAll($idChapitre, $limitMin)
		{
      /*
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
*/
			
			$commentaires = $this->_bdd->prepare('SELECT * FROM chapitres INNER JOIN commentaires  ON commentaires.idChapitre = chapitres.idChapitre WHERE commentaires.idChapitre = :idChapitre ORDER BY commentaires.dateHeure DESC LIMIT :limitMin , 5 ');
			$commentaires->bindValue(':idChapitre', $idChapitre, PDO::PARAM_INT);
			$commentaires->bindValue(':limitMin', $limitMin, PDO::PARAM_INT);

      $commentaires->execute() or die(print_r($commentaires->errorInfo(), TRUE));
      
      while ($donnees = $commentaires->fetch()) {
        $commentaire[] = new Commentaires($donnees);
      }
			return $commentaire;
		}

		public function ajoutCommentaires()
		{
			
			$ajoutCommentaires = $this->_bdd->prepare("INSERT INTO `commentaires`(`idChapitre`, `pseudo`, `commentaire`, `dateHeure`) VALUES (:idChapitre, :pseudo, :commentaire, NOW())");
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
		
			$req = $this->_bdd->prepare("SELECT * FROM `commentaires` WHERE idChapitre = :idChapitre ORDER BY id DESC ");
			$req->execute(array('idChapitre' => $idChapitre));
			$maxCommentaires = 0;
			while ($donnees = $req->fetch()) {
				$maxCommentaires++;
			}
			return $maxCommentaires;
		}
/*
		public function maxCommentairesSignaler()
		{
			if (isset($_POST["idChapitre"])) {
				$idChapitre = $_POST["idChapitre"];
			} else {
				$idChapitre = $_GET["idChapitre"];
			}
			
			$req = $this->_bdd->prepare("SELECT * FROM `commentaires` WHERE idChapitre = :idChapitre && signalement = true ORDER BY id DESC ");
			$req->execute(array('idChapitre' => $idChapitre));
			$maxCommentairesSignaler = 0;
			while ($donnees = $req->fetch()) {
				$maxCommentairesSignaler++;
			}
			return $maxCommentairesSignaler;
		}

		public function supprimerCommentaire()
		{
			
			$supprimerCommentaire = $this->_bdd->prepare("DELETE FROM `commentaires` WHERE `id`= :id");
			$supprimerCommentaire->execute(array('id' => $_POST["id"]));

			return $supprimerCommentaire;
		}

		public function signaler()
		{
			
			$signaler = $this->_bdd->prepare("UPDATE `commentaires` SET `signalement`= true,`dateSignalement`= NOW() WHERE `id`= :id");
			$signaler->execute(array('id' => $_POST["id"]));

			return $signaler;
		}

		public function supprimerSignalement()
		{
			
			$supprimerSignalement = $this->_bdd->prepare("UPDATE `commentaires` SET `signalement`= false,`dateSignalement`= NOW() WHERE `id`= :id");
			$supprimerSignalement->execute(array('id' => $_POST["id"]));

			return $supprimerSignalement;
    }
    
    */
}
