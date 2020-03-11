<?php $titleAdmin = "Accueil Administrateur" ; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesAjout.css">' ?>
<?php ob_start();  ?>
<?php $donnees = $chapitresChoisis->fetch();  ?>

        <section id="ajout">
            <p>Modification d'un chapitre , <?php echo $donnees['titre'] ; ?></p>
        </section>
        <section id="sectionFormulaire">
            <form method="POST" action="../controleur/admin.php">  
                <div id="caseTitre">
                    <label for="modifTitre">Titre : </label><input type="text" name="modifTitre" id="modifTitre" value = "<?php echo $donnees['titre'] ; ?>" >
                </div>
                <div id="caseHistoire">
                    <label for="modifHistoire">Votre histoire</label>
                    <textarea name="modifHistoire" id="modifHistoire"><?php echo $donnees['histoire']; ?>
                    </textarea>
                </div>
                <div id="bouton">
                    <button type="submit">Valider les modification du chapitre</button>
                </div>
                <input type="hidden" name="id" value="<?php echo $donnees['id'] ; ?>" >
            </form>
            <a href="../admin.php">Retour</a>
        </section>

<?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'gabaritAdmin.php'; ?>