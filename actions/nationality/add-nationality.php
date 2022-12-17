<?php 



include "../connexion.php";



$libelle=$_POST["libelle"];


$req=$pdo->prepare("INSERT INTO nationalite (libelle) values (:libelle)");
$req->bindParam(":libelle",$libelle);


try{

    $success=$req->execute();

    if($success){
        $_SESSION["message"] = ["success" => "nationality added with success"];
    }
    else{
        $_SESSION["message"] = ["error" => "failed to add nationality "];
        
    }
    header("location:../../nationalities.html.php");
    exit();
    


}catch(Exception $e){
    die($e->getMessage());
}





?>
