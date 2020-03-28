<?php 
    require "../modele/Chapters.php";
    require "../modele/Manager.php";
    $manager = new Manager;

    if (isset($_GET["limitMin"])) {
        $limitMin = $_GET["limitMin"];
    }else {
        $limitMin = 0;
    }
    
    require "../vue/vueChapitres.php";
?>