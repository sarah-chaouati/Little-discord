<?php

class user extends bdd{

    private $id = NULL;
    private $login = NULL;
    private $name = NULL;
    private $surname = NULL;
    private $mail = NULL;
    private $rank = NULL;
    private $pp = NULL;
    private $message = NULL;
    
    

//Fonctions inscription/connexion/déconnexion/désinscription.

    public function inscription($login,$name,$surname,$mail,$psw,$confpsw){
        if($login != NULL  && $name != NULL && $surname != NULL && $mail != NULL && $psw != NULL && $confpsw != NULL){
            if($psw == $confpsw){
                if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $mail)){
                    
                
                $this->connect();
                $requete = "SELECT login,mail FROM user WHERE login = '$login' OR mail = '$mail'";
                $query = mysqli_query($this->connexion,$requete);
                $result = mysqli_fetch_all($query);

                if(empty($result)){
                    $this->connect();
                    $psw = password_hash($psw, PASSWORD_BCRYPT, array('cost' => 5));
                    $requete = "INSERT INTO `user`(`login`,`name`, `surname`, `mail`,`password`,`rank`) VALUES ('$login','$name','$surname','$mail','$psw','membre')";
                    var_dump($requete);
                    $query = mysqli_query($this->connexion,$requete);
                    return "ok";
                    
                    /*
                    if ($query) {
                        echo "New record created successfully";
                    } else {
                        echo "Error: " .   "<br>" .  mysqli_error($connect);
                     
                    }
                }
            */}
                else{
                    return "log"; 
                }
            }
            else{ 
                return "mail";
            }
        }
            else{
                return "psw";
            }
        }
        else{
            return "empty";
        }
    }





public function connexion($login,$psw){
        $this->connect();
        $request = "SELECT * FROM user WHERE login = '$login'";
        $query = mysqli_query($this->connexion,$request);
        $result = mysqli_fetch_assoc($query);
        if(!empty($result)){
            if($login == $result["login"]){
                if(password_verify($psw,$result["password"])){
                    $this->id = $result["id"];
                    $this->login = $result["login"];
                    $this->name= $result["name"];
                    $this->surname= $result["surname"];
                    $this->mail= $result["mail"];
                    $this->rank= $result["rank"];

                    return [$this->id,$this->login,$this->name,$this->surname,$this->mail,$this->rank];
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }



public function isConnected(){
        if ($this->id != null) {
            return true;
        } else {
            return false;
        }
    }


public function disconnect(){
        $this->id = NULL;
        $this->login = NULL;
        $this->name = NULL;
        $this->surname = NULL;
        $this->mail = NULL;
        $this->rank = NULL;
     
    }

public function desinscription()
    {
        $this->connect();
        $id = $_SESSION["user"]->getid();
        $delete="DELETE * FROM user WHERE id = $id";
        $query=mysqli_query($this->connexion,$delete);
                session_unset();
                session_destroy();
                header ('location:index.php');
    }

//----------------------------------------------------------------------------------//
//Function du profil 

public function mes_info()
{   
    $this->connect();
    $fetch=$this->execute("SELECT * FROM user WHERE id = $this->id");

}

public function profil($confpsw,$login,$mail,$psw){
    $this->connect();
    $request= "SELECT password FROM user WHERE id = $this->id";
    $query = mysqli_query($this->connexion,$request);
    $fetchpsw = mysqli_fetch_assoc($query);
    
        if(password_verify($confpsw,$fetchpsw["password"])){
            if($login != NULL){
                $result=$this->execute("SELECT login FROM user WHERE login = \"$login\"");
                
                if(empty($result)){
                    $this->login = $login;
                }
                else{
                    return false;
                }
            }
            if($mail != NULL){
                $result=$this->execute("SELECT mail FROM user WHERE mail =\"$mail\"");
                if(empty($result)){
                    $this->mail = $mail;
                }
                else{
                    return false;
                }
            }
            if($psw != NULL)
            {
                $psw = password_hash($psw, PASSWORD_BCRYPT, array('cost' => 5));
                $request = "UPDATE user SET password = \"$psw\" WHERE id = $this->id";
                $query = mysqli_query($this->connexion,$request);
            }
            $request = "UPDATE user SET login = \"$this->login\", mail =\"$this->mail\" WHERE id =$this->id";
            $query = mysqli_query($this->connexion,$request);
        }
        
        else{
            return false;
        }
    }






//----------------------------------------------------------------------------------//
//Get
public function getid(){
    return $this->id;
}

public function getlogin(){
    return $this->login;
}

public function getname(){
    return $this->name;
}

public function getsurname(){
    return $this->surname;
}

public function getmail(){
    return $this->mail;
}

public function getrank(){
    return $this->rank;
}

public function getpp(){
    return $this->pp;
}

}