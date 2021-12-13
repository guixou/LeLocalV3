<?php

function login($notification) {
    require('model/adminModel.php');
    
    require('view/loginView.php');
}

function admin($notification){
    session_start();
    //on est sur une page où on doit être identifié -> si la variable session n'existe pas -> rediriger l'utilisateur vers la page de login
    if (!isset($_SESSION['user'])) {
        header('Location: Login');
        exit;
    }

    require('model/connect.php');
    require('view/adminView.php');
}