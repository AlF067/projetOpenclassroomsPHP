<?php $titleAdmin = "Confirmation suppression" ; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="public/styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="public/styles/stylesConfirmation suppression.css">' ?>
<?php ob_start();  ?>

<section id="suppression">  
        <form method="POST" action="index.php?action=XHYEOSODID&actionAdmin=comments&online=<?php echo $idConnection ?>">
            <div>
                <p>Souhaitez-vous réellement supprimer ce commentaire ?</p>
                <p>(Toute suppression est définitive !)</p>
            </div>
            <div>
                <input type="submit" name="oui" value="oui">
                <input type="submit" name="non" value="non">
                <input type="hidden" name="id" value="<?php echo $_GET["id"] ; ?>" >
                <input type="hidden" name="idChapitre" value="<?php echo $_GET["idChapitre"] ; ?>" >
                     
            </div>
        </form>

</section>

<?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'templateAdmin.php'; ?>