<?php $titleAdmin = "Accueil Administrateur"; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="public/styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="public/styles/stylesChapitres.css">' ?>
<?php ob_start();  ?>

<section id="ajout">
    <p><a href="index.php?action=XHYEOSODID&actionAdmin=add"><i class="far fa-plus-square"></i> Ajouter un article</a></p>
</section>
<section>
    <?php if (isset($chapitreDejaExistant)) {
    ?>
        <div id="chapitreDejaExistant">
            <?php echo $chapitreDejaExistant; ?>
        </div>
    <?php }
    foreach ($listChapitres as $obj) {
        $iconeSignalement = $manager->iconeSignalement($obj->id());
    ?>
        <div class="blocChapitre">
            <div class="chapitre">
                <h2><?php echo $obj->titre() . " " . " ajouté le " . $obj->dateAjout() . "<span id='iconeSignalement'> " . $iconeSignalement . "</span> " ?></h2>
                <p><?php echo $obj->histoire() ?></p>
            </div>
            <div class="lireChapitre">
                <a href="index.php?action=XHYEOSODID&actionAdmin=comments&id=<?php echo $obj->id() ?>">Commentaires</a>
                <a href="index.php?action=XHYEOSODID&actionAdmin=deleteChapter&id=<?php echo $obj->id() ?>">Supprimer</a>
                <a href="index.php?action=XHYEOSODID&actionAdmin=update&id=<?php echo $obj->id() ?>">Modifer</a>
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
        while ($limitMin < $maxChaptires) {
        ?>
            <?php
            if (!$pages == 0) {
                echo "<div class='slash'>/</div>";
            }
            ?>
            <div class="numerosPage">
                <a href="index.php?action=XHYEOSODID&limitMin=<?php echo $pages * 5 ?> "><?php echo $pages + 1; ?></a>
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
<?php require 'templateAdmin.php'; ?>