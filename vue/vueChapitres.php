<?php $title = "Chapitres" ; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesGeneral.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesChapitres.css">' ?>
<?php ob_start();  ?>
             <?php 
                        while ($donnees = $chapitres->fetch())
                        {
                        ?>
                            <div class="blocChapitre">
                                <div class="chapitre">
                                    <h2><?php echo $donnees['titre']. " " . " ajouté le " . $donnees['dateAjout']?></h2>
                                    <p><?php echo $donnees['histoire'] ?></p>
                                </div>
                                <div class="lireChapitre">
                                    <a href="../controleur/chapitresChoisis.php?id=<?php echo $donnees['id'] ?>">Lire le chapitre</a>
                                </div>
                            </div>
                        <?php 

                        }
                        $chapitres->closeCursor();
                        ;
                ?>      

<?php $contenu = ob_get_clean();  ?>
<?php require 'gabarit.php'; ?>