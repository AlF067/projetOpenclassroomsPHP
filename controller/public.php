<?php


function chaptres()
{
    $manager = new Manager;
    if (isset($_GET["limitMin"])) {
        $limitMin = (int) $_GET["limitMin"];
    } else {
        $limitMin = (int) 0;
    }
    $maxChaptres = $manager->maxChaptres();

    if ($limitMin < $maxChaptres) {

        $listChaptres = $manager->listChaptres($limitMin, 5);
        $pages = 0;
        $limitMin = 0;
        $commentairesParPage = 0;

        require "view/public/viewChaptres.php";
    } else {
        throw new Exception('Une erreur s\'est produite');
    }
}

function chapitresChoisis(){
    $manager = new Manager;
    if (isset($_GET["idChapitre"])) {
        $idChapitre = (int) $_GET["idChapitre"];
      }
      if (isset($_POST["idChapitre"])) {
        $idChapitre = (int) $_POST["idChapitre"];
      }
      
      if (!($idChapitre > $manager->maxChaptres()) && !($idChapitre == 0)) {
      
      
        $chapitreChoisis = $manager->chaptre($idChapitre);
      
        /* Enregistre le signalement dans la BDD s'il y en a  */
      
        if (isset($_POST["signalement"])) {
          $signalement = (int) $_POST["signalement"];
          if (is_int($signalement) && $signalement != 0) {
            $manager->signaler($signalement);
          } else {
            throw new Exception('une erreur s\'est produite');
          }
        }
        /* Pour la pagination des commentaires */
        if (isset($_POST['limitMin'])) {
          $limitMin = (int) $_POST['limitMin'];
          if ($limitMin >= $manager->maxCommentaires($idChapitre)) {
            throw new Exception('une erreur s\'est produite');
          }
        } else {
          $limitMin = 0;
        }
        /* Ajoute un commentaire s'il y en a un a ajouter */
      
        if (isset($_GET["idChapitre"]) && isset($_POST["pseudo"]) && isset($_POST["commentaire"])) {
      
          $pseudo = (string) htmlspecialchars($_POST["pseudo"]);
          $commentaire = (string) htmlspecialchars($_POST["commentaire"]);
          if (strlen($pseudo) <= 13 && strlen($commentaire) <= 151) {
            $manager->ajoutCommentaires($idChapitre, $pseudo, $commentaire);
          } else {
            throw new Exception('une erreur s\'est produite');
          }
        }
      
        $commentairesAll = $manager->commentairesAll($idChapitre, $limitMin);
        $maxCommentaires = $manager->maxCommentaires($_GET["idChapitre"]);
        require "view/public/viewChapitresChoisis.php";
      } else {
        throw new Exception('ce chapitre n\'existe pas');
      }
}