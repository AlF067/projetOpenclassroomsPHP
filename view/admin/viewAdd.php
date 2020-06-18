<?php $titleAdmin = "Ajout d'un chapitre" ; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="public/styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="public/styles/stylesAjout.css">' ?>
<?php ob_start();  ?>
<section id="ajout">
    <p>Ajouter un chapitre</p>
</section>
<section id="sectionFormulaire">
    <form class="formulaireAjoutEtModif" method="POST" action="index.php?action=XHYEOSODID">  
        <div id="caseTitre">
            <div>
                <label for="titre">Titre : </label><input type="text" name="titre" id="titre">
            </div>
            <div>
                <label for="idChapitre">Numéros du chapitre : </label><input type="text" name="idChapitre" id="id" required>
            </div>
        </div>
        <div id="caseHistoire">
            <label for="histoire">Votre histoire</label>
            <textarea name="histoire" id="histoire"></textarea>
        </div>
        <div id="bouton">
            <button type="submit">Mettre le chapitre en ligne</button>
        </div>
    </form>
    <a href="index.php?action=XHYEOSODID">Retour</a>
</section>

<?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'templateAdmin.php'; ?>