<?php $title = 'Le Local Admin'; ?>

<?php ob_start(); ?>

<header class="headerAdmin">
    <a href="controller/logout.php">Déconnexion</a>
    <a href="controller/logoutShop.php">Retourner au shop</a>
</header>
<main class="adminHome">
    <div>
        <a href="index.php?action=add">Ajouter un produit</a>
        <a href="index.php?action=delete">Supprimer/modifier un produit</a>
    </div>
</main>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>