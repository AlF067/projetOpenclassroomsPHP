<?php
require "modele/Commentaires.php";
require "modele/Chapters.php";
require "modele/Manager.php";
require "controleur/frontend.php";
require "controleur/backend.php";
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
            chapitres();
        }
        elseif ($_GET["action"] == "lecture") {
            chapitresChoisis();
        }elseif ($_GET["action"] == "adminAccueil") {
            adminHome();
        }
        else{
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
