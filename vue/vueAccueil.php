<?php $title = "Accueil" ; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesGeneral.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesIndex.css">' ?>
<?php ob_start();  ?>

            <div id="desc">
                <div id="billets">
                     <?php 
                       $bdd->chapitresAccueil();
                    ?> 
                </div>

                <p><a href="../controleur/chapitres.php">Tous les chapitres</a></p>
            </div>

<?php $contenu = ob_get_clean();  ?>
<?php require 'gabarit.php'; ?>
       