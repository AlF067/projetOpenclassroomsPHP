<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea'
        });
    </script>
    <?php echo $linkStyles; ?>
    <?php echo $linkStylesGeneral; ?>

    <link rel="stylesheet" href="public/fontawesome/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="logo/jpg" href="public/image/alaska22.jpg">
    <title><?php echo $titleAdmin; ?></title>
</head>

<body>
    <header>
        <p>PAGE ADMINISTRATEUR</p>
        <?php if (isset($_SESSION["connected"]) && $_SESSION["connected"] == true) {

        ?>
            <form id="deconnexion" method="POST" action="index.php?action=XHYEOSODID">
                <button name="deconnexion" value="deconnexion"><i class="fas fa-power-off"></i></button>
            </form>
        <?php
        }
        ?>
    </header>
    <section id="sectionAdmin">
        <?php echo $contenuAdmin; ?>
    </section>
    <footer>
        <div id="copywright">
            <p>©2020 - Tout droits réservés</p>
            <p>Site réalisé par Alex Fritz dans le cadre d'une formation</p>
        </div>
    </footer>
</body>

</html>