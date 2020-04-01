<?php 
   require "../../modele/Chapters.php";
   require "../../modele/Commentaires.php";
   require "../../modele/Manager.php";
   $manager = new Manager;
   $chapitreChoisis = $manager->chaptre($_GET["idChapitre"]);

    require "../vue/vueModificationChapitre.php";
  
?>