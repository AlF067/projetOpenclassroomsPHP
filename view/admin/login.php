<?php $titleAdmin = "Login"; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="public/styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="public/styles/stylesChapitres.css">' ?>
<?php ob_start();  ?>
    <div id="login">
        <form action="index.php?action=XHYEOSODID" method="POST">
            <label for="user">Nom d'utilsateur : </label><input type="text" name="user" id="user">
            <label for="password">Mot de passe : </label><input type="password" name="password" id="password">
            <button type="submit">Valider</button>
        </form>
    </div>

    <?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'templateAdmin.php'; ?>
       