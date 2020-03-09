<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="stylesAdmin.css">
        <link rel="stylesheet" type="text/css" href="stylesChapitres.css">
        <link rel="stylesheet"  href="fontawesome/css/all.css">
        <title>blog</title>
    </head>
    <body>
        <header>
        	<p>PAGE ADMIN</p> 	
        </header>
        <section id="ajout">
        	<p><a href="ajout.php"><i class="far fa-plus-square"></i> Ajouter un article</a></p>
        </section>
        <section>
        	<?php 
                       try
                        {
                            $bdd = new PDO('mysql:host=localhost;dbname=blog;port=3308', 'root', '');
                            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            
                        }
                        catch(Exception $e)
                        {
                                die('Erreur : '.$e->getMessage());
                        }
                        $reponse = $bdd->query('SELECT * FROM chapitres ORDER BY id DESC ');
                       
                        while ($donnees = $reponse->fetch())
                        {
                        ?>
                            <div class="blocChapitre">
                                <div class="chapitre">
                                    <h2><?php echo $donnees['titre']. " " . " ajouté le " . $donnees['dateAjout']?></h2>
                                    <p><?php echo $donnees['histoire'] ?></p>
                                </div>
                                <div class="lireChapitre">
                                    <a href="chapitresChoisis.php?id=<?php echo $donnees['id'] ?>">Lire</a>
                                    <a href="#">Supprimer</a>
                                    <a href="#">Modifer</a>     
                                </div>
                            </div>
                        <?php 

                        }
                        $reponse->closeCursor();
                    ?> 
        </section>
    </body>
</html>
