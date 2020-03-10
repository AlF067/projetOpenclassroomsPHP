<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="stylesGeneral.css">
        <link rel="stylesheet" type="text/css" href="stylesChapitres.css">
        <title>blog</title>
    </head>
    <body>
        <?php require "header.php" ?>
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
                        $req = $bdd->prepare('SELECT * FROM chapitres WHERE id=? ');
                        $req->execute(array($_GET["id"]));

                        $donnees = $req->fetch();
                        
                        ?>
                        <h2><?php echo $donnees['titre']. " " . " ajouté le " . $donnees['dateAjout']?></h2>
                        <p><?php echo $donnees['histoire'] ?></p>
                        
                        <?php 
                        
                        $req->closeCursor();
                    ?>

                    <div><a href="chapitres.php">Retour au choix des chapitres</a></div>   
                     
        </section>
        <?php require "footer.php" ?>
        
    </body>
</html>