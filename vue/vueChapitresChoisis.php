<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="../styles/stylesGeneral.css">
        <link rel="stylesheet" type="text/css" href="../styles/stylesChapitres.css">
        <title>blog</title>
    </head>
    <body>
        <?php require "header.php" ?>
        <section>
               <?php 
                        

                        $donnees = $chapitresChoisis->fetch();
                        
                        ?>
                        <h2><?php echo $donnees['titre']. " " . " ajouté le " . $donnees['dateAjout']?></h2>
                        <p><?php echo $donnees['histoire'] ?></p>
                        
                        <?php 
                        
                        $chapitresChoisis->closeCursor();
                    ?>

                    <div><a href="../controleur/chapitres.php">Retour au choix des chapitres</a></div>   
                     
        </section>
        <?php require "footer.php" ?>
        
    </body>
</html>