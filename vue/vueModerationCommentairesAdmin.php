<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesChapitresChoisis.css">' ?>
<?php ob_start();  ?>
    <div id="moderationCommentaires">
        <div id="commentaires">
            <h3>Les Commentaires</h3>
            <?php
            while ($donnees = $commentaires->fetch()) {   
              
            ?>
                <div class="commentairesAfficher">
                    
                    <h4><?php echo $donnees['pseudo'];  ?> : <span>le <?php echo $donnees['dateHeure'];  ?></span></h4>
                    <p><?php echo $donnees['commentaire'];  ?></p>

                    <div><a href="../controleur/confirmationSuppressionCommentaire.php?id=<?php echo $donnees['id'] ?>&idChapitre=<?php echo $donnees['idChapitre'] ?> ">Supprimer</a></div>
                   
                </div>
            <?php 
            }
            ?>
            <?php $donneesChapitresChoisis = $chapitresChoisis->fetch() ?>
            <div class="pages">
                <?php $i = 0 ; 
                $limitMin = 0 ; ?>

                <?php while($limitMin < $maxCommentaires){ 
                    ?>
                <a href="../controleur/moderationCommentairesAdmin.php?idChapitre=<?php echo $donneesChapitresChoisis['id'] ?>&limitMin=<?php echo $limitMin ?>"><?php echo $i ; ?>-</a>
              <?php $limitMin +=3 ; ?>
              <?php $i++ ; ?>
              
            <?php 
            } 
            ?>
            </div>
        </div>
        <?php $commentaires->closeCursor();  ?>
        <?php $chapitresChoisis->closeCursor();  ?>

        <?php 

   if (isset($_POST["oui"])) {
        $supprimerCommentaire = supprimerCommentaire();
    }
    $maxCommentaires = maxCommentaires();
    $chapitresChoisis = chapitresChoisis();
    $commentaires = commentaires();
         ?>

        <div id="commentairesSignaler">
             <h3>Les Commentaires signalés</h3>
            <?php
            while ($donnees = $commentaires->fetch()) {   
              if ($donnees['signalement']) {
                  
              
            ?>
                <div class="commentairesAfficher">
                    
                    <h4><?php echo $donnees['pseudo'];  ?> : <span>le <?php echo $donnees['dateHeure'];  ?></span></h4>
                    <p><?php echo $donnees['commentaire'];  ?></p>

                    <form method="POST" action="../controleur/moderationCommentairesAdmin.php">
                        <input type="submit" name="oui" value="Supprimer commentaire">
                        <input type="submit" name="supprimerSignalement" value="Supprimer signalement">
                        <input type="hidden" name="id" value="<?php echo $donnees['id'] ?>">
                        <input type="hidden" name="idChapitre" value="<?php echo $donnees['idChapitre'] ?>">
                        

                    </form>
                   
                </div>
            <?php 
            }
            }
            ?>
            <?php $donneesChapitresChoisis = $chapitresChoisis->fetch() ?>
            <div class="pages">
                <?php $i = 0 ; 
                $limitMin = 0 ; ?>

                <?php while($limitMin < $maxCommentairesSignaler){ 
                    ?>
                <a href="../controleur/moderationCommentairesAdmin.php?idChapitre=<?php echo $donneesChapitresChoisis['id'] ?>&limitMin=<?php echo $limitMin ?>"><?php echo $i ; ?>-</a>
              <?php $limitMin +=3 ; ?>
              <?php $i++ ; ?>
              
            <?php 
            } 
            ?>
            </div>
        </div>
    </div>

        <p><a href="../admin.php">Retour</a></p>

            <?php $commentaires->closeCursor();  ?>
           
    </div>
<?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'gabaritAdmin.php'; ?>