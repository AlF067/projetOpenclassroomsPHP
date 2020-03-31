<?php
require "../modele/Chapters.php";
require "../modele/Commentaires.php";
require "../modele/Manager.php";
$manager = new Manager;


if (isset($_GET["idChapitre"])) {
  $idChapitre = (int) $_GET["idChapitre"];
}
if (isset($_POST["idChapitre"])) {
  $idChapitre = (int) $_POST["idChapitre"];
}

if (!($idChapitre > $manager->maxChaptres())) {
  if (!($idChapitre == 0)) {

    $chapitreChoisis = $manager->chaptre($idChapitre);

    /* Enregistre le signalement dans la BDD s'il y en a  */

    if (isset($_POST["signalement"])) {
      
      $signalement = (int) $_POST["signalement"];
      $manager->signaler($signalement);
    }
    /* Pour la pagination des commentaires */
    if (isset($_POST['limitMin'])) {
      $limitMin = (int) $_POST['limitMin'];

      if ($limitMin >= $manager->maxCommentaires($idChapitre)) {
        $limitMin= 0;
      }
    } else {
      $limitMin = 0;
    }
    /* Ajoute un commentaire s'il y en a un a ajouter */
    
    if (isset($_GET["idChapitre"]) && isset($_POST["pseudo"]) && isset($_POST["commentaire"])) {

      $pseudo = (string) htmlspecialchars($_POST["pseudo"]);
      $commentaire = (string) htmlspecialchars($_POST["commentaire"]);
      if (strlen($pseudo) <= 13 && strlen($commentaire) <= 151) {
        $manager->ajoutCommentaires($idChapitre, $pseudo, $commentaire);
      }
      
    }
    
    require "../vue/vueChapitresChoisis.php";
  } else {
    require "../vue/vuePageErreur.php";
  }
} else {
  require "../vue/vuePageErreur.php";
}
