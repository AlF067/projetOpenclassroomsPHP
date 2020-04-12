<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="public/fontawesome/css/all.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="logo/jpg" href="public/image/alaska22.jpg" />
        <?php echo $linkStylesGeneral; ?>
        <?php echo $linkStyles; ?>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <?php require "header.php" ?>

        <section>
           <?php echo $contenu; ?>
        </section>

        <?php require "footer.php" ?>
        
         

    </body>
</html>