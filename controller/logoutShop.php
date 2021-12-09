<?php 

session_start();

$_SESSION = [];

session_destroy(); //détruire la session

header('Location: ../index.php?page=2');
exit;