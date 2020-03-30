<?php $titleAdmin = "Modération commentaires"; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesChapitresChoisis.css">' ?>
<?php ob_start();  ?>
<div id="moderationCommentaires">
    <div class="commentaires">

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
        <div class="pages">
            <?php $pages = 0;
            $limitMin = 0;
            echo "<div id='nombreDePages'>Page : </div>"; ?>
            <?php while ($limitMin < $manager->maxCommentaires($idChapitre)) { ?>
                <?php
                if (!$pages == 0) {
                    echo "<div class='slash'>/</div>";
                }
                ?>
                <a href="../controleur/moderationCommentairesAdmin.php?idChapitre=<?php echo $chapitreChoisis['idChapitre'] ?>&limitMin=<?php echo $limitMin ?>&limitMinSignal=<?php echo $limitMinSignal ?>"><?php echo $pages + 1; ?></a>
                <?php $limitMin += 3; ?>
                <?php $pages++; ?>

            <?php } ?>

        </div>



    </div>


    <div class="commentaires">
        <h3>Les Commentaires signalés</h3>

        <?php
        foreach ($manager->commentairesSignaler($idChapitre, $limitMinSignal) as $obj) {
        ?>
            <div class="commentairesAfficher">
                <h4><?php echo $obj->pseudo() . " " . " ajouté le <span> " . $obj->dateSignalement() . "</span>" ?></h4>
                <p><?php echo $obj->commentaire() ?></p>
                <form method="POST" action="../controleur/moderationCommentairesAdmin.php?idChapitre=<?php echo $chapitreChoisis['idChapitre'] ?>&limitMin=<?php echo $limitMin ?>&limitMinSignal=<?php echo $limitMinSignal ?>">
                    <button type="submit" name="effacerSignalement" value="<?php echo $obj->id() ?>">Effacer signalement</button>
                </form>
            </div>

        <?php
        }
        ?>
        <div class="pages">
            <?php $pages = 0;
            $limitMin = 0;
            $limitMinSignal = 0;
            if (!(count($manager->commentairesSignaler($idChapitre, $limitMinSignal))) == 0) {
                echo "<div id='nombreDePages'>Page : </div>";
            }
             ?>
            <?php while ($limitMinSignal < $manager->maxCommentairesSignaler($idChapitre)) { ?>
                <?php
                if (!$pages == 0) {
                    echo "<div class='slash'>/</div>";
                }
                ?>
                <a href="../controleur/moderationCommentairesAdmin.php?idChapitre=<?php echo $chapitreChoisis['idChapitre'] ?>&limitMin=<?php echo $limitMin ?>&limitMinSignal=<?php echo $limitMinSignal ?>"><?php echo $pages + 1; ?></a>
                <?php $limitMin += 3; ?>
                <?php $limitMinSignal += 3; ?>
                <?php $pages++; ?>

            <?php } ?>


        </div>
 
    </div>
    <?php   ?>
</div>

<p id="retour"><a href="../admin.php">Retour</a></p>


</div>
<?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'gabaritAdmin.php'; ?>