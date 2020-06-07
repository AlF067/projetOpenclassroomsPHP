<?php $title = "Chapitre"; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="public/styles/stylesGeneral.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="public/styles/stylesChapitresChoisis.css">' ?>
<?php ob_start();  ?>
<div id="lecture">

    <h2><?php echo $chapitreChoisis['titre'] . " " . " ajouté le " . $chapitreChoisis['dateAjout'] ?></h2>
    <p><?php echo $chapitreChoisis['histoire'] ?></p>
    <?php ?>

    <div><a href="index.php?action=chaptres">Retour au choix des chapitres</a></div>
</div>



<div id="rubriqueCommentaires">
    <div>
        <form id="formulaireCommentaires" method="POST" action="index.php?action=lecture&idChapitre=<?php echo $chapitreChoisis['idChapitre'] ?>">
            <h3>Laisser un commentaire</h3>
            <input type="text" name="pseudo" placeholder="Votre pseudo" maxlength="12" required>
            <textarea name="commentaire" placeholder="Votre commentaire" maxlength="150" required></textarea>
            <input type="submit" name="envoi" id="envoi">

        </form>
    </div>


    <div class="commentaires">
        <div class="blocCommentaires">
            <h3>Les Commentaires</h3>
            <?php
            if (isset($signalement)) {
                echo "<p id='messageSignalement'>Votre signalement a été pris en compte</p>";
            }

            foreach ($commentairesAll as $obj) {
            ?>
                <div class="commentairesAfficher">
                    <h4><?php echo $obj->pseudo() . " " . " ajouté le <span> " . $obj->dateHeure() . "</span>" ?></h4>
                    <p><?php echo $obj->commentaire() ?></p>
                    <form action="index.php?action=lecture&idChapitre=<?php echo $chapitreChoisis['idChapitre'] ?>" method="POST">
                        <button type="submit" name="signalement" value="<?php echo $obj->id() ?>">signaler</button>
                    </form>

                </div>

            <?php
            }
            ?>
        </div>
        <div id="slide">
            <p id="precedent"><i class="fas fa-chevron-left"></i></p>

            <div class="pages" id="pages">
                <?php $pages = 0;
                $limitMin = 0;
                
                ?>
                <?php while ($limitMin < $maxCommentaires) { ?>
                   
                    <div class="numeroPage"><?php echo $pages + 1; ?></div>
                    <?php $limitMin += 3; ?>
                    <?php $pages++; ?>

                <?php }  ?>

            </div>
            <p id="suivant"><i class="fas fa-chevron-right"></i></p>

        </div>
    </div> <?php  ?>
</div>

<?php $contenu = ob_get_clean();  ?>

<?php require 'template.php'; ?>