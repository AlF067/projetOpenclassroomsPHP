<?php
require "modele/Commentaires.php";
require "modele/Chapters.php";
require "modele/Manager.php";
$manager = new Manager;

try {
    if(isset($_GET["action"])) {
        if ($_GET["action"] == "contact") {
            require "vue/vueContact.php";
        }
        elseif ($_GET["action"] == "biographie") {
            require "vue/vueBiographie.php";
        }
        elseif ($_GET["action"] == "chapitres") {
            require "controleur/chapitres.php";
        }
        elseif ($_GET["action"] == "lecture") {
            require "controleur/chapitresChoisis.php";
        }else{
            throw new Exception('cette page n\'existe pas');
        }
    }else {
        $homeChapters = $manager->listChaptres(0, 3);
        require "vue/vueAccueil.php";
    }
} catch (Exception $e) {
    $erreur = "erreur : " . $e->getMessage();
    require "vue/vuePageErreur.php";
} 
