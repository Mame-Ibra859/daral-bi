<?php

namespace App\Auth;
use App\Database\Databaseclass;

class Auth
{
    public $bdd;
    public $Email;
    public $Password;
    public $msg=[];
    public $arguments;



    public function __construct($bdd)
    {
        return $this->bdd=$bdd;
    }
    public function VerifyUser(string $Email,string $Password,array $arguments)
    {
        $this->Email=htmlspecialchars($Email);
        $this->Password=($Password);
        $this->arguments=$arguments;
        $verifUser=new Databaseclass($this->bdd);
        if(!empty($this->Email) && !empty($this->Password)):
            if(filter_var($this->Email,FILTER_VALIDATE_EMAIL)):
                if($verifUser->SqlRequestPrepare($this->arguments['table'],[$this->arguments['col-email'],$this->arguments['col-mot de passe']],[$this->Email,$this->Password])):
                    $UserExist=$verifUser->resultFetchBdd;
                    $_SESSION['idUser_']=(int)$UserExist[0]['id'];
                    //$_SESSION['Email_']=(int)$UserExist[0]['Email_'];
                    //Uri_Redirect($this->arguments['Uri-redirection']);
                else:
                $this->msg=['0','Compte introuvable ou identifiants incorrect'];
                endif;
            else:
                $this->msg=['0','Email invalide'];
            endif;
        else:
        $this->Password=$Password;
            $this->msg=['0','Veuillez remplire tous les champs'];
        endif;
    }





}
