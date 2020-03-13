<?php

/* GENERAL */

function connexionBdd()
{
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=blog;port=3308', 'root', '');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}

	return $bdd;
}


/* PARTIE CLIENT */

function chapitresAccueil()
{
	$bdd = connexionBdd();
	$chapitresAccueil = $bdd->query('SELECT * FROM chapitres ORDER BY titre DESC LIMIT 0,3');
	return $chapitresAccueil;
}

function chapitres()
{
	$bdd = connexionBdd();
	$chapitres = $bdd->query('SELECT * FROM chapitres ORDER BY id DESC ');
	return $chapitres;
}

function chapitresChoisis()
{
	$bdd = connexionBdd();
	$chapitresChoisis = $bdd->prepare('SELECT * FROM chapitres WHERE id=? ');
	$chapitresChoisis->execute(array($_GET["id"]));

	return $chapitresChoisis;
}

/* PARTIE ADMINISTRATEUR */

function ajouterChapitre()
{
	$bdd = connexionBdd();
	$ajouterChapitre = $bdd->prepare("INSERT INTO `chapitres`(`id`,`titre`, `histoire`, `dateAjout`) VALUES (:id, :titre, :histoire, CURDATE())");
	$ajouterChapitre->execute(array(
		'titre' => $_POST["titre"],
		'histoire' => $_POST["histoire"],
		'id' => $_POST["id"]
	));
	return $ajouterChapitre;
}

function modifierChapitre()
{
	$bdd = connexionBdd();
	$modifierChapitre = $bdd->prepare("UPDATE `chapitres` SET `titre`= :titre,`histoire`= :histoire WHERE `id`= :id");
	$modifierChapitre->execute(array(
		'id' => $_POST["id"],
		'titre' => $_POST["modifTitre"],
		'histoire' => $_POST["modifHistoire"]
	));

	return $modifierChapitre;
}

function supprimerChapitre()
{
	$bdd = connexionBdd();
	$supprimerChapitre = $bdd->prepare("DELETE FROM `chapitres` WHERE `id`= :id");
	$supprimerChapitre->execute(array('id' => $_POST["id"]));
}


/* RUBRIQUE COMMENTAIRES */

function commentaires()
{
	if (isset($_GET["limitMin"])) {
		$limitMin = $_GET["limitMin"];
	}else{
		$limitMin = 0;
	}
	
	$bdd = connexionBdd();
	$commentaires = $bdd->prepare('SELECT commentaires.pseudo, commentaires.commentaire, commentaires.dateHeure FROM commentaires INNER JOIN chapitres ON commentaires.idChapitre = chapitres.idChapitre WHERE chapitres.idChapitre = :id ORDER BY commentaires.dateHeure DESC LIMIT :limitMin , 3 ');
	$commentaires ->bindValue(':id', $_GET["id"], PDO::PARAM_INT);
	$commentaires ->bindValue(':limitMin', $limitMin, PDO::PARAM_INT);
	
	$commentaires->execute() or die(print_r($req->errorInfo(), TRUE));
	return $commentaires;
}

function ajoutCommentaires()
{
	$bdd = connexionBdd();
	$ajoutCommentaires = $bdd->prepare("INSERT INTO `commentaires`(`idChapitre`, `pseudo`, `commentaire`, `dateHeure`) VALUES (:idChapitre, :pseudo, :commentaire, NOW())");
	$ajoutCommentaires->execute(array(
		'idChapitre' => $_POST["idChapitre"],
		'pseudo' => $_POST["pseudo"],
		'commentaire' => $_POST["commentaire"]

	));
	return $ajoutCommentaires;
}

function maxCommentaires(){
	$bdd = connexionBdd();
	$req = $bdd->prepare("SELECT * FROM `commentaires` WHERE idChapitre = :idChapitre ORDER BY id DESC ");
	$req->execute(array('idChapitre' => $_GET["id"]));
	$maxCommentaires = 0;
    while ($donnees = $req->fetch()) { 
        $maxCommentaires++;
    }
	return $maxCommentaires;
}

function maxChapitres(){
	$bdd = connexionBdd();
	$req = $bdd->query("SELECT * FROM `chapitres` WHERE idChapitre  ORDER BY id DESC ");
	$maxChapitres = 0;
    while ($donnees = $req->fetch()) { 
        $maxChapitres++;
    }
	return $maxChapitres;
}


?>
