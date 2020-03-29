<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesChapitresChoisis.css">' ?>
<?php ob_start();  ?>
    <div id="moderationCommentaires">
    <div id="commentaires">
        
        <h3>Les Commentaires</h3>
        <?php
        foreach ($manager->commentairesAll($idChapitre, $limitMin) as $obj) {
        ?>
            <div class="commentairesAfficher">
                <h4><?php echo $obj->pseudo() . " " . " ajouté le <span> " . $obj->dateHeure() . "</span>" ?></h4>
                <p><?php echo $obj->commentaire() ?></p>
                <div><a href="../controleur/confirmationSuppressionCommentaire.php?id=<?php echo $obj->id() ?>&idChapitre=<?php echo $obj->idChapitre() ?> ">Supprimer</a></div>
            </div>

        <?php
        }
        ?>
    

    <?php  ?>
    <div  id="pages">
        <?php $pages = 0;
        $limitMin = 0;
        echo "<div id='nombreDePages'>Page : </div>"; ?>
        <?php while ($limitMin < $manager->maxCommentaires()) { ?>
            <?php
            if (!$pages == 0) {
                echo "<div class='slash'>/</div>";
            }
            ?>
            <a href="../controleur/moderationCommentairesAdmin.php?idChapitre=<?php echo $chapitreChoisis['idChapitre'] ?>&limitMin=<?php echo $limitMin ?>"><?php echo $pages + 1; ?></a>
            <?php $limitMin += 3; ?>
            <?php $pages++; ?>

        <?php } ?>

    </div>



</div>

        <?php 
/*
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
<?php */  ?>
    </div>

        <p><a href="../admin.php">Retour</a></p>

           
    </div>
<?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'gabaritAdmin.php'; ?>