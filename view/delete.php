<?php $title = 'Le Local Admin'; ?>

<?php ob_start(); 

$show_product= $posts;
?>

<header>
    <div class="headerAdmin">
        <a href="Add">Ajouter un produit</a>
        <a href="Admin">Page d'administration</a>
        <a href="controller/logout.php">Déconnexion</a>
    </div>
</header>
<main>
    <div class="shop">
        <?php foreach($show_product as $product): ?>

        <div class="product <?=$product->description ?>">
        <img src="public/images/uploads/<?=$product->picture ?>" alt="photo du produit">
        <div class="formulaire">
            <form method="post" class="admin" action="controller/productUpdate.php">
                <h3>Modfier les information du produit</h3>
                <label>Nom :</label>
                <input type="text"name="name" placeholder="Nom du produit" value="<?=$product->name ?>" required>

                <label>Prix :</label>
                <input type="number" name="price" placeholder="Prix" value="<?=$product->price ?>" required>

                <label>Cathégorie :</label>
                <input name="description" required placeholder="product1, product2, product3, product4, product5" value="<?=$product->description ?>" required>

                <button type="submit" name="updateProduct" value="<?=$product->id ?>"> mettre à jour le produit</button>
            </form>
            
            <form method="post" class="admin" action="controller/pictureUpdate.php" enctype="multipart/form-data">
                <h3>Modifier l'image du produit</h3>
                <label>Lien de l'image:</label>
                <input type="file"name="picture" value="test">
                <button type="submit" name="updatePicture" value="<?=$product->id ?>"> mettre à jour la photo</button>
            </form>

            <form method="post" class="admin" action="controller/productDelete.php">
                <h3>Supprimer un produit</h3>
                <button type="submit" value="<?=$product->id ?>" name="id">Supprimer</button>
            </form>
        </div>
    </div>

<?php endforeach?>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>