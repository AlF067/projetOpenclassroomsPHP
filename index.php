<?php
require "model/Commentaires.php";
require "model/Chapters.php";
require "model/Manager.php";
require "controller/public.php";
require "controller/admin.php";
session_start();
try {
    if (isset($_GET["action"])) {
        if ($_GET["action"] == "contact") { //PARTIE PUBLIC
            require "view/public/viewContact.php";
        } elseif ($_GET["action"] == "biographie") {
            require "view/public/viewBiographie.php";
        } elseif ($_GET["action"] == "chaptres") {
            chaptres();
        } elseif ($_GET["action"] == "lecture") {
            chapitresChoisis();
        } elseif ($_GET["action"] == "XHYEOSODID") { //PARTIE ADMINISTRATEUR
            if (isset($_POST["deconnexion"])) {
                deconnect();
                session_destroy(); 
            }
            if (isset($_POST["user"]) && isset($_POST["password"]) || isset($_SESSION["connected"]) && $_SESSION["connected"] == true) {
                if (isset($_GET["actionAdmin"])) {
                    if ($_GET["actionAdmin"] == "add") {
                        add();
                    } elseif ($_GET["actionAdmin"] == "update") {
                        update();
                    } elseif ($_GET["actionAdmin"] == "deleteChapter") {
                        delete();
                    } elseif ($_GET["actionAdmin"] == "comments") {
                        comments();
                    }
                } else {
                    adminHome();
                }
            } else {
                require "view/admin/login.php";
            }
        } else {
            throw new Exception('cette page n\'existe pas');
        }
    } else {
        home();
    }
} catch (Exception $e) {
    $erreur = "erreur : " . $e->getMessage();
    require "view/public/viewError.php";
}
