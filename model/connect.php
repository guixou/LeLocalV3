<?php

class Connect{
    
    const HOST = "db.3wa.io";
    const DB_NAME = "guillaumepic_shop";
    const USER = "guillaumepic";
    const PASSWORD = "72a3700161ee6c1ac81af86bbb3ceedf";

    public function connexion(){
        
        $pdo = new PDO('mysql:host='.self::HOST.';dbname='.self::DB_NAME, self::USER, self::PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->exec('SET NAMES UTF8');
        return $pdo;
    }
}