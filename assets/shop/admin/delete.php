<?php 
declare(strict_types=1);

session_start();



//on est sur une page où on doit être identifié -> si la variable session n'existe pas -> rediriger l'utilisateur vers la page de login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

//gestion des erreurs
$notification = '';


if (isset($_GET['error'])) {
    switch(intval($_GET['error'])) {
        case 1:
            $notification = "Vous avez oublié d'ajouter une image";
            break;
            
        case 2:
            $notification = "Le format de l'image n'est pas bon";
            break;
            
        case 3:
            $notification = "L'image n'a pas pus être acheminé jusqu'au dossier";
            break;
            

    }
}

//1 - connecter à mysql
require '../assets/connect.php';

//affichage du template
require 'views/delete.phtml';
