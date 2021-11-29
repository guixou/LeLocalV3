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
    header('Location: login.php');
    exit;
}


// connection a la BDD
require '../assets/connect.php';


// on instancie la fonction de notre classe
$connexion = new Connect();


$pdo = $connexion->connexion();

//récupéré l'id du produit a modifier

$produit = $safeUpdateProduct;


// modifier les élément dans la BDD

$query = $pdo->prepare
(
    'UPDATE product SET name = ?, price = ?, description = ? WHERE Id = ?'
);

//on empèche les balise

$valid_name = htmlspecialchars($safeName);

$valid_description = htmlspecialchars($safeDescription);

//executer la requete

$query->execute([$valid_name, $safePrice, $valid_description, $produit]);

//redirection
header('Location: delete.php');
exit;