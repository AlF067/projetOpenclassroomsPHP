<?php 
    require "modele/modele.php";
    if (isset($_POST["histoire"])) {
        if ($_POST["histoire"] == true) {
            $ajouterChapitre = ajouterChapitre();
            $chapitres = chapitres(); 
        }           
    } 
    if (isset($_POST["modifHistoire"]) || isset($_POST["modifTitre"]) || isset($_POST["modifId"])) {
        if ($_POST["modifHistoire"] == true || $_POST["modifTitre"] == true || $_POST["modifId"] == true) {
            $modifierChapitre = modifierChapitre();
            $chapitres = chapitres(); 
        } 
    }
        if (isset($_POST["oui"])) {
            
            $supprimerChapitre = supprimerChapitre();
            $chapitres = chapitres();
           
       }  
    else {
            $chapitres = chapitres();
        }



    require "vue/vueAccueilAdmin.php";
?>
