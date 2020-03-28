<?php $title = "Accueil" ; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesGeneral.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesIndex.css">' ?>
<?php ob_start();  ?>

            <div id="desc">
                <div id="billets">
                     <?php 
                       foreach ($manager->listChaptres(0,3) as $obj) {
                        ?>
                                    <div class="blocBillet">
                                        <div class="billet">
                                            <h2><?php echo $obj->titre() . " " . " ajouté le " . $obj->dateAjout() ?></h2>
                                            <p><?php echo $obj->histoire() ?></p>
                                        </div>
                                        <div class="lireChapitre">
                                            <a href="../controleur/chapitresChoisis.php?idChapitre=<?php echo $obj->idChapitre() ?>">Lire le chapitre</a>
                                        </div>
                                    </div>
                        
                                <?php
                                }
                    ?> 
                </div>

                <p><a href="../controleur/chapitres.php">Tous les chapitres</a></p>
            </div>

<?php $contenu = ob_get_clean();  ?>
<?php require 'gabarit.php'; ?>
       