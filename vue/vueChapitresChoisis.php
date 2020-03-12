

<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesGeneral.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesChapitresChoisis.css">' ?>
<?php ob_start();  ?>            
            <div id="lecture">
               <?php 
                        $donnees = $chapitresChoisis->fetch();
                        $title = $donnees['titre'] ;

                        ?>
                        <h2><?php echo $donnees['titre']. " " . " ajouté le " . $donnees['dateAjout']?></h2>
                        <p><?php echo $donnees['histoire'] ?></p>
                        
                        <?php 
                        
                        $chapitresChoisis->closeCursor();
                    ?>

                    <div><a href="../controleur/chapitres.php">Retour au choix des chapitres</a></div>   
            </div>
            <div id="rubriqueCommentaires">
                <div>
                    <form method="POST" action="">
                        <h3>Laisser un commentaire</h3>
                        <input type="text" name="pseudo" placeholder="Votre pseudo">
                        <textarea placeholder="Votre commentaire"></textarea>
                        <input type="submit" name="envoi" id="envoi">
                    </form>                    
                </div>
                <div id="commentaires">
                    <h3>Les Commentaires</h3>
                    <div>
                        
                        <h4>AlF : <span>le 03/10/12</span></h4>
                        <p>ca c'est mon commentaire !</p>
                    </div>  
                    <div>
                        
                        <h4>AlF : <span>le 03/10/12</span></h4>
                        <p>ca c'est mon commentaire !</p>
                    </div>  
                    <div>
                        
                        <h4>AlF : <span>le 03/10/12</span></h4>
                        <p>ca c'est mon commentaire ca c'est mon commentaireca c'est mon commentaire !</p>
                    </div>
                                       
                </div>
                
            </div> 
<?php $contenu = ob_get_clean();  ?>
<?php require 'gabarit.php'; ?>