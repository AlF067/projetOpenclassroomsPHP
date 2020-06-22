<?php
function deconnect()
{
    $_SESSION["connected"] = false;
    session_destroy();
}

function adminHome()
{

    $manager = new Manager;
    $maxChaptires = $manager->maxChapters();

    if (isset($_POST["user"]) && isset($_POST["password"])) {
        if ($_POST["user"] == "alf" && $_POST["password"] == "mdp") {
            $_SESSION["connected"] = true;
        } else {
            $_SESSION["connected"] = false;
        }
    }

    if (isset($_SESSION["connected"]) && $_SESSION["connected"] == true) {

        /* Supprime un chapitre s'il y en a un a supprimer */
        if (isset($_POST["oui"])) {
            $manager->deleteChapter($_POST["id"]);
        }

        /* Modifie un chapitre s'il y en a un a ajouter */
        if (isset($_POST["modifHistoire"]) && isset($_POST["modifTitre"])) {
            $manager->updateChapter($_POST["id"], $_POST["modifTitre"], $_POST["modifHistoire"]);
        }

        /* Ajoute un chapitre s'il y en a un a ajouter */
        if (isset($_POST["histoire"]) && isset($_POST["titre"])) {
            $manager->addChapter($_POST["titre"], $_POST["histoire"]);
        }


        /* Variable necessaire pour afficher la page de la liste des chapitre (5 chapitres par page) */
        if (isset($_GET["limitMin"])) {
            $limitMin = $_GET["limitMin"];
            if ($limitMin >= $maxChaptires) {
                throw new Exception('Une erreur s\'est produite');
            }
        } else {
            $limitMin = 0;
        }
        $listChapitres = $manager->listChapters($limitMin, 5);

        require "view/admin/viewHome.php";
    } else {
        if (!(isset($_POST["deconnexion"]))) {
            echo "mauvais mot de passe ou nom d'utilisateur";
        }

        require "view/admin/login.php";
    }
}

function add()
{
    require "view/admin/viewAdd.php";
}

function update()
{
    $manager = new Manager;

    $chapitreChoisis = $manager->chapter($_GET["id"]);
    require "view/admin/viewUpdate.php";
}

function delete()
{
    require "view/admin/viewDeleteChapter.php";
}

function comments()
{
    $manager = new Manager;
    $allIdChaptres = $manager->allIdChapters();

    //Commentaires affichés en fonction de l'id du chapitre 
    if (isset($_POST["id"])) {
        $idChapitre = $_POST["id"];
    } elseif (isset($_GET["id"])) {
        $idChapitre = $_GET["id"];
    } else {
        throw new Exception('une erreur s\'est produite');
    }

    if (!(in_array($idChapitre, $allIdChaptres))) {
        throw new Exception('le chapitre choisi n\'existe pas');
    }

    $chapitreChoisis = $manager->chapter($idChapitre);

    /* Supprime un commentaire */
    if (isset($_POST["oui"]) && isset($_POST["idComment"])) {
        $manager->supprimerCommentaire($_POST["idComment"]);
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

    $commentsAll = $manager->commentairesList($idChapitre, $limitMin);
    $maxComments = $manager->maxCommentaires($idChapitre);
    $commentsSignal = $manager->commentairesSignaler($idChapitre, $limitMinSignal);
    $maxSignalComments = $manager->maxCommentairesSignaler($idChapitre);

    if (isset($_GET["deleteComment"])) {
        require "view/admin/viewConfirmationDeleteComment.php";
    } else {
        require "view/admin/viewComments.php";
    }
}
