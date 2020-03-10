<?php $title = "Accueil" ; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesGeneral.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesIndex.css">' ?>
<?php ob_start();  ?>

            <div id="desc">
                <div id="billets">
                     <?php 
                        while ($donnees = $chapitresAccueil->fetch())
                        {
                        ?>
                            <div class="blocBillet">
                                <div class="billet">
                                    <h2><?php echo $donnees['titre']. " " . " ajouté le " . $donnees['dateAjout']?></h2>
                                    <p><?php echo $donnees['histoire'] ?></p>
                                </div>
                                <div class="lireChapitre">
                                    <a href="../controleur/chapitresChoisis.php?id=<?php echo $donnees['id'] ?>">Lire le chapitre</a>
                                </div>
                            </div>

                        <?php 
                        }
                        $chapitresAccueil->closeCursor();
                    ?> 
                </div>

                <p><a href="../controleur/chapitres.php">Tous les chapitres</a></p>
            </div>

<?php $contenu = ob_get_clean();  ?>
<?php require 'gabarit.php'; ?>
       