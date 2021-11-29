<?php 


// const host = "db.3wa.io";
// const name = "guillaumepic_shop";
// const login = "guillaumepic";
// const password = "72a3700161ee6c1ac81af86bbb3ceedf";

// try{
    
//     // connection a ma BDD
    
     

//     $pdo = new PDO
//     (
//         'mysql:host='.host.';dbname='.name.';charset=UTF8', login, password
//     );
    
//     // pour les erreur
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
// } catch (Exception $e) {
    
//     $e->getMessage();
    
// }
    


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
?>