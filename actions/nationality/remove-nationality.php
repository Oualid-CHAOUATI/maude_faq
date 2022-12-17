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
    echo $e->getMessage();
    die($e->getMessage());
}

}




?>

<br />
<a href="../../nationalities.html.php"> show all nationalities</a>
