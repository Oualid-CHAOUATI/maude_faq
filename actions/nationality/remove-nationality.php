<?php 
include "../../includes/head.html.php";
include "../../includes/navbar.html.php";

include "../connexion.php";



$num=$_GET["num"];
if(!isset($_GET["remove-modal"])){


try{
$req=$pdo->prepare("DELETE FROM nationalite WHERE num=:num");
$req->bindParam(":num",$num);

$success=$req->execute();

if($success){
            $_SESSION["message"] = ["success" => "nationality deleted with success"];
            header("location:../../nationalities.html.php");
            exit();
}

    


}catch(Exception $e){
    $_SESSION["message"] = ["error" => "error with database tring to delete nationality  
    </br> message error = ".$e->getMessage()];
    header("location:../../nationalities.html.php");

    exit();
}

}




?>

