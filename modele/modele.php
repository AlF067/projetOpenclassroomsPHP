<?php 
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

function chapitresAccueil(){
	$bdd = connexionBdd();
	$chapitresAccueil = $bdd->query('SELECT * FROM chapitres ORDER BY id DESC LIMIT 0,3');
	return $chapitresAccueil;
}

function chapitres(){
	$bdd = connexionBdd();
	$chapitres = $bdd->query('SELECT * FROM chapitres ORDER BY id DESC ');
	return $chapitres;
}

function chapitresChoisis(){
	$bdd = connexionBdd();
	$chapitresChoisis = $bdd->prepare('SELECT * FROM chapitres WHERE id=? ');
	$chapitresChoisis->execute(array($_GET["id"]));
	
	return $chapitresChoisis;
}

						/* PARTIE ADMINISTRATEUR */

function ajouterChapitre(){
	$bdd = connexionBdd();
	$ajouterChapitre = $bdd->prepare("INSERT INTO `chapitres`(`titre`, `histoire`, `dateAjout`) VALUES (:titre, :histoire, CURDATE())");
	$ajouterChapitre->execute(array(
		'titre' => $_POST["titre"] ,
		'histoire' => $_POST["histoire"]
	));
	return $ajouterChapitre;
}

function modifierChapitre(){
	$bdd = connexionBdd();
	$modifierChapitre = $bdd->prepare("UPDATE `chapitres` SET `titre`= :titre,`histoire`= :histoire WHERE `id`= :id");
	$modifierChapitre->execute(array(
		'id' => $_POST["id"],
		'titre' => $_POST["modifTitre"] ,
		'histoire' => $_POST["modifHistoire"]
	));

	return $modifierChapitre;

}

function supprimerChapitre(){
	$bdd = connexionBdd();

}          

?>
