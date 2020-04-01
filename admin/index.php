<?php

require "../modele/Chapters.php";
require "../modele/Manager.php";
$manager = new Manager;

 
/* Supprime un chapitre s'il y en a un a supprimer */
if (isset($_POST["oui"])) {
    $manager->deleteChapitre($_POST["idChapitre"]);
}  

/* Modifie un chapitre s'il y en a un a ajouter */
if (isset($_POST["modifHistoire"]) && isset($_POST["modifTitre"])) {
    $manager->updateChaptre($_POST["idChapitre"], $_POST["modifTitre"], $_POST["modifHistoire"]);
}

/* Ajoute un chapitre s'il y en a un a ajouter */
if (isset($_POST["histoire"]) && isset($_POST["titre"])) {
    if ($manager->chaptre($_POST["idChapitre"]) == false) {
        $manager->addChaptre($_POST["idChapitre"], $_POST["titre"], $_POST["histoire"]);
    }else {
        $chapitreDejaExistant = "le numéro de chapitre existe déja";
    }
    
}

/* Variable necessaire pour afficher la page de la liste des chapitre (5 chapitres par page) */
if (isset($_GET["limitMin"])) {
    $limitMin = $_GET["limitMin"];
} else {
    $limitMin = 0;
}


require "vue/vueAccueilAdmin.php";
