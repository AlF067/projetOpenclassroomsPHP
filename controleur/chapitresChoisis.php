<?php
require "../modele/Chapters.php";
require "../modele/Commentaires.php";
require "../modele/Manager.php";
$manager = new Manager;
$chapitreChoisis = $manager->chaptre($_GET["idChapitre"]);

/* Enregistre le signalement dans la BDD s'il y en a  */

if (isset($_POST["signalement"])) {  
  $manager->signaler($_POST["signalement"]);
}
/* Pour la pagination des commentaires */
if (isset($_GET['limitMin'])) {
 $limitMin = $_GET['limitMin'];
}else {
  $limitMin = 0;
}
/* Ajoute un commentaire s'il y en a un a ajouter */
if (isset($_POST["idChapitre"]) && $_POST["pseudo"] && $_POST["commentaire"] ) {
  $manager->ajoutCommentaires(($_POST["idChapitre"]), ($_POST["pseudo"]), ($_POST["commentaire"]));
}


require "../vue/vueChapitresChoisis.php";
