<?php 
include "../../includes/head.html.php";
include "../../includes/navbar.html.php";

include "../connexion.php";



$libelle=$_POST["libelle"];


$req=$pdo->prepare("INSERT INTO nationalite (libelle) values (:libelle)");
$req->bindParam(":libelle",$libelle);


try{

    $success=$req->execute();

    if($success)echo "added with success";
    else{
        echo("failed to add ");

    }

    


}catch(Exception $e){
    die($e->getMessage());
}





?>


<a href="../../nationalities.html.php"> show all nationalities</a>