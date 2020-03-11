<?php 
    require "modele/modele.php";
    if (isset($_POST["histoire"])) {
        if ($_POST["histoire"] == true) {
            $ajouterChapitre = ajouterChapitre();
            $chapitres = chapitres(); 
        }           
    } 
    if (isset($_POST["modifHistoire"]) || isset($_POST["modifTitre"])) {
        if ($_POST["modifHistoire"] == true || $_POST["modifTitre"] == true) {
            $modifierChapitre = modifierChapitre();
            $chapitres = chapitres(); 
        } 
    } else {
        $chapitres = chapitres();
        }

    require "vue/vueAccueilAdmin.php";
?>
