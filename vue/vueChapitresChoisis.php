<?php $title = "Chapitre"; ?>
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
        <form  method="POST" action="../controleur/chapitresChoisis.php?id=8">
            <h3>Laisser un commentaire</h3>
            <input type="text" name="pseudo" placeholder="Votre pseudo">
            <textarea name="commentaire" placeholder="Votre commentaire"></textarea>
            <input type="hidden" name="idChapitre" value="8">
            <input type="submit" name="envoi" id="envoi">

        </form>
    </div>
    <div id="commentaires">
        <h3>Les Commentaires</h3>
        <?php
        $commentaires->commentairesAll();#
   /*    
        ?>
        
        <div id="pages">
            <?php $i = 0;
            $limitMin = 0; ?>
 
            <?php while ($limitMin < $maxCommentaires) { ?>
                <a href="../controleur/chapitresChoisis.php?idChapitre=<?php echo $donneesChapitresChoisis['id'] ?>&limitMin=<?php echo $limitMin ?>"><?php echo $i; ?>-</a>
                <?php $limitMin += 3; ?>
                <?php $i++; ?>

            <?php } ?>
    
        </div>
 
        <?php $commentaires->closeCursor();  ?>
 <?php
   */    
  ?>
    </div>

</div>
<?php $contenu = ob_get_clean();  ?>

<?php require 'gabarit.php'; ?>