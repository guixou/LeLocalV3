<?php
declare(strict_types=1);

session_start();

/* déclaration des variable sans balise */ 

$safeUpdateProduct = htmlspecialchars($_POST['updateProduct']);
$safeName = htmlspecialchars($_POST['name']);
$safePrice = htmlspecialchars($_POST['price']);
$safeDescription = htmlspecialchars($_POST['description']);

//on est sur une page où on doit être identifié -> si la variable session n'existe pas -> rediriger l'utilisateur vers la page de login
if (!isset($_SESSION['user'])) {
    header('Location: Login');
    exit;
}

// connection a la BDD
require '../model/connect.php';

require '../model/shopModel.php';

// on instancie la fonction de notre classe
$connexion = new Connect();

$pdo = $connexion->connexion();

// modifier les élément dans la BDD

updateProduct($pdo, $safeName, $safePrice, $safeDescription, $safeUpdateProduct);

//redirection
header('Location: ../Delete');
exit;