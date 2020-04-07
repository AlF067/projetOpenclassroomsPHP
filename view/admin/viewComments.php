<?php $titleAdmin = "Modération commentaires"; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="public/styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="public/styles/stylesChapitresChoisis.css">' ?>
<?php ob_start();  ?>
<div id="moderationCommentaires">
    <div class="commentaires">
        <div class="blocCommentaires">
            <h3>Les Commentaires</h3>
            <?php
            if (!($commentsAll == 0)) {
                foreach ($commentsAll as $obj) {
            ?>
                    <div class="commentairesAfficher">
                        <h4><?php echo $obj->pseudo() . " " . " ajouté le <span> " . $obj->dateHeure() . "</span>" ?></h4>
                        <p><?php echo $obj->commentaire() ?></p>
                        <div>
                            <a href="index.php?action=XHYEOSODID&actionAdmin=comments&deleteComment=deleteComment&online=<?php echo $idConnection ?>&id=<?php echo $obj->id() ?>&idChapitre=<?php echo $obj->idChapitre() ?> ">Supprimer</a>
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
            if (!(count($commentsAll)) == 0) {
                echo "<div class='nombreDePages'>Page : </div>";
            }
            ?>
            <?php while ($limitMin < $maxComments) { ?>
                <?php
                if (!$pages == 0) {
                    echo "<div class='slash'>/</div>";
                }
                ?>
                <form method="POST" action="index.php?action=XHYEOSODID&actionAdmin=comments&online=<?php echo $idConnection ?>">
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
            foreach ($commentsSignal as $obj) {
            ?>
                <div class="commentairesAfficher">
                    <h4><?php echo $obj->pseudo() . " " . " ajouté le <span> " . $obj->dateSignalement() . "</span>" ?></h4>
                    <p><?php echo $obj->commentaire() ?></p>
                    <form method="POST" action="index.php?action=XHYEOSODID&actionAdmin=comments&online=<?php echo $idConnection ?>">
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
            if (!(count($commentsSignal)) == 0) {
                echo "<div class='nombreDePages'>Page : </div>";
            }
            ?>
            <?php
            $limitMinSignal = 0;
            while ($limitMinSignal < $maxSignalComments) { ?>
                <?php
                if (!$pages == 0) {
                    echo "<div class='slash'>/</div>";
                }
                ?>
                <form method="POST" action="index.php?action=XHYEOSODID&actionAdmin=comments&online=<?php echo $idConnection ?>">
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

<p id="retour"><a href="index.php?action=XHYEOSODID&online=<?php echo $idConnection ?>">Retour</a></p>


</div>
<?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'gabaritAdmin.php'; ?>