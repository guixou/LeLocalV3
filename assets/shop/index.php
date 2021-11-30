<?php

    require("assets/show.php");
    
    $show_product=show();
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le Local Shop</title>
    <script src="https://kit.fontawesome.com/0fc5bb7376.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/normalise.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/header.js"></script>
    <script src="../js/filtre.js"></script>
    <link rel="shortcut icon" type="image/ico" href="../../images/favicon.ico"/>
</head>
<body>
    <header class="headerMain">
        <a href="../../index.php"><h1 class="logo">Le local</h1></a>
        <nav id="nav">
            <div id="lienNav">
                <a href="../../index.php">Acceuil</a>
            </div>
        </nav>
        <button id="bouttonMenu">≡</button>
    </header>

    <main class="OngletShop">
        <h2>Les produits sont disponible à l'achat uniquement en magasin</h2>
        <div class="filtre">
            <button id="filtre1">catégorie 1</button>
            <button id="filtre2">catégorie 2</button>
            <button id="filtre3">catégorie 3</button>
            <button id="filtre4">catégorie 4</button>
            <button id="filtre5">catégorie 5</button>
        </div>
        <div class="shop">
            <?php foreach($show_product as $product): ?>

            <div class="product <?=$product->description ?>">
                <img src="admin/uploads/<?=$product->picture ?>" alt="photo du produit">
                <div class="descriptionProduct">
                    <p><?=$product->name ?></p>
                    <p><?=$product->price ?>€</p>
                </div>
            </div>
            
            <?php endforeach?>
        </div>
    </main>
</body>
</html>