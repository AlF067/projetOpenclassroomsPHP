<?php 

function ajouterChapitre(){
	$bdd = connexionBdd();
	$ajouterChapitre = $bdd->prepare("INSERT INTO `chapitres`(`titre`, `histoire`, CURDATE()) VALUES (:titre, :histoire, :dateAjout)");
	$ajouterChapitre->execute(array(
		'titre' => $_POST["titre"] ,
		'histoire' => $_POST["histoire"] 
	));
	return $ajouterChapitre;
}

function modifierChapitre(){
	$bdd = connexionBdd();

}

function supprimerChapitre(){
	$bdd = connexionBdd();

}

function connexionBdd(){	
	try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=blog;port=3308', 'root', '');
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
        }
    catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }

         return $bdd;
}

?>