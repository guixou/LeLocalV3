<?php

function show(){ // afficher les produit
    require "model/connect.php";
    
    // on instancie la fonction de notre classe
    $connexion = new Connect();

    $pdo = $connexion->connexion();
    
        $query = $pdo->prepare("SELECT * FROM product ORDER BY id DESC");
        
        $query->execute();
        
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $data;
        
        $query->closeCursor();
           
}
