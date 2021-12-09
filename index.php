<!-- rooteur -->
<?php

$page = 1;

if (isset($_GET['page']) && ctype_digit($_GET['page']))
{
    $page = intval($_GET['page']);
}

$notification = '';

switch($page)
{

    case 2:
        require 'controller/shopController.php';
        shop($notification);
        break;
        
    case 3:
        require 'controller/adminController.php';
        login($notification);
        break;
        
    case 4:
        require 'controller/adminController.php';
        admin($notification);
        break;
        
    case 5:
        require 'controller/add.php';
        add($notification);
        break;
        
    case 6:
        require 'controller/delete.php';
        delete($notification);
        break;
    
        //gestion des erreur

        // erreur du login
    case 31:
        require 'controller/adminController.php';
        $notification = 'Tous les champs ne sont pas remplis';
        login($notification);
        break;

    case 32:
        require 'controller/adminController.php';
        $notification = 'Email invalide';
        login($notification);
        break;

    case 33:
        require 'controller/adminController.php';
        $notification = 'Mot de passe incorecte';
        login($notification);
        break;

        //erreur ajout des produit

    case 51:
        require 'controller/add.php';
        $notification = 'Image manquante';
        add($notification);
        break;

    case 52:
        require 'controller/add.php';
        $notification = 'Image au mauvais format';
        add($notification);
        break;

    case 53:
        require 'controller/add.php';
        $notification = "Récupération de l'image impossible";
        add($notification);
        break;

        //erreur suppresion / modification des produit

    case 61:
        require 'controller/delete.php';
        $notification = 'Id incorecte';
        delete($notification);
        break;

    case 62:
        require 'controller/delete.php';
        $notification = 'Image manquante';
        delete($notification);
        break;

    case 63:
        require 'controller/delete.php';
        $notification = 'Image au mauvais format';
        delete($notification);
        break;

    case 63:
        require 'controller/delete.php';
        $notification = "Récupération de l'image impossible";
        delete($notification);
        break;
    
    default:
        require 'controller/accueilController.php';
        accueil($notification);
}