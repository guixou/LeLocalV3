<?php
declare(strict_types=1);

session_start();

/* déclaration des variable sans balise */ 

if( ! ctype_digit($_POST['id'])) {
    header('location: maPage.php');
    exit;
}

//on est sur une page où on doit être identifié -> si la variable session n'existe pas -> rediriger l'utilisateur vers la page de login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}



// connection a la BDD
require '../model/connect.php';

require '../model/shopModel.php';

// on instancie la fonction de notre classe
$connexion = new Connect();


$pdo = $connexion->connexion();

//suppirmer l'image du dossier upload du projet

$pictureName = getNameById($pdo, $_POST['id']);

//suppression
unlink('../public/images/uploads/'.$pictureName['picture']);



// suppression dans la BDD

deleteProduct($pdo, $_POST['id']);

//redirection
header('Location: ../Delete');
exit;