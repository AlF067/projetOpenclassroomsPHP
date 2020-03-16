<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesChapitresChoisis.css">' ?>
<?php ob_start();  ?>
    
        <div id="commentaires">
            <h3>Les Commentaires</h3>
            <?php
            while ($donnees = $commentaires->fetch()) {   
              
            ?>
                <form>
                    
                    <h4><?php echo $donnees['pseudo'];  ?> : <span>le <?php echo $donnees['dateHeure'];  ?></span></h4>
                    <p><?php echo $donnees['commentaire'];  ?></p>

                    <div><a href="../controleur/confirmationSuppressionCommentaire.php?id=<?php echo $donnees['id'] ?>&idChapitre=<?php echo $donnees['idChapitre'] ?> ">Supprimer</a></div>
                   
                </form>
            <?php 
            }
            ?>
            <?php $donneesChapitresChoisis = $chapitresChoisis->fetch() ?>
            <div id="pages">
                <?php $i = 0 ; 
                $limitMin = 0 ; ?>

                <?php while($limitMin < $maxCommentaires){ ?>
                <a href="../controleur/moderationCommentairesAdmin.php?id=<?php echo $donneesChapitresChoisis['id'] ?>&limitMin=<?php echo $limitMin ?>"><?php echo $i ; ?>-</a>
              <?php $limitMin +=3 ; ?>
              <?php $i++ ; ?>
              
            <?php } ?>

            </div>

            <?php $commentaires->closeCursor();  ?>
           
        </div>

    </div>
<?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'gabaritAdmin.php'; ?>