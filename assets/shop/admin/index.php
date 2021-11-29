<?php 
declare(strict_types=1);

session_start();



//on est sur une page où on doit être identifié -> si la variable session n'existe pas -> rediriger l'utilisateur vers la page de login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

//1 - connecter à mysql
require '../assets/connect.php';

//affichage du template
require 'views/index.phtml';
