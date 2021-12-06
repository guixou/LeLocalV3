<?php
declare(strict_types=1);

session_start();

/* déclaration des variable sans balise */ 

$safeId = htmlspecialchars($_POST['id']);

//on est sur une page où on doit être identifié -> si la variable session n'existe pas -> rediriger l'utilisateur vers la page de login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}



// connection a la BDD
require '../model/connect.php';


// on instancie la fonction de notre classe
$connexion = new Connect();


$pdo = $connexion->connexion();

//suppirmer l'image du dossier upload du projet

//récupéré le nom de l'image

$name = $pdo->query
(
    'SELECT picture FROM product WHERE id = ' . $pdo->quote($safeId)
);

while ($pictureName = $name->fetch())

//suppression
unlink('../public/images/uploads/'.$pictureName['picture']);



// suppression dans la BDD
$query = $pdo->prepare
(
    'DELETE FROM product WHERE id = ?'
);

//executer la requete


$query->execute([$safeId]);

//redirection
header('Location: ../index.php?action=delete');
exit;