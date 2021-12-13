<?php 
declare(strict_types=1);

session_start();

function add($notification) {
    //on est sur une page où on doit être identifié -> si la variable session n'existe pas -> rediriger l'utilisateur vers la page de login
    if (!isset($_SESSION['user'])) {
        header('Location: Login');
        exit;
    }

    //1 - connecter à mysql
    require 'model/connect.php';

    //affichage du template
    require 'view/add.php';
}