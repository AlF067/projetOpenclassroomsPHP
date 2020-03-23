<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesGeneral.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesChapitresChoisis.css">' ?>
<?php ob_start();  ?>
    <div id="lecture">
        <?php
        $chapitres->chapitresChoisis();
        ?>

        <div><a href="../controleur/chapitres.php">Retour au choix des chapitres</a></div>
    </div>
    <div id="rubriqueCommentaires">
        <div>
            <form method="POST" action="../controleur/chapitresChoisis.php?id=<?php echo $donneesChapitresChoisis['id'] ?>">
                <h3>Laisser un commentaire</h3>
                <input type="text" name="pseudo" placeholder="Votre pseudo">
                <textarea name="commentaire" placeholder="Votre commentaire"></textarea>
                <input type="hidden" name="idChapitre" value="<?php echo $donneesChapitresChoisis['idChapitre']; ?>">
                <input type="submit" name="envoi" id="envoi">

            </form>
        </div>
        

    </div>
<?php $contenu = ob_get_clean();  ?>
<?php require 'gabarit.php'; ?>