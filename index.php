<!-- rooteur -->

<?php

if (isset($_GET['action'])) {
    if ($_GET['action'] == 'accueil') {
    require('controller/accueilController.php');
        accueil();
    }
    elseif ($_GET['action'] == 'shop') {
        require('controller/shopController.php');
        shop();
    }
    elseif ($_GET['action'] == 'admin') {
        require('controller/adminController.php');
        login();
    }
    elseif ($_GET['action'] == 'login') {
        require('controller/adminController.php');
        admin();
    }
    elseif ($_GET['action'] == 'add') {
        require('controller/add.php');
    }
    elseif ($_GET['action'] == 'delete') {
        require('controller/delete.php');
        delete();
    }
} else {
    require('controller/accueilController.php');
    accueil();
}