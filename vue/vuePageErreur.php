<?php $title = "Chapitre"; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="styles/stylesGeneral.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="styles/stylesChapitresChoisis.css">' ?>
<?php ob_start();  ?>
<div id="lecture">
    <p><?php echo $erreur ?></p>
    <div><a href="index.php">Retour à l'accueil</a></div>
</div>

<?php $contenu = ob_get_clean();  ?>

<?php require 'gabarit.php'; ?>