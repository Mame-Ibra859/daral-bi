<?php

namespace App\User;
use App\Database\Databaseclass;

class UserClass
{
    public $bdd;
    public $Email;
    public $Password;
    public $msg=[];



    public function __construct($bdd)
    {
        return $this->bdd=$bdd;
    }
    public function VerifyUser(string $Email,string $Password)
    {
        $this->Email=htmlspecialchars($Email);
        $this->Password=($Password);
        $verifUser=new Databaseclass($this->bdd);

        if(!empty($this->Email) && !empty($this->Password)):
            if(filter_var($this->Email,FILTER_VALIDATE_EMAIL)):
                if($verifUser->SqlRequestPrepare('users_admin',['Email','Mot_De_Passe'],[$this->Email,$this->Password])):
                    $UserExist=$verifUser->resultFetchBdd;
                    var_dump($UserExist);
                    $_SESSION['idUser_']=(int)$UserExist[0]['id'];
                    //$_SESSION['Email_']=(int)$UserExist[0]['Email_'];
                    $this->msg=['1','Compte trouvé'];
                    //Uri_Redirect('mame');
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
        echo($this->msg[1]);
    }
}
