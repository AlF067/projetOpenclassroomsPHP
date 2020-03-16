<?php 
    require "../modele/modele.php";
    $maxCommentaires = maxCommentaires();
    $chapitresChoisis = chapitresChoisis();
    $commentaires = commentaires();

    
    require "../vue/vueModerationCommentairesAdmin.php";
?>