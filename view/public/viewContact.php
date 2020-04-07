<?php $title = "Contact" ; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="public/styles/stylesGeneral.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="public/styles/stylesBiographieContact.css">' ?>
<?php ob_start();  ?>
             <form action="" method="POST">
             	<h2>Contact</h2>

             	<div id="labelsInputs">
	             	<div id="labels">
	             		<label class="labelInput" for="nom">Nom : </label>
	             		<label class="labelInput" for="prenom">Prénom : </label>
	             		<label class="labelInput" for="email">E-mail : </label>
	             		<label class="labelInput" for="sujet">Sujet : </label>
	             	</div>
	             	<div id="inputs">
	             		<input class="labelInput" required type="text" name="nom" id="nom">
	             		<input class="labelInput" required type="text" name="prenom" id="prenom">
	             		<input class="labelInput" required type="email" name="email" id="email">
	             		<input class="labelInput" required type="text" name="sujet" id="email">
	             	</div>
             	</div>
             
             	<div id="messageArea">
	             	<label for="message">Message</label>
	             	<textarea id="message"></textarea>
             	</div>

             	<input type="button" name="envoyer" value="Envoyer">
             </form>

<?php $contenu = ob_get_clean();  ?>
<?php require 'template.php'; ?>