<?php 
declare(strict_types=1);

session_start();

function delete($notification) {
        //on est sur une page où on doit être identifié -> si la variable session n'existe pas -> rediriger l'utilisateur vers la page de login
    if (!isset($_SESSION['user'])) {
        header('Location: Login');
        exit;
    }
    require('model/shopModel.php');
    
    $posts = show();

    require('view/delete.php');
}