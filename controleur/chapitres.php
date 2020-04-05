<?php



if (isset($_GET["limitMin"])) {
    $limitMin = (int) $_GET["limitMin"];
} else {
    $limitMin = (int) 0;
}
$maxChaptres = $manager->maxChaptres();

if ($limitMin < $maxChaptres) {

    $listChaptres = $manager->listChaptres($limitMin, 5);
    $pages = 0;
    $limitMin = 0;
    $commentairesParPage = 0;

    require "vue/vueChapitres.php";
} else {
    throw new Exception('Une erreur s\'est produite');
}
