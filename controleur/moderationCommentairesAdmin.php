<?php 
    require "../modele/modele.php";
  
    if (isset($_POST["oui"])) {
    	$supprimerCommentaire = supprimerCommentaire();
    }
    $maxCommentaires = maxCommentaires();
    $chapitresChoisis = chapitresChoisis();
    $commentaires = commentaires();
    
    require "../vue/vueModerationCommentairesAdmin.php";
?>