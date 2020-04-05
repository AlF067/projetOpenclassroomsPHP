<?php $titleAdmin = "Login"; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="styles/stylesAdmin.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="styles/stylesChapitres.css">' ?>
<?php ob_start();  ?>
    <div id="login">
        <form action="admin.php" method="POST">
            <label for="user">Nom d'utilsateur : </label><input type="text" name="user" id="user">
            <label for="mdp">Mot de passe : </label><input type="password" name="mdp" id="mdp">
            <button type="submit">Valider</button>
        </form>
    </div>

    <?php $contenuAdmin = ob_get_clean();  ?>
<?php require 'gabaritAdmin.php'; ?>
       