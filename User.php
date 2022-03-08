<?php 
echo "chargement Class User";
class User{

    //propriété (Private)
    //membres 
    private $Login_;
    private $MDP_;
    //Méthode (Public)
    public function __construct($NewLogin,$motdepasse)
    {
        $this->login_=$NewLogin;
        $this->MDP_=$motdepasse;
    }
    public function getnom(){
        return $this->login_;
    }
    public function seconnecter($motdepasse){
        if($motdepasse==$this->MDP_)
            return TRUE ;
        else 
            return FALSE;
    
    }
}
?>