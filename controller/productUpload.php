<?php 
declare(strict_types=1);

session_start();

/* déclaration des variable sans balise */ 

$safeName = htmlspecialchars($_POST['name']);
$safePrice = htmlspecialchars($_POST['price']);
$safeDescription = htmlspecialchars($_POST['description']);

//on est sur une page où on doit être identifié -> si la variable session n'existe pas -> rediriger l'utilisateur vers la page de login
if (!isset($_SESSION['user'])) {
    header('Location: Login');
    exit;
}

// pour l'image: 
//tester si on a bien un fichier

if ($_FILES['picture']['error'] > 0) {
    header('Location: ../index.php?page=51');
    exit;
}

//tester le format du fichier
//extensions autorisées

$allowed_file_types = ['image/png', 'image/jpeg' , 'image/jpg'];

//tester si le type MIME du fichier ($_FILES['picture']['tmp_name'] est dans le tableau $allowed_file_types 
if (!in_array(mime_content_type($_FILES["picture"]["tmp_name"]), $allowed_file_types)) {
    header('Location: ../index.php?page=52');
    exit;
}

//construire le nouveau nom du fichier (tjrs renommer les fichiers uploadés)
//récupéré la date pour ne pas avoir deux fichier de meme nom

date_default_timezone_set('UTC');


switch(mime_content_type($_FILES["picture"]["tmp_name"]))
{
    case 'image/png':
        //construction du nom du fichier
        $name_file = 'Shop_'.date('m.d.y.H.i.s').$_FILES['picture']['name'];
        break;
        
    case 'image/jpeg':
        //construction du nom du fichier
        $name_file = 'Shop_'.date('m.d.y.H.i.s').$_FILES['picture']['name'];
        break;
}

//déplacer le fichier de l'espace temporaire vers le dossier d'upload du projet
$resultat = move_uploaded_file($_FILES['picture']['tmp_name'],"../public/images/uploads/".$name_file);

//tester $resultat
if (!$resultat) {
    header('Location: ../index.php?page=53');
    exit;
}

//mettre à jour la table product dans la bdd

require '../model/connect.php';

require '../model/shopModel.php';
// on instancie la fonction de notre classe
$connexion = new Connect();

$pdo = $connexion->connexion();

addProduct($pdo, $name_file, $safeName, $safePrice, $safeDescription);

//redirection
header('Location: ../Add');
exit;