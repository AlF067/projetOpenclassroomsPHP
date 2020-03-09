<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="stylesGeneral.css">
        <link rel="stylesheet" type="text/css" href="stylesChapitres.css">
        <title>blog</title>
    </head>
    <body>
        <header id="header">
            <div id="banniere" >
                <div id="presentation">
                    <p>Jean Forteroche</p>
                    <p>Auteur et écrivain</p>
                </div>
                <nav>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="biographie.php">Qui suis-je ?</a></li>
                        <li><a href="chapitres.php">Chapitres</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div id="titreRoman">
                <h1>Billet simple pour l'Alaska</h1>
                <p>Ecrit par Jean Forteroche</p>
            </div>  
        </header>
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
                                    <a href="chapitresChoisis.php?id=<?php echo $donnees['id'] ?>">Lire le chapitre</a>
                                </div>
                            </div>
                        <?php 

                        }
                        $reponse->closeCursor();
                    ?>        
        </section>
        <footer>
            <div id="mentions">
                
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li>/</li>
                    <li><a href="biographie.php">Qui suis-je ?</a></li>
                    <li>/</li>
                    <li><a href="chapitres.php">Chapitres</a></li>
                    <li>/</li>
                    <li><a href="contact.php">Contact</a></li>
                    <li>/</li>
                    <li><a href="#">Mentions Légales</a></li>
                </ul>
                
                <div id="reseaux">
                    <p>Suivez moi sur:</p>
                    <div >
                        <img src="image/facebook-icon.png">
                        <img src="image/instagram-icon.png">
                        <img src="image/Twitter-icon.png">
                    </div>
                </div>
            </div>
            <div id="copywright">
                <p>©2020 - Tout droits réservés</p>
                <p>Site réalisé par Alex Fritz dans le cadre d'une formation</p>
            </div>
        </footer>
        
    </body>
</html>