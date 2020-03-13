<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesGeneral.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesChapitresChoisis.css">' ?>
<?php ob_start();  ?>
<div id="lecture">
    <?php
    $donneesChapitresChoisis = $chapitresChoisis->fetch();
    $title = $donneesChapitresChoisis['titre'];

    ?>
    <h2><?php echo $donneesChapitresChoisis['titre'] . " " . " ajouté le " . $donneesChapitresChoisis['dateAjout'] ?></h2>
    <p><?php echo $donneesChapitresChoisis['histoire'] ?></p>

    <?php

    $chapitresChoisis->closeCursor();
    ?>

    <div><a href="../controleur/chapitres.php">Retour au choix des chapitres</a></div>
</div>
<div id="rubriqueCommentaires">
    <div>
        <form method="POST" action="../controleur/chapitresChoisis.php?id=<?php echo $donneesChapitresChoisis['id'] ?>">
            <h3>Laisser un commentaire</h3>
            <input type="text" name="pseudo" placeholder="Votre pseudo">
            <textarea name="commentaire" placeholder="Votre commentaire"></textarea>
            <input type="hidden" name="id" value="<?php echo $donneesChapitresChoisis['id']; ?>">
            <input type="submit" name="envoi" id="envoi">

        </form>
    </div>
    <div id="commentaires">
        <h3>Les Commentaires</h3>
        <?php
        while ($donnees = $commentaires->fetch()) {
        ?>
            <form>
                <h4><?php echo $donnees['pseudo']  ?> : <span>le <?php echo $donnees['dateHeure']  ?></span></h4>
                <p><?php echo $donnees['commentaire']  ?></p>
                <div><a href="#">Signaler</a></div>
            </form>
        <?php
        }
        $commentaires->closeCursor();
        ?>
    </div>

</div>
<?php $contenu = ob_get_clean();  ?>
<?php require 'gabarit.php'; ?>