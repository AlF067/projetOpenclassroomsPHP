<?php $titleAdmin = "Accueil Administrateur"; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesChapitres.css">' ?>
<?php ob_start();  ?>

<section id="ajout">
    <p><a href="controleur/ajoutAdmin.php"><i class="far fa-plus-square"></i> Ajouter un article</a></p>
</section>
<section>
    <?php if (isset($chapitreDejaExistant)) {
     ?>
    <div id="chapitreDejaExistant">
            <?php echo $chapitreDejaExistant ; ?>
    </div>
    <?php }
    foreach ($manager->listChaptres($limitMin, 5) as $obj) {
        $iconeSignalement = $manager->iconeSignalement($obj->idChapitre());
    ?>

        <div class="blocChapitre">
            <div class="chapitre">
                <h2><?php echo $obj->titre() . " " . " ajouté le " . $obj->dateAjout() . "<span id='iconeSignalement'> " . $iconeSignalement . "</span> " ?></h2>
                <p><?php echo $obj->histoire() ?></p>
            </div>
            <div class="lireChapitre">
                <a href="controleur/moderationCommentairesAdmin.php?idChapitre=<?php echo $obj->idChapitre() ?>">Commentaires</a>
                <a href="vue/vueConfirmationSuppressionAdmin.php?idChapitre=<?php echo $obj->idChapitre() ?>">Supprimer</a>
                <a href="controleur/modificationChapitre.php?idChapitre=<?php echo $obj->idChapitre() ?>">Modifer</a>
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
        echo "<div id='nombreDePages'>Page : </div>";
        while ($limitMin < $manager->maxChaptres()) {
        ?>
            <?php
            if (!$pages == 0) {
                echo "<div class='slash'>/</div>";
            }
            ?>
            <div id="numerosPage">
                <a href="../admin?limitMin=<?php echo $pages * 5 ?> "><?php echo $pages + 1; ?></a>

            </div>

        <?php
            $commentairesParPage += 5;
            $limitMin += 5;
            $pages++;
        }
        ?>
    </div>
</section>

<?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'gabaritAdmin.php'; ?>