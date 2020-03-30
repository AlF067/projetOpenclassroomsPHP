<?php $title = "Chapitre"; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesGeneral.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesChapitresChoisis.css">' ?>
<?php ob_start();  ?>
<div id="lecture">

    <h2><?php echo $chapitreChoisis['titre'] . " " . " ajouté le " . $chapitreChoisis['dateAjout'] ?></h2>
    <p><?php echo $chapitreChoisis['histoire'] ?></p>
    <?php ?>

    <div><a href="../controleur/chapitres.php">Retour au choix des chapitres</a></div>
</div>



<div id="rubriqueCommentaires">
    <div>
        <form id="formulaireCommentaires" method="POST" action="../controleur/chapitresChoisis.php?idChapitre=<?php echo $chapitreChoisis['idChapitre'] ?>">
            <h3>Laisser un commentaire</h3>
            <input type="text" name="pseudo" placeholder="Votre pseudo">
            <textarea name="commentaire" placeholder="Votre commentaire"></textarea>
            <input type="hidden" name="idChapitre" value="<?php echo $chapitreChoisis['idChapitre'] ?>">
            <input type="submit" name="envoi" id="envoi">

        </form>
    </div>


    <div class="commentaires">
        
            <h3>Les Commentaires</h3>
            <?php
            foreach ($manager->commentairesAll($_GET["idChapitre"], $limitMin) as $obj) {
            ?>
                <div class="commentairesAfficher">
                    <h4><?php echo $obj->pseudo() . " " . " ajouté le <span> " . $obj->dateHeure() . "</span>" ?></h4>
                    <p><?php echo $obj->commentaire() ?></p>
                    <form action="../controleur/chapitresChoisis.php?idChapitre=<?php echo $chapitreChoisis['idChapitre'] ?>" method="POST">
                        <button type="submit" name="signalement" value="<?php echo $obj->id() ?>">signaler</button>
                    </form>
                    
                </div>
                
            <?php
            }
            ?>
        

        <?php  ?>
        <div  class="pages">
            <?php $pages = 0;
            $limitMin = 0;
            echo "<div id='nombreDePages'>Page : </div>"; ?>
            <?php while ($limitMin < $manager->maxCommentaires($_GET["idChapitre"])) { ?>
                <?php
                if (!$pages == 0) {
                    echo "<div class='slash'>/</div>";
                }
                ?>
                <a href="../controleur/chapitresChoisis.php?idChapitre=<?php echo $chapitreChoisis['idChapitre'] ?>&limitMin=<?php echo $limitMin ?>"><?php echo $pages + 1; ?></a>
                <?php $limitMin += 3; ?>
                <?php $pages++; ?>

            <?php } ?>

        </div>



    </div>
    <?php  ?>
</div>





<?php $contenu = ob_get_clean();  ?>

<?php require 'gabarit.php'; ?>