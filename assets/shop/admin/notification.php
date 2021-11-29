
<?php 

//déclaraiton de la calsse
class notification {
    public $erreur;

    //récupération des donnée

    public function __construct($erreur){
        $this->erreur = $erreur;
    }

    //création de la constant pour mon new PDO
    
    public function show_notification () {
        var_dump($this->erreur);
    }
    
}

$identificaiton = new notification("c p t");

$identificaiton->show_notification();
