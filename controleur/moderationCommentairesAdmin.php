<?php 
    require "../modele/modele.php";
  
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
    
    require "../vue/vueModerationCommentairesAdmin.php";
?>