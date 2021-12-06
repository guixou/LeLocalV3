<?php 
declare(strict_types=1);

function getUser ($pdo, $safeEmail) {

    //1 preparer la requete
    $query = $pdo->prepare
    (
        'SELECT 
            Id,
            Email,
            Password
        FROM 
            Users 
        WHERE
            Email = ?
        LIMIT 0,1'
    );


    //2 executer la requete
    // Demande à PDO d'envoyer la requête à MySQL pour exécution.
    $query->execute([$safeEmail]);

    //4 - recupérer le résultat
    return $query->fetch(PDO::FETCH_ASSOC);

}