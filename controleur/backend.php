<?php


function adminHome(){
    try {
        if (isset($_POST["user"]) && isset($_POST["mdp"])) {
            if ($_POST["user"] == "alf" && $_POST["mdp"] == "mdp") {
                $user = $_POST["user"];
                $mdp = $_POST["mdp"];
                $idConnection = "online";
            }
            
        }
        if (isset($_GET["online"])) {
            $idConnection = $_GET["online"];
        }
        
        if (isset($idConnection)) {
    
            if ($idConnection = "online") {
                if (isset($_GET["action"])) {
                    if ($_GET["action"] == "ajout") {
                        require "vue/vueAjoutAdmin.php";
                    }
                    if ($_GET["action"] == "modif") {
                        $chapitreChoisis = $manager->chaptre($_GET["idChapitre"]);
                        require "vue/vueModificationChapitre.php";
                    }
                    if ($_GET["action"] == "supprimerChapitre") {
                        require "vue/vueConfirmationSuppressionAdmin.php";
                    }
                    if ($_GET["action"] == "commentaires") {
                        require "controleur/moderationCommentairesAdmin.php";
                    }
    
                    if ($_GET["action"] == "confirmationSuppressionCommentaires") {
                        require "vue/vueConfirmationSuppressionCommentaire.php";
                    }
                } else {
                    /* Supprime un chapitre s'il y en a un a supprimer */
                    if (isset($_POST["oui"])) {
                        $manager->deleteChapitre($_POST["idChapitre"]);
                    }
    
                    /* Modifie un chapitre s'il y en a un a ajouter */
                    if (isset($_POST["modifHistoire"]) && isset($_POST["modifTitre"])) {
                        $manager->updateChaptre($_POST["idChapitre"], $_POST["modifTitre"], $_POST["modifHistoire"]);
                    }
    
                    /* Ajoute un chapitre s'il y en a un a ajouter */
                    if (isset($_POST["histoire"]) && isset($_POST["titre"])) {
                        if ($manager->chaptre($_POST["idChapitre"]) == false) {
                            $manager->addChaptre($_POST["idChapitre"], $_POST["titre"], $_POST["histoire"]);
                        } else {
                            $chapitreDejaExistant = "le numéro de chapitre existe déja";
                        }
                    }
    
                    /* Variable necessaire pour afficher la page de la liste des chapitre (5 chapitres par page) */
                    if (isset($_GET["limitMin"])) {
                        $limitMin = $_GET["limitMin"];
                    } else {
                        $limitMin = 0;
                    }
    
    
                    require "vue/vueAccueilAdmin.php";
                }
            } else {
                require "vue/login.php";
            }
        } else {
            require "vue/login.php";
        }
    } catch (Exception $e) {
        echo "erreur";
    }
} 

function moderationCommentaires()
{
    $manager = new Manager;

    /*Commentaires affichés en fonction de l'id du chapitre */
    if (isset($_POST["idChapitre"])) {
        $idChapitre = $_POST["idChapitre"];
    } else {
        $idChapitre = $_GET["idChapitre"];
    }

    $chapitreChoisis = $manager->chaptre($idChapitre);

    /* Supprime un commentaire */
    if (isset($_POST["oui"]) && isset($_POST["id"])) {
        $manager->supprimerCommentaire($_POST["id"]);
    }

    /* Supprime un signalement */

    if (isset($_POST["effacerSignalement"])) {
        $manager->supprimerSignalement($_POST["effacerSignalement"]);
    }


    /* Affiche 3 commentaires maximum par page  */
    if (isset($_POST['limitMin'])) {
        $limitMin = $_POST['limitMin'];
    } else {
        $limitMin = 0;
    }

    /* Affiche 3 commentaires signalés maximum par page  */
    if (isset($_POST['limitMinSignal'])) {
        $limitMinSignal = $_POST['limitMinSignal'];
    } else {
        $limitMinSignal = 0;
    }

    require "vue/vueModerationCommentairesAdmin.php";
}
