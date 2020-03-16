<?php 
    require "../modele/modele.php";
    $maxChapitres = maxChapitres();
   	$chapitres = chapitres();
    
    
    

    require "../vue/vueChapitres.php";
?>