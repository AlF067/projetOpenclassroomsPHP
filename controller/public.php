<?php
function home(){
  $manager = new Manager;
  $homeChapters = $manager->listChapters(0, 3);
  require "view/public/viewHome.php";
}

function postListChaptres()
{
    $manager = new Manager;
    if (isset($_GET["limitMin"])) {
        $limitMin = (int) $_GET["limitMin"];
    } else {
        $limitMin = (int) 0;
    }
    $maxChaptres = $manager->maxChapters();

    if ($limitMin < $maxChaptres) {

        $listChaptres = $manager->listChapters($limitMin, 5);
        $pages = 0;
        $limitMin = 0;
        $commentairesParPage = 0;

        require "view/public/viewChaptres.php";
    } else {
        throw new Exception('Une erreur s\'est produite');
    }
}

function postChapitresChoisis(){
    $manager = new Manager;
    $allIdChaptres = $manager->allIdChapters();
    
    if (isset($_GET["id"])) {
        $idChapitre = (int) $_GET["id"];
      }
      if (isset($_POST["id"])) {
        $idChapitre = (int) $_POST["id"];
      }
      
      if (in_array($idChapitre, $allIdChaptres)) {
      
      
        $chapitreChoisis = $manager->chapter($idChapitre);
      
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
      
        if (isset($_POST["pseudo"]) && isset($_POST["commentaire"])) {
      
          $pseudo = (string) htmlspecialchars($_POST["pseudo"]);
          $commentaire = (string) htmlspecialchars($_POST["commentaire"]);
          if (strlen($pseudo) <= 13 && strlen($commentaire) <= 151) {
            $manager->ajoutCommentaires($idChapitre, $pseudo, $commentaire);
          } else {
            throw new Exception('une erreur s\'est produite');
          }
        }
      
        $commentairesAll = $manager->commentairesAll($idChapitre);
        $maxCommentaires = $manager->maxCommentaires($idChapitre);
        require "view/public/viewChapitresChoisis.php";
      } else {
        throw new Exception('ce chapitre n\'existe pas');
      }
}