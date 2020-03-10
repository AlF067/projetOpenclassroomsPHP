<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="stylesAjout.css">
        <link rel="stylesheet"  href="fontawesome/css/all.css">
        <title>blog</title>
    </head>
    <body>
        <header>
        	<p>Ecrivez votre article</p>
        </header>
        <section>
        	<form method="POST" action="#">
                <div id="caseTitre">
                    <label for="titre">Titre : </label><input type="text" name="titre" id="titre">
                </div>
                <div id="caseHistoire">
                    <label for="histoire">Votre histoire</label>
                    <textarea name="histoire" id="histoire"></textarea>
                </div>
                <div id="bouton">
                    <button type="submit">Envoyez votre chapitre</button>
                </div>
            </form>
        </section>
        <footer>
            <div id="copywright">
                <p>©2020 - Tout droits réservés</p>
                <p>Site réalisé par Alex Fritz dans le cadre d'une formation</p>
            </div>
        </footer>
        
    </body>
</html>

