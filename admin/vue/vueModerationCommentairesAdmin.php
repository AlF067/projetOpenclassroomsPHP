<?php $titleAdmin = "Modération commentaires"; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../../styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../../styles/stylesChapitresChoisis.css">' ?>
<?php ob_start();  ?>
<div id="moderationCommentaires">
    <div class="commentaires">
        <div class="blocCommentaires">
            <h3>Les Commentaires</h3>
            <?php
            if (!($manager->commentairesAll($idChapitre, $limitMin) == 0)) {
                foreach ($manager->commentairesAll($idChapitre, $limitMin) as $obj) {
            ?>
                    <div class="commentairesAfficher">
                        <h4><?php echo $obj->pseudo() . " " . " ajouté le <span> " . $obj->dateHeure() . "</span>" ?></h4>
                        <p><?php echo $obj->commentaire() ?></p>
                        <div>
                            <a href="../controleur/confirmationSuppressionCommentaire.php?id=<?php echo $obj->id() ?>&idChapitre=<?php echo $obj->idChapitre() ?> ">Supprimer</a>
                        </div>
                    </div>

            <?php
                }
            }

            ?>
        </div>
        <?php  ?>
        <div class="pages">
            <?php $pages = 0;
            $limitMin = 0;
            if (!(count($manager->commentairesAll($idChapitre, $limitMin))) == 0) {
                echo "<div class='nombreDePages'>Page : </div>";
            }
            ?>
            <?php while ($limitMin < $manager->maxCommentaires($idChapitre)) { ?>
                <?php
                if (!$pages == 0) {
                    echo "<div class='slash'>/</div>";
                }
                ?>
                <form method="POST" action="../controleur/moderationCommentairesAdmin.php">
                    <input type="submit" name="page" value="<?php echo $pages + 1; ?>">
                    <input type="hidden" name="idChapitre" value="<?php echo $chapitreChoisis['idChapitre'] ?>>">
                    <input type="hidden" name="limitMin" value="<?php echo $limitMin ?>">
                    <input type="hidden" name="limitMinSignal" value="<?php echo $limitMinSignal ?>">
                </form> <?php $limitMin += 3; ?>
                <?php $pages++; ?>

            <?php } ?>

        </div>



    </div>


    <div class="commentaires">
        <div class="blocCommentaires">
            <h3>Les Commentaires signalés</h3>

            <?php
            if (isset($_POST['limitMin'])) {
                $limitMin = $_POST['limitMin'];
            } else {
                $limitMin = 0;
            }
            foreach ($manager->commentairesSignaler($idChapitre, $limitMinSignal) as $obj) {
            ?>
                <div class="commentairesAfficher">
                    <h4><?php echo $obj->pseudo() . " " . " ajouté le <span> " . $obj->dateSignalement() . "</span>" ?></h4>
                    <p><?php echo $obj->commentaire() ?></p>
                    <form method="POST" action="../controleur/moderationCommentairesAdmin.php">
                        <button type="submit" name="effacerSignalement" value="<?php echo $obj->id() ?>">Effacer signalement</button>
                        <input type="hidden" name="idChapitre" value="<?php echo $chapitreChoisis['idChapitre'] ?>">
                        <input type="hidden" name="limitMinSignal" value="<?php echo $limitMinSignal ?>">
                        <input type="hidden" name="limitMin" value="<?php echo $limitMin ?>">
                    </form>
                </div>

            <?php
            }
            ?>
        </div>
        <div class="pages">
            <?php $pages = 0;


            $limitMinSignal = 0;
            if (!(count($manager->commentairesSignaler($idChapitre, $limitMinSignal))) == 0) {
                echo "<div class='nombreDePages'>Page : </div>";
            }
            ?>
            <?php while ($limitMinSignal < $manager->maxCommentairesSignaler($idChapitre)) { ?>
                <?php
                if (!$pages == 0) {
                    echo "<div class='slash'>/</div>";
                }
                ?>
                <form method="POST" action="../controleur/moderationCommentairesAdmin.php">
                    <input type="submit" name="page" value="<?php echo $pages + 1; ?>">
                    <input type="hidden" name="idChapitre" value="<?php echo $chapitreChoisis['idChapitre'] ?>">
                    <input type="hidden" name="limitMinSignal" value="<?php echo $limitMinSignal ?>">
                    <input type="hidden" name="limitMin" value="<?php echo $limitMin ?>">
                </form>

                <?php $limitMinSignal += 3; ?>
                <?php $pages++; ?>

            <?php } ?>


        </div>

    </div>
    <?php   ?>
</div>

<p id="retour"><a href="../../admin">Retour</a></p>


</div>
<?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'gabaritAdmin.php'; ?>