<?php $title = "Chapitres" ; ?>
<?php $linkStylesGeneral = '<link rel="stylesheet" type="text/css" href="../styles/stylesGeneral.css">' ?>
<?php $linkStyles = '<link rel="stylesheet" type="text/css" href="../styles/stylesChapitres.css">' ?>
<?php ob_start();  ?>
             <?php 
                
                        while ($donnees = $chapitres->fetch())
                        {
                            
                        ?>

                            <div class="blocChapitre">
                                <div class="chapitre">
                                    <h2><?php echo $donnees['titre']. " " . " ajouté le " . $donnees['dateAjout']?></h2>
                                    <p><?php echo $donnees['histoire'] ?></p>
                                </div>
                                <div class="lireChapitre">
                                    <a href="../controleur/chapitresChoisis.php?id=<?php echo $donnees['id'] ?>">Lire le chapitre</a>
                                </div>
                            </div>
                        <?php 

                        }
                        ?>
                        <div id="paginationChapitres">
                            <?php 
                            $pages = 0;
                            $limitMin = 0;
                            $commentairesParPage = 0; 

                            while ( $limitMin < $maxChapitres) { 
                                ?>
                                
                                    <?php 
                                     if ($pages == 0) {
                                            
                                        }else{
                                            echo "<div class='slash'>/</div>";
                                        } ?>
                                    <div id="numerosPage">
                                         <a href="../controleur/chapitres.php?page=<?php echo $pages ?>&limitMin=<?php echo $pages*5 ?> "><?php echo $pages ; ?></a>
                                        
                                    </div>
                              
                            <?php
                            $commentairesParPage +=5;
                            $limitMin +=5;
                            $pages++ ;
                            }
                            ?>

                        
                <?php        
                        $chapitres->closeCursor();
                        ;
                ?>      

<?php $contenu = ob_get_clean();  ?>
<?php require 'gabarit.php'; ?>