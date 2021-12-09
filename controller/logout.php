<?php 

session_start();

$_SESSION = [];

session_destroy(); //détruire la session

header('Location: ../Accueil');
exit;