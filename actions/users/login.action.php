<?php
require "actions/db.php";

//require permettra de planter da page s'i ya une erreur au niveau du fichier importé 




if(isset($_POST["submit"])){

    
    $errorMessageBase="veuillez reneinger le ";
    $allFieldsAreSet=true;

    //? verifier si les champs sont vides ou pas 
    
    if(empty($_POST["pseudo"]))
    {
        $errorMessagePseudo=$errorMessageBase." le pseudo";
        $allFieldsAreSet=false;

    }
  
    if(empty($_POST["password"]))
    {

        $errorMessagePassword=$errorMessageBase." le mot de passe ";
        $allFieldsAreSet=false;
    }
    //___________________________________________________________________

    //?verifier si les champs sont vides ou pas 
   if($allFieldsAreSet){
        $pseudo = htmlspecialchars($_POST["pseudo"]);
        $password = htmlspecialchars($_POST["password"]);
        $passwordHashed = password_hash($password,PASSWORD_DEFAULT);

        try{
            //?trouver le user correspondant au pseudo 
            $doesUserExist=$bdd->prepare('SELECT * from users where pseudo = ?');
            $doesUserExist->execute([$pseudo]);

            //?requete aboutie ?
            if($doesUserExist->rowCount()>0){
                //Recuperer le mp de la bd 
                $userInfo=$doesUserExist->fetch();
                $userPasswordInDB=$userInfo["password"];
                $errorMessage=$userPasswordInDB;

                //?verifie le mdp 
                $allowedToLogIn=password_verify($password,$userPasswordInDB);//password string , hash 

                if($allowedToLogIn)
                {
                    $errorMessage="allowed to login ";
                  

                    //?authentifier 
                    $_SESSION["auth"]=true;
                    $_SESSION["id"]=$userInfo["id"];
                    $_SESSION["last_name"]=$userInfo["last_name"];
                    $_SESSION["first_name"]=$userInfo["first_name"];
                    $_SESSION["pseudo"]=$userInfo["pseudo"];
                    $errorMessage="seess id = ".$_SESSION["id"];

                    //? redirection 
                    // header("Location:index.php");
                }
                
                
                else  $errorMessage="mot de passe erroné ";
                
                return;
            
        }
        //  ? le cas contraire : la requete na pas aboutit 
                $errorMessage="utilisateur not found   ";
        
        }catch(Exception $exception){
            die($exception);
        }
    }




    
    
    

   
}