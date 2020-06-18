<?php $titleAdmin = "Modifications d'un chapitre" ; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="public/styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="public/styles/stylesAjout.css">' ?>
<?php ob_start();  ?>


        <section id="ajout">
            <p>Modification d'un chapitre , <?php echo $chapitreChoisis['titre'] ; ?></p>
        </section>
        <section id="sectionFormulaire">
            <form class="formulaireAjoutEtModif" method="POST" action="index.php?action=XHYEOSODID">  
                <div id="caseTitre">
                    <div>
                        <label for="modifTitre">Titre : </label><input type="text" name="modifTitre" id="modifTitre" value = "<?php echo $chapitreChoisis['titre'] ; ?>" >
                    </div>
                    <div>
                        <label for="modifId">Numéro du chapitre : <?php echo $chapitreChoisis['idChapitre'] ; ?></label>
                    </div>
            </div>
                </div>
                <div id="caseHistoire">
                    <label for="modifHistoire">Votre histoire</label>
                    <textarea name="modifHistoire" id="modifHistoire"><?php echo $chapitreChoisis['histoire']; ?>
                    </textarea>
                </div>
                <div id="bouton">
                    <button type="submit">Valider les modification du chapitre</button>
                </div>
                <input type="hidden" name="idChapitre" value="<?php echo $chapitreChoisis['idChapitre'] ; ?>">
                
            </form>
            <a href="index.php?action=XHYEOSODID">Retour</a>
        </section>

<?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'templateAdmin.php'; ?>