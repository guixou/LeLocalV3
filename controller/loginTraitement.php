<?php 

declare(strict_types=1);

/* déclaration des variable sans balise */ 

$safeEmail = htmlspecialchars($_POST['email']);
$safePassword = htmlspecialchars($_POST['password']);

/*
est-ce que :
- mes champs sont valables 
- est-ce que l'email est au bon format
*/
if(
    !isset($safeEmail) || !filter_var($safeEmail, FILTER_VALIDATE_EMAIL) ||
    !isset($safePassword) || empty($safePassword)
)
{
    //redirection vers le formulaire
    header('Location: ../index.php?page=31');
    exit;
}

//on charge le fichier connect
require ('../model/connect.php');

require ('../model/adminModel.php');

// on instancie la fonction de notre classe
$connexion = new Connect();


$pdo = $connexion->connexion();

//etape 1 : recherche dans la base de données, un utilisateur avec l'email

$existUser = getUser($pdo, $safeEmail);

if (!$existUser) //si $existUser est false -> on a pas trouvé de User
{
        header('Location: ../index.php?page=32');
        exit;
}

//etape 2 : controler le mot de passe
//si le mot de passe n'est pas vérifié, on redirige l'utilisateur vers le login
if (!password_verify($safePassword, $existUser['Password']))
{
    //redirection vers le formulaire
        header('Location: ../index.php?page=33');
        exit;
}

//si l'identification est correct

//etape 3 : créer une variable session
    //1 demarrer la session
    session_start();
    
    //2 créer la session
    $_SESSION['user'] = [
        'Id' => intval($existUser['Id'])
        ];
        

//etape 5 : rediriger vers index.php
header('location: ../index.php?page=4');
exit;
