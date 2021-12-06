<!-- vue -->
<?php $title = 'Le Local Shop'; ?>

<?php ob_start();

$show_product= $posts;
?>

<header class="headerMain">
    <a href="../../index.php"><h1 class="logo">Le local</h1></a>
    <nav id="nav">
        <div id="lienNav">
            <a href="index.php?action=accueil">Accueil</a>
            <a href="index.php?action=admin">admin</a>
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
            <img src="public/images/uploads/<?=$product->picture ?>" alt="photo du produit">
            <div class="descriptionProduct">
                <p><?=$product->name ?></p>
                <p><?=$product->price ?>€</p>
            </div>
        </div>
        
        <?php endforeach?>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>