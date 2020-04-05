<?php $title = "Chapitre"; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="styles/stylesGeneral.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="styles/stylesChapitresChoisis.css">' ?>
<?php ob_start();  ?>
<div id="lecture">
    <p>Ce chapitre n'existe pas malheureusement !</p>
    <div><a href="../controleur/chapitres.php">Retour au choix des chapitres</a></div>
</div>



<div >
    <div >
        <div >
            <h3>Les Commentaires</h3>
            <div >
                <p>Pas besoin de commentaires s'il n'y a pas de chapitre à lire !</p>
            </div>
        </div>
    </div>
</div>





<?php $contenu = ob_get_clean();  ?>

<?php require 'gabarit.php'; ?>