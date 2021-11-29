<?php 
declare(strict_types=1);

session_start();


/* déclaration des variable sans balise */ 

$safeName = htmlspecialchars($_POST['name']);
$safePrice = htmlspecialchars($_POST['price']);
$safeDescription = htmlspecialchars($_POST['description']);

//on est sur une page où on doit être identifié -> si la variable session n'existe pas -> rediriger l'utilisateur vers la page de login
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

//tester si on a bien un fichier

if ($_FILES['picture']['error'] > 0) {
    header('Location: add.php?error=1');
    exit;
}

//tester le format du fichier
//extensions autorisées

$allowed_file_types = ['image/png', 'image/jpeg' , 'image/jpg'];

//tester si le type MIME du fichier ($_FILES['picture']['tmp_name'] est dans le tableau $allowed_file_types 
if (!in_array(mime_content_type($_FILES["picture"]["tmp_name"]), $allowed_file_types)) {
    header('Location: add.php?error=2');
    exit;
}


//construire le nouveau nom du fichier (tjrs renommer les fichiers uploadés)
switch(mime_content_type($_FILES["picture"]["tmp_name"]))
{
    case 'image/png':
        //construction du nom du fichier
        $name_file = 'Shop_'.$_FILES['picture']['name'];
        break;
        
    case 'image/jpeg':
        //construction du nom du fichier
        $name_file = 'Shop_'.$_FILES['picture']['name'];
        break;
}


//déplacer le fichier de l'espace temporaire vers le dossier d'upload du projet
$resultat = move_uploaded_file($_FILES['picture']['tmp_name'],"./uploads/".$name_file);

//tester $resultat
if (!$resultat) {
    header('Location: add.php?error=3');
    exit;
}

//mettre à jour la table Picture dans la bdd

require '../assets/connect.php';


// on instancie la fonction de notre classe
$connexion = new Connect();


$pdo = $connexion->connexion();

$query = $pdo->prepare
(
    'INSERT INTO product (picture, name, price, description) VALUES(?,?,?,?)'
);

//on empèche les balise

$valid_name = htmlspecialchars($safeName);

$valid_description = htmlspecialchars($safeDescription);



//executer la requete

$query->execute([$name_file, $valid_name, $safePrice, $valid_description]);

//redirection
header('Location: add.php');
exit;