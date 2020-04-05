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
        if ($_GET["action"] == "biographie") {
            require "vue/vueBiographie.php";
        }
        if ($_GET["action"] == "chapitres") {
            require "controleur/chapitres.php";
        }
        if ($_GET["action"] == "lecture") {
            require "controleur/chapitresChoisis.php";
        }
        
    
    }else {
        require "vue/vueAccueil.php";
    }
} catch (Exception $e) {
    echo "erreur";
} 
