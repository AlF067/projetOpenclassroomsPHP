<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
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