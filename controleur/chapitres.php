<?php 
    require "../modele/modele.php";
    $chapitres = chapitres();
    $maxChapitres = maxChapitres();

    require "../vue/vueChapitres.php";
?>