<?php 
declare(strict_types=1);

session_start();

if( !ctype_digit($_POST['updatePicture'])) { // on verifie si on a bien un nombre (je ne passe plus par htmlspecialchars cela empèche le bon focntionnement des function)
    header('location: ../index.php?page=61');
    exit;
}

//on est sur une page où on doit être identifié -> si la variable session n'existe pas -> rediriger l'utilisateur vers la page de login
if (!isset($_SESSION['user'])) {
    header('Location: Login');
    exit;
}

//tester si on a bien un fichier

if ($_FILES['picture']['error'] > 0) {
    header('Location: ../index.php?page=62');
    exit;
}

//tester le format du fichier
//extensions autorisées

$allowed_file_types = ['image/png', 'image/jpeg' , 'image/jpg'];

//tester si le type MIME du fichier ($_FILES['picture']['tmp_name'] est dans le tableau $allowed_file_types 
if (!in_array(mime_content_type($_FILES["picture"]["tmp_name"]), $allowed_file_types)) {
    header('Location: ../index.php?page=63');
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

//supprimer l'ancienne image
//récupéré le nom de l'image

require '../model/connect.php';
require '../model/shopModel.php';
// on instancie la fonction de notre classe
$connexion = new Connect();

$pdo = $connexion->connexion(); 

$pictureName = getNameById($pdo, $_POST['updatePicture']);

//suppression
unlink('../public/images/uploads/'.$pictureName['picture']);

//mettre la nouvelle image
//déplacer le fichier de l'espace temporaire vers le dossier d'upload du projet
$resultat = move_uploaded_file($_FILES['picture']['tmp_name'],"../public/images/uploads/".$name_file);

//tester $resultat
if (!$resultat) {
    header('Location: ../index.php?page=64');
    exit;
}

//mettre à jour la table Picture dans la bdd
updatePicture($pdo, $name_file, $_POST['updatePicture']);

//redirection
header('Location: ../Add');
exit;