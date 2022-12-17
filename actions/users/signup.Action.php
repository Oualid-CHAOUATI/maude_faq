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
    if(empty($_POST["first_name"]))
    {
   $errorMessageFirst_name=$errorMessageBase." le nom";
   $allFieldsAreSet=false;

    }
    if(empty($_POST["last_name"]))
    {
        $errorMessageLast_name=$errorMessageBase." le prenom";
        $allFieldsAreSet=false;


    }
    if(empty($_POST["password"]))
    {

        $errorMessagePassword=$errorMessageBase." le mot de passe ";
        $allFieldsAreSet=false;
    }
    

    //?verifier si les champs sont vides ou pas 

    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $first_name = htmlspecialchars($_POST["first_name"]);
    $password = htmlspecialchars($_POST["password"]);
    $passwordHashed = password_hash($password,PASSWORD_DEFAULT);


    // if($pseudo)


    $doesUserExist=$bdd->prepare('SELECT pseudo from users where pseudo = ? ');
    $doesUserExist->execute([$pseudo]);

    if($allFieldsAreSet)
    if($doesUserExist->rowCount()==0){
    
        try{

            $insertUser=$bdd->prepare("INSERT into users(pseudo,last_name,first_name,password) values(?,?,?,?)");
            $insertUser->execute([$pseudo,$last_name,$first_name,$passwordHashed]);

            // requete pour recuperer les données de l'utilisateur 
            $userInfoReq=$bdd->prepare("SELECT id from users where pseudo = ? and last_name=?");
            $userInfoReq->execute([$pseudo,$last_name]);

            //seara un tableau 
            $userInfo=$userInfoReq->fetch();

            //authentification de l'utilisateur 
            $_SESSION["auth"]=true;
            $_SESSION["id"]=$userInfo["id"];
            $_SESSION["last_name"]=$userInfo["last_name"];
            $_SESSION["first_name"]=$userInfo["first_name"];
            $_SESSION["pseudo"]=$userInfo["pseudo"];

             

            $errorMessage="user  registered and session vars are set";


            //!redirection 
            //relatif au fichier html php 
            header("Location:index.php");


        }
        catch(Exception $exception){
            die($exception);
            echo $exception;
        }
    
}

    else{
        $errorMessage="utilisateur existe déjà  ";

    }




    
    
    

   
}