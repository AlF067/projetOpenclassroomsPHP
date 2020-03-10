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
                

?>
