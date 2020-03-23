<?php $title = "Chapitres" ; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesGeneral.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesChapitres.css">' ?>
<?php ob_start();  ?>

    <?php $chapitres->chapitresAll(); ?> 

<?php $contenu = ob_get_clean();  ?>
<?php require 'gabarit.php'; ?>