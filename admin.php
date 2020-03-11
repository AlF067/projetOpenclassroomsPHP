<?php 
    require "modele/modele.php";
    if (isset($_POST["histoire"])) {
        if ($_POST["histoire"] == true) {
            $ajouterChapitre = ajouterChapitre();
            $chapitres = chapitres(); 
        } else {
            $chapitres = chapitres();
        }        
    } else {
        $chapitres = chapitres();
    }

    require "vue/vueAccueilAdmin.php";
?>
