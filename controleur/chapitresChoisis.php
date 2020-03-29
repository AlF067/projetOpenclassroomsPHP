<?php
require "../modele/Chapters.php";
require "../modele/Commentaires.php";
require "../modele/Manager.php";
$manager = new Manager;
$chapitreChoisis = $manager->chaptre($_GET["idChapitre"]);



require "../vue/vueChapitresChoisis.php";


/*
require "../modele/modele.php";
    
    $maxCommentaires = maxCommentaires();
    
      if (isset($_POST["signaler"])) {
        $signaler = signaler();
    }

    if (isset($_POST["pseudo"]) && isset($_POST["commentaire"]) && isset($_POST["idChapitre"])  ) {	
    		$ajoutCommentaires = ajoutCommentaires();
			$chapitresChoisis = chapitresChoisis();	
    }else{
    	$chapitresChoisis = chapitresChoisis();
    }
    
    
    $commentaires = commentaires();

    require "../vue/vueChapitresChoisis.php";

*/