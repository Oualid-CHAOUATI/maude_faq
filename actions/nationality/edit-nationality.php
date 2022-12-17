<?php 
include "../../includes/head.html.php";
include "../../includes/navbar.html.php";

include "../connexion.php";



$libelle=$_POST["libelle"];
$num=$_GET["num"];
$numPost = $_POST["num"];

if(isset($numPost))echo"numpost is there ";
else  echo"numpost is not there ";

try{

$req=$pdo->prepare("UPDATE nationalite SET libelle=:libelle WHERE num=:num");
$req->bindParam(":libelle",$libelle);



    $req->bindParam(":num",$numPost);
    $success=$req->execute();
   

if($success){
        $_SESSION["message"] = ["success" => "succed to modify nationality to $libelle"];
        
    }else{
        $_SESSION["message"] = ["error" => "failed to modify nationality to $libelle"];
        
        
    }
    header("location:../../nationalities.html.php");
    exit();

      


    


}catch(Exception $e){
    $_SESSION["message"] = ["error" => "error with database tring to edit nationality  to $libelle
    </br> message error = ".$e->getMessage()];
    header("location:../../nationalities.html.php");

    exit();

}





?>
