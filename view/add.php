<?php $title = 'Le Local Admin'; ?>

<?php ob_start(); ?>

<header class="headerAdmin">
    <a href="Delete">Supprimer un produit</a>
    <a href="Admin">Page d'administration</a>
    <a href="controller/logout.php">Déconnexion</a>
</header>
<main>
    <div class="formulaire">
        <form action="controller/productUpload.php" method="post" class="admin" enctype="multipart/form-data">
            <label>Lien de l'image:</label>
            <input type="file"name="picture">
            <label>Nom du produit:</label>
            <input type="text"name="name" placeholder="Nom du produit" required>
            <label>Prix sans le signe €:</label>
            <input type="number" name="price" placeholder="Prix" required>
            <label>Catégorie du produit:</label>
            <input name="description" required placeholder="product1, product2, product3, product4, product5" required>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>