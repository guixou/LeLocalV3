<?php 

class Notification 
{
    /* propriétés */
    //le référentiel des messages de notification
    private $notificationRef = [
    0 => 'Opération réalisée avec succès !',
    1 => 'Veuillez vous identifier !',
    2 => 'Email incorrect !',
    3 => 'Email non-rempli !',
    4 => 'Email inexistant !',
    5 => 'Pseudo incorrect !',
    6 => 'Pseudo non rempli !',
    7 => 'Pseudo inexistant !',
    8 => 'Mot de passe inexistant !',
    9 => 'Mot de passe non rempli !',
    10 => 'Les 2 Mots de passe ne sont pas identique !',
    11 => 'Identification impossible !',
    12 => 'Message non rempli !',
    13 => 'Upload échoué !',
    14 => 'Mauvais format de fichier !',
    15 => 'Fichier inexistant !',
    16 => 'Le Pseudo existe déjà !',
    17 => 'L\'email existe déjà !'
    ];
    
    //mes notifications
    private $notificationList = [];
    
    //url du formulaire
    private $url;
    
    public function __construct($formUrl = '') 
    {
       $this->url = $formUrl; 
       
       //test si une session existe
       if (isset($_SESSION['notification']))
       {
         //récupération des données de session
         $this->notificationList = $_SESSION['notification']; 
         //détruire la session
         unset($_SESSION['notification']);
       }
    }
    
    //modifier la propriété url
    public function set_url(string $url)
    {
        $this->url = $url;
    }
    
    //ajout d'une notification dans $notificationList
    public function add_notification(int $n, array $ids = [])
    {
        //ajouter une notification dans le tableau
        /*
        on va insérer dans $this->notificationList
        un object qui contiendra :
        le n° de l'erreur
        un tableau qui contient les ids des champs du DOM qui sont liés à l'erreur
        */
        $data = [
            'n_error' => $n,
            'inputs' => $ids
            ];
            
        array_push($this->notificationList, $data);
    }
    
    //renvoi un tableau contenant les messages
    public function get_notificationList(): array
    {

       $tab = [];
       
       foreach($this->notificationList as $item)
       {
           if ($item['n_error'] == 0) {
               $data = [
                   'type' => 'success',
                   'text' => $this->notificationRef[$item['n_error']]
                   ];
           }
           else {
               $data = [
                   'type' => 'danger',
                   'text' => $this->notificationRef[$item['n_error']]
                   ];
           }
           array_push($tab, $data);
       }
       
       return $tab;
    }
    
    //redirige vers le formulaire, si on a au moins une notification
    public function RedirectIfData()
    {
        if(count($this->notificationList) >0)
        {
            //mettre nos notifications dans une session
            $_SESSION['notification'] = $this->notificationList;
            //redirection vers le formulaire
            header('Location: '.$this->url);
            exit;
        }
    }
    
    //renvoyer la liste des Ids des champs en erreur
    public function get_inputsErrorList(): array
    {
        //tableau vierge de travail
        $list= [];
        
        //on parcours le tableau qui contient les notifications + les listes des Ids
        foreach($this->notificationList as $item)
        {
            //$item['inputs'] est aussi un tableau
            foreach($item['inputs'] as $input)
            {
                //controler si la valeur de $input n'est pas déjà dans $list
                if (!array_search($input, $list))
                {
                    //la valeur n'est pas présente dans $list, on peut la rajouter
                    //rajouter la valeur (l'id dans le DOM) à $list
                    array_push($list, $input); 
                }
                
            }
        }
        
        
        //renvoyer ce tableau
        return $list;
    }
}