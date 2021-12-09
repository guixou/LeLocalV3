<?php

function show(){ // afficher les produit
    require "model/connect.php";
    $connexion = new Connect();
    $pdo = $connexion->connexion();
    
        $query = $pdo->prepare("SELECT * FROM product ORDER BY id DESC");
        
        $query->execute();
        
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $data;
        
        $query->closeCursor();       
};

function addProduct($pdo, $name_file, $safeName, $safePrice, $safeDescription){
    $query = $pdo->prepare
    (
        'INSERT INTO product (picture, name, price, description) VALUES(?,?,?,?)'
    );

    $query->execute([$name_file, $safeName, $safePrice, $safeDescription]);
};

function deleteProduct($pdo, $id){

    $query = $pdo->prepare
    (
        'DELETE FROM product WHERE id = ?'
    );

    $query->execute([$id]);
};

function getNameById($pdo,$safeUpdatePicture){

    $name = $pdo->query
    (
        'SELECT picture FROM product WHERE id = ' . $pdo->quote($safeUpdatePicture)
    );


    return ($name->fetch());
};

function updatePicture($pdo, $name_file, $safeupdatePicture){

    $query = $pdo->prepare
    (
        'UPDATE product SET picture = ? WHERE Id = ?'
    );

    $query->execute([$name_file, $safeupdatePicture]);
};

function updateProduct($pdo, $safeName, $safePrice, $safeDescription, $safeUpdateProduct) {
    $query = $pdo->prepare
    (
        'UPDATE product SET name = ?, price = ?, description = ? WHERE Id = ?'
    );

    $query->execute([$safeName, $safePrice, $safeDescription, $safeUpdateProduct]);
}