<?php $titleAdmin = "Accueil Administrateur" ; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesChapitres.css">' ?>
<?php ob_start();  ?>

        <section id="ajout">
            <p><a href="ajout.php"><i class="far fa-plus-square"></i> Ajouter un article</a></p>
        </section>
        <section>
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
                                    <a href="../controleur/chapitresChoisis.php?id=<?php echo $donnees['id'] ?>">Lire</a>
                                    <a href="#">Supprimer</a>
                                    <a href="modificationAdmin.php">Modifer</a>     
                                </div>
                            </div>
                        <?php 

                        }
                        $chapitres->closeCursor();
                    ?> 
        </section>

<?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'gabaritAdmin.php'; ?>