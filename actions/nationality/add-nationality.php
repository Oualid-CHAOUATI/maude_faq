<?php 



include "../connexion.php";



$libelle=$_POST["libelle"];
$numContinent=$_POST["continent"];


$req=$pdo->prepare("INSERT INTO nationalite (libelle,numContinent) values (:libelle,:numContinent)");
$req->bindParam(":libelle",$libelle);
$req->bindParam(":numContinent",$numContinent);



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
