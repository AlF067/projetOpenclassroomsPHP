<?php $titleAdmin = "Accueil Administrateur" ; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesChapitres.css">' ?>
<?php ob_start();  ?>

<section id="ajout">
    <p><a href="../controleur/ajoutAdmin.php"><i class="far fa-plus-square"></i> Ajouter un article</a></p>
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
                        <a href="controleur/moderationCommentairesAdmin.php?idChapitre=<?php echo $donnees['idChapitre'] ?>">Commentaires</a>
                        <a href="../vue/vueConfirmationSuppressionAdmin.php?idChapitre=<?php echo $donnees['idChapitre'] ?>">Supprimer</a>
                        <a href="../controleur/modificationAdmin.php?idChapitre=<?php echo $donnees['idChapitre'] ?>">Modifer</a>     
                    </div>
                </div>
    <?php 
            }
    ?>
                <div id="paginationChapitres">
                            <?php 
                            $pages = 0;
                            $limitMin = 0;
                            $commentairesParPage = 0; 
                            echo "<div id='nombreDePages'>Pages : </div>" ;
                            while ( $limitMin < $maxChapitres) { 
                                ?>
                                
                                    <?php 
                                     if ($pages == 0) {
                                            
                                        }else{
                                            echo "<div class='slash'>/</div>";
                                        } ?>
                                    <div id="numerosPage">
                                         <a href="../admin.php?page=<?php echo $pages ?>"><?php echo $pages ; ?></a>
                                        
                                    </div>
                              
                            <?php
                            $commentairesParPage +=5;
                            $limitMin +=5;
                            $pages++ ;
                            }
                            ?>

<?php
    $chapitres->closeCursor();

    ?> 
</section>

<?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'gabaritAdmin.php'; ?>