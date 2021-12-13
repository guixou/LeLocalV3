<!-- vue template -->
<!DOCTYPE html>
<html>
    <head>
        <title><?= $title ?></title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/0fc5bb7376.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="public/css/normalise.css">
        <link rel="stylesheet" href="public/css/style.css">
        <script src="public/js/filtre.js"></script> <!-- que pour le shop -->
        <script src="public/js/slider.js"></script> <!-- que pour l'accueil -->
        <script src="public/js/header.js"></script>
        <script src="public/js/collabSlider.js"></script> <!-- que pour l'accueil -->
        <link rel="shortcut icon" type="image/ico" href="public/images/favicon.ico"/>
    </head>
        
    <body>
        <?php
            if ($notification != ''):
        ?>
            <div class="notification">
                <p> Erreur : </p>
                <?= $notification; ?>
            </div>
        <?php
            endif;
        ?>
        <?= $content ?>
    </body>
</html>