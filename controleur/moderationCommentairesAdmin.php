<?php 
    require "../modele/Chapters.php";
    require "../modele/Commentaires.php";
    require "../modele/Manager.php";
    $manager = new Manager;
    if (isset($_POST["idChapitre"])) {
       
        $idChapitre = $_POST["idChapitre"];
    }else {
        $idChapitre = $_GET["idChapitre"];
    }
    $chapitreChoisis = $manager->chaptre($idChapitre);
    
    if (isset($_POST["oui"]) && isset($_POST["id"])  ) {
    	$manager->supprimerCommentaire($_POST["id"]);
    }

    if (isset($_GET['limitMin'])) {
     $limitMin = $_GET['limitMin'];
    }else {
      $limitMin = 0;
    }
  /*

  
  	if (isset($_POST["supprimerSignalement"])) {
		$supprimerSignalement = supprimerSignalement();  	
	}
    if (isset($_POST["oui"])) {
    	$supprimerCommentaire = supprimerCommentaire();
    }
    $maxCommentaires = maxCommentaires();
    $maxCommentairesSignaler = maxCommentairesSignaler();
    $chapitresChoisis = chapitresChoisis();
    $commentaires = commentaires();
    */
    require "../vue/vueModerationCommentairesAdmin.php";
?>