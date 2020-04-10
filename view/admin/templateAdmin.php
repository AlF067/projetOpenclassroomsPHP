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
    <?php echo $linkStylesGeneral; ?>
    <?php echo $linkStyles; ?>
    <link rel="stylesheet" href="public/fontawesome/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $titleAdmin; ?></title>
</head>

<body>
    <header>
        <p>PAGE ADMINISTRATEUR</p>
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