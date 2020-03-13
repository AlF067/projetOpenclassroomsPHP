<?php 
    require "../modele/modele.php";
    

    if (isset($_POST["pseudo"]) && isset($_POST["commentaire"]) && isset($_POST["idChapitre"])  ) {	
    		$ajoutCommentaires = ajoutCommentaires();
			$chapitresChoisis = chapitresChoisis();	
    }else{
    	$chapitresChoisis = chapitresChoisis();
    }
    
    $commentaires = commentaires();

    require "../vue/vueChapitresChoisis.php";
?>