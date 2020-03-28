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

 

  public function allChaptre(Chapters $objet)
  {
  }

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
}
